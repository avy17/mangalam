<!DOCTYPE html>
<html lang="en" >

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
	<?php $text = "";  ?>
		<title>Invoice<?php echo $text;?></title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/ace-rtl.min.css" />

		<link rel="stylesheet" href="<?php echo base_url(); ?>cosmatics/ace-master/assets/css/chosen.min.css" />

<style>


	/*#loader_div {
		background: url("<?php echo base_url('cosmatics/img/swastik1.jpg')?>");
		width: 100%;
		height: 100%;
		position: fixed;
		opacity: .8;
	}*/

	.amount{
		text-align: right;
	}
	
</style>



		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/ace-extra.min.js"></script>
<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="loader_div" style="display: none;">
			
		
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
<a href="<?php echo base_url('invoice')?>"><div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<small>
							<img width="10%" height="10%" src="<?php echo base_url(); ?>cosmatics/img/swastik1.jpg">
							Mangalam Enterprises
						</small>
					</a>
				</div>
</a>
				
				<?php  

				$inv = '#0';
				$nop = 0;

				if($this->session->userdata('inv_no') && $this->session->userdata('inv_id')){
					$inv = '#'.$this->session->userdata('inv_no');
					$nop = 0;
				}
				?>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
<li class="dropdown-modal">
							<a data-toggle="" target="_blank" class="" href="<?php echo base_url('invoice/view_invoice/').$this->session->userdata('inv_id')?>">
								<i class="ace-icon fa fa-shopping-cart icon-animated-vertical"></i>
								<span class="badge badge-success">Invoice No: <?php echo $inv;?></span>
								
								<span id="cart_total" style="font-size: large" class="badge badge-danger"></span>
							
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									Invoice <?php echo $inv;?>
								</li>

								
										

										<li>
											<a href="#" class="clearfix">
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										

						

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>
						<a href="<?php echo base_url('invoice/create_invoice') ?>"><button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>
</a>
						
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						

						<b class="arrow"></b>
					</li>
			<?php  

				$inv = '#0';

				if($this->session->userdata('inv_no') && $this->session->userdata('inv_id')){ 



					?>
						<li class="">
						<a href="<?php echo base_url('invoice/view_invoice_item/').$this->session->userdata('inv_id')?>">
							<i class="menu-icon fa fa-edit"></i>
							<span class="menu-text"> Edit Invoice #<?php echo $this->session->userdata('inv_no')?> </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('invoice/view_invoice/').$this->session->userdata('inv_id')?>">
							<i class="menu-icon fa fa-print"></i>
							<span class="menu-text"> Print Invoice #<?php echo $this->session->userdata('inv_no')?> </span>
						</a>

						<b class="arrow"></b>
					</li>



					
				<?php }
				?>

				

					<li class="">
						<a href="<?php echo base_url('products')?>">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text"> Products </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo base_url('customer')?>">
							<i class="menu-icon fa fa-male"></i>
							<span class="menu-text"> Customers </span>
						</a>

						<b class="arrow"></b>
					</li>

						<li class="">
						<a href="<?php echo base_url('invoice/create_invoice')?>">
							<i class="menu-icon fa fa-pencil"></i>
							<span class="menu-text"> Create new invoice </span>
						</a>

						<b class="arrow"></b>
					</li>

							<li class="">
						<a href="<?php echo base_url('invoice/all_invoices')?>">
							<i class="menu-icon fa fa-binoculars"></i>
							<span class="menu-text"> View all invoices </span>
						</a>

						<b class="arrow"></b>
					</li>




								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
	
