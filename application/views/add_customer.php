<div class="page-header">
							<h1>
								Create new customer
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

 								<?php echo form_open_multipart('',array('class' => 'form-horizontal form-label-left')); ?>
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name of customer </label>

										<div class="col-sm-9">
											<input type="text" value="" name="name" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>



										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

										<div class="col-sm-9">
											<input type="text" value="" name="email" id="form-field-1" placeholder="Optional" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

										<div class="col-sm-9">
											<input type="text" value="" name="address" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pincode </label>

										<div class="col-sm-9">
											<input type="number" value="" name="pincode" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> State </label>

										<div class="col-sm-9">
											<input type="text" name="state" id="form-field-1" placeholder="" value="Uttar Pradesh" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> City </label>

										<div class="col-sm-9">
											<input type="text" name="city" id="form-field-1" placeholder="" value="Lucknow" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Contact No. </label>

										<div class="col-sm-9">
											<input type="text" value="" name="contact" id="form-field-1" placeholder="Optional" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> PAN </label>

										<div class="col-sm-9">
											<input type="text" value="" name="pan" id="form-field-1" placeholder="Mandatory" value="Lucknow" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> GST No. </label>

										<div class="col-sm-9">
											<input type="text" value="" name="gst_no" id="form-field-1" placeholder="Optional" value="" class="col-xs-10 col-sm-5" />
										</div>
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






