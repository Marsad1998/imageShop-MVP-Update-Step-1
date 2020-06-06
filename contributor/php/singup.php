<?php 
if (isset($_REQUEST['contr_login_btn'])) {
      $contr_email = validate_data($dbc,strip_tags($_REQUEST['contr_email']));
      $contr_pass = $_REQUEST['contr_pass'];
      $sql = mysqli_query($dbc,"SELECT * FROM contributors WHERE contr_email = '$contr_email' AND contr_pass = '$contr_pass'");
       $count = mysqli_num_rows($sql);
       if ($count == 1) {
         # code...
         $_SESSION['contr_login'] = $contr_email;
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