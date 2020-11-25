<div class="page-header">
							<h1>
								Edit products
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
											<input type="text" value="<?php echo $resultArr['name']?>" name="name" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>



										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Rate / Price </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $resultArr['rate']?>" name="rate" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Unit </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $resultArr['unit']?>" name="unit" id="form-field-1" placeholder="Optional" class="col-xs-10 col-sm-5" />
										</div>
									</div>


										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> HSN </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $resultArr['hsn']?>" name="hsn" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> GST % </label>

										<div class="col-sm-9">
											<input type="number" value="<?php echo $resultArr['gst']?>" name="gst" id="form-field-1" placeholder="Mandatory" class="col-xs-10 col-sm-5" />
										</div>
									</div>


									

								

									



									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Edit
											</button>

											&nbsp; &nbsp; &nbsp;
											
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
