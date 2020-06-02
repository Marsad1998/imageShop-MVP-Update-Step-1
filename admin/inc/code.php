<?php 

//*********************Categories CRUD***********************\\
//Add / Update Categories
if (isset($_REQUEST['cate_subByAdmin'])) {
	if ($_REQUEST['cate_id'] == "") {
		$data = [
			'cate_name' => $_REQUEST['cate_name'],
			'cate_sts' => $_REQUEST['cate_sts']
		];
		$q = insert_data($dbc, "categories", $data);
		if ($q) {
			$msg = "Categories Inserted Successfully";
			$sts = "success";
			redirect("index.php?nav=add_categories", 2000);
		}else{
			$msg = mysqli_error($dbc);
			$sts = "danger";
		}
	}else{
		$data = [
			'cate_id' => $_REQUEST['cate_id'],
			'cate_name' => $_REQUEST['cate_name'],
			'cate_sts' => $_REQUEST['cate_sts']
		];
		$q = update_data($dbc, 'categories', $data, "cate_id", $_REQUEST['cate_id']);
		if ($q) {
			$msg = "Categories Updated Successfully";
			$sts = "info";
			redirect("index.php?nav=add_categories", 2000);
		}else{
			$msg = mysqli_error($dbc);
			$sts = "danger";
		}
	}
}

//Edit Categories
if (!empty($_REQUEST['edit_cate_id'])) {
	$edit_id = $_REQUEST['edit_cate_id'];
	$fetchCate = fetchRecord($dbc, "categories", "cate_id", $edit_id);
	$cateBtn = '<button type="submit" name="cate_subByAdmin" class="btn btn-warning">Update</button>';
}else{
	$cateBtn = '<button type="submit" name="cate_subByAdmin" class="btn btn-primary">Save</button>';
}

//Del Categories
if (!empty($_REQUEST['del_cate_id'])) {
	$edit_id = $_REQUEST['del_cate_id'];
	$q = deleteFromTable($dbc, "categories", "cate_id", $edit_id);
	redirect("index.php?nav=add_categories", 500);
}

//********************************************************* Brand CRUD *************************************************\\

//Add / Update Brands
if (isset($_REQUEST['sub_cate_subByAdmin'])) {
	if ($_REQUEST['brand_id'] == "") {
		$data = [
			'brand_name' => $_REQUEST['brand_name'],
			'brand_sts' => $_REQUEST['brand_sts']
		];
		$q = insert_data($dbc, "brands", $data);
		if ($q) {
			$msg = "Brands Inserted Successfully";
			$sts = "success";
			redirect("index.php?nav=brands", 2000);
		}else{
			$msg = mysqli_error($dbc);
			$sts = "danger";
		}
	}else{
		$data = [
			'brand_id' => $_REQUEST['brand_id'],
			'brand_name' => $_REQUEST['brand_name'],
			'brand_sts' => $_REQUEST['brand_sts']
		];
		$q = update_data($dbc, "brands", $data, "brand_id", $_REQUEST['brand_id']);
		if ($q) {
			$msg = "Brands Updated Successfully";
			$sts = "info";
			redirect("index.php?nav=brands", 2000);
		}else{
			$msg = mysqli_error($dbc);
			$sts = "danger";
		}
	}
}

//Edit Brand
if (!empty($_REQUEST['edit_brand_id'])) {
	$edit_id = $_REQUEST['edit_brand_id'];
	$fetchBrand = fetchRecord($dbc, "brands", "brand_id", $edit_id);
	$brandBtn = '<button type="submit" name="sub_cate_subByAdmin" class="btn btn-warning">Update</button>';
}else{
	$brandBtn = '<button type="submit" name="sub_cate_subByAdmin" class="btn btn-primary">Save</button>';
}

//Del Brand
if (!empty($_REQUEST['del_brand_id'])) {
	$edit_id = $_REQUEST['del_brand_id'];
	$q = deleteFromTable($dbc, "brands", "brand_id", $edit_id);
	redirect("index.php?nav=brands", 500);
}

//********************************************************* Admin CRUD *************************************************\\

// Login Admin
if(isset($_REQUEST['admin_login'])){
	$admin_email = validate_data($dbc,strip_tags($_REQUEST['admin_email']));
	$admin_pass = $_REQUEST['admin_pass'];
	$sql = mysqli_query($dbc,"SELECT * FROM admins WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass' AND admin_sts = '1'");
	$count = mysqli_num_rows($sql);
	if ($count == 1) {
		$_SESSION['admin_login'] = $admin_email;
		$msg = "Login Successfully";
		$sts = "success";
	}else{
		$msg = "There may be Folowing Errors Invaild Email or Password or Account Not Verified Yet!";
		$sts = "danger"; 	
	}
}// Login ADmin Close

//Signup Admin
if(isset($_REQUEST["admin_registor"])){
	// require "capture.php";
	if ($_SESSION['captcha_code'] == $_REQUEST['captcha']) {
		// $admin_otp = rand(100000,999999);
	 	$data=[
	  	'admin_name' => $_REQUEST['admin_name'],
	  	'admin_email' => $_REQUEST['admin_email'],
	  	'admin_pass' => $_REQUEST['admin_pass'],
	  	'admin_sts' => '0'
		];
		if(insert_data($dbc,"admins",$data)){
			$id = mysqli_insert_id($dbc);
			$to_email = $_REQUEST['admin_email'];
			$subject = "Verification Email";
			$newID = md5($id);
			$_SESSION['verify_admin_email'] = $newID;
			$url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_verify.php?admin_id=".$id."&verify_code=".$newID;
			$body = "Hi, This is account verification email send by Image Shop "."<a href='".$url."'>Click Here to Verify</a>";
			$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "From: Company Name";
			$data1 = [
				'admin_otp' => $newID
			];
			if (update_data($dbc, "admins", $data1, "admin_id", $id)) {
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
//********************************************************* Admin Images CRUD ********************************************************\\
if(isset($_REQUEST['image_data'])){
	// $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
 //    $filename = $_FILES["img_file"]["name"];
 //    $filetype = $_FILES["img_file"]["type"];
 //    $filesize = $_FILES["img_file"]["size"];
    // Verify file extension
    // $ext = pathinfo($filename, PATHINFO_EXTENSION);
    // $newName = uniqid(rand()).".".$ext;
    if(upload_pic($_FILES['img_file'], "uploads/")){
	    // move_uploaded_file($_FILES["img_file"]["tmp_name"], "uploads/" . $newName);
		$data = [
		 'img_title'=> $_REQUEST['img_title'],
		 'img_description' => $_REQUEST['img_description'],
		 'img_price'=> $_REQUEST['img_price'],
		 'cate_id' =>  $_REQUEST['cate_id'],
		 'brand_id'=>  $_REQUEST['brand_id'],
		 'img_sts' => $_REQUEST['img_sts'],
		 'img_file'=>$pic,
		 'admin_id'=>$_REQUEST['admin_id']
		];
		if ($_REQUEST['img_id'] != "") {
			$imgFetched = fetchRecord($dbc, "images", "img_id", $_REQUEST['img_id'])['img_file'];
			unlink("uploads/".$imgFetched);
			$q = update_data($dbc, "images", $data, "img_id", $_REQUEST['img_id']);
			if($q){
			  $msg = "Images Data Updated Successfully";
			  $sts = "success";
			}else{
			 $msg = mysqli_error($dbc);
			 $sts = "danger";
		    }
		}else{
			$q=insert_data($dbc, "images", $data);
			if($q){
			  $msg = "Images Data Inserted Successfully";
			  $sts = "success";
			}else{
			 $msg = mysqli_error($dbc);
			 $sts = "danger";
		    }
		}
    }else{
		  $msg = "Images File is Required";
		  $sts = "danger";
    }
}
//Del Images
if (!empty($_REQUEST['del_img_id'])) {
	$delete_id = $_REQUEST['del_img_id'];
	$q = deleteFromTable($dbc, "images", "img_id", $delete_id);
	redirect("index.php?nav=add_images", 500);
}

//Edit Brand
if (!empty($_REQUEST['edit_img_id'])) {
	$edit_id = $_REQUEST['edit_img_id'];
	$fetchImages = fetchRecord($dbc, "images", "img_id", $edit_id);
	$imageBtn = '<button type="submit" name="image_data" class="btn btn-warning">Update</button>';
}else{
	$imageBtn = '<button type="submit" name="image_data" class="btn btn-primary">Save</button>';
}

// Update Profile
if (isset($_REQUEST['update_profile'])){
	$data = [
	'admin_name'=>$_REQUEST['admin_name'],
	'admin_email'=>$_REQUEST['admin_email'],
	'admin_pass'=>$_REQUEST['admin_pass'],
	];
	$q = update_data($dbc,"admins",$data,"admin_id",$_REQUEST['admin_id']);
	if($q){
	  $msg="Profile successfully Update";
	  $sts="Success";
	}else{
		$msg=mysqli_error($dbc);
		$sts="danger";
	}
}

//********************************************************* Fetch User ********************************************************\\
@$fetchLoginAdmin = fetchRecord($dbc, "admins", "admin_email", $_SESSION['admin_login']);

?>