<div class="card">
	<div class="card-header">Manage Contributors</div>
	<div class="card-body">
		<p class="card-text">
			<div class="row">
				<div class="col-sm-4">
					<?php getMessage(@$msg, @$sts, 3000) ?>
					<?php  
						@$id = $_GET['contr_id'];
						$fetchContr = fetchRecord($dbc, "contributors", "contr_id", $id);
					?>
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Sub Categories Name</label>
							<input type="text" value="<?=@$fetchContr['contr_name']?>" class="form-control" name="contr_update_name" required=""> 
							<input type="text" value="<?=@$fetchContr['contr_id']?>" class="d-none" name="contr_update_id"> 
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="contr_update_sts" class="form-control" required="required">
								<option value="">~~SELECT~~</option>
								<option <?php if(@$fetchContr['contr_sts'] == 1) {?> <?php echo "selected";?> <?php }?> value="1">Active</option>
								<option <?php if(@$fetchContr['contr_sts'] == 0) {?> <?php echo "selected";?> <?php }?> value="0">Deactive</option>
							</select>
						</div>
						<button type="submit" name="sub_cate_subByAdmin" class="btn btn-primary">Save</button>
					</form>

<?php 
if (isset($_REQUEST['sub_cate_subByAdmin'])) {
	$data = [
		'contr_sts' => $_REQUEST['contr_update_sts']
	];
	update_data($dbc, "contributors", $data, "contr_id", $_REQUEST['contr_update_id']);
}
?>
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
Total Images : <span class="badge badge-secondary float-right"><?=$a = countWhen($dbc, "images", "contr_id", $r['contr_id']);?></span><br>
Total Approved : <span class="badge badge-secondary float-right"><?=countWhens($dbc, "images", "contr_id", $r['contr_id'], "img_sts", 1);?></span><br>Total Pending : <span class="badge badge-secondary float-right"><?=countWhens($dbc, "images", "contr_id", $r['contr_id'], "img_sts", 0);?></span>
								</td>
								<td><?=isActive($r['contr_sts'])?></td>
								<td><a href="index.php?nav=contributors&contr_id=<?=$r['contr_id']?>" class="text-primary" class="approveImages" id="">Edit</a></td>
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