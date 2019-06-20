<link rel="stylesheet" type="text/css" href="include/css/style_footer.css">
<footer style="padding: 35px 0 0 0; border-top: 4px solid #DCDDE1; margin-top: 30px">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">

					<div class="col-md-4 text-center">
						<div class="footer-logo">
							<img src="https://i.postimg.cc/yd39Y0ht/logo-demo.png">
						</div>
					</div>

					<div class="col-md-8" style="padding: 0 30px;">
						<div class="footer-email-ct">
							<form method="post">
								<input type="text" name="email_contact" placeholder="Nhập Email để nhận ưu đãi từ chúng tôi">
								<button type="submit"><i class="fas fa-location-arrow"></i></button>
							</form>
						</div>
					</div>

				</div>
				<div class="row" style="padding-left: 15px">

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="text-title">
							Liên hệ
						</div>
						<div class="text-content">
							<i class="fas fa-map-marker-alt"></i> 285 Đội Cấn, Ba Đình, Hà Nội
						</div>
						<div class="text-content">
							<i class="fas fa-phone"></i> 0987 654 321
						</div>
						<div class="text-content">
							<i class="far fa-envelope"></i> vinegarfoot183@gmail.com
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<div class="text-title" id="text-title">
							Về chúng tôi <i class="fas fa-caret-down visible-xs"></i>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=home">Trang chủ</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=introduce">Giới thiệu</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=listproduct">Món ăn</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=album">Sưu tập</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=service">Dịch vụ</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=blogs">Công thức tháng</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=contact">Liên hệ</a>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-6">
						<div class="text-title" id="text-title">
							Chính sách <i class="fas fa-caret-down visible-xs"></i>
						</div>
						<div class="text-content hidden-xs">
							<a href="?page=introduce">Giới thiệu</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="#">Bản quyền</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="https://www.facebook.com/Vinegar-FOOD-368066530454412/" target="_blank">FB group</a>
						</div>
						<div class="text-content hidden-xs">
							<a href="https://www.facebook.com/Vinegar-FOOD-368066530454412/" target="_blank">Fanpage</a>
						</div>
					</div>

				</div>	
			</div>

			<div class="col-md-3 camket" style="padding-left: 30px;">
				<div class="text-title">
					<h3 style="font-weight: bold">Cam kết của chúng tôi</h3>
				</div>
				<div class="text-content shield">
					<i class="fas fa-shield-alt"></i> Đội ngũ tư vấn nhiệt tình 24/7
				</div>
				<div class="text-content shield">
					<i class="fas fa-shield-alt"></i> Thực phẩm tươi ngon mỗi ngày
				</div>
				<div class="text-content shield">
					<i class="fas fa-shield-alt"></i> Thanh toán nhanh chóng
				</div>
				<div class="the_thanh_toan">
					<i class="fab fa-cc-visa"></i>
					<i class="fab fa-cc-apple-pay"></i>
					<i class="fab fa-cc-mastercard"></i>
					<i class="fab fa-cc-paypal"></i>
				</div>
			</div>
		</div>
	</div>
	<button onclick="topFunction()" id="scroll-to-top" title="Lên đầu trang"><i class="fas fa-angle-double-up"></i></button>
	<div class="footer-policy">
		<div class="container">
			© Copyright - VinegarFood All Rights Reserved
		</div>
	</div>
</footer>
<script type="text/javascript">

	window.onscroll = 	function() {
							scrollFunction()
						};

	function scrollFunction() {
	  	if (document.body.scrollTop > 520 || document.documentElement.scrollTop > 520) {
	  		if(screen.width > 768) {
		   		document.getElementById("scroll-to-top").style.opacity = "1";
		   		document.getElementById("scroll-to-top").style.visibility = "visible";
	  		}
	  	} else {
	    	document.getElementById("scroll-to-top").style.opacity = "0";
	   		document.getElementById("scroll-to-top").style.visibility = "hidden";
	  	}
	}

	function topFunction() {
		$('html,body').animate({ scrollTop: 0 }, 'slow');
	}
</script>
