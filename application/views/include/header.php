<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<title>OARS: IIT Kanpur</title>

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
	.subheading {
		color: #e5e5e5;
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $this->session->userdata('email');?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<? if(strstr($this->session->userdata('role'), 'student')): ?>
										<li><?php echo anchor('/user/profile', 'Profile');?></li>
									<? endif; ?>
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
						<li><? echo anchor('/course/all','View all Courses') ?></li>
					<? endif; ?>
					<? if(strstr($this->session->userdata('role'), 'prof')): ?>
						<li class="nav-header">Course Administration</li>
						<li><? echo anchor('/instructor','Pre-Registration Courses') ?></li>						
						<li><? echo anchor('/instructor/current','Current Courses') ?></li>
						<li><? echo anchor('/course/offered','Courses Being Offered') ?></li>
					<? endif; ?>
					<? if(strstr($this->session->userdata('role'), 'student')): ?>
						<li class="nav-header">Pre-Registration</li>
						<li><? echo anchor('/course/offered','Courses Being Offered') ?></li>
						<li><? echo anchor('/prereg','Request Course') ?></li>
						<li><? echo anchor('/prereg/submit','Submit Course Request') ?></li>
						<li><? echo anchor('/prereg/timetable','Time Table') ?></li>
						<li class="nav-header">Current Registration</li>
						<li><? echo anchor('/student/registration','Registration') ?></li>
						<li><? echo anchor('/student/timetable','Time Table') ?></li>
						<li class="nav-header">Academic Information</li>
						<li><? echo anchor('/student/transcript','Transcript') ?></li>
						<li><? echo anchor('/student/backlog','Backlogs') ?></li>	
					<? endif; ?>
				</ul>
			</div>
			<div class="span8">
				<? if(isset($alert)): ?>
				<div class="alert alert-<?= $alert['type'] ?>">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<?= $alert['text'] ?>
				</div>
				<? endif; ?>