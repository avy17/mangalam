
                                   

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

                                       
                                      
                                  


                                   