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
				    <div class="navbar-header">
				    	<ul>
					     <?php 
					     	$cart = Session::get('cart'); 
					     	$total = 0;
					     	if ($cart) {
					     		foreach ($cart["cart"]["items"]["item_id"] as $key => $value) {
					     		?>
					     			<li style="list-style:none;">
					     				<div class="col-xs-12">
					     					<div class="row">
					     						<div class="col-xs-2">
					     							<img src="<?php echo URL.'uploads/'.$cart["cart"]["items"]["item_image"][$key] ?>" class="img-responsive" style="height:25px;width:25px;"/>
												</div>
												<div class="col-xs-2">
													<?php echo $cart["cart"]["items"]["item_name"][$key ]; ?>
												</div>
												<div class="col-xs-8 text-right">
							     					<?php
							     					   echo $cart["cart"]["items"]["item_qty"][$key ].' X '.CUR.$cart["cart"]["items"]["item_price"][$key] / $cart["cart"]["items"]["item_qty"][$key ]; 
							     					   echo ' '.CUR.number_format($cart["cart"]["items"]["item_price"][$key],2); 
							     						
							     						$total += $cart["cart"]["items"]["item_price"][$key ];
							     					?>
							     				</div>
						     				</div>
						     				
					     				</div>
					     				
					     			</li>
					     		<?php
					     		}
					     	}
					     ?>
					     <li style="list-style:none;">
					     	<div class="col-xs-12">
						     	<div class="row">
			     					<div class="col-xs-push-6 col-xs-6 text-right">
				     					<?php echo CUR.number_format($total,2); ?>
				     				</div>
							    </div>
						    </div>
					     </li>
					     </ul>
				    </div>
				    
				  </div>
				</nav>
			</header>
			</div>
		</div>