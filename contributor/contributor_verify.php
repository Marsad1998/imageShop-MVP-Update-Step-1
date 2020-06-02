<?php include_once '../connect/db.php'; ?>
<?php include_once 'inc/code.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'links/head.php'; ?>
</head>
<body>
	<?php 
		echo $idFromemail = $_GET['contr_code']."<br>";
		echo $idcontr = $_GET['contr_id']."<br>";
		echo $id = fetchRecord($dbc, "contributors", "contr_id", $idcontr)['contr_otp']."<br>";
		if ($id === $idFromemail) {
			$data = [
				'contr_sts' => '1'
			];
			if (update_data($dbc, "contributors", $data, "contr_id", $idcontr)) {
				$msg = "Contributors Email Verfied Successfully";
				$sts = "success";
				$contr_email = fetchRecord($dbc, "contributors", "contr_id", $idcontr)['contr_email'];
				$_SESSION['contr_login'] = $contr_email;
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