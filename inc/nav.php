<?php $page="pages/".((empty($_REQUEST['nav']))?"home":$_REQUEST['nav']).".php"; ?>
<nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav text-md-center nav-justified w-100">
			<li class="nav-item active">
				<a class="nav-link" href="index.php?nav=home">Home</a>
			</li>
			<li class="nav-item">
				<!-- <a class="nav-link" href="index.php?nav=add_categories">Categories</a> -->
			</li>
			<li class="nav-item">
				<!-- <a class="nav-link" href="index.php?nav=brands">Brands</a> -->
			</li>
			<li class="nav-item">
				<!-- <a class="nav-link" href="index.php?nav=contributors">Contributors</a> -->
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?nav=cart"><i class="fas fa-cart-plus"></i><sup> <span class="badge badge-secondary"><?php
				if(!empty($_SESSION["shopping_cart"])) {
					$cart_count = count(array_keys($_SESSION["shopping_cart"]));
					echo $cart_count.'<br>';
					}
				?></span></sup>
				</a>
			</li>
			<?php if (isset($_SESSION['login_user'])): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?=$fetchUsers = fetchRecord($dbc, "users", "user_id", $_SESSION['login_user'])['email'];?>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="#">Account</a>
						<a class="dropdown-item" href="#">Setting</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</li>
			<?php endif ?>
		</ul>
	</div>
</nav>