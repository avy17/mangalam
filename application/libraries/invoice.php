<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class invoice {
    
    function view_invoice($inv_id=0)
    {

      
        $CI = & get_instance();
        $CI->load->model('Invoice_Model');
      $CI->load->model('General_Model');

        if($inv_id > 0){

            $prod_data =  $CI->Invoice_Model->getInvoiceData($inv_id);
            $gst_data =  $CI->Invoice_Model->getGstData($inv_id);
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

             
                return $final;
             
         }

    }

    
    function load($param=NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';          		
        }
        return new mPDF();
    }
}