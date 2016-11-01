<?php Session::init(); ?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/default.css">
</head>
<body>
	<div class="site-wrapper">
		<div class="container">
			<div class="row">
				<header>
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="<?php echo URL; ?>">MVC</a>
				    </div>
				    <ul class="nav navbar-nav">
				      <li class="active"><a href="<?php echo URL; ?>">Home</a></li>
				      <li><a href="<?php echo URL; ?>help">Help</a></li>
				      <?php if ( Session::get('loggedIn') ): ?>
				     	<?php if(Session::get('role') == 'admin'): ?>
				      	<li><a href="<?php echo URL; ?>dashboard">Dashboard</a>
				      		<ul class="nav">
				      			<li><a href="<?php echo URL; ?>dashboard/create_product">Add</a></li>
				      		</ul>
				      	</li>
				      	<?php endif; ?> 
				      	<li><a href="<?php echo URL; ?>user/logout">Logout</a></li>	
				      <?php else: ?>
				      <li><a href="<?php echo URL; ?>user/login">Login</a></li>
				  	  <?php endif; ?>
				    </ul>
				  </div>
				</nav>
			</header>
			</div>
		</div>