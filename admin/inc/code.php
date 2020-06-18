<?php 
//*********************Categories CRUD***********************\\
include '../../connect/db.php';
if (isset($_POST['admin_email1'])) {
      $admin_email = validate_data($dbc,strip_tags($_POST['admin_email1']));
      $admin_pass = $_POST['admin_pass'];
      $sql = mysqli_query($dbc,"SELECT * FROM admins WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass' AND admin_sts = 1");
       $count = mysqli_num_rows($sql);
       if ($count == 1) {
        $_SESSION['admin_login'] = $admin_email;
        $msg = "Login Successfully";
        $sts = "success";
        echo json_encode(array('msg' => $msg, 'sts' => $sts));
       }else{
          $msg = "Invaild Email OR Password OR May Be Your Account is Not Verified Yet";
          $sts = "danger";   
          echo json_encode(array('msg' => $msg, 'sts' => $sts));
       }
}

// UpDate Fetch Teachers Data 
if(isset($_POST['cateData'])=="categories"){
  if($_POST['cate_id'] != ""){
	 $data = [
	 'cate_name'=> $_POST['cate_name'],
	 'cate_sts' => $_POST['cate_sts'],
	  ];
	  if (update_data($dbc,"categories",$data,"cate_id",$_POST['cate_id'])) {
      $msg = "Category Updated Successfully";
      $sts = "success";   
      echo json_encode(array('msg' => $msg, 'sts' => $sts));
      exit();
    }
  }else{
  $data = [
	 'cate_name'=> $_POST['cate_name'],
	 'cate_sts' => $_POST['cate_sts'],
	];
  if (insert_data($dbc,"categories",$data)) {	
    $msg = "Category Inserted Successfully";
    $sts = "success";   
    echo json_encode(array('msg' => $msg, 'sts' => $sts));
  exit();
  }
  }
}
if(isset($_POST['brandData'])=="brands"){
  if($_POST['brand_id'] != ""){
   $data = [
   'brand_name'=> $_POST['brand_name'],
   'brand_sts' => $_POST['brand_sts'],
    ];
    if (update_data($dbc,"brands",$data,"brand_id",$_POST['brand_id'])) {
      $msg = "Brands Updated Successfully";
      $sts = "success";   
      echo json_encode(array('msg' => $msg, 'sts' => $sts));
    }
  }
  else{
   $data = [
     'brand_name'=> $_POST['brand_name'],
     'brand_sts' => $_POST['brand_sts'],
    ];
    if (insert_data($dbc,"brands",$data)) {
      $msg = "Brands Inserted Successfully";
      $sts = "success";   
      echo json_encode(array('msg' => $msg, 'sts' => $sts));
    }
    
    exit();
  }
}

if (isset($_POST['admin_id2'])) {
  if (upload_pic($_FILES['uploadPic'], "../uploads/")) {
    $data = [
     'admin_img'=> $_SESSION['pic_name'],
    ];
    update_data($dbc,"admins",$data,"admin_id",$_POST['admin_id2']);
  }
  exit();
}

// Delete Data 
 if(isset($_POST['deleteid'])){
  $id=$_POST['deleteid'];
  $table=$_POST['tbl2'];
  $fld=$_POST['col2'];
  if (deleteFromTable($dbc,$table,$fld,$id)) {
    $msg = "Data Deleted Successfully";
    $sts = "success";
    echo json_encode(array('msg' => $msg, 'sts' => $sts));
    exit();
  }
}
//Edit Data
if (isset($_POST['edit_id']) && isset($_POST['edit_id']) != ""){
  $id = $_POST['edit_id'];
  $table = $_POST['tbl1'];
  $fld = $_POST['col1'];
  $q = mysqli_query($dbc,"SELECT * FROM $table WHERE $fld = '$id'");
  $response = array();
  while($r = mysqli_fetch_assoc($q)){
  $response = $r;
  echo json_encode($response);
 }
}
// Imge Data
if(isset($_POST['img_title'])){
  if($_POST['img_id'] != ""){
    if (!empty($_FILES['img_file']['name'])) {
      if (upload_pic($_FILES['img_file'], "../uploads/")) {  
        $data = [
          'img_title'=> $_POST['img_title'],
          'img_description' => $_POST['img_description'],
          'img_price'=> $_POST['img_price'],
          'cate_id' =>  $_POST['cate_id'],
          'brand_id'=>  $_POST['brand_id'],
          'img_sts'=>$_POST['img_sts'],
          'img_file'=>  $_SESSION['pic_name'],
        ];
        if (update_data($dbc,"images",$data,"img_id",$_POST['img_id'])) {
            $msg = "Image With Data Inserted Successfully";
            $sts = "success";
            echo json_encode(array('msg' => $msg, 'sts' => $sts));
        }
        exit();
      }
    }else{
      $data = [
          'img_title'=> $_POST['img_title'],
          'img_description' => $_POST['img_description'],
          'img_price'=> $_POST['img_price'],
          'cate_id' =>  $_POST['cate_id'],
          'brand_id'=>  $_POST['brand_id'],
          'img_sts'=>$_POST['img_sts'],
        ];
        if (update_data($dbc,"images",$data,"img_id",$_POST['img_id'])) {
            $msg = "Image without Data Inserted Successfully";
            $sts = "success";
            echo json_encode(array('msg' => $msg, 'sts' => $sts));
        }
        exit();
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
        'img_file'=>  $_SESSION['pic_name'],
        'img_sts'=>   $_POST['img_sts'],
        'admin_id'=>  $_POST['admin_id'],
      ];
        if (insert_data($dbc,"images",$data)) {
          $msg = "Image Updated Successfully";
          $sts = "success";
          echo json_encode(array('msg' => $msg, 'sts' => $sts));
        }
        exit();
      }
    }else{
      $data = [
        'img_title'=> $_POST['img_title'],
        'img_description' => $_POST['img_description'],
        'img_price'=> $_POST['img_price'],
        'cate_id' =>  $_POST['cate_id'],
        'brand_id'=>  $_POST['brand_id'],
        'img_sts'=>   $_POST['img_sts'],
        'admin_id'=>  $_POST['admin_id'],
      ];
        if (insert_data($dbc,"images",$data)) {
          $msg = "Data Updated Successfully";
          $sts = "success";
          echo json_encode(array('msg' => $msg, 'sts' => $sts));
        }
        exit();
    }
  }
}

if (isset($_POST['admin_name'])) {
    $data = [
      'admin_name' => $_POST['admin_name'],
      'admin_email' => $_POST['admin_email'],
      'admin_pass' => $_POST['admin_pass'],
    ];
    if (update_data($dbc,"admins",$data,"admin_id",$_POST['admin_id'])) {
      $msg = "Admin Data Updated Successfully";
      $sts = "success";
      echo json_encode(array('msg' => $msg, 'sts' => $sts));
    }
  exit();
}

if (isset($_POST['admin_name1'])) {
  if ($_SESSION['captcha_code'] == $_POST['captcha']) {
    $admin_otp = rand(100000,999999);
    $email_body = "index.php?admin_verify".$admin_otp;
    $data=[
      'admin_name' => $_POST['admin_name1'],
      'admin_email' => $_POST['admin_email'],
      'admin_pass' => $_POST['admin_pass'],
      'admin_otp' => $admin_otp
    ];
    if(insert_data($dbc,"admins",$data)){
      $id = mysqli_insert_id($dbc);
      $to_email = $_POST['admin_email'];
      $subject = "Verification Email";
      $newID = md5($id);
      $_SESSION['verify_admin_email'] = $newID;
      $url = $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_verify.php?admin_id=".$id."&admin_code=".$newID;
      $body = "Hi, This is account verification email send by Image Shop "."<a href='".$url."'>Click Here to Verify</a>";
      $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $headers .= "From: Company Name";
      $data1 = [
        'admin_otp' => $newID
      ];
      if (update_data($dbc, "admins", $data1, "admin_id", $id)) {
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

@$fetchcontr = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM admins WHERE admin_email = '$_SESSION[admin_login]'"));

?>