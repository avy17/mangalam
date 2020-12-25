<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-7 infobox-container">
										<a href="<?php echo base_url('products')?>">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-cubes"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $pro; ?></span>
												<div class="infobox-content">Products</div>
											</div>

											<div class="stat stat-success"></div>
										</div>
										</a>

<a href="<?php echo base_url('customer')?>"><div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-child"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $customer; ?></span>
												<div class="infobox-content">Customers</div>
											</div>

											</div></a>
										
<a href="<?php echo base_url('invoice/all_invoices')?>"><div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $invoices?></span>
												<div class="infobox-content">Invoices this year</div>
											</div>
											
										</div></a>

										<a href="<?php echo base_url('invoice')?>">
										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-usd"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo number_format($total,2)?></span>
												<div class="infobox-content">Sales this year</div>
											</div>
										</div></a>

										<a href="">
										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-usd"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo number_format($this_month_total,2)?></span>
												<div class="infobox-content">Sales in <?php echo date('M')?></div>
											</div>
										</div></a>
										

										<div class="infobox infobox-orange2">
											<div class="infobox-chart">
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo number_format($gst_total,2) ?></span>
												<div class="infobox-content">GST this year</div>
											</div>

											
										</div>

										<div class="infobox infobox-blue2">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="42" data-size="46">
													<span class="percent"><?php echo number_format($zero_rate,2)?></span>%
												</div>
											</div>

											<div class="infobox-data">
												<span class="infobox-text">products have 0.00 price</span>

												<div class="infobox-content">
													
												</div>
											</div>
										</div>

										<div class="space-6"></div>



									</div>

									<div class="vspace-12-sm"></div>

									<!-- <div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Traffic Sources
												</h5>

												<div class="widget-toolbar no-border">
													<div class="inline dropdown-hover">
														<button class="btn btn-minier btn-primary">
															This Week
															<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
															<li class="active">
																<a href="#" class="blue">
																	<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																	This Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	This Month
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Month
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													<div class="hr hr8 hr-double"></div>

													<div class="clearfix">
														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
																&nbsp; likes
															</span>
															<h4 class="bigger pull-right">1,255</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
																&nbsp; tweets
															</span>
															<h4 class="bigger pull-right">941</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
																&nbsp; pins
															</span>
															<h4 class="bigger pull-right">1,050</h4>
														</div>
													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col --> -->
								</div><!-- /.row -->
