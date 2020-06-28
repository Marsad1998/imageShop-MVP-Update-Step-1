<input type="hidden" id="reloadPage" value="add_categories">
<div class="card">
	<div class="card-header">Categories</div>
	<div class="card-body">
		<h4 class="card-title">Add Categories</h4>
		<p class="card-text">
			<div class="row">
				<div class="col-sm-6">
					<span id="msg"></span>
					<form action="" method="POST" role="form" id="formData">
						<div class="form-group">
							<label for="">Categories Name</label>
							<input type="text" class="form-control cate_name" name="cate_name" required="" id="cate_name"> 
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="cate_sts" id="cate_sts" class="form-control">
								<option value="">~~SELECT~~</option>
								<option value="1">Active</option>
								<option value="0">Deactive</option>
							</select>
						</div>
						<input type="hidden" id="cate_id" name="cate_id"> 
						<button type="submit" name="cate_subByAdmin" id="saveData" class="btn btn-primary">Submit</button>
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
								<td><button class="btn btn-info btn-sm update" id="<?=$r['cate_id']?>">Edit</button> | <button class="show-example-btn btn btn-danger delete btn-sm" onclick="DeleteData(<?=$r['cate_id']?>)">X</button></td>
								<input type="hidden" class="form-control" id="table_name" value="categories">
                                <input type="hidden" class="form-control" id="col_name" value="cate_id">
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