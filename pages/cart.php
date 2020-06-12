<?php 
	include_once 'connect/db.php';
	// Include configuration file 
	include_once 'config.php';  
	$status = "";
	if (isset($_REQUEST['addToCart'])) {
		// unset($_SESSION['shopping_cart']);
		$img_id = $_GET['img_id'];
		$contr_id = $_GET['contr_id'];
		$q = mysqli_query($dbc,"SELECT * FROM images WHERE img_id = '$img_id'");
		$r = mysqli_fetch_assoc($q);
		$id = $r['img_id'];
		$title = $r['img_title'];
		$price = $r['img_price'];
		$file = $r['img_file'];
		$cart_item = array($id => array('title'=>$title, 'id'=>$id, 'price'=>$price, 'file'=>$file));

		if (empty($_SESSION['shopping_cart'])) {
			$_SESSION["shopping_cart"] = $cart_item;
			redirect("index.php?nav=view_contributor&contr_id=".$contr_id, 2000);
		    echo $status = "<div class='alert alert-info'>Product is added to your cart!</div>";
		}else{
		    if(in_array($id,array_keys($_SESSION["shopping_cart"]))) {
				echo $status = "<div class='alert alert-info' style='color:red;'>Product is already added to your cart!</div>"; 
		    }else{
			    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cart_item);
			    redirect("index.php?nav=view_contributor&contr_id=".$contr_id, 2000);
			    echo $status = "<div class='alert alert-info'>Product is added to your cart!</div>";
			}
		}
	}else{
		// echo 'Server 505 Error';
	}

if (isset($_POST['removeImage'])){
	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $key => $value) {
		    if($_POST["img_id2"] == $key){
				unset($_SESSION["shopping_cart"][$key]);
				$status = "<div class='alert alert-info' style='color:red;'>Product is removed from your cart!</div>";
		    }
		    if(empty($_SESSION["shopping_cart"])){
		    	unset($_SESSION["shopping_cart"]);
		    }
		} 
	}
}
	// echo $_SESSION['last_id1'];
?>
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Image</th>
					<th>Title</th>
					<th>Price $</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$total = 0;
				foreach ($_SESSION["shopping_cart"] as $index => $product){?>
				<tr>
					<td><?=$index+1?></td>
					<td style="width: 100px"><img src="contributor/uploads/<?=$product['file']?>" style="width: 100%"></td>
					<td><?=$product['title']?></td>
					<td>$<?=$product['price']?></td>
					<form action="" method="post">
						<input type="hidden" name="img_id2" value="<?=$index?>">
						<td><button type="submit" name="removeImage" onclick="form.submit();" class="btn btn-danger btn-sm">Remove</button></td>
					</form>
				</tr>
				<?php
					$total += $product['price'];
				}
				$title = "cart_item";
				$cart_item1 = json_encode($_SESSION["shopping_cart"]);
				?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>$<?=$total?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div><!-- row -->
<br>
<div class="row">
	<div class="col-sm-2">
		<form action="inc/code.php" method="POST" role="form" id="proceedForm">
			<div class="form-group">
				<label for="">Have Promo Code?</label>
				<input type="text" class="form-control" id="" name="">
			</div>
	</div><!-- col -->
	<div class="col-sm-4 offset-4">
		<div class="proceedForm">
		<div class="form-group">
			<div class="row">
				<?php 
					foreach ($_SESSION['shopping_cart'] as $key => $value) {
						echo '<input type="hidden" name="cart_item[]" type="text" value="'.$value['id'].'">';	
					}
				?>
				<div class="col-sm-3">
					<label for="">Name</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<input type="text" required="required" name="username" id="username" class="form-control">
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">Email</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<input type="email" required="required" name="email" id="email" class="form-control">
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">City</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<input type="text" required="required" name="user_city" id="user_city" class="form-control">
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">State</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<input type="text" required="required" name="user_state" id="user_state" class="form-control">
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">Country</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<input type="text" required="required" name="user_country" id="user_country" class="form-control">
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">Address</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<textarea required="required" name="user_address" id="user_address" class="form-control" rows="3"></textarea>
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<button type="submit" class="btn btn-primary form-control" id="proceed">Prceed To Checkout >></button>
		</div>
		</form>

		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypalcheckout">
			<!-- Identify your business so that you can collect the payments. -->
			<input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
				
			<!-- Specify a Buy Now button. -->
			<input type="hidden" name="cmd" value="_xclick">
				
			<!-- Specify details about the item that buyers will purchase. -->
			<input type="hidden" name="item_name" value="<?php echo $title; ?>">
			<input type="hidden" name="item_number" value="<?php echo $cart_item1; ?>">
			<input type="hidden" name="amount" value="<?php echo $total; ?>">
			<input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
				
			<!-- Specify URLs -->
			<input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
			<input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
			<br>
			<!-- Display the payment button. -->
			<!-- <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"> -->
			<button type="submit" class="btn btn-success btn-block">Checkout Paypal</button>
		    </div>
		</form>
			
    </div>
	</div>
</div><!-- row -->