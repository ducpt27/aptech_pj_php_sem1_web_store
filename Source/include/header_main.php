<div class="top-link">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="header-about">
						<ul>
							<li>
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<a href="#" title="Email liên hệ với chúng tôi!">vinegarfood183@gmail.com</a>
							</li>
							<li style="float: right" class="hidden-md">
								<a href="#" title="Free ship cho đơn hàng trên 200.000₫">Free ship cho đơn hàng trên 200.000₫</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 text-right">
					<ul class="header-social">
						<li><a href="https://www.facebook.com/Vinegar-FOOD-368066530454412/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
						<li><a href="https://www.facebook.com/Vinegar-FOOD-368066530454412/" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
						<li><a href="https://www.facebook.com/Vinegar-FOOD-368066530454412/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.facebook.com/Vinegar-FOOD-368066530454412/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a></li>
						<li><a href="https://www.facebook.com/Vinegar-FOOD-368066530454412/" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
					</ul>
					<ul class="header-links">
						<?=$html?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class="header-main">
		<div class="container">

			<div class="col-xs-2 hidden-md hidden-lg xs-l menu-left_icon"><i class="fas fa-list-ul"></i></div>

			<div class="col-lg-2 col-md-2 col-xs-8" style="text-align: center;">
				<div class="logo">
					<a href="?page=home" title="Vinegar Food">
						<img src="https://i.postimg.cc/yd39Y0ht/logo-demo.png">
					</a>
				</div>
			</div>

			<a href="?page=payment">
				<div class="col-xs-2 hidden-md hidden-lg xs-l" style="color: #444">
					<div class="mobile_pr">
						<i class="fas fa-archive mobile_total-buy"></i>
						<div class="mobile_ch">0</div>
					</div>
				</div>
			</a>
	<script type="text/javascript" charset="utf-8">
		setInterval(function() {
			totalbuy =  $('.total-buy').text()
			$('.mobile_ch').html('<span>'+totalbuy+'</span>');
		})

		$('.mobile_ch').change(function(e){
			console.log('change')
			$('.mobile_ch').css({
				'height': '27px',
				'width': '27px',
				'line-height': '27px',
			})
		})
	</script>
	<?php
		include('mobile/menu_left.php');
	?>

			<div class="col-lg-9 col-md-9 hidden-sm hidden-xs">
				<nav>
					<ul>
						<li><a href="?page=home" title="Trang chủ">trang chủ</a></li>
						<li><a href="?page=introduce" title="Giới thiệu">giới thiệu</a></li>
						<li>
							<div class="header-dropdown">
								<a href="?page=listproduct" id="header-dropdown_category" title="Món ăn">món ăn <i class="fas fa-angle-down"></i></a>

								<div class="header-dropdown-item scrollbar-design" id="header-dropdown-item">
									<?php
										require_once('database.php');
										$sql_cate = 'SELECT * FROM categoryproduct WHERE CategoryParent = 0 AND Status = 1';
										$result_cate = executeResult($sql_cate);
										foreach ($result_cate as $value) {
											echo '<div class="item-cate_product">
													<img src="'.$value['Thumbnail'].'" title="'.$value['CategoryName'].'">
													<div class="item-title">
														<a href="?page=listproduct&CategoryID='.$value["CategoryID"].'">
															<h5>'.$value['CategoryName'].'</h5>
														</a>
														<div class="item-list">';

											$sql_cate_c = 'SELECT * FROM categoryproduct WHERE Status = 1 AND CategoryParent = "'.$value['CategoryID'].'" LIMIT 0,4';

											$result_cate_c = executeResult($sql_cate_c);
											if ($result_cate_c) {
												foreach ($result_cate_c as $value) {
													echo '<p><a href="?page=listproduct&CategoryID='.$value["CategoryID"].'">'.$value["CategoryName"].'</a></p>';
												}
											}				

											echo 		'</div>
													</div>
												</div>';
										}
									?>
								</div>
							</div>
						</li>
						<li><a href="?page=album" title="Sưu tập">sưu tập</a></li>
						<li><a href="?page=service" title="Dịch vụ">dịch vụ</a></li>
						<li><a href="?page=blogs" title="Công thức tháng">công thức tháng</a></li>
						<li><a href="?page=contact" title="Liên hệ">liên hệ</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-1 col-md-1 text-right hidden-sm hidden-xs">
				<div class="minicart-wrapper hidden-sm hidden-xs">
					<a class="showcart" id="showcart" href="?page=payment" title="Giỏ hàng">
						<i class="fas fa-shopping-cart"></i>
						<span class="total-buy" id="total_buy">0</span>
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
							<span>Danh mục sản phẩm</span>
						</div>
						<div class="category-dropdown" id="category-dropdown">
							<?php
								$sql = 'SELECT * FROM categoryproduct WHERE Status = 1 AND CategoryParent = 0';
								$result_ctg = executeResult($sql);
								foreach ($result_ctg as $value) {
								 	echo '<div class="category-dropdown_item">
											<a href="?page=listproduct&CategoryID='.$value["CategoryID"].'">
												<div style="min-width: 150px; display: inline-block">
													'.$value["CategoryName"].'
												</div>
											</a>
											<i class="fas fa-angle-right hover-i-1"></i>';
									//Hiển thị danh mục con
									$sql_2 = 'SELECT * FROM categoryproduct WHERE Status = 1 AND CategoryParent = "'.$value["CategoryID"].'";';
									$result_ctg_c = executeResult($sql_2);
									if ($result_ctg_c) {
										echo '<div class="category-dropright_item">';
										foreach ($result_ctg_c as $value) {
											echo '<a href="?page=listproduct&CategoryID='.$value["CategoryID"].'" title="'.$value["CategoryName"].'"><p>'.$value["CategoryName"].'</p></a>';
										}
										echo '</div>';
									}
									//Đóng
									echo '</div>';
								 } 
							?>
							<!-- 
							<div class="category-dropdown_item">
								<a href="#">Món ưa thích</a>
								<i class="fas fa-angle-right"></i>
								<div class="category-dropright_item">
									<a href="" title="Ăn chay"><p>Ăn chay</p></a>
									<a href=""><p>Combo lẩu</p></a>
									<a href=""><p>Đặc sản</p></a>
									<a href=""><p>Gà quay các loại</p></a>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-md-6 hidden-sm hidden-xs">
					<div class="search-form">
						<form method="get">
							<input type="text" name="keyword_search" title="Tìm kiếm" placeholder="Bạn muốn mua gì?">
							<button type="submit" name="page" value="listproduct"><i class="fas fa-search"></i></button>
						</form>
					</div>
				</div>
				<div class="col-md-3 hidden-sm hidden-xs">
					<div class="header-contact-phone" title="Liên hệ với chúng tôi!">
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