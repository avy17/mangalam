<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">

							<h1>
								<i class="menu-icon fa fa-male"></i>
								Customers
								
							</h1>
						</div><!-- /.page-header -->


							<h1>
								<div style="text-align: right"><a href="<?php echo base_url('customer/add_normal') ?>"><button id="" type="button" class="btn btn-white btn-success">Add new</button></a></div>	
								
							</h1>
						

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
														
														<th>Name</th>
														<th>Address</th>
														<th>Pin</th>

														<th>GST No.</th>
														<th>Contact</th>

														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													foreach((array)$prod_data as $em){
                    ?>
													<tr>

														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														
														<td><?php echo $em['name']?></td>
														<td><?php echo $em['address']?></td>
														<td><?php echo $em['pincode']?></td>
														<td><?php echo $em['gst_no']?></td>
														<td><?php echo $em['contact']?></td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">


			<a class="fa fa-edit"  href="<?php echo base_url('customer/edit/').$em['id'] ?>" role="button" class="blue" ></a>	

																					
														<a class="cust_del fa fa-trash" id="<?php echo $em['id'] ?>" role="button" class="blue" ></a>	

															

									
										
																				
																
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



<div id="edit-cust-modal" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger"><span id="edit_cust_span"></span></h4>
											</div>

											<div class="modal-body">
												<div class="row">


													<?php echo form_open_multipart('',array('class' => 'form-horizontal form-label-left', 'id'=>'edit_pro_form')); ?>
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

										<div class="col-sm-9">
											<input type="text" value="" name="name" id="form-field-cust-name" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>



										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

										<div class="col-sm-9">
											<input type="text" value="" name="email" id="form-field-cust-email" placeholder="" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

										<div class="col-sm-9">
											<input type="text" value="" name="address" id="form-field-cust-unit" placeholder="Optional" class="col-xs-10 col-sm-5" />
										</div>
									</div>


										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pincode </label>

										<div class="col-sm-9">
											<input type="text" value="" name="pin" id="form-field-cust-pin" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

													<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> PAN </label>

										<div class="col-sm-9">
											<input type="text" value="" name="pan" id="form-field-cust-pan" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> GST No. </label>

										<div class="col-sm-9">
											<input type="text" value="" name="gst" id="form-field-cust-gst" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact No. </label>

										<div class="col-sm-9">
											<input type="number" value="" name="contact" id="form-field-cust-contact" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
										<div class="col-sm-9">
											<input type="hidden" value="" name="id" id="form-field-cust-id" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>
											
												</div>
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>

												<button id="edit_cust_btn" class="btn btn-sm btn-primary">
													<i class="ace-icon fa fa-check"></i>
													Save
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->

								<?php echo form_close(); ?>
			