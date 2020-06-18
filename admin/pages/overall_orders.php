<input type="hidden" id="reloadPage" value="add_images">
<div class="card">
	<div class="card-header">Overall Orders</div>
	<div class="card-body">
		<h4 class="card-title">Add Images</h4>
		<p class="card-text">
					<span class="msg"></span>
					<div id="Reload">
					<table class="table table-bordered myTable">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Buyer Name</th>
								<th>Image</th>
								<th>Price ($)</th>
								<th>Order Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$x = 1;
							$price = 1;
							$q = mysqli_query($dbc,"SELECT orders.*, order_detail.*, images.* FROM orders INNER JOIN order_detail ON orders.order_id = order_detail.order_id LEFT OUTER JOIN images ON images.img_id = order_detail.img_id");
							while ($r = mysqli_fetch_assoc($q)):?>
							<tr>
								<td><?=$r['order_id'];?></td>
								<td class="text-capitalize"><?=fetchRecord($dbc, "users", "user_id", $r['user_order'])['username']?></td>
								<?php 
									$img = fetchRecord($dbc, "images", "img_id", $r['img_id'])['img_file'];
								?>
								<td style="width: 100px">
									<img src="../contributor/uploads/<?=$img?>" style="width: 100%">
								</td>
								<td><?=$r['img_price'] == ""? "": "$".$r['img_price'];?></td>
								<td><?=$r['order_sts'];?></td>
								<td>
									<a href="">View Order</a> |
									<a href="">Edit Order</a>
								</td>
							</tr>
							<?php
								$x++; 
								$price++; 
								endwhile;
							?>
							<tr>
								<td>Total Summary</td>
								<td></td>
								<td><?=$x?></td>
								<td><?=$price?></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
				</table>
		   	</div><!--reload-->
		</p>
	</div>
</div> 