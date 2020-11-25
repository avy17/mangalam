<div class="page-header">
							<h1>
								Edit Invoice No #<?php echo $inv_data['invoice_no']?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">

								 <div class="alert alert-danger">
								 <?php echo validation_errors();?>
 									
 								</div>
								<!-- PAGE CONTENT BEGINS -->
								<?php echo form_open_multipart('',array('class' => 'form-horizontal form-label-left')); ?>
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Invoice No </label>

										<div class="col-sm-9">
											<input type="number" readonly value="<?php echo $inv_data['invoice_no']?>" name="invoice_no" id="invoice_no" placeholder="" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> DATE OF INVOICE </label>

										<div class="col-sm-9">
											<input class="date-picker col-xs-10 col-sm-5" id="id-date-picker-1" readonly="true" type="text" name="date" data-date-format="dd-mm-yyyy" value="<?php echo date('d-M-Y',strtotime($inv_data['date']))?>" />
										</div>
									</div>

																	

									<div class="space-4"></div>


										<div class="col-xs-12 col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Select Customer</h4>

													<span style="text-align: right" class="">
														
															
															<button id="add_new_customer" type="button" class="btn btn-white btn-success">Add new</button>
														

														
													</span>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div>
													
														

															<br />
															<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State..." name="customer">
																													

															<option></option>
																
																<?php  foreach ($customer_data as $key => $value) {
																	
																 ?>
																
	<option value="<?php echo $value['id']?>" <?php if($value['id'] == $inv_data['customer_id']) { echo "selected"; }?> ><?php echo $value['name']?></option>
	<?php  } ?>
															</select>
														
														</div>

														<div>
													
															<div class="space-2"></div>

														</div>
													</div>
												</div>
											</div>
										</div><!-- /.span -->

										</div>







					<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

														</a>

														

														</span>
												</div>

														</div>
													</div>
												</div>
											
										
									</div>
							<?php echo form_close(); ?>




