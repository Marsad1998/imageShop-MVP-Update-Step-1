<div class="card">
	<div class="card-header">Manage Contributors</div>
	<div class="card-body">
		<p class="card-text">
			<div class="row">
				<div class="col-sm-4">
					<?php getMessage(@$msg, @$sts, 3000) ?>
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Sub Categories Name</label>
							<input type="text" value="<?=@$fetchBrand['brand_name']?>" class="form-control" name="brand_name" required=""> 
							<input type="text" value="<?=@$fetchBrand['brand_id']?>" class="d-none" name="brand_id"> 
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="brand_sts" class="form-control" required="required">
								<option value="">~~SELECT~~</option>
								<option <?php if(@$fetchBrand['brand_sts'] == 1) {?> <?php echo "selected";?> <?php }?> value="1">Active</option>
								<option <?php if(@$fetchBrand['brand_sts'] == 0) {?> <?php echo "selected";?> <?php }?> value="0">Deactive</option>
							</select>
						</div>
						<?=$brandBtn?>
						<!-- <button type="submit" name="sub_cate_subByAdmin" class="btn btn-primary">Save</button> -->
					</form>
				</div><!-- col -->
				<div class="col-sm-8">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Name</th>
								<th>Images</th>
								<th>Status</th>
								<th>Acion</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$x = 1;
								$q = get($dbc,"contributors");
								while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$x?></td>
								<td class="text-capitalize"><?=$r['contr_name']?></td>
								<td>
		Total Images : <span class="badge-pill badge-secondary"><?=$a = countWhen($dbc, "images", "contr_id", $r['contr_id']);?></span><br>
		Total Approved : <span class="badge-pill badge-secondary"><?=countWhens($dbc, "images", "contr_id", $r['contr_id'], "img_sts", 1);?></span><br>	
		Total Pending : <span class="badge-pill badge-secondary"><?=countWhens($dbc, "images", "contr_id", $r['contr_id'], "img_sts", 0);?></span>
								</td>
								<td><?=isActive($r['contr_sts'])?></td>
								<td><a href="">Edit</a></td>
								<!-- <td><a href="index.php?nav=brands&edit_brand_id=<?=$r['brand_id']?>">Edit</a> | <a href="index.php?nav=brands&del_brand_id=<?=$r['brand_id']?>">Delete</a></td> -->
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