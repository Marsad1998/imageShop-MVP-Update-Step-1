<?php 
//*********************Imgages CRUD***********************\\
if(isset($_REQUEST['image_data'])){
    if(upload_pic($_FILES['img_file'], "uploads/")){
	$data = [
		'img_title'=> $_REQUEST['img_title'],
		'img_description' => $_REQUEST['img_description'],
		'img_price'=> $_REQUEST['img_price'],
		'cate_id' =>  $_REQUEST['cate_id'],
		'brand_id'=>  $_REQUEST['brand_id'],
		'img_sts' => $_REQUEST['img_sts'],
		'img_file'=>$pic,
		'contr_id'=>$_REQUEST['contr_id'],
	];
	if($_REQUEST['img_id'] != ""){
		$fetchImg = fetchRecord($dbc,"images","img_id",$_REQUEST['img_id'])['img_file'];
		unlink("uploads/".$fetchImg);
			$q=update_data($dbc,"images",$data,"img_id",$_REQUEST['img_id']);
			if($q){
			 $msg="Images Data Update successfully";
			 $sts="Success";
			}else{
			 $msg=mysqli_error($dbc);
			 $sts="danger";
			}
	 }else{
		 $q=insert_data($dbc, "images", $data);
		 if($q){
		  $msg="Images Data Inserted Successfully";
		  $sts="success";
		}else{
		 $msg=mysqli_error($dbc);
		 $sts="danger";
		} 
      }
    }else{
    	$msg="Img Requrid";
    	$sts="danger";
    }
}
// Login Contibutor
if(isset($_REQUEST['contr_login'])){
	$contr_email = validate_data($dbc,strip_tags($_REQUEST['contr_email']));
	$contr_pass = $_REQUEST['contr_pass'];
	$sql = mysqli_query($dbc,"SELECT * FROM contributors WHERE contr_email = '$contr_email' AND contr_pass = '$contr_pass' AND contr_sts = '1'");
	$count = mysqli_num_rows($sql);
	if ($count == 1) {
		$_SESSION['contr_login'] = $contr_email;
		$msg = "Login Successfully";
		$sts = "success";
	}else{
		$msg = "Invaild Email and Password";
		$sts = "danger"; 	
	}
}// Login Contibutor Close
//Signup Contibutor
if(isset($_REQUEST["contr_registor"])){
	// require "capture.php";
	if ($_SESSION['captcha_code'] == $_REQUEST['captcha']) {
		$contr_otp = rand(100000,999999);
		$email_body = "index.php?verify_user".$contr_otp;
	 	$data=[
	  	'contr_name' => $_REQUEST['contr_name'],
	  	'contr_email' => $_REQUEST['contr_email'],
	  	'contr_pass' => $_REQUEST['contr_pass'],
	  	'contr_otp' => $contr_otp
		];
		if(insert_data($dbc,"contributors",$data)){
			$id = mysqli_insert_id($dbc);
			$to_email = $_REQUEST['contr_email'];
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
function check_captcha_code($input, $captcha_code) {
    if($input == $captcha_code)
    	return true;
    return false;
}
// Image Edit
if (!empty($_REQUEST['edit_img_id'])) {
	$edit_id = $_REQUEST['edit_img_id'];
	$fetchImages = fetchRecord($dbc, "images", "img_id", $edit_id);
	$imageBtn = '<button type="submit" name="image_data" class="btn btn-warning">Update</button>';
}else{
	$imageBtn = '<button type="submit" name="image_data" class="btn btn-primary">Save</button>';
}
//upload img
if(isset($_REQUEST['upload_contr'])){
    if(upload_pic($_FILES['contr_img'], "uploads/")){
		$data = [
		 'contr_img'=>$pic,
		];
		if($_REQUEST['contr_id'] != ""){
			$fetchImg = fetchRecord($dbc,"contributors","contr_id",$_REQUEST['contr_id'])['contr_img'];
			 unlink("uploads/".$fetchImg);
				$q=update_data($dbc,"contributors",$data,"contr_id",$_REQUEST['contr_id']);
				if($q){
				 $msg="Images Data Update successfully";
				 $sts="Success";
				}else{
				 $msg=mysqli_error($dbc);
				 $sts="danger";
				}
		}
    }else{
      $msg="Img Requrid";
      $sts="danger";
    }
}
// Update Profile
if (isset($_REQUEST['update_profile'])){
	$data = [
	'contr_name'=>$_REQUEST['contr_name'],
	'contr_email'=>$_REQUEST['contr_email'],
	'contr_pass'=>$_REQUEST['contr_pass'],
	'contr_id'=>$_REQUEST['contr_id'],
	'contr_country'=> validate_data($dbc, $_REQUEST['contr_country']),
	'contr_age'=> validate_data($dbc, $_REQUEST['contr_age']),
	'contr_desc'=> validate_data($dbc, $_REQUEST['contr_desc']),
	];
	$q = update_data($dbc,"contributors",$data,"contr_id",$_REQUEST['contr_id']);
	if($q){
	  $msg="Profile successfully Update";
	  $sts="Success";
	}else{
		$msg=mysqli_error($dbc);
		$sts="danger";
	}
}
@$fetchLoginContributor = fetchRecord($dbc, "contributors", "contr_email", $_SESSION['contr_login']);
?>
