<?php 
	include_once 'connect/db.php';
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
			// redirect("../index.php?nav=view_contributor&contr_id=".$contr_id, 2000);
		    echo $status = "<div class='box'>Product is added to your cart!</div>";
		}else{
		    if(in_array($id,array_keys($_SESSION["shopping_cart"]))) {
				echo $status = "<div class='box' style='color:red;'>Product is already added to your cart!</div>"; 
		    }else{
			    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cart_item);
			    // redirect("index.php?nav=view_contributor&contr_id=".$contr_id, 2000);
			    echo $status = "<div class='box'>Product is added to your cart!</div>";
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
				$status = "<div class='box' style='color:red;'>
				Product is removed from your cart!</div>";
		    }
		    if(empty($_SESSION["shopping_cart"])){
		    	unset($_SESSION["shopping_cart"]);
		    }
		} 
	}
}
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
		<form action="" method="POST" role="form">
			<div class="form-group">
				<label for="">Have Promo Code?</label>
				<input type="text" class="form-control" id="" placeholder="Input field">
			</div>
	</div><!-- col -->
	<div class="col-sm-4 offset-4">
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">Name</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<input type="text" name="" value="" placeholder="" class="form-control">
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">Email</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<input type="email" name="" value="" placeholder="" class="form-control">
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-3">
					<label for="">Address</label>
				</div><!-- inner col -->
				<div class="col-sm-9">
					<textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
				</div><!-- inner col -->
			</div><!-- inner row -->
		</div><!-- form group -->
		<button type="submit" class="btn btn-primary form-control">Prceed To Checkout >></button>
		</form>
	</div>
</div><!-- row -->
