<div class="container">
	<div class="row">
		<div class="col-md-9">
			<h1>Dashboard</h1>
			<?php foreach ($this->msg as $key => $value):?>
			<div class="row">
				<div class="col-sm-2"><img class="img-responsive" src="<?php echo URL.'uploads/'.$value['product_image']; ?>" /></div>
				<div class="col-sm-2"><?php echo $value['product_name']; ?></div>
				<div class="col-sm-5"><?php echo $value['product_description']; ?></div>
				<div class="col-sm-2"><?php echo CUR.$value['product_price']; ?></div>
				<div class="col-sm-1"><a class="btn btn-default" href="<?php echo URL.'dashboard/edit/'.$value['id']; ?>">Edit</a></div>
			</div>
			<hr>
			<?php endforeach; ?>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>