<?php $page="pages/".((empty($_REQUEST['nav']))?"home":$_REQUEST['nav']).".php"; ?>
<nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav text-md-center nav-justified w-100">
			<li class="nav-item active">
				<a class="nav-link" href="index.php?nav=home">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?nav=add_categories">Categories</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?nav=brands">Sub Categories</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?nav=contributors">Contributors</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?nav=add_images">Add image</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Help</a>
					<a class="dropdown-item" href="#">Setting</a>
					<a class="dropdown-item" href="logout.php">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>