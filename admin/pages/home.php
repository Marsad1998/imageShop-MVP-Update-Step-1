	<form action="" method="POST" role="form">
<div class="row">
	<div class="col-sm-3">
		<div class="card">
			<?php getMessage(@$msg, @$sts, 3000); ?>
			<div class="card-body">
				<p class="card-text">
					<img src="uploads/abc.jpg" style="width: 100%" class="img-responsive" alt="Image">
				</p>
			</div>
			<div class="card-footer">
				<form action="" method="POST" role="form">
				<input type="file" name="adminProfile">
				<input type="text" name="admin_id" class="d-none" value="<?=@$fetchLoginAdmin['admin_id']?>">
				<br><br>
				<button type="submit" class="btn btn-info" name="uploadAdminProfile">Save</button>
				</form>
			</div>
		</div>		
	</div><!-- col -->
		<div class="col-sm-3 offset-1">
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="admin_name" value="<?=$fetchLoginAdmin['admin_name']?>">
				<input type="text" class="d-none" name="admin_name" value="<?=$fetchLoginAdmin['admin_id']?>">
			</div><!--form hruo-->
		    <div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" name="admin_email" value="<?=$fetchLoginAdmin['admin_email']?>">
		    </div>
		    <div class="form-group">
				<label for="">Passowd</label>
				<input type="password" class="form-control" name="admin_pass" value="<?=$fetchLoginAdmin['admin_pass']?>">
		    </div>
			<button class="btn btn-info btn-block" name="update_profile">Update Profile</button>
		</div><!--col-->
	</form>
</div><!-- row -->