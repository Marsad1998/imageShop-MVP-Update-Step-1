<?php include_once '../connect/db.php'; ?>
<?php include_once 'inc/code.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'links/head.php'; ?>
</head>
<body>
	<?php 
		$idFromemail = $_GET['verify_code']."<br>";
		$idAdmin = $_GET['admin_id']."<br>";
		$admin_otp = fetchRecord($dbc, "admins", "admin_id", $idAdmin)['admin_otp'];
		$id = $admin_otp."<br>";
		if ($id === $idFromemail) {
			$data = [
				'admin_sts' => '1'
			];
			if (update_data($dbc, "admins", $data, "admin_id", $idAdmin)) {
				$msg = "Admin Email Verfied Successfully";
				$sts = "success";
				$admin_email = fetchRecord($dbc, "admins", "admin_id", $idAdmin)['admin_email'];
				$_SESSION['admin_login'] = $admin_email;
				redirect("index.php", 3000);
			}else{
				$msg = mysqli_error($dbc);
				$sts = "danger";
			}
		}
	?>
	<?php include_once 'links/foot.php'; ?>
</body>
</html>