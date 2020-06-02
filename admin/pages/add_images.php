<div class="card">
	<div class="card-header">Add Images</div>
	<div class="card-body">
		<p class="card-text">
			<div class="row">
				<div class="col-sm-6">
					<?php getMessage(@$msg, @$sts, 3000) ?>
					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Images Title</label>
							<input type="text" class="form-control" name="img_title" value="<?=@$fetchImages['img_title']?>" required="">  
							<input type="text" class="d-none" name="img_id" value="<?=@$fetchImages['img_id']?>">  
						</div>
						<div class="form-group">
							<label for="">Image Description</label>
							<textarea name="img_description" id="" cols="7" rows="2" class="form-control"><?=@$fetchImages['img_description']?></textarea>
						</div>
						<div class="form-group">
							<label for="">Image Price</label>
							<input type="number" class="form-control" name="img_price" required="" value="<?=@$fetchImages['img_price']?>">
						</div><!--form group-->
						<div class="form-group">
							<label for="">Categorys</label>
							<select name="cate_id" id="" class="form-control">
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
							<select name="brand_id" id="" class="form-control">
								<option value="">~~Choose~~</option>
								<?php $fetchbrand = mysqli_query($dbc,"SELECT * FROM brands");
								while($rowbrand = mysqli_fetch_assoc($fetchbrand)):?>
								<option <?php if (@$fetchImages['brand_id'] == $rowbrand['brand_id']){
									echo 'selected';
								}?> value="<?=$rowbrand['brand_id']?>"><?=$rowbrand['brand_name']?></option>
							   <?php endwhile; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Image Status</label>
							<select name="img_sts" id="" class="form-control">
								<option value="">~~Choose~~</option>
								<option <?php if (@$fetchImages['img_sts'] == 1){
									echo 'selected';
								}?> value="1">Active</option>
								<option <?php if (@$fetchImages['img_sts'] == 0){
									echo 'selected';
								}?> value="0">Deactive</option>
							</select>
							<input type="text" class="form-control d-none" value="<?=$fetchLoginAdmin['admin_id']?>" name="admin_id">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="">Image File</label>
									<input type="file" class="form-control" name="img_file">
								</div>
								<div class="col-sm-6">
									<img style="height: 150px;width: 50%" src="uploads/<?=@$fetchImages['img_file']?>" required>
								</div>
							</div>
						</div>
						<!-- <button type="submit" name="image_data" class="btn btn-primary">Submit</button> -->
						<?=$imageBtn ?>
					</form>
				</div>
				</div><!-- row -->
				<br>
				<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered table-striped">
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
								$q = get($dbc,"images");
								while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$x?></td>
								<td><img src="uploads/<?=$r['img_file']?>" style="width: 50%;height: 150px"></td>
								<td><img src="uploads/<?=$r['img_file']?>" style="width: 50%;height: 100px"></td>
								<td><?=$r['img_title']?></td>
								<td><?=$r['img_description']?></td>
								<td><?=$r['img_price']?></td>
								<td><?=fetchRecord($dbc,"categories","cate_id",$r['cate_id'])['cate_name'];?></td>
								<td><?=fetchRecord($dbc,"brands","brand_id",$r['brand_id'])['brand_name'];?></td>
								<td><?=isActive($r['img_sts'])?></td>
								<td><a href="index.php?nav=add_images&edit_img_id=<?=$r['img_id']?>">Edit</a> | <a href="index.php?nav=add_images&del_img_id=<?=$r['img_id']?>">Delete</a></td>
							</tr>
							<?php 
								$x++;
							   endwhile; 
							?>
						</tbody>
					</table>
				</div><!-- col -->
			</div><!-- row -->

		</p>
	</div>
</div> 