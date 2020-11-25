

<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Products <div style="text-align: right"><a href="<?php echo base_url('products/add') ?>"><button id="" type="button" class="btn btn-white btn-success">Add new</button></a></div>	
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
									<div class="col-xs-12">
										
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
									
									Search <input type ="text" id="pro_search">

									<div id='result'></div>
									<span id='result_span'></span>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="product-table" class="table table-striped table-bordered table-hover">
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
													<tr></tr>
												</tbody>
												</table>
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
																<input type="/hidden" id="prod_data" placeholder="" value="" />
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


			
		<!-- inline scripts related to this page -->

