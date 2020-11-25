<div class="page-content">
	<div class="ace-settings-container" id="ace-settings-container">
			</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Invoices
								
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
																<!-- <input type="checkbox" class="ace" /> -->
																<span class="lbl"></span>
															</label>
														</th>
														
														<th>Invoice No</th>
														<th>Customer Name</th>
														<th>Created on</th>
														<th>No. of products</th>
														<th>Invoice total</th>
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

														
														<td><?php echo $em['invoice_no']?></td>
														<td><?php echo $em['name']?> </td>
														
														<td><?php echo date('d-m-Y',strtotime($em['date']))?></td>
														<td><?php echo $em['nop']?></td>

														<td class="amount"><?php echo number_format($em['total'],2) ?></td>
														
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="<?php echo base_url('invoice/view_invoice/').$em['inv_id']?>">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																
												<a  target="_blank" class="" href="<?php echo base_url('invoice/view_invoice/').$em['inv_id'].'/1';?>">
																	<i class="fa fa-truck" aria-hidden="true"></i>
																</a>

																<a class="blue" href="<?php echo base_url('invoice/view_invoice_item/').$em['inv_id']?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>


																

													<a class="item_del" id="<?php echo $em['inv_id'];  ?>"  role="button" class="blue" ><i class="fa fa-trash" aria-hidden="true"></i></a>

															
										
															
																				
																
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



								
		<!-- inline scripts related to this page -->

