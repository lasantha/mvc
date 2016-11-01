<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php echo $this->msg; ?>
			<div class="row">
				<?php foreach ($this->data as $key => $value):?>
				<div class="col-sm-3">
					<div class="col-xs-12">
						<div class="row">
							<img class="img-responsive" src="<?php echo URL.'uploads/'.$value['product_image']; ?>" />
						</div>
						<div class="row">
							<?php echo CUR.$value['product_price']; ?>
						</div>
						<div class="row">
							<a class="btn btn-default" href="<?php echo URL.'cart/addtocart/'.$value['id']; ?>">Add to Cart</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
	<div class="col-md-3">

	</div>
</div>
</div>