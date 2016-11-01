<div class="container">
	<div class="row">
		<div class="col-md-push-3 col-md-6">
			<div><?php echo @$_GET['msg']; ?></div>
			<form role="form" class="form-horizontal" action="<?php echo URL;?>dashboard/edit_product/<?php echo $this->data['id']; ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="row">
						<label class="col-sm-2 control-label" for="product_name">Name</label>
						<div class="col-sm-10">
							<input type="text" name="product_name" value="<?php echo $this->data['product_name']; ?>" required/>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 control-label" for="product_description">Description</label>
						<div class="col-sm-10">
							<textarea name="product_description" required><?php echo $this->data['product_description']; ?></textarea>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 control-label" for="product_price">Price</label>
						<div class="col-sm-10">
							<input type="text" name="product_price" value="<?php echo $this->data['product_price']; ?>" required/>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 control-label" for="product_image">Image</label>
						<div class="col-sm-10">
							<input type="file" name="product_image"/>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-push-2 col-sm-10">
							<input type="reset" name="reset" class="btn btn-default" value="Reset" />
							<input type="submit" name="submit" class="btn btn-default" value="Submit" />
						</div>
					</div>
					<div class="row">
						<div class="col-xs-push-2 col-xs-10">
							<a href="<?php echo URL;?>user/login">Login Here</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
