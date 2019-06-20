<?php
	session_start();
	$note = $status = '';
	if(!empty($_SESSION)) {
		$status = $_SESSION['status'];
	}
	if($status == 'success') {
		header('Location: vinegarfood.php?page=listproduct');
		die();
	}

	$verify_check = $password_new = '';
	require_once('database.php');
	if(!empty($_POST)) {
		$verify_check = $_POST['verify_check'];
		$password_new = $_POST['password_new'];
	}

	if($verify_check != '' && $password_new != '') {
		$note = '<b style="color: red">Mã xác nhận không đúng! Vui lòng kiểm tra lại email đăng ký</b>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vinegar Food</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand"/>
    <link rel="stylesheet" href="include/css/style_directional.css" type="text/css">
<body>
	<!-- Header -->
	<link rel="stylesheet" type="text/css" href="include/css/style_header.css">
	<div>
		<div class="top-link">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="header-about">
							<ul>
								<li>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<a href="#" title="vinegarfood183@gmail.com">vinegarfood183@gmail.com</a>
								</li>
								<li style="float: right" class="hidden-md">
									<a href="#" title="Miễn phí ship cho đơn hàng trên 1tr VNĐ">Free ship khi thanh toán qua Vietcombank</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 text-right">
						<ul class="header-social">
							<li><a href="https://www.facebook.com" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<li><a href="https://www.facebook.com" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://www.facebook.com" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.youtube.com" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>
							<li><a href="https://www.facebook.com" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
						</ul>
						<ul class="header-links">
							<li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
							<li><a href="register.php"><i class="far fa-user-circle"></i> Đăng ký</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="header-main">
			<div class="container">

				<div class="col-xs-2 hidden-md hidden-lg xs-l"><i class="fas fa-list-ul"></i></div>
				<div class="col-lg-2 col-md-2 col-xs-8" style="text-align: center;">
					<div class="logo">
						<a href="#">
							<img src="image/logo_demo.png">
						</a>
					</div>
				</div>
				<div class="col-xs-2 hidden-md hidden-lg xs-l"><i class="fas fa-archive"></i></div>


				<div class="col-lg-9 col-md-9 hidden-sm hidden-xs">
					<nav>
						<ul>
							<li><a href="vinegarfood.php?page=home" title="Trang chủ">trang chủ</a></li>
							<li><a href="vinegarfood.php?page=introduce" title="Giới thiệu">giới thiệu</a></li>
							<li>
								<div class="header-dropdown">
									<a href="vinegarfood.php?page=listproduct" id="header-dropdown_category" title="Món ăn">món ăn <i class="fas fa-angle-down"></i></a>

									<div class="header-dropdown-item scrollbar-design" id="header-dropdown-item">

										<div class="item-cate_product">
											<img src="image/product_demo10.png" title="Món ưa thích">
											<div class="item-title">
												<h5>Món ưa thích</h5>
												<div class="item-list">
													<p><a href="?CategoryID=">Cà phê</a></p>
													<p><a href="?CategoryID=">Nước ngọt</a></p>
													<p><a href="?CategoryID=">Nước ép & Sinh tố</a></p>
													<p><a href="?CategoryID=">Trà sữa</a></p>
												</div>
											</div>
										</div>

										<div class="item-cate_product">
											<img src="image/product_demo4.jpg" title="Bữa trưa">
											<div class="item-title">
												<h5>Bữa trưa</h5>
												<div class="item-list">
													<p><a href="?CategoryID=">Cà phê</a></p>
													<p><a href="?CategoryID=">Nước ngọt</a></p>
													<p><a href="?CategoryID=">Nước ép & Sinh tố</a></p>
													<p><a href="?CategoryID=">Trà sữa</a></p>
												</div>
											</div>
										</div>

										<div class="item-cate_product">
											<img src="image/product_demo7.jpg" title="Đồ ăn nhanh">
											<div class="item-title">
												<h5>Đồ ăn nhanh</h5>
												<div class="item-list">
													<p><a href="?CategoryID=">Cà phê</a></p>
													<p><a href="?CategoryID=">Nước ngọt</a></p>
													<p><a href="?CategoryID=">Nước ép & Sinh tố</a></p>
													<p><a href="?CategoryID=">Trà sữa</a></p>
												</div>
											</div>
										</div>

										<div class="item-cate_product">
											<img src="image/product_demo8.jpg" title="Tráng miệng">
											<div class="item-title">
												<h5>Tráng miệng</h5>
												<div class="item-list">
													<p><a href="?CategoryID=">Cà phê</a></p>
													<p><a href="?CategoryID=">Nước ngọt</a></p>
													<p><a href="?CategoryID=">Nước ép & Sinh tố</a></p>
													<p><a href="?CategoryID=">Trà sữa</a></p>
												</div>
											</div>
										</div>

										<div class="item-cate_product">
											<img src="image/product_demo9.jpg" title="Đồ uống">
											<div class="item-title">
												<h5>Đồ uống</h5>
												<div class="item-list">
													<p><a href="?CategoryID=">Cà phê</a></p>
													<p><a href="?CategoryID=">Nước ngọt</a></p>
													<p><a href="?CategoryID=">Nước ép & Sinh tố</a></p>
													<p><a href="?CategoryID=">Trà sữa</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li><a href="vinegarfood.php?page=album" title="Sưu tập">sưu tập</a></li>
							<li><a href="vinegarfood.php?page=service" title="Dịch vụ">dịch vụ</a></li>
							<li><a href="vinegarfood.php?page=blogs" title="Công thức tháng">công thức tháng</a></li>
							<li><a href="vinegarfood.php?page=contact" title="Liên hệ">liên hệ</a></li>
						</ul>
					</nav>
				</div>
				<div class="col-lg-1 col-md-1 text-right hidden-sm hidden-xs">
					<div class="minicart-wrapper hidden-sm hidden-xs">
						<a class="showcart" href="vinegarfood.php?page=payment" title="Giỏ hàng">
							<i class="fas fa-shopping-cart"></i>
							<span class="total-buy">3</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="header-cate">
			<div class="container">
				<div class="row">
					<div class="col-md-3 hidden-sm hidden-xs">
						<div class="category-narbar"> 
							<div class="category-h" title="Danh mục sản phẩm">
								<i class="fas fa-list-ul" style="padding-right: 4px"></i> 
								<span>Danh mục sản phẩm</span></div>
							<div class="category-dropdown" id="category-dropdown">
								<div class="category-dropdown_item">
									<a href="#">Món ưa thích</a>
									<i class="fas fa-angle-right"></i>
								</div>
								<div class="category-dropdown_item">
									<a href="#">Bưa trưa</a>
									<i class="fas fa-angle-right"></i>
								</div>
								<div class="category-dropdown_item">
									<a href="#">Đồ ăn nhanh</a>
									<i class="fas fa-angle-right"></i>
								</div>
								<div class="category-dropdown_item">
									<a href="#">Tráng miệng</a>
									<i class="fas fa-angle-right"></i>
								</div>
								<div class="category-dropdown_item">
									<a href="#">Thức uống</a>
									<i class="fas fa-angle-right"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 hidden-sm hidden-xs">
						<div class="search-form">
							<form method="GET">
								<input type="text" name="keyword_search" title="Tìm kiếm" placeholder="Bạn muốn mua gì?">
								<button type="submit"><i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
					<div class="col-md-3 hidden-sm hidden-xs">
						<div class="header-contact-phone">
							<div class="contact-icon">
								<i class="fas fa-phone-volume"></i>
							</div>
							<div class="contact-text1">0987 654 321</div>
							<div class="contact-text2">Hotline hỗ trợ 24/7</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div>
	<!-- Header -->

	<div class="directional">
		<a href="#"><div class="directional-title">Trang chủ</div><i class="fas fa-angle-right"></i></a><div class="directional-title" style="color: #E73918">Quên mật khẩu</div>
	</div>
	
	<div class="container">
	<h1 style="color: #333; font-weight: bolder; text-align: center;">Quên mật khẩu</h1>
	<div class="row" style="margin-bottom: 50px">
		<div class="col-md-2 hidden-xs"></div>
		<div class="col-md-8 col-xs-12">
			<center><?=$note?></center>
			<form method="post">
				<div class="form-group">
					<label for="password_new">Mật khẩu mới:<span style="color: red;">*</span></label>
					<input id="password_new" type="password" name="password_new" class="form-control" required placeholder="Nhập mật khẩu mới">
				</div>
				<div class="form-group">
					<label for="verify_check">Mã xác nhận:<span style="color: red;">*</span></label>
					<input id="verify_check" type="number" name="verify_check" class="form-control" required placeholder="Nhập mã xác nhận từ email">
				</div>
				<button type="submit" class="btn btn-success">Gửi</button>
				<div style="margin-top: 20px">Nếu không nhận được mã xác nhận bạn vui lòng kiểm tra lại chính xác <a href="forgetpassword.php"> email đăng kí tài khoản </a>của mình</div>
			</form>
		</div>
	</div>
</div>
	

</body>
<?php
	include('include/footer.php');
?>
</html>