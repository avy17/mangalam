<div class="page-header">
							<h1>
								Edit 
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



<?php
  $sel = $prod_data['product_id'];
 ?>


 									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product </label>

										<div class="col-sm-9">
											<select class="col-xs-10 col-sm-5" name="product_id">
												
												<?php  
												foreach ($allProds as $key => $value) { ?>													
											<option value="<?php echo $value['id'] ?>" <?php if($sel=== $value['id']) echo 'selected="selected"';?>><?php echo $value['name'] ?></option>

											<?php 	}

												?>

											</select>
											<!-- <input type="text" value="<?php echo $prod_data['price'] ?>" name="price" id="form-field-1" class="col-xs-10 col-sm-5" /> -->
										</div>
									</div>
																				
														


								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $prod_data['price'] ?>" name="price" id="form-field-1" class="col-xs-10 col-sm-5" />
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quantity </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $prod_data['qty'] ?>" name="qty" id="form-field-1" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Discount </label>

										<div class="col-sm-9">
											<input type="text" value="<?php echo $prod_data['discount'] ?>" name="discount" id="form-field-1" class="col-xs-10 col-sm-5" />
										</div>
									</div>



										

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Edit
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
