<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
          include('system/helpers/file_helper.php');

function _nocache(){
          
          $CI = & get_instance();
          $CI->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
          $CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
          $CI->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
          $CI->output->set_header('Pragma: no-cache');
}
    
/*
 * @description :  This function is develop  to print array with pre tag
 * @Method name: _print_r
 */

function date_converter($dt=null) {
          
          return date('d-M-Y',strtotime($dt));
}

function financial_yr_start(){

  $yr = date('Y');

  $today = date('Y-m-d');
  $fin_start_date = $yr.'-04-01';
  $first_day = $yr.'-01-01';

  if(strtotime($today) <= strtotime($fin_start_date) && strtotime($today) >= strtotime($first_day) ){
    $fin_start_date = ($yr-1).'-04-01';
  }


  return $fin_start_date;
}

function _print_r($array) {
          echo '<pre>';
          print_r($array);
          echo '</pre>';
}

/*
 * @description :  This function is develop  to load admin view page with header footer
 * @Method name: _getAdminLoadView
 */
    
function _getAdminLoadView($template_name, $data = array()) {
        
          $CI = & get_instance();
          $CI->load->view('header', $data);
          $CI->load->view($template_name, $data);
          $CI->load->view('footer',$data);
}

/*
 * @description :  This function is develop  to load admin view page with header footer
 * @Method name: _getAdminLoadView
 */


function convert_number_to_words($number) {


   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  $final= $result . "Rupees  ";

  return ucfirst($final);


}
    
function format_created_on($date) {
          
          if($date == ''){
	        return 'N/A';
          }
          elseif($date == '0000-00-00 00:00:00'){
	        return 'N/A';
          }
          
          $date = date_create($date);
          return date_format($date,"M d, Y g:i A");
}

/*
| -------------------------------------------------------------------
|  Funtion Helper files
| -------------------------------------------------------------------
| Method Name: _adminEmail_send
| Parameter: to, message, subject
|
| NOTE: This funtion is used to send email to any user from admin 
|
*/
function _adminEmail_send($to,$message,$subject){
  $CI =&  get_instance(); 
  $email_config = Array(
    'protocol' => 'smtp',
    'smtp_host' => $CI->configuration->__get('smtp_host'),
    'smtp_port' => $CI->configuration->__get('smtp_port'),
    'smtp_user' => $CI->configuration->__get('smtp_email'),
    'smtp_pass' => $CI->configuration->__get('smtp_password'),
    'mailtype' => 'html',
    'starttls' => true,
    'newline' => "\r\n"
  );

  $CI->load->library('email', $email_config);
  
  $CI->email->from($CI->configuration->__get('smtp_email'), $CI->configuration->__get('site_title'));
  $CI->email->to($to);
  $CI->email->subject($subject);
  $CI->email->message($message);
  $true = $CI->email->send();

  if($true){
	 return TRUE;
  }
  else{
	  return FALSE;	
  }
}

if(!function_exists('timThumbUrl')) :
  function timThumbUrl($path, $width=50, $height=50, $quality=100) {
    if (!is_dir('./uploads/thumbnail/')) {
     mkdir('./uploads/thumbnail/', 0777, TRUE);
    }
    return base_url('thumbnail/'.$width.'x'.$height.'-'.$quality.'/'.ltrim($path, './'));
  }
endif;

/*
 * @description :  This function is develop  to load admin view page with header footer
 * @Method name: _getFrontLoadView
 */
    
function _getFrontLoadView($template_name, $data = array()) {
        
          $CI = & get_instance();
          $CI->load->view('comman/header', $data);
          $CI->load->view($template_name, $data);
          $CI->load->view('comman/footer', $data);
}

function _getRequiredString($text, $length)
{
    if(strlen($text)<$length+10)
    {
      $descirpitonPart = $text;
    }
    else
    {
      $break_pos = strpos($text, ' ', $length);
      $descirpitonPart = substr($text, 0, $break_pos);
    }
    return $descirpitonPart;
}
function time_diff($h1,$m1,$h2,$m2)
  {
    if($h2>$h1)
    {
      $diff_time = (($h2*60)+$m2)-(($h1*60)+$m1);
      $diff_minutes = abs($diff_time % 60);
      $diff_hours = abs(intval($diff_time/60));
      $return_diff = $diff_hours.":".$diff_minutes;
    }
    else
    {
      $h2 = 24+$h2;
      $diff_time = (($h2*60)+$m2)-(($h1*60)+$m1);
      $diff_minutes = abs($diff_time % 60);
      $diff_hours = abs(intval($diff_time/60));
      $return_diff = $diff_hours.":".$diff_minutes;

    }
    return  $return_diff;
  }
  function time_diff_minutes($h1,$m1,$h2,$m2)
  {
    if($h2>$h1)
    {
      $diff_time = (($h2*60)+$m2)-(($h1*60)+$m1);
      $diff_minutes = abs($diff_time % 60);
      $diff_hours = abs(intval($diff_time/60));
      $return_diff = $diff_hours.":".$diff_minutes;
    }
    else
    {
      //$h2 = 24+$h2;
      $diff_time = (($h1*60)+$m2)-(($h2*60)+$m1);
      $diff_minutes = abs($diff_time % 60);
      $diff_hours = abs(intval($diff_time/60));
      $return_diff = $diff_hours.":".$diff_minutes;

    }
    return  $diff_time;
  }
  function sortArray($array)
{
 $newAr = array();
 foreach ($array as $value) 
 {
   $keyArr = @explode(':', $value);
   $key = $keyArr[0]*60+$keyArr[1];
   $newAr[$key] = $value;
 }
 ksort($newAr);
 return $newAr; 
}
function create_slot($start,$end)
{  
  $slot = array($start);
  $elements = date('G:i',strtotime($start));
  
  while(strtotime($elements)<=strtotime($end))
  {
    array_push($slot, $elements);
    $elements = date('G:i',strtotime($elements.'+ 30 minutes'));
  }
  return array_unique($slot);
}
?>