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

<title><?php echo $text?></title>

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