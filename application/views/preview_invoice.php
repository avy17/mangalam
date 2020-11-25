<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="row">
									<div class="col-xs-12">
										
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>


										<div>
											<table id="simple-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th></th>
														<th style="text-align: right;">Invoice #<?php echo $prod_data[0]['invoice_no']; ?>
															<br>

															<?php echo date('d-M-Y',strtotime($prod_data[0]['date']))?>	


														</th>
														<th style="text-align: right;">Buyer</th>
														

													</tr>
												</thead>

												<tbody>
			
													<tr>
														<td  style="text-align: left;">

														<img id="logo" width="70px" height="70px" style="text-align: center" src="<?php echo base_url('cosmatics/img/swastik1.jpg') ?>">	
															
														</td>
														
														<td  style="text-align: right;">

															Manglam Enterprises <br>
															<i class="fa fa-home"> Flat No. 504 Block L1 Silverline Apartments Opp. BBD University Chinhat Lucknow- 226028</i><br>
															<strong>GST: </strong> 09AASHA2540R1ZO
															<br>
															<strong>Contact: </strong> 9935096855

															
														</td>

														<td style="text-align: right;"><?php echo $prod_data[0]['customer_name'] ?>
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
										<div>
											<table id="simple-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															SNO.
														</th>
														<th>Product Name</th>
														<th>HSN/SAC</th>
														<th>GST Rate (%)</th>
														<th>QTY</th>
														<th>Unit Price</th>
														<th>Discount(%)</th>
														<th>Amount</th>
														

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
															<label class="pos-rel">
																<?php echo $sno?>
																</label>
														</td>

														<td><?php echo $em['product_name']?></td>
														<td><?php echo $em['hsn']?></td>
														<td><?php echo $em['gst'].'%'?></td>
														<td><?php echo $em['qty']?></td>
														<td><?php echo $em['rate']?></td>
														<td><?php echo $em['discount']?></td>
														
														<td style="text-align: right;"><?php echo number_format($em['final_price'],2)?></td>

													</tr>

										
													
												<?php } ?>

												</tbody>
												</table>
											</div>

										
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>


																	<div>
											<table caption="GST" id="" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
																													</th>
														<th>GST Rate(%)</th>
														<th>Amount</th>
														<th>CGST</th>
														<th>CGST Amount</th>
														<th>SGST</th>
														<th>SGST Amount</th>
														<th>Net Tax</th>
														

													</tr>
												</thead>

												<tbody>
													<?php 
													$sno = 0;
													foreach((array)$gst_data as $em){

														//$sno++;

                    ?>
													<tr>
														<td class="center">
															<label class="pos-rel">
																
																</label>
														</td>

														<td><strong>@<?php echo $em['gst'];  ?>%</strong></td>
														<td><?php echo number_format($em['rate'],2);  ?> </td>
														<td>@<?php echo  ($em['gst']/2);  ?>%</td>
														<td><?php echo  number_format((((($em['rate'])*$em['gst'])/100)/2),2);  ?> </td>
														<td>@<?php echo number_format(($em['gst']/2),2);  ?>%</td>
														<td><?php echo number_format((((($em['rate'])*$em['gst'])/100)/2),2);  ?> </td>
														<td style="text-align: right;"><strong><?php echo number_format(((($em['rate'])*$em['gst'])/100),2);  ?> </strong></td>
<?php $sno+=  (($em['rate'])*($em['gst']/100));     ?>
													</tr>

										
													
												<?php  } ?>





					<tr>
						<td  colspan='8' style="text-align:right; padding-right:25px;color:#0931f3;font-size:larger;">
				<?php echo "Total Before Tax:     ".number_format($gross_amt,2); ?>


						</td>
												</tr>

												


					<tr>
						<td  colspan='8' style="text-align:right; padding-right:25px;color:#0931f3;font-size:larger;">
				<?php echo "Total Tax Amount:     ".number_format($sno,2); ?>


						</td>
												</tr>

													<tr>
						<td  colspan='8' style="text-align:right; padding-right:25px;color:#0931f3;font-size:larger;">
				<?php 
				$amt = number_format(($gross_amt+$sno),2);
				$paise = explode('.', $amt);

				echo "Round Off (-):     0.".$paise[1];  ?>


						</td>
												</tr>

						<tr>
												</tr>
					
												<tr>

	<td  colspan='4' style="text-align:left; padding-right:25px;font-weight: 50;">



		<span id="words" ></span>

			


						</td>

						<td  colspan='4' style="text-align:right; padding-right:25px;font-size: large;font-weight: 600;">

			<input type="hidden" id="amount" value="<?php echo  floor($gross_amt+$sno); ?>">		
		<span id=""><?php echo  "Total Amount:     ".number_format(($gross_amt+$sno)); ?></span>		


						</td>

					</tr>
												</tbody>
												</table>
											</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->


								
		<!-- inline scripts related to this page -->

