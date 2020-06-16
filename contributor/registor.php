<?php include_once '../connect/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'links/head.php'; ?>
</head>
<body>
	<br><br><br>
	<div class="container">
		<span class="msg" class="alert"></span>
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 jumbotron">
			<legend class="text-center">Singup CMS</legend>
			<form action="" method="POST" id="formData" role="form">
				<div class="form-group">
					<label for="" class="control-label">Name</label>
					<input type="text" class="form-control" name="contr_name1" required="">
				</div><!--form groupp-->
				<div class="form-group">
					<label for="" class="control-label">Email</label>
					<input type="email" class="form-control" name="contr_email" required="">
				</div><!--form groupp-->
				<div class="form-group">
					<label for="" class="control-label">Passwoard</label>
					<input type="password" class="form-control" name="contr_pass" required="">
				</div><!--form group-->
				<div class="form-group">
				  <label for="" class="control-label">Get Code*</label>
						<div class="row">
							<div class="col-md-3">
								<label for=""><img src="capture.php"></label>
							</div>
							<div class="col-md-9">
								<input type="text" placeholder="Confirm You're not a bot" name="captcha" autocomplete="off" required="" class="form-control">
							</div>
						</div>
				</div>
				<div class="form-group">
				<input type="submit" name="contr_registor" id="saveData" value="Registor" class="btn btn-primary pull-right btn-block">
			   </div>
			</form><!--FORM-->
		</div><!--col-sm-4-->
		<div class="col-ms-4"></div>
		</div>
	</div><!---conatonet-->
	<?php include_once 'links/foot.php'; ?>
</body>
</html>