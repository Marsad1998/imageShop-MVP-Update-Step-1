<div class="row">
	<p class="text-center">View Profile</p>
</div>
<br>
<?php 
	// Include configuration file 
	include_once 'config.php'; 
	include_once 'connect/db.php'; 
?>
<div class="container">
	<?php echo @$status; ?>
	<div class="row">
		 <div class="col-sm-3">
		 <?php 
		 $id = $_REQUEST['contr_id']; 
       	   $q=get($dbc,"contributors WHERE contr_id = $id");
            while($r=mysqli_fetch_assoc($q)):?>
			<div class="card">
			  <div class="card-header">Countributor</div>
			  <div class="card-body">
			  	<form action="">
			  	<p class="card-text">
					<input type='file' name="uploadPic" id="uploadPic" onchange="readURL(this);" style="display: none;">
					<?php 
					  if ($r['contr_img'] == "") {
					  	$a = "default.png";
					  }else{
					  	$a = $r['contr_img'];
					  }
					  ?>
	                  <img id="blah" src="contributor/uploads/<?=$a?>" class="img-responsive" style="width: 100%" alt="Invalid Image Type Click To Change">
					</p>
				</form>
			  </div><!--card body-->
			  <div class="card-footer">
			  	<label for="">Name : <?=$r['contr_name']?></label><br>
			  	<label for="">Email : <?=$r['contr_email']?></label><br>
			  	<label for="">Country : <?=$r['contr_country']?></label>
			  </div><!--footrt-->
			</div><!--card-->
		<?php endwhile; ?>
		</div><!--col-sm-3-->
		<!-- <div class="col-sm-3">ee</div> -->
		 <div class="col-sm-9">
			<?php $query=mysqli_query($dbc,"SELECT * FROM images WHERE contr_id = '$id' GROUP BY cate_id");
			while($row=mysqli_fetch_assoc($query)):?>
		     &nbsp;<button class="btn btn-success" name="cate_id_btn" onclick="ShowImg(<?=$row['cate_id']?>,<?=$row['contr_id']?>)"><?=fetchRecord($dbc,"categories",'cate_id',$row['cate_id'])['cate_name']?>
		    </button>
		    <?php endwhile ?>
		    <br><br>
		    <div class="row custom">
		     <?php $query=mysqli_query($dbc,"SELECT * FROM images WHERE contr_id = '$id'");
			while($row=mysqli_fetch_assoc($query)):?>
		    	<div class="col-sm-3">
		    <form action="index.php?nav=cart&img_id=<?=$row['img_id']?>&contr_id=<?=$row['contr_id']?>" method="POST" role="form">
			     	<img src="contributor/uploads/<?=$row['img_file']?>" alt="" class="img img-responsive img-thumbnail filter" style="width: 100%; height: 150px">
			     	<!-- <input type="text" value="<?=$row['img_id']?>"> -->
			     	Price : $<span><?=$row['img_price']?></span>
			     	<br><br>
		    	<button type="submit" class="btn btn-info" name="addToCart">Add To Cart</button>
		    </form>
            <form action="<?php echo PAYPAL_URL; ?>" method="post">
				<!-- Identify your business so that you can collect the payments. -->
				<input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
				
			    <!-- Specify a Buy Now button. -->
			    <input type="hidden" name="cmd" value="_xclick">
				
			    <!-- Specify details about the item that buyers will purchase. -->
			    <input type="hidden" name="item_name" value="<?php echo $row['img_title']; ?>">
			    <input type="hidden" name="item_number" value="<?php echo $row['img_id']; ?>">
			    <input type="hidden" name="amount" value="<?php echo $row['img_price']; ?>">
			    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
				
			    <!-- Specify URLs -->
			    <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
			    <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
				<br>
			    <!-- Display the payment button. -->
			    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
		    </div>
			</form>
		    <?php endwhile; ?>
		    </div>
		    <br><br><br>
		    <div class="row" id="addimg"></div>


		</div><!--col-sm 9-->
	</div><!--row-->
</div><!--conatiner-->


