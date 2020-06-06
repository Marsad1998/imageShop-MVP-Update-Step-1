<?php 
//*********************Categories CRUD***********************\\
include '../../connect/db.php';
if(isset($_POST['cateData'])=="categories"){
  if($_POST['cate_id'] != ""){
	 $data = [
	 'cate_name'=> $_POST['cate_name'],
	 'cate_sts' => $_POST['cate_sts'],
	  ];
	  update_data($dbc,"categories",$data,"cate_id",$_POST['cate_id']);
    exit();
  }else{
  $data = [
	 'cate_name'=> $_POST['cate_name'],
	 'cate_sts' => $_POST['cate_sts'],
	];
	insert_data($dbc,"categories",$data);
  exit();
  }
}
if(isset($_POST['brandData'])=="brands"){
  if($_POST['brand_id'] != ""){
   $data = [
   'brand_name'=> $_POST['brand_name'],
   'brand_sts' => $_POST['brand_sts'],
    ];
    update_data($dbc,"brands",$data,"brand_id",$_POST['brand_id']);
     }
     else{
     $data = [
   'brand_name'=> $_POST['brand_name'],
   'brand_sts' => $_POST['brand_sts'],
  ];
  insert_data($dbc,"brands",$data);
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
  deleteFromTable($dbc,$table,$fld,$id);
  exit();
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
if(isset($_POST['imagesData'])=="images"){
  if($_POST['img_id'] != ""){
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
      echo 'Data Updated Successfully';
    }
    exit();
    }
  }else{
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
        echo 'Data Inserted Successfully';
      }
    }
    exit();
  }
}

if (isset($_POST['admin_name'])) {
    $data = [
      'admin_name' => $_POST['admin_name'],
      'admin_email' => $_POST['admin_email'],
      'admin_pass' => $_POST['admin_pass'],
    ];
    update_data($dbc,"admins",$data,"admin_id",$_POST['admin_id']);
  exit();
}

?>