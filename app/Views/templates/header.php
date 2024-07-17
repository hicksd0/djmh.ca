<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="<?php echo base_url(); ?>supportassets/images/favicon.ico">

    <title><?php echo $page_title; ?></title>

    <!-- get bootstrap -->
	  <link href="<?php echo base_url(); ?>supportassets/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
	  <!-- get CSS -->
	  <link href="<?php echo base_url(); ?>supportassets/css/styles.css" rel="stylesheet">
    
	<!-- Bootstrap core JavaScript ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url(); ?>supportassets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>supportassets/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>supportassets/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Maintain It Pro</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
		<?php if(!$user["is_logged_in"]){ ?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>multitude/index">Home</a>
			</li>
		<?php } ?>
        
		<?php if($user["is_logged_in"]){ ?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>dashboard/index">Dashboard</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>dashboard/cars">Cars</a>
			</li>
		<?php } ?>
      </ul>
	  <?php 
	  if($user["is_logged_in"]){ ?>
	  <div class="d-flex">
        <p class="nav-link text-white m-auto">Welcome, <?php echo $user["first_name"] . " " . $user["last_name"]; ?></p>
      </div>
	  <div class="d-flex">
        <a href="<?php echo base_url();?>auth/logout" class="btn btn-outline-primary" type="submit">Logout</a>
      </div>
	  <?php } else { ?>
		<div class="d-flex">
			<a href="<?php echo base_url();?>auth/login" class="btn btn-outline-primary" type="submit">Login</a>
		</div>
	  <?php } ?>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
	<!-- alert -->
	<?php if(isset($user_error_message) && $user_error_message != "") { ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Whoops!</strong> <?php echo $user_error_message; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php } ?>
	
	
	
    <h1 class="mt-5"><?php echo $page_header; ?></h1>
	  <!-- end header -->