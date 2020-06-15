<?php 
$fetchcontr = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM contributors WHERE contr_email = '$_SESSION[contr_login]'"));
?>
	<span class="msg"></span>
   <div class="row">
		<div class="col-sm-3">
			<div class="card">
			<div class="card-body">
				<p class="card-text">
				<form action="" method="POST" enctype="multipart/form-data" id="formData1">
				  <input type='file' name="uploadPic" id="uploadPic" onchange="readURL(this);" style="display: none;">
				  <?php 
				  	if ($fetchcontr['contr_img'] == "") {
				  		$a = "default.png";
				  	}else{
				  		$a = $fetchcontr['contr_img'];
				  	}
				  ?>
                  <img id="blah" src="uploads/<?=$a?>" class="img-responsive" style="width: 100%" alt="Invalid Image Type Click To Change">
				</p>
			</div>
			<div class="card-footer">
				<?php 
					$email = $_SESSION['contr_login']; 
					$query = getWhere($dbc,"contributors","contr_email",$email);
					$row = mysqli_fetch_assoc($query);
				?>
				<input name="contr_id" hidden type="text"  class="form-control" value="<?=$row['contr_id']?>">
				<button class="btn btn-success" name="upload_contr" type="submit" id="saveData">Update Image</button>
				</form>
			</div>
		</div>
		</div><!--col-sm-3-->
			<div class="col-sm-3 offset-1">
		<form action="" method="POST" role="form" id="formData">
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" class="form-control" name="contr_name" value="<?=$fetchcontr['contr_name']?>">
					<input class="d-none" id="contr_id2" name="contr_id2" value="<?=$fetchcontr['contr_id']?>">
				</div><!--form hruo-->
			    <div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" name="contr_email" readonly value="<?=$fetchcontr['contr_email']?>">
			    </div>
			    <div class="form-group">
					<label for="">Passowd</label>
					<input type="password" class="form-control" name="contr_pass" value="<?=$fetchcontr['contr_pass']?>">
			    </div>
			  	<div class="form-group">
					<label for="">Location</label>
					<?= countrySelector($fetchcontr['contr_country'],"","contr_country","form-control"); ?>
			   	</div>
			   	<!-- <div class="form-group"> -->
			   		<!-- <label for="">ID</label> -->
			   	<!-- </div> -->
			</div><!--col-->
			<div class="col-sm-3 offset-1">
				<div class="form-group">
					<label for="">Age</label>
					<input type="number" class="form-control" name="contr_age" value="<?=$fetchcontr['contr_age']?>">
				</div>
			    <div class="form-group">
					<label for="">Description</label>
					<textarea name="contr_desc" class="form-control" rows="6" placeholder="Write in Detail About Yourself" required="required"><?=$fetchcontr['contr_desc']?></textarea>
		        </div>
				<button type="submit" class="btn btn-info btn-block" id="saveData">Update Profile</button>
		</form>
			</div>
</div><!--row-->