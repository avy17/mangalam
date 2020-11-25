<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/fonts.googleapis.com.css" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/ace-rtl.min.css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/chosen.min.css" />

<style type="text/css">
   
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 2px;
    line-height: 1.42857143;
    width: auto;
}

.table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 0px solid black;
}


body {
    background-color: #E4E6E9;
    padding-bottom: 0;
    padding-left: 2px;
     padding-right: 2px;
    font-family: 'Open Sans';
    font-size: 10px;
    color: #080000;
    border-style: solid;
}

#gst{

    padding-right: 0px;

}

.middle{
    text-align:center;
}

.right{
    text-align:right;
    padding-right: 0px;
}

.special{
    font-weight: bolder; font-size: 16px
}
#full-page{

}
@media screen {
  div.divFooter {
    display: none;
  }
}
@media print {
  div.divFooter {
    position: fixed;
    top: 1;
  }
}


</style>

<div id="full-page">


                                        <div class="">
                                            <table  id="simple-table" class="table table-striped table-bordered table-hover">
                                                <caption class="right"><?php echo 'Original / Duplicate copy'?></caption>
                                                 <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th style="text-align: right;">Invoice #<?php echo $prod_data[0]['invoice_no']; ?>
                                                        &nbsp
                                                           

                                                            Date: <?php echo date('d-M-Y',strtotime($prod_data[0]['date']))?>  

                                                        </th>
                                                        <th style="text-align: right;">Buyer</th>
                                                       

                                                    </tr>
                                                </thead>

                                                <tbody>
           
                                                    <tr>
                                                        <td  class="middle">

                                                        <img id="logo" width="80px" height="80px" style="text-align: center" src="<?php echo base_url('cosmatics/img/swastik1.jpg') ?>">   
                                                           
                                                        </td>
                                                       
                                                        <td  style="text-align: left; padding-left:5px;">

                                                            <span class="special" style="">MANGALAM ENTERPRISES</span> <br>
                                                            <i class="fa fa-home"> Flat No. 504 Block L1 Silverline Apartments <br> Opp. BBD University Chinhat Lucknow- 226028</i><br>
                                                            <strong>GST: </strong> 09AASHA2540R1ZO
                                                            <br>
                                                            <strong>Contact: </strong> 9118212373, 9721625799

                                                           
                                                        </td>

                                                        <td style="text-align: right;"><span class="special" ><?php echo $prod_data[0]['customer_name'] ?></span>
                                                            <br>
                                                            <?php echo $prod_data[0]['address'] ?>

                                                            <br>
                                                            <strong>GST: </strong> <?php echo $prod_data[0]['gst_no'] ?>

                                                            <br>
                                                            <?php echo $prod_data[0]['contact'] ?>

                                                            <br>
                                                            <?php echo $prod_data[0]['email'] ?>

                                                        </td>                                                      

                                                    </tr>
                                               

                                                </tbody>
                                                </table>
                                            </div>
                                   

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div class="content-box-invoice">
                                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
                                                            SNO.
                                                        </th>
                                                        <th>Product Name</th>
                                                        <th>HSN/SAC</th>
                                                        <th class="middle">GST(%)</th>
                                                        <th class="right">QTY</th>
                                                        <th class="right">Rate</th>
                                                        <th class="middle">per</th>
                                                        <th class="right">Disc.<br>(%)</th>
                                                        <th class="right">Amount</th>
                                                       

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $sno = 0;
                                                    foreach((array)$prod_data as $em){
                                                        $sno++;

                    ?>
                                                    <tr>
                                                        <td class="center">
                                                          
                                                                <?php echo $sno?>
                                                              
                                                        </td>

                                                        <td style="padding-left:2px;"><strong><?php echo $em['product_name']?></strong></td>
                                                        <td><?php echo $em['hsn']?></td>
                                                        <td class="middle"><?php echo $em['gst'].'%'?></td>
                                                        <td style="padding-left:2px;" class="right"><?php echo $em['qty']?></td>
                                                        <td class="right"><?php echo number_format($em['price'],2)?></td>
                                                        <td class="middle"><?php echo $em['unit']?></td>
                                                        <td class="right" style="padding-right:2px;"><?php echo $em['discount']?></td>
                                                       
                                                        <td style="text-align: right; padding-right:2px;"><strong><?php echo number_format($em['final_price'],2)?></strong></td>

                                                    </tr>

                                       
                                                   
                                                <?php } ?>

                                                </tbody>
                                                </table>
                                            </div>

                                       
                                      
                                  


                                    <div>
                                            <table caption="GST" id="" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center"></th>
                                                                                                                    </th>
                                                        <th style="text-align: center;">GST Rate(%)</th>
                                                        <th class="right">Amount</th>
                                                        <th class="middle">CGST</th>
                                                        <th class="middle">CGST<br>Amount</th>
                                                        <th class="middle">SGST</th>
                                                        <th class="right">SGST<br>Amount</th>
                                                        <th class="right">Net Tax</th>
                                                       

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $sno = 0;
                                                    foreach((array)$gst_data as $em){

                                                        //$sno++; (((($em['rate'])*$em['gst'])/100)/2)+(((($em['rate'])*$em['gst'])/100)/2)

                    ?>
                                                    <tr>
                                                        <td class="center" id="gst">
                                                            <label class="pos-rel">
                                                               
                                                                </label>
                                                        </td>

                                                        <td style="text-align: center;"><strong>@<?php echo $em['gst'];  ?>%</strong></td>
                                                        <td class="right"><?php echo number_format($em['rate'],2);  ?> </td>
                                                        <td class="middle">@<?php echo  ($em['gst']/2);  ?>%</td>
                                                        <td class="middle"><?php echo  bcdiv((((($em['rate'])*$em['gst'])/100)/2),1,2);  ?> </td>
                                                       <td class="middle">@<?php echo  ($em['gst']/2);  ?>%</td>
                                                        <td class="right"><?php echo bcdiv((((($em['rate'])*$em['gst'])/100)/2),1,2);  ?> </td>
                                                        <td style="text-align: right;"><strong><?php echo ((bcdiv((((($em['rate'])*$em['gst'])/100)/2),1,2))*2);  ?> </strong></td>
<?php $sno+=  ((bcdiv((((($em['rate'])*$em['gst'])/100)/2),1,2))*2)     ?>
                                                    </tr>

                                       
                                                   
                                                <?php  } ?>




                    <tr>
                        <td  colspan='7' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo "Total Before Tax (A):"?>

                        </td>
                        <td  colspan='1' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo number_format(bcdiv($gross_amt,1,2),2) ; ?>

                        </td>
                                                </tr>

                                               

                    <tr>
                        <td  colspan='7' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo "Total Tax Amount (B):" ?>

                        </td>

                        <td  colspan='1' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo number_format(bcdiv($sno,1,2),2); ?>
                        </td>
                                                </tr>

                                                <tr>
                        <td  colspan='7' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo "Grand Total (A+B):" ?>

                        </td>

                        <td  colspan='1' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo number_format(bcdiv(($sno+$gross_amt),1,2),2); ?>
                        </td>
                                                </tr>

                                                    <tr>
                        <td  colspan='7' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php
                $sign = '-';
                $amt = $gross_amt+$sno;               
                //$paise =  number_format(($amt-(floor($amt))),2);
                //echo $amt.'========='.floor($amt).'======='.$paise;exit();
                $paise = explode('.', number_format(bcdiv(($sno+$gross_amt),1,2),2));

                if($paise[1]){
                    $paise = $paise[1];    
                }else{
                    $paise = '.00';
                }
                $paise = $paise/100;
                
                if($paise > 0.49){
                    $sign = '+';
                    $paise = (1-$paise);
                }

                echo "Round Off (".$sign."):"

                ?>

                        </td>

                            <td  colspan='1' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php
               

                echo number_format($paise,2);
               

             
                ?>

                        </td>

                            <td  colspan='1' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php
                       ?>

                        </td>
                                                </tr>

                        <tr>
                                                </tr>
                   
                                                <tr>

    <td  colspan='4' style="text-align:left; padding-right:0px;font-weight: 50;">


        <span id="words" class="special" ><?php echo  $amount_in_words; ?></span>

                        </td>
                       
                        <td  colspan='3' style="text-align:right; padding-right:0px;font-size:small;font-weight: 600;">

            <input type="hidden" id="amount" value="<?php echo round($gross_amt+$sno); ?>">       
        <span id=""><?php echo  "Total Amount (INR):"?></span>      

                        </td>
                         <td  colspan='1' style="text-align:right; padding-right:0px;font-size:large;">

                   
        <span id=""><?php echo number_format(round($gross_amt+$sno),2); ?></span>      

                        </td>

                    </tr>
                    <tr><td colspan="4"><br></td><td colspan="4"><br></td></tr>
                    <tr>

                        <td colspan="4" class="left">
                            <strong>Terms and Condition</strong>
                            <ol>
                                <li>Goods once sold will not be taken back.</li>
                                <li>Warranties as per schedules and conditions of the manufacturer.</li>
                                <li>Payment: 100% advance through NEFT/DD/Cheque/Cash and should be in favour of Mangalam Enterprises.</li>
                                <li>NEFT details: Mangalam Enterprises, <strong>A/c No: 920020040401880, IFSC: UTIB0002526, Axis Bank Ganeshpur Rehmanpur, Lucknow.</strong></li>
                                <li>Interest @18% will be charged if the bill is not paid within 15 days from the date of invoice.</li>
                                <li>We reserved the rights to change our terms and conditions without any prior notice.</li>
                                <li>All disputes are subjected to Lucknow Jurisdiction only.</li>
                            </ol>


                        </td>
                        <td colspan="4" class="right"><span ><strong>for Mangalam Enterprises</strong></span>

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <span class="right"><strong>Authorised Signatory/Proprietor</strong></span>

                        </td>

                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                           

                                <!-- PAGE CONTENT ENDS -->
          

</div><!-- /full page -->
                           















        <!-- inline scripts related to this page -->

     