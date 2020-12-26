

<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								<i class="menu-icon fa fa-usd"></i>
								Monthly Sales 
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
														
														<th>Month</th>
													
														<th class="amount">Sales</th>
															<th>Year</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													foreach((array)$mdata as $em){
                    ?>
													

														<td id="td_name_<?php echo $em['id']?>"><a href="<?php echo base_url('invoice/monthly_sales/').$em['mnth'] ?>"><?php $m= $em['mnth']; echo $monthArr[$m-1]?></a></td>
														<td class="amount" id="td_rate_<?php echo $em['id']?>"><strong><?php echo number_format($em['mt'],2)?><strong></td>
													<td id="td_hsn_<?php echo $em['id']?>"><?php echo date('Y')?></td>
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







								<?php echo form_close(); ?>
			
		<!-- inline scripts related to this page -->

	