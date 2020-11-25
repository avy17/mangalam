<div class="page-header">
							<h1>
								Add new product
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo set_value('name');?>" name="name" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> HSN </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo set_value('hsn');?>" name="hsn" id="" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> GST % </label>

										<div class="col-sm-9">
											<input type="number" value="<?php echo set_value('gst');?>" name="gst" id="" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>



										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Rate / Price </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo set_value('rate');?>" name="rate" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Unit </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo set_value('unit');?>" name="unit" id="" placeholder="Optional" class="col-xs-10 col-sm-5" />
										</div>
									</div>


										

								


									

								

									



									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset" id="pro_add_reset">
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
