<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<title>CodeIgniter Bootstrap</title>

	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">

	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
	<style type="text/css">

	/* Sticky footer styles
	-------------------------------------------------- */

	html,
	body {
		height: 100%;
		/* The html and body elements cannot have any padding or margin. */
	}

	/* Wrapper for page content to push down footer */
	#wrap {
		min-height: 100%;
		height: auto !important;
		height: 100%;
		/* Negative indent footer by it's height */
		margin: 0 auto -60px;
	}

	/* Set the fixed height of the footer here */
	#push,
	#footer {
		height: 60px;
	}
	.credit {
		background-color: #f5f5f5;
	}

	/* Lastly, apply responsive CSS fixes as necessary */
	@media (max-width: 767px) {
		#footer {
			margin-left: -20px;
			margin-right: -20px;
			padding-left: 20px;
			padding-right: 20px;
		}
	}



	/* Custom page CSS
	-------------------------------------------------- */
	/* Not required for template or sticky footer method. */

	#wrap > .container {
		padding-top: 60px;
	}
	.container .credit {
		margin: 20px 0;
	}

	code {
		font-size: 80%;
	}

	</style>

</head>
<body>
	<!-- Add header and side nav here -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<?php echo anchor('/', 'OARS', 'class="brand"');?>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li><?php echo anchor('/page/FAQ', 'FAQ');?></li>
						<li><?php echo anchor('/page/contact', 'Contact');?></li>						
						<li><?php echo anchor('/page/about', 'About');?></li>
					</ul>
					<div class="pull-right nav-collapse nav">
						<ul class="nav">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $this->session->userdata('username');?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><?php echo anchor('/user/', 'Profile');?></li>
									<li><?php echo anchor('/user/logout', 'Logout');?></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Begin page content -->
	<div id="wrap">
		<div class="container container-fluid row-fluid">
			<div class="span2 offset1">
				<ul class="nav nav-list">
					<? if(strstr($this->session->userdata('role'), 'admin')): ?>
						<li class="nav-header">Administration</li>
						<li><?php echo anchor('/admin/addcourse', 'Add Course');?></li>
						<li><?php echo anchor('/admin/addoffering', 'Add Course Offering');?></li>
						<li><a href="#">View all courses</a></li>
					<? endif; ?>
					<? if(strstr($this->session->userdata('role'), 'prof')): ?>
						<li class="nav-header">Course Administration</li>
						<li><a href="#">My Courses</a></li>
						<li><a href="#">Courses Being Offered</a></li>
					<? endif; ?>
					<? if(strstr($this->session->userdata('role'), 'student')): ?>
						<li class="nav-header">Pre-Registration</li>
						<li><a href="#">Courses Being Offered</a></li>
						<li><a href="#">Request Course</a></li>
						<li><a href="#">Submit Course Request</a></li>
						<li><a href="#">Time Table</a></li>
						<li class="nav-header">Current Registration</li>
						<li><a href="#">Registration</li>
						<li><a href="#">Time Table</a></li>
						<li><a href="#">Submit Course Request</a></li>
						<li class="nav-header">Academic Information</li>
						<li><a href="#">Transcripts</li>
						<li><a href="#">Backlogs</a></li>	
					<? endif; ?>
				</ul>
			</div>
			<div class="span8">