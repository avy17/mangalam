<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {


	     public function __construct()
     {
    //load parent class constructor
      parent::__construct();
      $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
      $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
      $this->output->set_header('Pragma: no-cache');
      $this->output->enable_profiler(FALSE);
      $this->load->model('Invoice_Model');
      $this->load->model('General_Model');
      $this->load->library('session');
    }

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
		//$this->load->library('invoice');
		//print_r($this->session->userdata('inv_no'));
		//redirect('products');
		$prod_data = $this->General_Model->getDataByCond('products',array('active' => '1'));
		$data['pro'] = count($prod_data);

		$zero_rate_data = $this->General_Model->getDataByCond('products',array('active' => '1','rate' => 0));
		$data['zero_rate'] = ((count($zero_rate_data)/$data['pro'])*100);

		$prod_data = $this->General_Model->getAllData('customer');
		$data['customer'] = count($prod_data);
		$year = date('Y');
		$date = $year.'-04-01';		
		$prod_data = $this->General_Model->getDataByCond('invoice',array('created_at >=' => $date ));
		//_print_r($prod_data);exit();
		$total=0;
		foreach ($prod_data as $key => $value) {
			$total+= $value['total'];			
		}
		$data['invoices'] = count($prod_data);
		$data['total'] = $total;
		
		
		_getAdminLoadView('dashboard',$data);


		//SELECT * FROM `invoice` as i left join invoice_items as
		// ii on i.`id` = ii.invoice_id left join customer as c on 
		//i.customer_id = c.id left join products as p on ii.product_id = p.id  
		//where ii.invoice_id is not null and i.id = 
	}



	public function edit_item_ajax($id=null,$price=0,$inv_id=0){

		
  		$this->General_Model->updateData('invoice_items',$id,array('price'=>$price));
  		$total = $this->view_invoice($inv_id,0,1,true);// to get invoice total
  		$iiid_data = $this->General_Model->getDataByid('invoice_items',$id);
  		$this->General_Model->updateData('products',$iiid_data['product_id'],array('rate'=>$price));
  		  		//_print_r($iiid_data);exit();
  		  		$eff_price = $iiid_data['qty']*$iiid_data['price'];
				$net = $eff_price*((100-($iiid_data['discount']))/100);

  		$this->General_Model->updateData('invoice',$inv_id,array('total'=>$total));
  		$resultArr = array('total'=>number_format($total,2),'net'=>number_format($net,2));
  		
  		echo json_encode($resultArr);	
  		
	}

	public function edit_item($id=null,$ajax=false){

		$resultArr = $this->General_Model->getDataByCond('invoice_items',array('id' => $id));
		$data['allProds'] = $this->General_Model->getAllDataOrderBy('products','name');

		

		$data['prod_data'] = $resultArr[0];

		//_print_r($data['prod_data']);exit();


				if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();

  		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('product_id', 'Product', 'trim|required');
  		$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
  		$this->form_validation->set_rules('qty', 'Quantity', 'trim|required|numeric');
  		$this->form_validation->set_rules('discount', 'Discount', 'trim|required|numeric');

  		if ($this->form_validation->run() != FALSE)
  		{
  			$this->General_Model->updateData('invoice_items',$id,$postData);
  			//$this->General_Model->updateData('products',$resultArr[0]['product_id'],array('rate' => $postData['price']));
  			if($ajax == 1){
  				echo json_encode($postData);
  				exit();
  			}
  			  			redirect('invoice/view_invoice_item/'.$resultArr[0]['invoice_id']);

		}		
  			
  		}
		_getAdminLoadView('edit_invoice_item',$data);

	}

	public function add_more_items($inv_id,$inv_no){

		$this->session->set_userdata('inv_no',$inv_no);
		$this->session->set_userdata('inv_id',$inv_id);
		redirect('products');
		



	}

	public function delete_item($id){

		$resultArr = $this->General_Model->getDataByCond('invoice_items',array('id' => $id));
		$data['prod_data'] = $resultArr[0];

		$this->General_Model->deleteDatabyTable($id,'invoice_items');

		redirect('invoice/view_invoice_item/'.$resultArr[0]['invoice_id']);


	}

		public function createExcel() {
		$fileName = 'employee.xlsx';  
		$prod_data =  $this->Invoice_Model->getInvoiceData(17);
		$spreadsheet = $this->load->library('phpexcelreader');	
		$sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Skills');
        $sheet->setCellValue('D1', 'Address');
	$sheet->setCellValue('E1', 'Age');
        $sheet->setCellValue('F1', 'Designation');       
        $rows = 2;
     //    foreach ($employeeData as $val){
     //        $sheet->setCellValue('A' . $rows, $val['id']);
     //        $sheet->setCellValue('B' . $rows, $val['name']);
     //        $sheet->setCellValue('C' . $rows, $val['skills']);
     //        $sheet->setCellValue('D' . $rows, $val['address']);
	    // $sheet->setCellValue('E' . $rows, $val['age']);
     //        $sheet->setCellValue('F' . $rows, $val['designation']);
     //        $rows++;
     //    } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		//header("Content-Type: application/vnd.ms-excel");
        //redirect(base_url()."/upload/".$fileName);              
    } 


	public function view_invoice_item($inv_id=null,$item_id=null){

		if($inv_id > 0){

			$prod_data =  $this->Invoice_Model->getInvoiceData2($inv_id);
			$gst_data =  $this->Invoice_Model->getGstData($inv_id);

			if(count($prod_data) == 0){

				echo "Please add some products";exit;

			}

			//_print_r($prod_data);exit();

			$gross_amt = 0;
			for ($i=0; $i < count($prod_data); $i++) {

				$eff_price = $prod_data[$i]['qty']*$prod_data[$i]['price'];
				$prod_data[$i]['final_price'] = $eff_price*((100-($prod_data[$i]['discount']))/100);

				$gross_amt+= $prod_data[$i]['final_price'];
			
			}
						//_print_r($gst_data);exit;
			//_print_r($prod_data);exit;
			$data['inv_total'] = $this->view_invoice($inv_id,0,1,true);
			$data['inv_id'] = $inv_id;
			$data['prod_data'] = $prod_data;
			$data['gst_data'] = $gst_data;
			$data['gross_amt'] = $gross_amt;

			$data['amount_in_words'] = convert_number_to_words(1600000);

			_getAdminLoadView('edit_invoice',$data);
		}
		else{
			print_r('No invoice created');exit;
		}



	}



public function view_invoice($inv_id = null,$p=0,$version=1,$getTotal = false){

		if($inv_id > 0){

			$prod_data =  $this->Invoice_Model->getInvoiceData($inv_id);
			$gst_data =  $this->Invoice_Model->getGstData($inv_id);
			$data['inv_id'] = $inv_id;

			if(count($prod_data) == 0){

				echo "Please add some products";exit;

			}

			$gross_amt = $gross_tax = 0;
			for ($i=0; $i < count($prod_data); $i++) {

				$eff_price = $prod_data[$i]['qty']*$prod_data[$i]['price'];
				$prod_data[$i]['final_price'] = $eff_price*((100-($prod_data[$i]['discount']))/100);

				$gross_amt+= $prod_data[$i]['final_price'];
			
			}

			for ($i=0; $i < count($gst_data); $i++) {


				$gst_data[$i]['cgst'] = floatval(($gst_data[$i]['gst']/2));
				$gst_data[$i]['sgst'] = floatval(($gst_data[$i]['gst']/2));   

				$gst_data[$i]['cgst_amt'] = ($gst_data[$i]['rate']*$gst_data[$i]['cgst']/100);
				$gst_data[$i]['sgst_amt'] = ($gst_data[$i]['rate']*$gst_data[$i]['sgst']/100);
				$gst_data[$i]['net_tax'] =  ($gst_data[$i]['cgst_amt'] + $gst_data[$i]['sgst_amt']);
				$gross_tax+= $gst_data[$i]['net_tax'];
			
			}
			 $t = $gross_amt+$gross_tax;

			 $final = round($t,0);

			 $round = number_format(($t-$final),2);

			 if($round < 0.50){
			 	$round = '- '.$round;
			 }else{
			 	$round = '+ '.(100-$round);
			 }

			 if($getTotal == true){
			 	return $final;
			 }
			 
			$data['prod_data'] = $prod_data;
			$data['gst_data'] = $gst_data;
			$data['gross_amt'] = $gross_amt;
			$data['gross_tax'] = $gross_tax;
			$data['final'] = $final;
			$data['round'] = $round;
			$data['v'] = "Original for buyer";

			$data['amount_in_words'] = convert_number_to_words($final).' only';

			$prod_data =  $this->Invoice_Model->updateData($inv_id,array('total' => $final));

			$this->config->set_item('item_name', 'item_value');			

			$html = $this->load->view('invoice_details',$data,true);

			echo $html; 

		}
		else{
			print_r('No invoice created');exit;
		}

	}






	

	public function amt_to_words($amt){

		$w = convert_number_to_words(ceil($amt));


		print_r($w);exit();



		

	}

	public function pdf(){
		$this->load->library('pdf');
        $html = $this->load->view('invoice_details', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
	}

	public function delete_invoice($inv_id){

		//echo $inv_id;exit();

		if($this->session->userdata('inv_id') == $inv_id){
			$this->session->unset_userdata('inv_id');
		}

		$resp = $this->General_Model->deleteDatabyTableAndCondition(array('invoice_id' => $inv_id),'invoice_items');
		if($resp){
			$this->General_Model->deleteDatabyTable($inv_id,'invoice');	
		}
		
		redirect('invoice/all_invoices');


	}

	public function all_invoices(){

		$data['prod_data'] = $this->Invoice_Model->getAllInvoices();
		if($this->session->userdata('inv_id')){

		$data['pro_count'] = $this->Invoice_Model->getInvoiceTotalProducts($this->session->userdata('inv_id'));
	
		}else{
			$data['pro_count'] = 0;
		}
		_getAdminLoadView('invoice_list',$data);


	}

	public function create_invoice($customer_id = null){

		$data['customer_data'] = $this->General_Model->getAllDataOrderBy('customer','name');
		$inv_no = $this->Invoice_Model->getInvoiceNo();

		$data['last_invoice'] = $inv_no;

		if($this->session->userdata('inv_no') && $this->session->userdata('inv_id')){ 
			$this->session->unset_userdata('inv_no');
			$this->session->unset_userdata('inv_id');
			$this->session->unset_userdata('inv_total');
		}

		if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();

  		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('invoice_no', 'Invoice No.', 'trim|required|numeric|callback__valid_invoice_number');
  		//|is_unique[invoice.invoice_no]
  		$this->form_validation->set_rules('customer', 'Customer', 'trim|required');
  		$this->form_validation->set_rules('date', 'Date', 'trim|required');
  		//$this->form_validation->set_rules('description', 'Description', 'trim|required');

  		// if(@$_FILES['image']['name'] == ''){
  		// 	$this->form_validation->set_rules('image', 'Image', 'trim|required');
  		// }

  		//$this->form_validation->set_rules('status', 'Status', 'trim|required');	

  		if ($this->form_validation->run() != FALSE)
  		{
  			//$this->form_validation->set_rules('image', 'Image', 'trim|callback_is_valid_featureimage');

  			//_print_r($postData['invoice_no']);exit();

  			$date = date('Y-m-d',strtotime($postData['date']));

  			$last_id = $this->General_Model->insertDataByTable('invoice',array('invoice_no' => $postData['invoice_no'],'customer_id' => $postData['customer'], 'date' => $date  ));

  			if($this->session->userdata('inv_no') && $this->session->userdata('inv_id')){ 
			$this->session->unset_userdata('inv_no');
			$this->session->unset_userdata('inv_id');
		}

  		
		$this->session->set_userdata('inv_no',$postData['invoice_no']);
		
		//$inv_data = $this->General_Model->getDataByCond('invoice',array('invoice_no' => $this->session->userdata('inv_no')));

		$this->session->set_userdata('inv_id',$last_id);



  			redirect('products');

  			
  				
  			
  		}else{
  			$data['last_invoice'] = $this->input->post('invoice_no');
  		}
  	}

  				_getAdminLoadView('new_invoice',$data);
		

	
		
		// _getAdminLoadView('new_invoice',$data);


		// }
		// else{
		// 	print_r('Something went wrong');
		// }


	}

	public function change_party($inv_id){


		$inv_data = $this->General_Model->getDataByCond('invoice',array('id' => $inv_id ));

		$data['customer_data'] = $this->General_Model->getAllData('customer');

		$data['inv_data'] = $inv_data[0]; 

				if ($this->input->server('REQUEST_METHOD') === "POST") {
  		$postData = $this->input->post();

  		$this->form_validation->set_error_delimiters('<div class="danger">', '</div>');
  		$this->form_validation->set_rules('invoice_no', 'Invoice No.', 'trim|required|numeric');
  		//|is_unique[invoice.invoice_no]
  		$this->form_validation->set_rules('customer', 'Customer', 'trim|required');
  		$this->form_validation->set_rules('date', 'Date', 'trim|required');
  	

  		if ($this->form_validation->run() != FALSE)
  		{
  			//$this->form_validation->set_rules('image', 'Image', 'trim|callback_is_valid_featureimage');

  			//_print_r($postData['invoice_no']);exit();

  			$date = date('Y-m-d',strtotime($postData['date']));

  			$this->General_Model->updateData('invoice',$inv_id,array('customer_id' => $postData['customer'], 'date' => $date, 'created_at' => date('Y-m-d H:i:s') ));

  		
	  redirect('invoice/view_invoice/'.$inv_id); 			
  				
  			
  		}
  	}
		_getAdminLoadView('change_party',$data);











		

	}

	public function _valid_invoice_number(){

		$postData = $this->input->post();
		$no = $postData['invoice_no'];

		$inv_data = $this->General_Model->getDataByCond('invoice',['invoice_no' => $no,'date >= ' => date('Y-04-01')]);
		//_print_r($inv_data);exit();
		if(count($inv_data) >0){
			$this->form_validation->set_message('_valid_invoice_number', 'Invoice #'.$no.' already created this year!');
        return FALSE;
		}else{
			return true;
		}

	}

	




}
