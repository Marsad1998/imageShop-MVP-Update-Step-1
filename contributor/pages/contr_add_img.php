<?php 
	$fetchcontr = mysqli_fetch_assoc(mysqli_query($dbc,"SELECT * FROM contributors WHERE contr_email = '$_SESSION[contr_login]'"));
?>
<input type="hidden" id="reloadPage" value="contr_add_img">
<div class="card">
	<div class="card-header">Images</div>
	<div class="card-body">
		<h4 class="card-title">Add Images</h4>
		<p class="card-text">
			<div class="msg"></div>
			<div class="row">
				<div class="col-sm-6">
					<form action="" method="POST" id="formData">
						<div class="form-group">
							<label for="">Images Title</label>
							<input type="text" class="form-control img_title" name="img_title" required="" id="img_title">
					          <input type="hidden" class="form-control" name="imagesData" id="imagesData" value="images">
					          <input type="hidden" class="form-control" name="contr_id" id="contr_id">
						   </div>
						<div class="form-group">
							<label for="">Image Description</label>
							<textarea name="img_description" id="img_description" cols="7" rows="2" class="form-control img_description"></textarea>
						</div>
						<div class="form-group">
							<label for="">Image Price</label>
							<input type="number" class="form-control img_price" name="img_price" required="" id="img_price">
						</div><!--form group-->
						<div class="form-group">
							<label for="">Categorys</label>
							<select name="cate_id" id="cate_id" class="form-control cate_id">
								<option value="">~~Choose~~</option>
								<?php $fetchcate = mysqli_query($dbc,"SELECT * FROM categories");
								while($rowcate = mysqli_fetch_assoc($fetchcate)):?>
								<option <?php if (@$fetchImages['cate_id'] == $rowcate['cate_id']){
									echo 'selected';
								}?> value="<?=$rowcate['cate_id']?>"><?=$rowcate['cate_name']?></option>
								
							   <?php endwhile; ?>
							</select>
						</div>
				</div><!-- col -->
				<div class="col-sm-6">
						<div class="form-group">
							<label for="">Brands</label>
							<select name="brand_id" id="brand_id" class="form-control brand_id">
								<option value="">~~Choose~~</option>
								<?php $fetchbrand = mysqli_query($dbc,"SELECT * FROM brands");
								while($rowbrand = mysqli_fetch_assoc($fetchbrand)):?>
								<option <?php if (@$fetchImages['brand_id'] == $rowbrand['brand_id']){
									echo 'selected';
								}?> value="<?=$rowbrand['brand_id']?>"><?=$rowbrand['brand_name']?></option>
							   <?php endwhile; ?>
							</select>
						</div>
						<!-- <?=$cateBtn ?> -->
						<div class="form-group">
						  <input type='file' name="img_file" id="uploadPic" onchange="readURL(this);">
                          <img id="blah" class="img-thumbnail" src="uploads/default.png" alt="Invalid Image Type Click To Change">
					</div>
					<div class="form-group">
						<?php $email=$_SESSION['contr_login']; 
						$query = getWhere($dbc,"contributors","contr_email",$email);
						$row = mysqli_fetch_assoc($query);?>
						<input hidden="" type="text" class="form-control" name="contr_id" id="contr_id" value="<?=$row['contr_id']?>">
					</div>
					<input type="hidden" id="img_id" name="img_id"> 
					<button type="submit" id="saveData" name="image_data" class="btn btn-primary">Save</button>
				</div>
			   </form>
				</div><!-- row -->
					<br><br>
					<div id="Reload">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Img</th>
								<th>Title</th>
								<th>Descrition</th>
								<th>Price</th>
								<th>Categorys</th>
								<th>Brands</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$x = 1;
								$q = mysqli_query($dbc,"SELECT * FROM images WHERE contr_id = $fetchcontr[contr_id]");
								while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$x?></td>
								<td style="width: 100px;"><img style="width: 100%" src="uploads/<?=$r['img_file']?>" alt=""></td>
								<td><?=$r['img_title']?></td>
								<td><?=$r['img_description']?></td>
								<td><?=$r['img_price']?></td>
								<td><?=fetchRecord($dbc,"categories","cate_id",$r['cate_id'])['cate_name'];?></td>
								<td><?=fetchRecord($dbc,"brands","brand_id",$r['brand_id'])['brand_name'];?></td>
								<td><?=isActive($r['img_sts'])?></td>
								<td><button class="btn btn-info btn-sm update" id="<?=$r['img_id']?>">Edit</button> | 
								<button class="show-example-btn btn btn-danger delete btn-sm" onclick="DeleteData(<?=$r['img_id']?>)">X</button></td>
								<input type="hidden" class="form-control" id="table_name" value="images">
                                <input type="hidden" class="form-control" id="col_name" value="img_id">
						      </tr>
					 <?php $x++; endwhile;?>
				</tbody>
			</table>
		   </div><!--reload-->
		</p>
	</div>
</div> 