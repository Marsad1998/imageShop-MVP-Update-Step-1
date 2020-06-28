<input type="hidden" id="reloadPage" value="promo_code">
<div class="card">
	<div class="card-header">Promo Codes</div>
	<div class="card-body">
		<p class="card-text">
			<div class="row">
				<div class="col-sm-6">
					<span id="msg"></span>
					<form action="" method="POST" role="form" id="formData">
						<div class="form-group">
							<label for="">Promo Codes Name</label>
							<input type="text" class="form-control promo_name" name="promo_name" required="" id="promo_name">
						</div>
						<div class="form-group">
							<label for="">Expiry Date</label>
							<input type="date" class="form-control promo_date" name="promo_date" required="" id="promo_date">
						</div>
						<div class="form-group">
							<label for="">Type</label>
							<select name="promo_type" class="form-control promo_type" required="required" id="promo_type">
								<option value="">~~SELECT~~</option>
								<option value="fix">Fixed Amount</option>
								<option value="per">Percentage</option>
							</select>
						</div>
						<div class="form-group">
							<label for="">Amount</label>
							<input type="text" class="form-control promo_amt" name="promo_amt" required="" id="promo_amt">
						</div>
						<div class="form-group">
							<label for="">Valid Upto Amount</label>
							<input type="text" class="form-control promo_valid_amt" name="promo_valid_amt" required="" id="promo_valid_amt">
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="promo_sts" class="form-control promo_sts" required="required" id="promo_sts">
								<option value="">~~SELECT~~</option>
								<option value="1">Active</option>
								<option value="0">Deactive</option>
							</select>
						</div>
						<input type="hidden" name="promo_id" id="promo_id">
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
								$q = get($dbc,"promos");
								while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$x?></td>
								<td><?=$r['promo_name']?></td>
								<td><?=isActive($r['promo_sts'])?></td>
								<td>
								<button class="btn btn-info btn-sm update" id="<?=$r['promo_id']?>">Edit</button> | <button class="show-example-btn btn btn-danger delete btn-sm" onclick="DeleteData(<?=$r['promo_id']?>)">X</button>
								<input type="hidden" class="form-control" id="table_name" value="promos">
                                <input type="hidden" class="form-control" id="col_name" value="promo_id">
								</td>
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