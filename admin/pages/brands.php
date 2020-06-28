<input type="hidden" id="reloadPage" value="brands">
<div class="card">
	<div class="card-header">Sub Categories</div>
	<div class="card-body">
		<h4 class="card-title">Add Sub Categories</h4>
		<p class="card-text">
			<div class="row">
				<div class="col-sm-6">
					<span id="msg"></span>
					<form action="" method="POST" role="form" id="formData">
						<div class="form-group">
							<label for="">Sub Categories Name</label>
							<input type="text" class="form-control brand_name" name="brand_name" required="" id="brand_name">
							 <input type="hidden" class="form-control" name="brandData" id="brandData" value="brands"> 
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="brand_sts" class="form-control brand_sts" required="required" id="brand_sts">
								<option value="">~~SELECT~~</option>
								<option value="1">Active</option>
								<option value="0">Deactive</option>
							</select>
						</div>
						<input type="hidden" name="brand_id" id="brand_id">
						<button type="submit" name="sub_cate_subByAdmin" id="saveData" class="btn btn-primary">Save</button>
					</form>
				</div><!-- col -->
				<div class="col-sm-6">
					<div id="Reload">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Name</th>
								<th>Status</th>
								<th>Acion</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$x = 1;
								$q = get($dbc,"brands");
								while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$x?></td>
								<td><?=$r['brand_name']?></td>
								<td><?=isActive($r['brand_sts'])?></td>
								<td><button class="btn btn-info btn-sm update" id="<?=$r['brand_id']?>">Edit</button> | <button class="show-example-btn btn btn-danger delete btn-sm" onclick="DeleteData(<?=$r['brand_id']?>)">X</button></td>
								<input type="hidden" class="form-control" id="table_name" value="brands">
                                <input type="hidden" class="form-control" id="col_name" value="brand_id">
							</tr>
							<?php 
								$x++;
								endwhile; 
							?>
						</tbody>
					</table>
				   </div><!--reload-->
				</div><!-- col -->
			</div><!-- row -->
		</p>
	</div>
</div>