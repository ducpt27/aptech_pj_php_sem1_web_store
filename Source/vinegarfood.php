<?php
	session_start();
	$status = $username = '';
	if(isset($_GET['status'])) {
		$_SESSION['status'] = $_GET['status'];
	}
	if(isset($_SESSION['status']) && isset($_SESSION['username'])) {
		$status = $_SESSION['status'];
		$username = $_SESSION['username'];
	}
	$html = '';
	
	if($username != '' && $status == 'success') {
		$html = '<li><a href="?page=account_management"><i class="far fa-user-circle"></i> '.$username.'</a></li>
				<li><a href="?page=home&status="><i class="fas fa-sign-in-alt"></i> Đăng xuất</a></li>';
	} else {
		$html = '<li><a href="?page=login"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
				<li><a href="?page=register"><i class="far fa-user-circle"></i> Đăng ký</a></li>';
	}
	if(isset($_GET['status']) && $_GET['status'] == '') {
		$_SESSION['status'] = '';
		$_SESSION['username'] = '';
		$html = '<li><a href="?page=login"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
			<li><a href="?page=register"><i class="far fa-user-circle"></i> Đăng ký</a></li>';
	}
	//Find Product When Input GET['keyword_search'] (Header)
	include('include/search_product.php');
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
	<link rel="stylesheet" type="text/css" href="include/css/style_header.css">
<body>
	<?php
		include('include/header_main.php');
	?>
	<!-- .directional start -->
		<?php
			if (isset($_GET['page'])) {

				$page = $_GET['page'];
				$t_page = '';

				if ($page == 'blogs') {
					$t_page = 'Công thức tháng';
				} else if ($page == 'album') {
					$t_page = 'Sưu tập';
				} else if ($page == 'contact') {
					$t_page = 'Liên hệ & Phản hồi';
				} else if ($page == 'introduce') {
					$t_page = 'Giới thiệu';
				} else if ($page == 'service') {
					$t_page = 'Dịch vụ';
				} else if ($page == 'home') {
					$t_page = 'Trang chủ';
				} else if ($page == 'listproduct') {
					$t_page = 'Món ăn';
				} else if ($page == 'payment') {
					$t_page = 'Giỏ hàng';
				} else if ($page == 'register') {
					$t_page = 'Đăng ký';
				} else if ($page == 'login') {
					$t_page = 'Đăng nhập';
				} else if ($page == 'pm_checkout') {
					$t_page = 'Thanh toán';
				} else if ($page == 'address_list') {
					$t_page = 'Sổ địa chỉ';
				} else if ($page == 'infor_account') {
					$t_page = 'Tài khoản của tôi';
				} else if ($page == 'account_management') {
					$t_page = 'Thông tin tài khoản';
				} else if ($page == 'blog') {
					$t_page = 'Công thức tháng';
				} else if ($page == 'orderdetail') {
					$t_page = '<a href="?page=account_management"><div class="directional-title">Quản lý tài khoản</div>
							<i class="fas fa-angle-right"></i></a>
							<div class="directional-title" style="color: #E73918">Chi tiết đơn hàng</div>';
				}

				if ($t_page != '') {
					if ($page == 'home') {
						echo '';
					} else {
						echo '<div class="directional"><a href="?page=home"><div class="directional-title">Trang chủ</div>
								<i class="fas fa-angle-right"></i></a>
								<div class="directional-title" style="color: #E73918">'.$t_page.'</div>
							</div>';
					}
				} 
			} else {
				if(!isset($_GET['productID'])) {
					include('trangchu.php');
				}
			}
			if (isset($_GET['productID'])) {
				$productID = $_GET['productID'];
				if ($productID != null) {
					$sql = 'SELECT ProductName FROM product WHERE ProductID = "'.$productID.'";';
					$result = executeResult($sql);
					$t_page = $result[0]['ProductName'];
				}
				echo '<div class="directional"><a href="?page=home"><div class="directional-title">Trang chủ</div>
						<i class="fas fa-angle-right"></i></a>
						<a href="?page=listproduct"><div class="directional-title">Món ăn</div></a>
						<i class="fas fa-angle-right hidden-xs"></i></a>
						<div class="directional-title hidden-xs" style="color: #E73918">'.$t_page.'</div>
					</div>';
			}

		?>
	<!-- .directional end -->
	
<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];

		if ($page == 'blogs') {
			if (isset($_GET['blogid'])) {
				include('blogs/blogs_details.php');
			} else {
				include('blogs/blog_page.php');
			}
		} else if ($page == 'album') {
			include('blogs/album.php');
		} else if ($page == 'contact'){
			include('contact.php');
		} else if ($page == 'service'){
			include('service.php');
		} else if ($page == 'introduce'){
			include('introduce.php');
		} else if ($page == 'listproduct'){
			include('listproduct.php');
		} else if ($page == 'payment'){
			include('payment.php');
		} else if ($page == 'login') {
			include('inc_login.php');
		} else if ($page == 'register') {
			include('inc_register.php');
		} else if ($page == 'pm_checkout') {
			include('pm_checkout.php');
		} else if ($page == 'infor_account') {
			include('infor_account.php');
		} else if ($page == 'account_management') {
			if (isset($_SESSION['status']) && isset($_SESSION['username'])) {	
				include('account_management.php');
			}
		} else if ($page == 'address_list') {
			include('address_list.php');
		} else if($page == 'orderdetail') {
			include('orderdetail.php');
		} else {
			include('trangchu.php');
		}
	}

	if(isset($_GET['productID'])) {
		$page = $_GET['productID'];
		include('productdetail.php');
	}
?>
</body>
<?php
	include('include/footer.php');
?>
<script type="text/javascript" charset="utf-8" async defer>
	function tongcart() 
	{
		var tongsanpham = 0;
		arr = []
		json = localStorage.getItem("cart");

		if (json != null && json != '') {
			arr = JSON.parse(json)
		}
		if (arr != '') {

			for(i = 0; i < arr.length; i++) {

				tongsanpham += parseInt(arr[i].number)
				tongsanpham = parseFloat(tongsanpham)
			}
			document.getElementById('total_buy').innerHTML = tongsanpham;
		}
	}
	tongcart();
</script>
</html>