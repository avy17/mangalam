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

                                                        <?php  $cgst = number_format((((($em['rate'])*$em['gst'])/100)/2),2);  ?>

                                                        <td style="text-align: center;"><strong>@<?php echo $em['gst'];  ?>%</strong></td>
                                                        <td class="right"><?php echo number_format($em['rate'],2);  ?> </td>
                                                        <td class="middle">@<?php echo  ($em['gst']/2);  ?>%</td>
                                                        <td class="middle"><?php echo  $cgst;  ?> </td>
                                                       
                                                        <!--<td class="middle"><?php echo  bcdiv((((($em['rate'])*$em['gst'])/100)/2),1,2);  ?> </td>  -->
                                                       <td class="middle">@<?php echo  ($em['gst']/2);  ?>%</td>
                                                         <td class="middle"><?php echo  $cgst;  ?> </td>
                                                        <td style="text-align: right;"><strong><?php echo ($cgst*2);  ?> </strong></td>
<?php $sno+=  ($cgst*2);     ?>
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
                <?php echo "Tax Amount (B):" ?>

                        </td>

                        <td  colspan='1' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo number_format(bcdiv($sno,1,2),2); ?>
                        </td>
                                                </tr>

                                                <tr>
                        <td  colspan='7' style="text-align:right; padding-right:0px;color:#0931f3;">
                <?php echo "Sub total (A+B):" ?>

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
                       
                        <td  colspan='3' style="text-align:right; padding-right:0px;font-size:large;font-weight: 600;">

            <input type="hidden" id="amount" value="<?php echo round($gross_amt+$sno); ?>">       
        <span id=""><?php echo  "Grand Total (₹):"?></span>      

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

     