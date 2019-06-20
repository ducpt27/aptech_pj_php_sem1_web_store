<?php
	session_start();
	$username = '';
	$adm_status = '';

	if(isset($_SESSION['adm_status']) && isset($_SESSION['adm_username'])) {
		$username = $_SESSION['adm_username'];
		$adm_status = $_SESSION['adm_status'];
	}

	if(isset($_GET['adm_status']) && $_GET['adm_status'] == '') {
		$_SESSION['adm_status'] = '';
		$_SESSION['adm_username'] = '';
		header('Location: admin_login.php');
	}

	if($username == '') {
		header('Location: admin_login.php');
		die();
	}
?>
	<div class="header_stt">
		<div class="row">
			<div class="col-xs-2 text-left">
				<a href="admin_page.php">VinegarFood</a>
			</div>
			<div class="col-xs-10 text-right">
				<span>admin, <?=$username?> </span><a href="?adm_status="><span>| Đăng xuất</span></a>
			</div>
		</div>
	</div>
	<div class="menu_setting">
		<div class="container">
			<center>
				<ul class="nav nav-stacked">
				    <a href="?page=admin_statistic"><li id="statistic_li"><i class="fas fa-chart-pie"></i>Statistic</li></a>
					<a href="?page=admin_orders"><li id="orders_li"><i class="fas fa-shopping-cart"></i>Orders</li></a>
					<a href="?page=admin_products"><li id="products_li"><i class="fas fa-dice-d6"></i>Products</li></a>
					<a href="?page=admin_blog"><li id="blog_li"><i class="fab fa-blogger-b"></i>Blog</li></a>
					<a href="?page=admin_comment"><li id="comment_li"><i class="fas fa-comments"></i>Comment</li></a>
					<a href="?page=admin_feedback"><li id="feedback_li"><i class="fas fa-envelope"></i>Feedback</li></a>
					<a href="?page=admin_account"><li id="account_li"><i class="fas fa-user-alt"></i>Account</li></a>
				</ul>
			</center>
		</div>
	</div>