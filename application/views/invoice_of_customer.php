<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">

							<h1>
								<i class="menu-icon fa fa-male"></i>
								<?php echo $inv_data[0]['name'].'      (Since '.date_converter(financial_yr_start()).')' ;?> 
								
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
														
														<th>Invoice No.</th>
														<th>Invoice Date</th>
														<th class="amount">Total<br> <?php echo 'Since '.date_converter(financial_yr_start());?> </th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													$sum = 0;
													foreach((array)$inv_data as $em){
                    ?>
													<a href="<?php echo base_url('invoice/view_invoice/').$em['iid']?>"><tr></a>
													

														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														
														<td style"font-size:26px"><a href="<?php echo base_url('invoice/view_invoice/').$em['iid']?>"><?php echo $em['invoice_no']?></a>   </td>
													
														
														<td><?php echo date_converter($em['created_at']); ?></td>
														<td class="amount"><?php echo number_format($em['total'],2)?></td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">


		
										
																				
																
															</div> 	

														</td>
													</tr>

										
													
												<?php $sum+= $em['total']; }  echo 'SUM = '.number_format($sum); ?>
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




								<?php echo form_close(); ?>
			