<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_Model extends CI_Model {
  
  var $table = 'invoice';
  var $table2 = 'invoice_items';
  
  /*
   * @description :  This function called automatically when we call this call function or use any class variable 
   * @Method name: __construct
   */
  public function __construct(){
    parent :: __construct();
  }
  
  public function getInvoiceNo(){

    $current_year = date('Y-04-01');


   $inv_no = $this->db->select_max('invoice_no')->where('date >= ',$current_year)->get($this->table)->row();

   //$inv_n = $this->db->where('date >= ',$current_year)->get($this->table);
   //_print_r($inv_n->result_array());
   //exit();
   //echo $this->db->last_query();exit;
   $max_id = $inv_no->invoice_no;
   return ($max_id+1);

  }


  public function getInvoiceTotalProducts($no){

      $data = $this->getInvoiceData($no);
      return count($data);
  }

  public function getInvoiceData($no){

   $data = $this->db->query("
    SELECT *,c.name as customer_name,p.name as product_name FROM `invoice` as i left join invoice_items as
     ii on i.`id` = ii.invoice_id left join customer as c on 
    i.customer_id = c.id left join products as p on ii.product_id = p.id  
    where ii.invoice_id is not null and i.id =".$no);


   /*SELECT sum(p.rate) as rate,p.gst as gst FROM `invoice` as i left join invoice_items as
     ii on i.`id` = ii.invoice_id left join customer as c on 
    i.customer_id = c.id left join products as p on ii.product_id = p.id  
    where ii.invoice_id is not null and i.id = 20 group by p.gst
    */

   return ($data->result_array());


  }

   public function getInvoiceData2($no){

   $data = $this->db->query("
    SELECT *,ii.id as iid,c.name as customer_name,p.name as product_name FROM `invoice` as i left join invoice_items as
     ii on i.`id` = ii.invoice_id left join customer as c on 
    i.customer_id = c.id left join products as p on ii.product_id = p.id  
    where ii.invoice_id is not null and i.id =".$no);


   /*SELECT sum(p.rate) as rate,p.gst as gst FROM `invoice` as i left join invoice_items as
     ii on i.`id` = ii.invoice_id left join customer as c on 
    i.customer_id = c.id left join products as p on ii.product_id = p.id  
    where ii.invoice_id is not null and i.id = 20 group by p.gst
    */

   return ($data->result_array());


  }

  /* SELECT * FROM `invoice` left join customer on customer.id = invoice.customer_id WHERE 1
  */

    public function updateData($id,$dataArr){
    $this->db->where('id',$id)->update($this->table,$dataArr);
    return 1;
  }


  public function getAllInvoices(){


       $data = $this->db->query("SELECT *,count(ii.product_id) as nop,sum(price*qty*((100-discount)/100)*gst/100) as gst_value,invoice.id as inv_id FROM `invoice` left join customer on customer.id = invoice.customer_id left join invoice_items as ii on ii.invoice_id = invoice.id left join products AS p on p.id=ii.product_id WHERE invoice.date >= '2020-04-01'  group by invoice.id order by invoice.invoice_no DESC");


   /*SELECT sum(p.rate) as rate,p.gst as gst FROM `invoice` as i left join invoice_items as
     ii on i.`id` = ii.invoice_id left join customer as c on 
    i.customer_id = c.id left join products as p on ii.product_id = p.id  
    where ii.invoice_id is not null and i.id = 20 group by p.gst
    */

   return ($data->result_array());

  }

    public function getGstData($no){

   $data = $this->db->query("

  SELECT sum(ii.price*ii.qty*(1-(ii.discount/100))) as rate,p.gst as gst FROM `invoice` as i left join invoice_items as
     ii on i.`id` = ii.invoice_id left join customer as c on 
    i.customer_id = c.id left join products as p on ii.product_id = p.id  
    where ii.invoice_id is not null and i.id = ".$no." group by p.gst");

   /*SELECT sum(p.rate) as rate,p.gst as gst FROM `invoice` as i left join invoice_items as
     ii on i.`id` = ii.invoice_id left join customer as c on 
    i.customer_id = c.id left join products as p on ii.product_id = p.id  
    where ii.invoice_id is not null and i.id = 20 group by p.gst
    */
   return ($data->result_array());

  }



  
 

  public function getAllProducts()
  {
    $query = $this->db->get($this->table);
    return $query->result_array();
  }

  public function deleteData($id)
  {
    $query = $this->db->where('id',$id)->delete($this->table);
    return 1;
  }

  function insertDataByTable($table, $dataArray){
    $this->db->insert($table, $dataArray);
    return  $this->db->insert_id();
  }


  



  public function uniqueUser($email)
  {
    $this->db->where('email', $email);    
    $query = $this->db->get('user');
    
    if($query->num_rows() > 0)
      return false;
    else
      return true;
  }

  public function uniqueUserMobile($mobile_no, $id='')
  {
    if($id) {
      $this->db->where('id_user !=', $id);      
    }
    $this->db->where('mobile_no', $mobile_no);    
    $query = $this->db->get('user');
    
    if($query->num_rows() > 0)
      return false;
    else
      return true;
  }
  //*****************************************************11/july2016********************************************************
  public function verify_coupon_code($data)
  {

    $this->db->where('membership_coupon_code', $data);      
    $query = $this->db->get('membership_coupon');
    if($query->num_rows() > 0)
      return false; // code already exists
    else
      return true;
  }
  public function get_reservation_data()
  {
    $query = $this->db->get('manage');
    return $query->result_array();
  }
  public function get_public_holiday_data()
  {

    $sql = "SELECT GROUP_CONCAT(public_holiday_date) as holidays FROM y_public_holiday ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function get_public_holiday_eve_data()
  {

    $sql = "SELECT GROUP_CONCAT(DATE_SUB(public_holiday_date,INTERVAL 1 DAY)) as holidays FROM y_public_holiday";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  
  public function get_booking_data($yachtId)
  {
    $query = $this->db->get_where('booking',array('yacht_id'=>$yachtId));
    return $query->result_array();
  }

  public function get_booking_data_bydate($date,$yachtId)
  {
    $this->db->select(array('check_in','check_out'));
    $this->db->like('DATE(check_in)',$date,'both');    
    $this->db->not_like('comment','Book for cleaning','both');    
    $this->db->order_by("check_in","ASC");
    $query=$this->db->get_where("booking",array('yacht_id'=> $yachtId));

    $result_checkin = $query->result_array();
   
      return $result_checkin;
    
  }
  public function get_booking_data_bydateAndId($date,$id,$yachtId)
  {
    
     $this->db->select(array('check_in','check_out'));
    $this->db->like('DATE(check_in)',$date,'both');
    $this->db->like('DATE(check_in)',$date,'both');
    $this->db->not_like('comment','Book for cleaning','both');
     $this->db->where('id_booking !=',$id);
    $this->db->order_by("check_in","ASC");
    $query=$this->db->get_where("booking",array('yacht_id'=> $yachtId));   
    $result_checkin = $query->result_array();
    if(count($result_checkin))
    {
      return $result_checkin;
    }
    else
    {
      return array();
    }
  }


  public function get_all_booking_data_bydate($date)
  {
    $this->db->select(array('id_booking','check_in','check_out','added_date','comment','yacht_id','name'));
    $this->db->from('booking');
    $this->db->join('yacht','booking.yacht_id = yacht.id');
    $this->db->like('DATE(check_in)',$date,'both');    
    $this->db->not_like('comment','Book for cleaning','both');
    $query = $this->db->get();   
    $result_checkin = $query->result_array();    
    if(count($result_checkin))
    {

      return $result_checkin;
    }
    else
    {
      return array();
    }
    

  }

/*Multiple Yacht*/
public function getAllYacht($status){

  if($status == ''){
   $query =  $this->db->get('yacht');
  }else{
    $query =  $this->db->get_where('yacht',array('status'=>$status));
  }
 
 return $query->result_array();

}

/**/
}

