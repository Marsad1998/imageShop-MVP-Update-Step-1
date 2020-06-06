<?php 
//*********************Imgages CRUD***********************\
include '../../connect/db.php';
if(isset($_POST['imagesData'])=="images"){
	if($_POST['img_id'] != ""){
		if (upload_pic($_FILES['img_file'], "../uploads/")) {
		$data = [
			'img_title'=> $_POST['img_title'],
			'img_description' => $_POST['img_description'],
			'img_price'=> $_POST['img_price'],
			'img_file'=> $_SESSION['pic_name'],
			'cate_id' =>  $_POST['cate_id'],
			'brand_id'=>  $_POST['brand_id'],
			'img_sts'=> 0,
		];
			$previousImage = fetchRecord($dbc, "images", "img_id", $_POST['img_id'])['img_file'];
			unlink("../uploads/".$previousImage);
			update_data($dbc,"images",$data,"img_id",$_POST['img_id']);
			exit();
		}
     }
     else{
     	if (upload_pic($_FILES['img_file'], "../uploads/")) {
		    $data = [
				'img_title'=> $_POST['img_title'],
				'img_description' => $_POST['img_description'],
				'img_price'=> $_POST['img_price'],
				'cate_id' =>  $_POST['cate_id'],
				'brand_id'=>  $_POST['brand_id'],
				'img_file'=> $_SESSION['pic_name'],
				'img_sts'=> 0,
				'contr_id'=>$_POST['contr_id'],
			];
			insert_data($dbc,"images",$data);
			exit();
     	}
  }
}
// Registor Contributor
if(isset($_POST['registorData']) =="contributors"){
	if ($_POST['captcha'] == $_SESSION["captcha_code"]) {
		if ($_SESSION['captcha_code'] == $_POST['captcha']) {
		$contr_otp = rand(100000,999999);
		$email_body = "index.php?verify_user".$contr_otp;
	 	$data=[
		  	'contr_name' => $_POST['contr_name'],
		  	'contr_email' => $_POST['contr_email'],
		  	'contr_pass' => $_POST['contr_pass'],
		  	'contr_otp' => $contr_otp
		];
		if(insert_data($dbc,"contributors",$data)){
			$id = mysqli_insert_id($dbc);
			$to_email = $_POST['contr_email'];
			$subject = "Verification Email";
			$newID = md5($id);
			$_SESSION['verify_contributor_email'] = $newID;
			$url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/contributor_verify.php?contr_id=".$id."&contr_code=".$newID;
			$body = "Hi, This is account verification email send by Image Shop "."<a href='".$url."'>Click Here to Verify</a>";
			$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "From: Company Name";
			$data1 = [
				'contr_otp' => $newID
			];
			if (update_data($dbc, "contributors", $data1, "contr_id", $id)) {
				if (mail($to_email, $subject, $body, $headers)) {
				    $msg =  "A verification is Sent to your Email $to_email Click URL to Get Verified...";
					$sts = "danger";
				} else {
					$msg = mysqli_error($dbc);
					$sts = "danger";
				}
			}
		}else{
			$msg = mysqli_error($dbc);
			$sts = "danger";
		}
	}else{
		$msg = "Capture Error! Not Matched Try Again";
		$sts = "danger";
	}
	}
	exit();
}
// Delete Data 
 if(isset($_POST['deleteid'])){
	$id=$_POST['deleteid'];
	$table=$_POST['tbl2'];
	$fld=$_POST['col2'];
    $previousImage = fetchRecord($dbc, "images", "img_id", $id)['img_file'];
	unlink("../uploads/".$previousImage);
	deleteFromTable($dbc,$table,$fld,$id);
	exit();
}
// Edit Pururse data
//Getting Data For Edit Pupose
if (isset($_POST['edit_id']) && isset($_POST['edit_id']) != ""){
	$id = $_POST['edit_id'];
	$table = $_POST['tbl1'];
	$fld = $_POST['col1'];
	$q = mysqli_query($dbc,"SELECT * FROM $table WHERE $fld = '$id'");
	$response = array();
	while($r = mysqli_fetch_assoc($q)){
	$response = $r;
	echo json_encode($response);
	exit();
	}
}
//Update Profile
if (isset($_POST['contr_id'])) {
	if (upload_pic($_FILES['uploadPic'], "../uploads/")) {
    	$previousImage = fetchRecord($dbc, "contributors", "contr_id", $_POST['contr_id'])['contr_img'];
		$data = [
			'contr_img' => $_SESSION['pic_name'],
		];
		update_data($dbc, "contributors", $data, "contr_id", $_POST['contr_id']);
		unlink("../uploads/".$previousImage);
		exit();
	}
}

if (isset($_REQUEST['contr_name'])){
	$data = [
		'contr_name'=>$_REQUEST['contr_name'],
		'contr_email'=>$_REQUEST['contr_email'],
		'contr_pass'=>$_REQUEST['contr_pass'],
		'contr_name' => $_REQUEST['contr_name'],
		'contr_age' => $_REQUEST['contr_age'],
		'contr_desc' => $_REQUEST['contr_desc'],
	];
	update_data($dbc,"contributors",$data,"contr_id",$_POST['contr_id2']); 
	exit();
}//main..... 