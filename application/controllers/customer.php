<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
		$this->show();
		//$this->load->view('customer_list');
	}

	public function pdftest(){
		$html = '<html>
				<head></head>
				<body>
					<h1>HELLO WORLD!</h1>
				</body>
				</html>
				';
		
		$pdf_filename  = 'report.pdf';
		$this->load->library('dompdf_lib');
		$this->dompdf_lib->convert_html_to_pdf($html, $pdf_filename, true);
	}

		public function editAjax(){


		$this->load->model('General_Model');

		//$data['resultArr'] = $this->General_Model->getDataByid('products',$pro_id);

		_print_r($this->input->post());exit();


		/* address: "Lalbagh Crossing, Lalbagh Lucknow"
city: "Lucknow*"
contact: ""
email: ""
gst_no: "09AACCM4306J1ZI"
id: "3"
name: "Novelty Cinema (A Unit of Motor & General Sales Ltd)"
pan: "AACCM4306J"
pincode: "226001"
state: "Uttar Pradesh"
		*/
		$updateData = array('name' => $postData[0],
							'rate' => $postData[1],
							'hsn' => $postData[2],
							'gst' => $postData[3],
							'unit' => $postData[4]);


  		
  		$id = $this->General_Model->updateData('products',$pro_id,$updateData);

  		

  		echo json_encode($updateData);
		

	}


	public function show()
	{
		$this->load->model('Invoice_Model');
		$year = date('Y');
		$dt = $year.'-04-01';
		$data['prod_data'] = $this->Invoice_Model->getSundryDebtors();
		//_print_r($data['prod_data']);exit();
		$data['dt'] = date('d-M-Y',strtotime($dt));
		_getAdminLoadView('customer_list',$data);

	}

	public function getCustomerDetails($id){

		$this->load->model('Invoice_Model');
		$data['inv_data'] = $this->Invoice_Model->getAllInvoicesOfCustomer($id);
		//_print_r($data['inv_data']);exit();
		_getAdminLoadView('invoice_of_customer',$data);

	}



public function delete_item($id){

	$this->load->model('General_Model');

		$resultArr = $this->General_Model->getDataByCond('customer',array('id' => $id));
		$data['prod_data'] = $resultArr[0];


		//_print_r($data['prod_data']);exit();
		$this->General_Model->deleteDatabyTable($data['prod_data']['id'],'customer');

		redirect('customer');


	}

	public function add_normal(){

		$this->load->model('General_Model');
		if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();
  		//_print_r($postData);exit;

  		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('name', 'Name', 'trim|required');
  		$this->form_validation->set_rules('address', 'Address', 'trim|required');
  		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
  		$this->form_validation->set_rules('contact', 'Contact No.', 'trim');

  		$this->form_validation->set_rules('city', 'City', 'trim|required');
  		$this->form_validation->set_rules('state', 'State', 'trim|required');
  		$this->form_validation->set_rules('gst_no', 'GST', 'trim');
  			

  		if ($this->form_validation->run() != FALSE)
  		{
  		

  			$id = $this->General_Model->insertDataByTable('customer',$postData);
		

		redirect('customer');




  	}
  }

		_getAdminLoadView('add_customer');


	}



	public function add($inv_no=null, $date = null ){

		$this->load->model('General_Model');
		if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();
  		//_print_r($postData);exit;

  		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('name', 'Name', 'trim|required');
  		$this->form_validation->set_rules('address', 'Address', 'trim|required');
  		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');

  		$this->form_validation->set_rules('city', 'City', 'trim|required');
  		$this->form_validation->set_rules('state', 'State', 'trim|required');
  		$this->form_validation->set_rules('gst_no', 'GST', 'trim');
  			

  		if ($this->form_validation->run() != FALSE)
  		{
  		

  			$id = $this->General_Model->insertDataByTable('customer',$postData);
  			$date = date('Y-m-d',strtotime($date));
  			$this->General_Model->insertDataByTable('invoice',array('invoice_no' => $inv_no,'customer_id' => $id , 'date' => $date ));
  			if($this->session->userdata('inv_no') && $this->session->userdata('inv_id')){ 
			$this->session->unset_userdata('inv_no');
			$this->session->unset_userdata('inv_id');
		}

  		
		$this->session->set_userdata('inv_no',$inv_no);

		$inv_data = $this->General_Model->getDataByCond('invoice',array('invoice_no' => $this->session->userdata('inv_no')));

		$this->session->set_userdata('inv_id',$inv_data[0]['id']);

		redirect('products');




  	}
  }

		_getAdminLoadView('add_customer');


	}



	public function edit($pro_id){


		$this->load->model('General_Model');

		$data['resultArr'] = $this->General_Model->getDataByid('customer',$pro_id);

		//_print_r($resultArr);exit();


			if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();
  		//_print_r($postData);exit;

		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('name', 'Name', 'trim|required');
  		$this->form_validation->set_rules('address', 'Address', 'trim|required');
  		$this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');

  		$this->form_validation->set_rules('city', 'City', 'trim|required');
  		$this->form_validation->set_rules('state', 'State', 'trim|required');
  		$this->form_validation->set_rules('gst_no', 'GST', 'trim');
  		  			

  		if ($this->form_validation->run() != FALSE)
  		{
  		

  			$id = $this->General_Model->updateData('customer',$pro_id,$postData);			
  	
			redirect('customer');
  	}
  }



		_getAdminLoadView('edit_customer',$data);


	}

		public function delete($id=null)
	{
		$this->load->model('Products_Model');
		$this->Products_Model->deleteData($id);
		redirect('products');

	}

	public function add_to_invoice($p_data = null){

		//echo 1;exit;

		//$p_data = $this->input->post('datastr');
		error_reporting(1);

		$dataArr = explode('_',$p_data);

		$this->load->model('Products_Model');

				$data = array(
        'product_id'      => $dataArr[0],
        'invoice_id'      => $this->session->userdata('inv_no'),
        'qty'     => $dataArr[1],
        'price'   => $dataArr[2]
        
        
);


		$insert_id = $this->Products_Model->insertDataByTable('invoice_items',$data);


		print_r($insert_id);

		

		
	}




}
