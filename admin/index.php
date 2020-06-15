<?php include_once '../connect/db.php'; ?>
<?php if (!isset($_SESSION['admin_login'])): redirect("login.php")?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once 'links/head.php'; ?>
	</head>

	<body>
		<div class="container">
			<div class="masthead">
				<h3 class="text-muted">ImageShop</h3>
				<?php include_once 'inc/nav.php'; ?>
			</div>
			
			<?php include_once $page; ?>

			<!-- Site footer -->
			<footer class="footer">
				<p>&copy; Company 2017</p>
			</footer>

		</div> <!-- /container -->


		<?php include_once 'links/foot.php'; ?>
	</body>
</html>
<?php endif; ?>