<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_Model extends CI_Model {
  
  //var $table = 'products';
  
  /*
   * @description :  This function called automatically when we call this call function or use any class variable 
   * @Method name: __construct
   */
  public function __construct(){
    parent :: __construct();
  }

  public function updateData($table,$id,$dataArr){
    //echo $id;print_r($dataArr);exit;
    $this->db->where('id',$id)->update($table,$dataArr);
    return 1;
  } 

  public function getAllData($table=null)
  {
    //print_r($this->db->query('SHOW TABLES'));

    $query = $this->db->get($table);
    return $query->result_array();
  }

   public function getAllDataOrderBy($table=null,$col=null)
  {
    $query = $this->db->from($table)->order_by($col,'ASC')->get();
    return $query->result_array();
  }

  public function deleteData($id)
  {
    $query = $this->db->where('id',$id)->delete($this->table);
    return 1;
  }

  public function deleteDatabyTable($id,$table)
  {
    $query = $this->db->where('id',$id)->delete($table);
    return 1;
  }

  public function deleteDatabyTableAndCondition($condArr,$table)
  {
    $query = $this->db->where($condArr)->delete($table);
    return 1;
  }

  function insertDataByTable($table, $dataArray){
    $this->db->insert($table, $dataArray);
    return  $this->db->insert_id();
  }

    public function getDataByCond($table,$condArr=array())
  {
    $query = $this->db->get_where($table,$condArr);
    return $query->result_array();
  }

  public function getDataByid($table,$id)
  {
    $query = $this->db->get_where($table,array('id'=>$id));
    return $query->row_array();
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

