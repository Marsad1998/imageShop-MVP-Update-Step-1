<div class="card">
	<div class="card-header">Images</div>
	<div class="card-body">
		<h4 class="card-title">Add Images</h4>
		<p class="card-text">
			<div class="row">
				<div class="col-sm-6">
					<?php getMessage(@$msg, @$sts, 3000) ?>
					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Images Title</label>
							<input value="<?=@$fetchImages['img_title']?>" type="text" class="form-control" name="img_title" required="">  
							<input readonly="" value="<?=@$fetchImages['img_id']?>" type="text" class="form-control d-none" name="img_id" required="">  
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
						<!-- <?=$cateBtn ?> -->
				</div><!-- col -->
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">Image File</label>
								<input type="file" class="form-control" name="img_file">
								<input type="text" class="form-control d-none" name="img_sts" readonly="" value="0">
								<input readonly="" type="text" class="form-control d-none" value="<?=$fetchLoginContributor['contr_id']?>" name="contr_id" >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<img style="height: 150px;width: 100%" src="uploads/<?=@$fetchImages['img_file']?>">
							</div>
						</div>
					</div>
						<?=$imageBtn?>
			    	</div><!--col-->
			   </form>
				</div><!-- row -->
					<br><br>
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
								$q = getWhere($dbc,"images","contr_id",$fetchLoginContributor['contr_id']);
								while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$x?></td>
								<td><img src="uploads/<?=$r['img_file']?>" style="width: 50%;height: 100px"></td>
								<td><?=$r['img_title']?></td>
								<td><?=$r['img_description']?></td>
								<td><?=$r['img_price']?></td>
								<td><?=fetchRecord($dbc,"categories","cate_id",$r['cate_id'])['cate_name'];?></td>
								<td><?=fetchRecord($dbc,"brands","brand_id",$r['brand_id'])['brand_name'];?></td>
								<td><?=isActive($r['img_sts'])?></td>
								<td><a href="index.php?nav=contr_add_img&edit_img_id=<?=$r['img_id']?>">Edit</a> | <a href="index.php?nav=contr_add_img&del_img_id=<?=$r['img_id']?>">Delete</a></td>
						      </tr>
					 <?php $x++; endwhile;?>
				</tbody>
			</table>
		</p>
	</div>
</div> 