<?php 
//*********************Imgages CRUD***********************\
include '../../connect/db.php';
if (isset($_POST['contr_email2'])) {
      $contr_email = validate_data($dbc,strip_tags($_POST['contr_email2']));
      $contr_pass = $_POST['contr_pass'];
      $sql = mysqli_query($dbc,"SELECT * FROM contributors WHERE contr_email = '$contr_email' AND contr_pass = '$contr_pass' AND contr_sts = 1");
       $count = mysqli_num_rows($sql);
       if ($count == 1) {
        	$_SESSION['contr_login'] = $contr_email;
        	$msg = "Login Successfully";
        	$sts = "success";
			echo json_encode(array('msg' => $msg, 'sts' => $sts));
       }else{
			$msg = "Invaild Email OR Password OR Your Account is Not Verified";
			$sts = "danger";   
			echo json_encode(array('msg' => $msg, 'sts' => $sts));
       }
}

// UpDate Fetch Teachers Data 
@$fetchcontr = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM contributors WHERE contr_email = '$_SESSION[contr_login]'"));

if(isset($_POST['img_title'])){
	if($_POST['img_id'] != ""){
		if (!empty($_FILES['img_file']['name'])) {
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
				if (update_data($dbc,"images",$data,"img_id",$_POST['img_id'])) {
		        	$msg = "Image Updated Successfully";
		        	$sts = "success";
					echo json_encode(array('msg' => $msg, 'sts' => $sts));
					exit();
				}
			}
		}else{
			$data = [
				'img_title'=> $_POST['img_title'],
				'img_description' => $_POST['img_description'],
				'img_price'=> $_POST['img_price'],
				'cate_id' =>  $_POST['cate_id'],
				'brand_id'=>  $_POST['brand_id'],
				'img_sts'=> 0,
			];
			if (update_data($dbc,"images",$data,"img_id",$_POST['img_id'])) {
		        $msg = "Image Updated Successfully";
		        $sts = "success";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}
		}
    }else{
     	if (!empty($_FILES['img_file']['name'])) {
	     	if (upload_pic($_FILES['img_file'], "../uploads/")) {
			    $data = [
					'img_title'=> $_POST['img_title'],
					'img_description' => $_POST['img_description'],
					'img_price'=> $_POST['img_price'],
					'cate_id' =>  $_POST['cate_id'],
					'brand_id'=>  $_POST['brand_id'],
					'img_file'=> $_SESSION['pic_name'],
					'img_sts'=> 0,
					'contr_id'=>$_POST['contr_id1'],
				];
				if(insert_data($dbc,"images",$data)){
		        	$msg = "Image Added Successfully";
		        	$sts = "success";
					echo json_encode(array('msg' => $msg, 'sts' => $sts));
					exit();
				}
	     	}
     	}else{
     		$data = [
				'img_title'=> $_POST['img_title'],
				'img_description' => $_POST['img_description'],
				'img_price'=> $_POST['img_price'],
				'cate_id' =>  $_POST['cate_id'],
				'brand_id'=>  $_POST['brand_id'],
				'img_sts'=> 0,
				'contr_id'=>$_POST['contr_id1'],
			];
			if(insert_data($dbc,"images",$data)){
		        $msg = "Image Added Successfully";
		        $sts = "success";
				echo json_encode(array('msg' => $msg, 'sts' => $sts));
				exit();
			}
     	}
    }
}
// Registor Contributor
if(isset($_POST['contr_name1'])){
	if ($_SESSION['captcha_code'] == $_POST['captcha']) {
		$contr_otp = rand(100000,999999);
		$email_body = "index.php?verify_user".$contr_otp;
		$data=[
			'contr_name' => $_POST['contr_name1'],
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
			$url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."contributor_verify.php?contr_id=".$id."&contr_code=".$newID;
			$body = "Hi, This is account verification email send by Image Shop "."<a href='".$url."'>Click Here to Verify</a>";
			$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .= "From: Company Name";
			$data1 = [
				'contr_otp' => $newID
			];
			if (update_data($dbc, "contributors", $data1, "contr_id", $id)) {
				if (mail($to_email, $subject, $body, $headers)) {
				    $msg =  "A verification is Sent to your Email $to_email Click URL to Get Verified...";
					$sts = "success";
					echo json_encode(array('msg' => $msg, 'sts' => $sts));
				} else {
					$msg = mysqli_error($dbc);
					$sts = "danger";
					echo json_encode(array('msg' => $msg, 'sts' => $sts));
				}
			}
		}else{
			$msg = mysqli_error($dbc);
			$sts = "danger";
			echo json_encode(array('msg' => $msg, 'sts' => $sts));
		}
	}else{
		$msg = "Captcha Error";
		$sts = "danger";
		echo json_encode(array('msg' => $msg, 'sts' => $sts));
	}
}

// Delete Data 
 if(isset($_POST['deleteid'])){
	$id=$_POST['deleteid'];
	$table=$_POST['tbl2'];
	$fld=$_POST['col2'];
    $previousImage = fetchRecord($dbc, "images", "img_id", $id)['img_file'];
	unlink("../uploads/".$previousImage);
	if (deleteFromTable($dbc,$table,$fld,$id)) {
		$msg = "Deleted ";
		$sts = "info";
		echo json_encode(array('msg' => $msg, 'sts' => $sts));
		exit();
	}
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

if (isset($_POST['contr_name'])){
	$data = [
		'contr_name'=>$_POST['contr_name'],
		'contr_email'=>$_POST['contr_email'],
		'contr_pass'=>$_POST['contr_pass'],
		'contr_name' => $_POST['contr_name'],
		'contr_age' => $_POST['contr_age'],
		'contr_desc' => $_POST['contr_desc'],
	];
	update_data($dbc,"contributors",$data,"contr_id",$_POST['contr_id2']); 
	$msg = "Contributor Updated Successfully";
	$sts = "success";
	echo json_encode(array('msg' => $msg, 'sts' => $sts));
	exit();
}//main..... 