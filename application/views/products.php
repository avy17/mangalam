

<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								<i class="menu-icon fa fa-shopping-cart"></i>
								Products <div style="text-align: right"><a href="<?php echo base_url('products/add') ?>"><button id="" type="button" class="btn btn-white btn-success">Add new</button></a></div>	
								
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
														<th>Name</th>
														<th>HSN</th>
														<th>Rate</th>
														<th>Unit</th>
														<th>GST Rate (%)</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													foreach((array)$prod_data as $em){
                    ?>
													<tr id="tr_<?php echo $em['id']?>">
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td id="td_name_<?php echo $em['id']?>"><?php echo $em['name']?></td>
														<td id="td_hsn_<?php echo $em['id']?>"><?php echo $em['hsn']?></td>
														<td class="amount" id="td_rate_<?php echo $em['id']?>"><?php echo number_format($em['rate'],2)?></td>
														<td id="td_unit_<?php echo $em['id']?>"><?php echo $em['unit']?></td>
														<td id="td_gst_<?php echo $em['id']?>"><?php echo $em['gst'].'%'?></td>
														
														<td>
															<div class="hidden-sm hidden-xs action-buttons">

																<a class="" href="<?php echo base_url('products/history/').$em['id'] ?>" data-target="" > 
																	<i class="ace-icon fa fa-search plus"></i>
																</a>
																
																<a class="edit_pro" href="#edit-pro-modal" data-target="#edit-pro-modal" data-id ="<?php echo $em['id'].'#'.$em['name'].'#'.$em['rate'].'#'.$em['hsn'].'#'.$em['gst'].'#'.$em['unit']?>" data-toggle="modal"> 
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
																<a class="" href="<?php echo base_url('products/delete/').$em['id'] ?>" data-target="" > 
																	<i class="ace-icon fa fa-trash"></i>
																</a>
<?php if($this->session->userdata('inv_no')) { ?>
				<a class="qty_add" href="#modal-form" data-target="#modal-form" data-id ="<?php echo $em['id'].'#'.$em['name'].'#'.$em['rate'].'#'.$em['hsn'].'#'.$em['gst'].'#'.$em['unit']?>" role="button" class="blue" data-toggle="modal"> <span class="glyphicon glyphicon-shopping-cart"></span> #<?php print_r($this->session->userdata('inv_no'))?></a>	
				<?php } ?>		

												
										
															
																				
																
															</div>

														</td>
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
															<label for="form-field-username">Net Price (Including <span class="gst"></span> GST)</label>

															<div>
																<input type="number" id="net_price"  placeholder="OPTIONAL" value="" />
																</div>

														</div>

														<div class="form-group">
															<label for="form-field-username">Price</label>

															<div>
																<input type="number" id="price"  placeholder="" value="1" />
																<span id="per"><em></em></span><br>

																Previous Rates: <span class="text-danger" id="rate_hist"></span>
															</div>

														</div>

														<div class="form-group">
															<label for="form-field-username">Discount(%)</label>

															<div>
																<input type="number" id="discount"  placeholder="" value="0" />
																<input type="hidden" id="gst_val"  placeholder=""  />
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

	