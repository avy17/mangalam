<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">

								<h1>
								Invoice #<?php echo $prod_data[0]['invoice_no']?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php print_r($prod_data[0]['customer_name']);?>
								</small>
								<div class="pull-right"><h1>Total: <span id="it"><?php echo number_format($inv_total,2) ?></span></h1></div>
								
							</h1>

							<h1>
								<div style="text-align: right"><a href="<?php echo base_url('invoice/add_more_items/').$prod_data[0]['invoice_id'].'/'.$prod_data[0]['invoice_no'] ?>"><button id="" type="button" class="btn btn-white btn-success">Add more items</button></a></div>	
								
							</h1>
							<h1>
								<div style="text-align: right"><a href="<?php echo base_url('invoice/change_party/').$prod_data[0]['invoice_id'] ?>"><button id="" type="button" class="btn btn-white btn-success">Change Party OR Date</button></a></div>	
								
							</h1>
</div><!-- /.page-header -->

<input type ="hidden" name="inv_id" id="inv_id" value="<?php echo $inv_id ?>">
							

						<div class="row">
									<div class="col-xs-12">
										
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
									

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>Product Name</th>
														<th>HSN/SAC</th>
														<th>GST Rate (%)</th>
														<th>QTY</th>
														<th>Unit Price</th>
														<th>Discount(%)</th>
														<th>Amount</th>
														<th>Action</th>
														</tr>
												</thead>

												<tbody>
													<?php 
													foreach((array)$prod_data as $em){
                    ?>
													<tr>

														
														
														<td><?php echo $em['product_name']?></td>
														<td><?php echo $em['hsn']?></td>
														<td><?php echo $em['gst'].'%'?></td>
														<td><?php echo $em['qty']?></td>
														<td><input class="up" data-value="<?php echo $em['iid']?>" data-toggle="tooltip" data-placement="bottom" title="Use TAB key to go down and SHIFT+TAB to go up" data-qty="<?php echo $em['qty']?>" data-discount="<?php echo $em['discount']?>" type="text" value="<?php echo $em['price']?>"> </td>
														<td><?php echo $em['discount']?></td>
														
														<td class="final" id="final_<?php echo $em['iid']?>" style="text-align: right;"><?php echo number_format($em['final_price'],2)?></td>
														<td>
														<div class="hidden-sm hidden-xs action-buttons">
														
<a class="green" href="<?php echo base_url('invoice/edit_item/').$em['iid']  ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																

				<a  href="<?php echo base_url('invoice/delete_item/').$em['iid']  ?>"  >
					<i class="ace-icon fa fa-trash-o bigger-120 orange"> </i>
				</a>		
																			
																
															</div> 	

														</td>
													</tr>

										
													
												<?php } ?>
												</tbody>
												</table>
											</div>

											<div class="modal-footer no-margin-top">
											

												<ul class="pagination pull-right no-margin">
													<li class="prev disabled">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-left"></i>
														</a>
													</li>

													<li class="active">
														<a href="#">1</a>
													</li>

													<li>
														<a href="#">2</a>
													</li>

													<li>
														<a href="#">3</a>
													</li>

													<li class="next">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-right"></i>
														</a>
													</li>
												</ul>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->




								<?php echo form_close(); ?>
			