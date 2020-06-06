<?php 
if (isset($_REQUEST['admin_login_btn'])) {
      $admin_email = validate_data($dbc,strip_tags($_REQUEST['admin_email']));
      $admin_pass = $_REQUEST['admin_pass'];
      $sql = mysqli_query($dbc,"SELECT * FROM admins WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass'");
       $count = mysqli_num_rows($sql);
       if ($count == 1) {
         # code...
         $_SESSION['admin_login'] = $admin_email;
         $msg = "Login Successfully";
         $sts = "success";
         header('refresh:2;url=index.php');
       }else{
           $msg = "Invaild Email and Password";
           $sts = "danger";   
       }
}
// UpDate Fetch Teachers Data 
// @$fetchcontr = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM contributors WHERE contr_email = '$_SESSION[contr_login]'"));
 ?>