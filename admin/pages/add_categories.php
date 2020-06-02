<div class="card">
	<div class="card-header">Categories</div>
	<div class="card-body">
		<h4 class="card-title">Add Categories</h4>
		<p class="card-text">
			<div class="row">
				<div class="col-sm-6">
					<?php getMessage(@$msg, @$sts, 3000) ?>
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Categories Name</label>
							<input value="<?=@$fetchCate['cate_name']?>" type="text" class="form-control" name="cate_name" required=""> 
							<input value="<?=@$fetchCate['cate_id']?>" type="text" value="<?=$fetchCate['cate_id']?>" class="d-none" name="cate_id"> 
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="cate_sts" class="form-control" required="required">
								<option value="">~~SELECT~~</option>
								<option <?php if(@$fetchCate['cate_sts'] == 1) {?> <?php echo "selected";?> <?php }?> value="1">Active</option>
								<option <?php if(@$fetchCate['cate_sts'] == 0) {?> <?php echo "selected";?> <?php }?> value="0">Deactive</option>
							</select>
						</div>
						<!-- <button type="submit" name="cate_subByAdmin" class="btn btn-primary">Submit</button> -->
						<?=$cateBtn ?>
					</form>
				</div><!-- col -->
				<div class="col-sm-6">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$x = 1;
								$q = get($dbc,"categories");
								while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$x?></td>
								<td><?=$r['cate_name']?></td>
								<td><?=isActive($r['cate_sts'])?></td>
								<td><a href="index.php?nav=add_categories&edit_cate_id=<?=$r['cate_id']?>">Edit</a> | <a href="index.php?nav=add_categories&del_cate_id=<?=$r['cate_id']?>">Delete</a></td>
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