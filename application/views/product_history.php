

<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								<i class="menu-icon fa fa-shopping-cart"></i>
								Product Rate History
							</h1>
						</div><!-- /.page-header -->

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
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>

														<th>Product Name</th>
														<th>Rate</th>
														<th>Date time</th>
														<th>Invoice (If any)</th>
														<th>Customer <em>(Click on the name to sort)</em></th>
													</tr>
												</thead>

												<tbody>
													<?php 
													foreach((array)$pro_data as $em){
                    ?>
													<tr id="tr_<?php echo $em['id']?>">
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>
														<td><?php echo $em['pname']?></td>
														<td><?php echo number_format($em['hrate'],2)?></td>
														<td><?php echo date_converter($em['time'])?></td>
														<td><a href="<?php echo base_url('invoice/view_invoice/').$em['invoice_id']; ?>"><?php echo $em['invoice_no']?></a></td>
														
														<td><a href="<?php echo base_url('products/history/').$em['product_id'].'/'.$em['customer_id']; ?>"><?php echo $em['cname']?></a></td>
														



														
													</tr>

										
													
												<?php } ?>
												</tbody>
												</table>
											</div>

											<div class="modal-footer no-margin-top">
											

											
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


			<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger"><span id="head_span"></span></h4>
											</div>

											<div class="modal-body">
												<div class="row">
												

													<div class="col-xs-12 col-sm-7">
												

														<div class="space-4"></div>

														<div class="form-group">
														
															<div>
																<input type="hidden" id="prod_data" placeholder="" value="" />
															</div>
														</div>

														<div class="form-group">
															<label for="form-field-username">Quantity</label>

															<div>
																<input type="number" id="qty"  placeholder="" value="1" />
															</div>
														</div>

														<div class="form-group">
															<label for="form-field-username">Price</label>

															<div>
																<input type="number" id="price"  placeholder="" value="1" />
																<span id="per"><em></em></span>
															</div>

														</div>

														<div class="form-group">
															<label for="form-field-username">Discount(%)</label>

															<div>
																<input type="number" id="discount"  placeholder="" value="0" />
															</div>
														</div>

													</div>
												</div>
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>

												<button id="save_btn" class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-check"></i>
													Save
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->




<div id="edit-pro-modal" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger"><span id="edit_pro_span"></span></h4>
											</div>

											<div class="modal-body">
												<div class="row">


													<?php echo form_open_multipart('',array('class' => 'form-horizontal form-label-left', 'id'=>'edit_pro_form')); ?>
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

										<div class="col-sm-9">
											<input type="text" value="" name="name" id="form-field-name" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>



										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Rate / Price </label>

										<div class="col-sm-9">
											<input type="text" value="" name="rate" id="form-field-rate" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Unit </label>

										<div class="col-sm-9">
											<input type="text" value="" name="unit" id="form-field-unit" placeholder="Optional" class="col-xs-10 col-sm-5" />
										</div>
									</div>


										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> HSN </label>

										<div class="col-sm-9">
											<input type="text" value="" name="hsn" id="form-field-hsn" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> GST % </label>

										<div class="col-sm-9">
											<input type="number" value="" name="gst" id="form-field-gst" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
										<div class="col-sm-9">
											<input type="hidden" value="" name="id" id="form-field-id" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>


													

											
												</div>
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>

												<button id="edit_pro_btn" class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-check"></i>
													Save
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->

								<?php echo form_close(); ?>
			
		<!-- inline scripts related to this page -->

	