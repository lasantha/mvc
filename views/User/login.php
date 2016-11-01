<div class="container">
	<div class="row">
		<div class="col-md-push-3 col-md-6">
			<form role="form" class="form-horizontal" action="<?php echo URL;?>user/run" method="POST">
				<div class="form-group">
					<div class="row">
						<label class="col-sm-2 control-label" for="user_name">Login</label>
						<div class="col-sm-10">
							<input type="text" name="user_name" required/>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 control-label" for="user_password">Password</label>
						<div class="col-sm-10">
							<input type="password" name="user_password" required/>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-push-2 col-sm-10">
							<input type="reset" name="reset" class="btn btn-default" value="Reset" />
							<input type="submit" name="submit" class="btn btn-default" value="Login" />
						</div>
					</div>
					<div class="row">
						<div class="col-xs-push-2 col-xs-10">
							<a href="<?php echo URL;?>user/register">Register Now</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
