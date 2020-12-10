<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function fetch_products(){


		$this->load->model("crud_model");  
           $fetch_data = $this->crud_model->make_datatables();  
           $data = array();  


           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                  
                $sub_array[] = $row->id;  
                $sub_array[] = $row->name;
                $sub_array[] = $row->hsn;  
                $sub_array[] = $row->rate;
                $sub_array[] = $row->unit;
                $sub_array[] = $row->gst;

                if($this->session->userdata('inv_no')){

                	$dataString = $row->id.'#'.$row->name.'#'.$row->rate.'#'.$row->hsn.'#'.$row->gst;

				$sub_array[] = "<a class='qty_add' href='#modal-form' data-target='#modal-form' data-id ='".$dataString."'
				 role='button' class='blue' data-toggle='modal'> Add to invoice #".print_r($this->session->userdata('inv_no'))."</a>";	
			 } 

                  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->crud_model->get_all_data(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  

	

	public function add()
	{

		$this->load->model('General_Model');
		if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();
  		//_print_r($postData);exit;

  		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[products.name]');
  		$this->form_validation->set_rules('hsn', 'HSN', 'trim|required');
  		$this->form_validation->set_rules('gst', 'GST', 'trim|required');
  		$this->form_validation->set_rules('rate', 'Rate', 'trim|required');
  			

  		if ($this->form_validation->run() != FALSE)
  		{ 		

  			$id = $this->General_Model->insertDataByTable('products',$postData);
			redirect('products');

  	}else{
  		//<?php echo set_value('postal_code');
  		_getAdminLoadView('add_product',$postData);

  	}
  }

			_getAdminLoadView('add_product');
	}

	public function ajaxSearch($val=null){

		//echo $val;exit();
		$sess = 0;
		$val = urldecode($val);
		$data = array();
		//echo json_encode($val);
		if($val != ''){
			$this->load->model('Products_Model');
			$data = $this->Products_Model->ajaxSearch(urldecode($val));
			//_print_r($data);exit();			
		}
		if($this->session->userdata('inv_no')){
			$sess = $this->session->userdata('inv_no');
	}

		$resultArr = array();
		$resultArr['dataArr'] = $data;
		$resultArr['sess'] = $sess;
		echo json_encode($resultArr);
		//_getAdminLoadView('products2',$data);

	}

	public function get_price(){

		$this->load->model('Products_Model');
		$this->load->model('General_Model');
/* 		Array
(
    [0] => 214
    [1] => Ashok Kashmiri Mirch Powder 100 Gm
    [2] => 561
    [3] => 0904
    [4] => 5
    [5] => Pieces
)
*/
		$ajaxData = $this->input->post('info');
		//_print_r($ajaxData);exit();
		$pro_id = $ajaxData[0];
		$txt = ' ';
		$last_data =  $this->Products_Model->getLastRate($pro_id);
		$pro_history = $this->General_Model->getDataByCond('product_rate_history',array('product_id' => $pro_id));
		 if(count($pro_history)>0){
			foreach ($pro_history as $key => $value) {
		 		$txt .= $value['rate'].', ';	
		 	}
		 }
		$ajaxData[8] = $txt;
		if(count($last_data)>0){	

			$ajaxData[2] = $last_data['price'];
			$ajaxData[7] = $last_data['discount'];
			$ajaxData[6] = $last_data['qty'];

		}else{

			$ajaxData[6] = '1'; // quantity
			$ajaxData[7] = '0'; // discount
		}

		//_print_r($last_data);exit();

		echo json_encode($ajaxData);

			}



	public function show()
	{
		$this->load->model('Products_Model');
		$data['prod_data'] = $this->Products_Model->getAllProducts();
		//$this->output->cache(1);
			//$this->load->view('header');
		_getAdminLoadView('products',$data);

	}

		public function delete($id=null)
	{

		
		$this->load->model('General_Model');

		$this->General_Model->updateData('products',$id,array('active'=>'0'));
		//$this->Products_Model->softDelete($id);
		redirect('products');

	}


	public function editAjax($p_data,$pro_id){

		$this->load->model('General_Model');
		//$data['resultArr'] = $this->General_Model->getDataByid('products',$pro_id);

		//_print_r($p_data); echo $pro_id;exit();
		$postData = explode('_',stripslashes(urldecode($p_data)));
		$updateData = array('name' => $this->input->post('product_name'),
							'rate' => $postData[1],
							'hsn' => $postData[2],
							'gst' => $postData[3],
							'unit' => $postData[4]);
  		
  		$id = $this->General_Model->updateData('products',$pro_id,$updateData);
  		$id2 = $this->General_Model->insertDataByTable('product_rate_history',array('product_id' => $pro_id, 'invoice_id' => null, 'rate'=>$postData[1]));
  		echo json_encode($updateData);
	

	}

	public function history($pro_id,$cust_id=null){

		$this->load->model('Invoice_Model');
		$data['pro_data'] = $pro_data = $this->Invoice_Model->productRateHistory($pro_id);

		//_print_r($pro_data);exit();

		_getAdminLoadView('product_history',$data);

		

	}



	public function edit($pro_id){

		$this->load->model('General_Model');
		$data['resultArr'] = $this->General_Model->getDataByid('products',$pro_id);
		//_print_r($resultArr);exit();
			if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();
  		//_print_r($postData);exit;
  		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('name', 'Name', 'trim|required');
  		$this->form_validation->set_rules('hsn', 'HSN', 'trim|required');
  		$this->form_validation->set_rules('gst', 'GST', 'trim|required');
  		$this->form_validation->set_rules('rate', 'Rate', 'trim|required');
  			

  		if ($this->form_validation->run() != FALSE)
  		{  		

  			$id = $this->General_Model->updateData('products',$pro_id,$postData);
  			$id2 = $this->General_Model->insertDataByTable('product_rate_history',array('product_id' => $pro_id, 'invoice_id' => null, 'rate'=>$postData['rate']));
  		
  	
			redirect('products');
  	}
  }
		_getAdminLoadView('edit_product',$data);

	}

	public function getProductDetails($id){

		$this->load->model('General_Model');
		$inv_data = $this->General_Model->getDataByid('products',$id);
		echo json_encode($inv_data);

	}

	public function add_to_invoice($p_data = null){

		$dataArr = explode('_',$p_data);
		$this->load->model('Products_Model');
		$this->load->model('General_Model');
		$inv_data = $this->General_Model->getDataByCond('invoice',array('id' => $this->session->userdata('inv_id')));
			$data = array(
        'product_id'      => $dataArr[0],
        'invoice_id'      => $inv_data[0]['id'],
        'qty'     => $dataArr[1],
        'price'   => $dataArr[2],
        'discount' => $dataArr[3]
        
);
		$insert_id = $this->Products_Model->insertDataByTable('invoice_items',$data);
		$this->Products_Model->updateData('products',$dataArr[0],['rate'=>$dataArr[2]]);
		$this->General_Model->insertDataByTable('product_rate_history',array('product_id' => $dataArr[0], 'invoice_id' => $inv_data[0]['id'], 'rate'=>$dataArr[2]));
  		

		$this->load->library('invoice');
		$inv_total = $this->invoice->view_invoice($this->session->userdata('inv_id'));
		
		$resultArr = array('price' => $dataArr[2], 'id'=> $dataArr[0],'inv_total' => number_format($inv_total,2));
		
		echo json_encode($resultArr);	
		
	}


//insertDataByTable

}
