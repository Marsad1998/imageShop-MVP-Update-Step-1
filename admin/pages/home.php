<?php 
@$fetchadmin = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM admins WHERE admin_email = '$_SESSION[admin_login]'"));
// print_r($fetchadmin);
 ?>
	<div class="row">
		<div class="col-sm-3">
			<div class="card">
				<div class="card-body">
					<p class="card-text">
					<form action="" method="POST" enctype="multipart/form-data" id="formData1">
					  <input type='file' name="uploadPic" id="uploadPic" onchange="readURL(this);" style="display: none;">
					  <?php 
					  	if ($fetchadmin['admin_img'] == "") {
					  		$a = "default.jpg";
					  	}else{
					  		$a = $fetchadmin['admin_img'];
					  	}
					  ?>
	                  <img id="blah" src="uploads/<?=$a?>" class="img-responsive" style="width: 100%" alt="No Image Uploaded Yet Click here to Upload">
					</p>
				</div>
				<div class="card-footer">
					<?php 
						$email = $_SESSION['admin_login']; 
						$query = getWhere($dbc,"admins","admin_email",$email);
						$row = mysqli_fetch_assoc($query);
					?>
					<input name="admin_id2" type="text" class="d-none" value="<?=$row['admin_id']?>">
					<button type="submit" class="btn btn-success" id="saveData1">Update Image</button>
					</form>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<p class="card-text">
						<form action="" method="POST" enctype="multipart/form-data" id="formData">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control" name="admin_name" value="<?=$fetchadmin['admin_name']?>">
								<input type="text" class="d-none" name="admin_id" value="<?=$fetchadmin['admin_id']?>">
							</div><!--form hruo-->
						    <div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="admin_email" value="<?=$fetchadmin['admin_email']?>">
						    </div>
						    <div class="form-group">
								<label for="">Passowd</label>
								<input type="password" class="form-control" name="admin_pass" value="<?=$fetchadmin['admin_pass']?>">
						    </div>
					</p>
				</div>
				<div class="card-footer">
							<button class="btn btn-info btn-block" id="saveData">Update Profile</button>
						</form>
				</div>
			</div>
		</div><!-- olc -->
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-4">
					<div class="alert alert-info">
						<strong>Total Orders</strong> <span class="badge badge-secondary float-right"><?=countAll($dbc, "orders", "order_id") ?></span>
					</div>
				</div><!-- col -->
				<div class="col-sm-4">
					<div class="alert alert-info">
						<strong>Total Contributors</strong> <span class="badge badge-secondary float-right"><?=countAll($dbc, "contributors", "order_id") ?></span>
					</div>
				</div><!-- col -->
				<div class="col-sm-4">
					<div class="alert alert-info">
						<strong>Total Stock</strong> <span class="badge badge-secondary float-right"><?=countAll($dbc, "images", "order_id") ?></span>
					</div>
				</div><!-- col -->
			</div><!-- row -->
		</div>
	</div><!-- row -->