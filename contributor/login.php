<?php include_once '../connect/db.php'; ?>
<?php if(isset($_SESSION['contr_login'])): 
    redirect("index.php", 2000);
?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'links/head.php'; ?>
</head>
<body><br>
	<h3 style="margin: 50px; text-align:center; color:black;">Contributor Login CMS</h3>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div><!--cSol-md 4-->
                <div class="col-md-4 jumbotron">
                    <form action="" method="POST" id="formData">
                        <div class="msg"></div> 
                        <div class="form-group ">
                            <label for="">Email:</label>
                            <input type="text" placeholder="Email" name="contr_email2" class="form-control">
                        </div><!--form group-->
                        <br>
                        <div class="form-group">
                            <label for="">Pasword</label>
                            <input type="password" placeholder="Password" name="contr_pass" class="form-control">
                        </div><!--form froup-->
                        <button class="btn btn-primary pull-right" name="contr_login_btn" style="padding: 10px">Login</button>
                    </form><!--form-->
                    <a href="registor.php">New? Get Yourself Register For Free!</a>
                </div><!--col- md -4-->
                <div class="col-md-4">
                </div><!--col-md-4-->
            </div><!--row-->
        </div><!--conatoner fliud-->
    <?php include_once 'links/foot.php'; ?>
</body>
</html>
<?php endif; ?>