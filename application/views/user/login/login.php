<div class="container" >
	<div class="row">
		
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login</h1>
			</div>
			<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				</div>
			<?php endif; ?>
			
			<div class = "container col-lg-5 col-md-6 border rounded padding shadow">
			<?= form_open() ?>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Your email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Your password">
				</div>
				<div class="form-group">
					<center><input type="submit" class="btn btn-success col-lg-3" value="Login"></center>
				</div>
			</form>
			</div>
		</div>
	</div><!-- .row -->
</div><!-- .container -->