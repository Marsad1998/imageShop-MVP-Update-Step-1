<form action="" method="POST" enctype="multipart/form-data">
	<?php getMessage(@$msg, @$sts, 3000) ?>
   <div class="row">
		<div class="col-sm-3">
			<div class="card">
			<div class="card-body">
				<p class="card-text">
					<img style="width: 100%" src="uploads/<?=@$fetchLoginContributor['contr_img']?>">
				</p>
			</div>
			<div class="card-footer">
				<form action="" method="POST" role="form">
				<input type="file" class="" name="contr_img">
				<input name="contr_id" type="text" readonly="" class="form-control d-none" value="<?=$fetchLoginContributor['contr_id']?>">
				<br><br>
				<button class="btn btn-success" name="upload_contr">Update Image</button>
				</form>
			</div>
		</div>
		</div><!--col-sm-3-->
		<!-- <form action="" method="POST" role="form"> -->
		<div class="col-sm-3 offset-1">
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" name="contr_name" value="<?=$fetchLoginContributor['contr_name']?>">
			</div><!--form hruo-->
		    <div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" name="contr_email" value="<?=$fetchLoginContributor['contr_email']?>">
		    </div>
		    <div class="form-group">
				<label for="">Passowd</label>
				<input type="password" class="form-control" name="contr_pass" value="<?=$fetchLoginContributor['contr_pass']?>">
		    </div>
		  	<div class="form-group">
				<label for="">Location</label>
				<?= countrySelector($fetchLoginContributor['contr_country'],"","contr_country","form-control"); ?>
		   	</div>
		</div><!--col-->
		<div class="col-sm-3 offset-1">
			<div class="form-group">
				<label for="">Age</label>
				<input type="number" class="form-control" name="contr_age" value="<?=$fetchLoginContributor['contr_age']?>">
			</div><!--form hruo-->
		    <div class="form-group">
				<label for="">Description</label>
				<textarea name="contr_desc" class="form-control" rows="6" placeholder="Write in Detail About Yourself" required="required"><?=$fetchLoginContributor['contr_desc']?></textarea>
	        </div>
			<button class="btn btn-info btn-block" name="update_profile">Update Profile</button>
		</div><!--col-->
		<!-- </form> -->
</div><!--row-->
</form>