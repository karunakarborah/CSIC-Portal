<h1 class=page-header><?php echo "Change Password"; ?></h1></br>



<?php echo form_open('user/changepw'); ?>
    <div class="row">
        <div class="card shadow col-4">
            <div class="card-body">                
				<div class="form-group">
					<label for="current_password">Current Password</label>
					<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Your password">
                </div>
                <div class="form-group">
					<label for="new_password">New Password</label>
					<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Your password">
                </div>
                <div class="form-group">
					<label for="confirm_password">Confirm New Password</label>
					<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Your password">
				</div>
				<div class="form-group d-flex">
					<div class="row">
						<div class="col col-lg-6">
							<a href="<?php echo base_url()?>dashboard"><input type="button" class="btn btn-danger" value="Cancel"></a>					
						</div>
						<div class="col col-lg-6">				
							<input type="submit" class="btn btn-success" value="Change Password">
						</div>
					</div>
				</div>
            </div>
        </div>
		

		<div class="col-4">
			<div class="text-danger">
				<?php echo validation_errors(); if(isset($error)){echo $error;} ?>
			</div>
		</div>
    </div>

<?php echo form_close(); ?>
