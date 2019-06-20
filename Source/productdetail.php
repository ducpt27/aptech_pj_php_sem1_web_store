<link rel="stylesheet" type="text/css" href="include/css/style_productdetail.css">
<div class="container" style="min-height: 500px;">

	<div class="row" style="margin-bottom: 10px;">

		<div class="col-xs-12 col-sm-6 col-lg-5 col-md-6" id="img_product_col-moblie">
			<?php
				$ProductName = $ProductID = $Thumbnail = $UserManual = $Ingredients = $NetWeight = '';
				$ExpirationDate = $Price = $PriceDiscount = $Quantity = '';

				$sql = $sql2 = '';
				if(isset($_GET['productID'])) {
					$ProductID = $_GET['productID'];
				}
				$result = $result2 = '';
				// require_once('include/database.php');
				if($ProductID != '') {
					$sql = 'SELECT * FROM product WHERE ProductID = '.$ProductID.' AND Status = 1';
					$sql2 = 'SELECT * FROM image WHERE ProductID = '.$ProductID.'';
					$result = executeResult($sql);
					$result2 = executeResult($sql2);
				}
				if($result != null) {
					$ProductName = $result[0]["ProductName"];
					$ProductID = $result[0]["ProductID"];
					$Thumbnail = $result[0]["Thumbnail"];
					$UserManual = $result[0]["UserManual"];
					$Ingredients = $result[0]["Ingredients"];
					$NetWeight = $result[0]["NetWeight"];
					$ExpirationDate = $result[0]["ExpirationDate"];
					$Price = $result[0]["Price"];
					$PriceDiscount = $result[0]["PriceDiscount"];
					$Quantity = $result[0]["Quantity"];
					if($Quantity > 0) {
						$Quantity = '<span style="color:blue">Còn hàng<span>';
					} else {
						$Quantity = '<span style="color:red">Hết hàng<span>';
					}
				}
			?>
			<div class="img_product">
				<img src="<?=$Thumbnail?>">
			</div>

			<div class="img_product-more">
				<div class="row">
					<?php
						foreach ($result2 as $value) {
							echo '<div class="col-xs-3 img-addtocart">
									<img src="'.$value["ImageURL"].'">
								</div>'; 
						}
					?>
				</div>
			</div>

		</div>

		<div class="col-xs-12 col-sm-6 col-lg-7 col-md-6" style="padding: 0 15px">

			<div class="text-product_detail_title"><?=$ProductName?></div>
			<div class="text-product_detail_code">Mã sản phẩm: #2026<span><?=$ProductID?></span></div>
			<hr>
			<div class="product_detail_price">
				<?php
					if($PriceDiscount != null && $PriceDiscount != '0') {
						echo 	'<div class="price">'.number_format($Price).'₫</div>
								<div class="price_discout">'.number_format($PriceDiscount).'₫</div>';
					} else {
						echo '<div class="price_discout">'.number_format($Price).'₫</div>';
					}
				?>
			</div>
			<div class="product_detail_status">
				<div id="product_detail_status"><i class="fas fa-check-square"></i> Tình trạng</div>: 
				<span class="product_detail_status-val"><?=$Quantity?></span>
			</div>
			<div class="product_detail_ingredients">
				<div id="product_detail_ingredients"><i class="fas fa-list"></i> Thành phần: </div>
				<span><?=$Ingredients?></span>
			</div>
			<br>
			<div class="product_detail-sp">
				<p></p>
				<p>An toàn vệ sinh, không chất bảo quản.</p>
			</div>
	<?php
		include('include/javascript/js_productdetailt.php');
	?>
		<div style="margin: 30px 0;">
			<div class="row">
				<div class="col-md-3 col-sm-5 hidden-xs product_count" style="margin: 0 15px 15px 15px">
					<button type="button" value="+" id="product_tang" onclick="addNumber('1')">+</button>
					<input onblur="checkNo(this)" type="number" min="1" value="1" name="number" id="countNumber">
					<button type="button" value="+" id="product_giam" onclick="addNumber('-1')">-</button>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 hidden-xs" style="margin-left: -15px !important">
					<div class="product_buying" id="buying2">
						<button type="button" name="product" class="addtocart" onclick='addToCart(<?php 
							if ($PriceDiscount != 0) {
								echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$PriceDiscount;
							} else {
								echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$Price;
							}
							?>, 1)'><i class="fas fa-cart-plus"></i> Mua ngay</button>
					</div>
				</div>
				<div class="col-sm-3 hidden-lg hidden-md hidden-xs"></div>
				<div class="col-md-4 col-sm-6 hidden-xs" style="margin-bottom: 15px; margin-left: -15px !important">
					<div class="product_buying" id="buying1">
						<button type="button" name="product" class="addtocart" onclick='addToCart(<?php 
							if ($PriceDiscount != 0) {
								echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$PriceDiscount;
							} else {
								echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$Price;
							}
							?>, 0)'><i class="fas fa-cart-plus"></i> Thêm Vào Giỏ Hàng</button>
					</div>
				</div>
			</div>
		</div>
			<br class="hidden-xs hidden-sm"><hr class=" hidden-sm">
		
			<div class="hotline">
				Hotline tư vấn sản phẩm: <span style="color: red">0987 654 321</span>
			</div>
			<div class="sale_new hidden-sm">
				<div class="sale_title">Ưu đãi đặc biệt</div>
				<p><div class="sale_content">Miễn phí ship cho đơn hàng trên 200.000 VND</div></p>
				<p><div class="sale_content">Giảm 15% hóa đơn thức ăn từ 14h ~ 22h</div></p>
				<p><div class="sale_content">Tặng voucher lên tới 20% khi thanh toán qua Vietcombank</div></p>
			</div>
		</div>

	</div>

	<div class="pd-content">
		<div class="row">
			<div class="col-md-9 col-sm-12">
				<div class="row" style="border-bottom: 2px solid #DCDDE1; margin: 10px; padding: 0">
					<div class="col-md-2 col-xs-6 pd-cate" id="mota_click">mô tả</div>
					<div class="col-md-2 col-xs-6 pd-cate" id="nhanxet_click">nhận xét</div>
				</div>
		<!-- start:: code for detail product		-->
				<div class="mota-click">
					<div class="pd-tt">
						Mã sản phẩm: <span> #2026<?=$ProductID?></span>
					</div>
					<div class="pd-tt">
						Thành phần: <span><?=$Ingredients?></span>
					</div>
					<div class="pd-tt">
						Khối lượng tịnh: <span><?=$NetWeight?></span><span> g</span>
					</div>
					<div class="pd-tt">
						Hướng dẫn sử dụng <span><?=$UserManual?></span>
					</div>
					<div class="pd-tt">
						Hạn sử dụng: <span><?=$ExpirationDate?></span>
					</div>
				</div>
		<!-- 	start:: code for comment		-->
				<div class="nhanxet-click">
					<div class="comment-box">
						<div class="cmt-avatar">
							<img src="https://i.postimg.cc/SNj8TrzY/avatar-demo0.png">
						</div>
						<div class="cmt-content">
							<div class="cmt-name">Vinegar Food</div>
							<br>
							<div class="cmt-text">
								<pre>Chưa thấy sản phẩm nào tốt đến thế. Mọi người hãy dùng thử nhé</pre>
							</div>
						</div>
					</div>
					<div class="comment-box">
						<div class="cmt-avatar">
							<img src="https://i.postimg.cc/cJZ4txRM/avatar-demo0-1.png">
						</div>
						<div class="cmt-content">
							<div class="cmt-name">Trung Đức</div>
							<br>
							<div class="cmt-text">
								<pre>I can fly :))</pre>
							</div>
						</div>
					</div>
		<?php
			if (isset($_SESSION['username'])) {
				$username = $_SESSION['username'];
			} else {
				$username = '';
			}
			//SELECT DATA.comment FROM DATABASE
			if (isset($_GET['productID'])) {
				$productID = $_GET['productID'];
				$sql = 'SELECT comment.* FROM comment, product 
						WHERE `product`.ProductID = '.$productID.'
						AND `comment`.ProductID = `product`.ProductID
				 		ORDER BY `comment`.CreateDate DESC LIMIT 0,8';
				$result = executeResult($sql);
				foreach ($result as $value) {
					echo '<div class="comment-box">
							<div class="cmt-avatar">
								<img src="https://i.postimg.cc/cJZ4txRM/avatar-demo0-1.png">
							</div>
							<div class="cmt-content">
								<div class="cmt-name">'.$value["LastName"].' '.$value["FirstName"].'</div>
								<br>
								<div class="cmt-text">
									<pre>'.htmlentities($value["Content"]).'</pre>
								</div>
							</div>
						</div>';
				}
				// echo '<center><i>Dữ liệu hiển thị bình luận mới nhất</i></center>';
				// echo '<br>';
			}

			 //Dữ liệu yêu cầu
			$content_cmt = '';
			$product_cmt = '';

			//Login success -> input account
			//Else -> lấy từ $_POST
			$username = $firstname_cmt = $lastname_cmt = $email_cmt = '';


			//Lấy dữ liệu từ POST
			if (isset($_POST['firstname-cmt']) && isset($_POST['lastname-cmt']) && isset($_POST['email-cmt'])) {
				$firstname_cmt = $_POST['firstname-cmt'];
				$lastname_cmt = $_POST['lastname-cmt'];
				$email_cmt = $_POST['email-cmt'];
			}
			if (isset($_POST['avatar-cmt'])) {
				$avatar_cmt = $_POST['avatar-cmt'];
			}
			if (isset($_POST["content-cmt"])) {
				$content_cmt = $_POST["content-cmt"];
			}

			//Lấy ID sản phẩm
			if (isset($_GET['productID'])) {
				$product_cmt = $_GET['productID'];
			}

			//Lấy từ liệu khi đã đăng nhập
			if (isset($_SESSION["username"])) {
				$username = $_SESSION["username"];
			}
			if ($username != null && $username != '') {
				$sql = 'SELECT * FROM account WHERE UserName = "'.$username.'";';
				$result = executeResult($sql);
				if ($result != null && count($result) > 0) {
					$firstname_cmt = $result[0]["FirstName"];
					$lastname_cmt = $result[0]["LastName"];
					$email_cmt = $result[0]["Email"];				
				}
			}

			//Đẩy dữ liệu vào database
			if (
				   $firstname_cmt != '' 
				&& $lastname_cmt != '' 
				&& $email_cmt != '' 
				&& $product_cmt != '' 
				&& $content_cmt != '') 
			{
				$sql = 'INSERT INTO comment(ProductID, Email, FirstName, LastName, Content, CreateDate)
						VALUES ('.$product_cmt.', "'.$email_cmt.'", "'.$firstname_cmt.'", "'.$lastname_cmt.'", "'.$content_cmt.'", CURTIME());';
				execute($sql);
				//Xóa nội dung lưu trong POST["content-cmt"]
				//Tránh reload gửi lặp dữ liệu
				echo '<form method="post" id="resetPost"><input type="text" name="content-cmt" value=""></form>
    				<script>$("#resetPost").submit()</script>';
			}
		?>
					<form method="post" id="form-cmt-group">
						<div class="form-group">
							<textarea name="content-cmt" id="content-cmt" class="form-control" placeholder="Hãy để lại bình luận cho chúng tôi biết..." title="Messenger"></textarea>
						</div>
						<button type="button" class="btn btn-send" id="gui_content">Gửi</button>

						<div class="form-comment">
							<center><h4 style="color: white">Phiếu thông tin bình luận</h4></center>
							<div class="form-group">
								<input type="text" title="Firstname" value="<?=$firstname_cmt?>" id="firstname-cmt" name="firstname-cmt" class="form-control" required placeholder="Tên">
							</div>
							<div class="form-group">
								<input type="text" title="Lastname" value="<?=$lastname_cmt?>" id="lastname-cmt" name="lastname-cmt" class="form-control" required placeholder="Họ">
							</div>
							<div class="form-group">
								<input type="email" title="Email-address" value="<?=$email_cmt?>" id="email-cmt" name="email-cmt" class="form-control" required placeholder="Email">
							</div>
							<center><button type="button" id="gui_infor" class="btn btn-success">Bình luận</button></center>
							<div class="row" style="margin-top: 6px">
								<div class="col-xs-4" style="margin-left: 30px ;margin-right: -32px"><hr></div>
								<div class="col-xs-4" style="padding-top: 9px;"><center><i>Vinegar Food</i></center></div>
								<div class="col-xs-4" style="margin-left: -30px"><hr></div>
								<div class="col-xs-12">
									<center style="font-size: 12px"><i><a href="">Chích sách bảo mật</a> thông tin khách hàng.</i></center>
								</div>
							</div>
						</div>
						<div class="comment-out">
							<!-- Khoảng đen sau -->
						</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript" charset="utf-8">
			//Xử lý sự kiện chuyển tab mô tả <-> bình luận
			$(document).on('click', '#mota_click', function(e) {
				e.preventDefault();
				setTimeout(function(){
					$('.mota-click').css({
						'display': 'block',
						'opacity': 0.6
					});
					setTimeout(function() {
						$('.mota-click').css({
							'opacity': 1
						})
					}, 500);
					$('.nhanxet-click').css({
						'display': 'none'
					})
					$('#mota_click').css({
						'color': '#333',
						'border-bottom': '2px solid #222',
						'margin-bottom': '-2px'
					});
					$('#nhanxet_click').css({
						'color': '#999',
						'border-bottom': 'none',
						'margin-bottom': 0
					});
				}, 500)
			})
			$(document).on('click', '#nhanxet_click', function(e) {
				e.preventDefault();
				setTimeout(function() {
					$('.nhanxet-click').css({
						'display': 'block',
						'opacity': 0.6
					});
					setTimeout(function() {
						$('.nhanxet-click').css({
							'opacity': 1
						})
					}, 500);
					$('.mota-click').css({
						'display': 'none'
					})
					$('#mota_click').css({
						'color': '#999',
						'border-bottom': 'none',
						'margin-bottom': 0
					});
					$('#nhanxet_click').css({
						'color': '#333',
						'border-bottom': '2px solid #222',
						'margin-bottom': '-2px'
					});
				}, 500)
			})
			//Lấy chiều cao, rộng màn hình. Hiển thị form bình luận phù hợp
			$(document).ready(function($) {
				rong = parseInt(screen.width);
				cao = parseInt(screen.height);
				if(rong < 420) {
					$('.form-comment').css({
						'width': rong+'px'
					})
				}
				$('.comment-out').css({
					'width': rong+'px',
					'height': cao+'px'
				})
			});
			// 1. Xử lý sự kiện onclick button gửi nội dung bình luận
			$(document).on('click', '#gui_content', function(e) {
				e.preventDefault();
				setTimeout(function() {
					var noidung = $('#content-cmt').val();
					var ten = $('#firstname-cmt').val();
					var ho = $('#lastname-cmt').val();
					var email = $('#email-cmt').val();
					if (noidung != '' && ten != '' && ho != '' && email != '') {
						setTimeout(function() {
							$('#form-cmt-group').submit();
							setTimeout(function() {
								location.reload();
							}, 500)
						}, 1000)
					} else if (noidung == '') {
						alert('Vui lòng điền nội dung bình luận!');
					} else {
						//Backgroud ... function out
						$('.comment-out').css({
							'opacity': 0.4,
							'visibility': 'visible'
						})
						//Hiển thị form thông tin
						$('.form-comment').css({
							'opacity': 1,
							'visibility': 'visible'
						})
					}
				}, 1000)
			})
			$(document).on('click', '.comment-out', function(e) {
				e.preventDefault();
				setTimeout(function() {
					//Backgroud ... function out
					$('.comment-out').css({
						'opacity': 0,
						'visibility': 'hidden'
					})
					//Hiển thị form thông tin
					$('.form-comment').css({
						'opacity': 0,
						'visibility': 'hidden'
					})
				}, 500)
			})
			// 1 end::
			// 2. Xử lý sự kiện onclick button gửi thông tin người bình luận
			$(document).on('click', '#gui_infor', function(e) {
				e.preventDefault();
				setTimeout(function() {
					var ten = $('#firstname-cmt').val();
					var ho = $('#lastname-cmt').val();
					var email = $('#email-cmt').val();
					if (ten != '' && ho != '' && email != '') {
						$('#form-cmt-group').submit();
						setTimeout(function() {
							location.reload();
						}, 500)
					} else {
						alert('Vui lòng điền thông tin bình luận!');
					}
				}, 1000)
			})
			// 2 end::
		</script>
		<!-- 	end:: code for comment		-->

		<div class="row">

			<div class="pd-cungl">
				sản phẩm cùng loại
			</div>
			<div class="clearfix pdmore" style="position: relative; display: block;">
				<?php
					if (isset($_GET["productID"])) {
						$id = $_GET["productID"];
					}
					if ($id != null && $id != '') {
						$sql = 'SELECT CategoryID FROM product WHERE ProductID = '.$id;
						$id_cate = executeResult($sql);
						if ($id_cate != null && count($id_cate) > 0) {
							$sql2 = 'SELECT * FROM product WHERE CategoryID = '.$id_cate[0]['CategoryID'].' LIMIT 0,6';
							$result_cate = executeResult($sql2);
						}
						if ($result_cate != null && count($result_cate) > 0) {
							foreach ($result_cate as $value) {
								echo '<a href="?productID='.$value["ProductID"].'"><div class="col-md-2 col-sm-4 col-xs-6 pdm-img">
										<img src="'.$value["Thumbnail"].'">
										<div class="pdm-tt" style="color: #333">'.$value["ProductName"].'</div>';
								if ($value["PriceDiscount"] != null && $value["PriceDiscount"] != '' && $value["PriceDiscount"] != 0) {
									echo '<div class="pdm-price_discout">'.$value["PriceDiscount"].'₫</div>
										<div class="pdm-price">'.$value["Price"].'₫</div>';
								} else {
									echo '<div class="pdm-price_discout">'.$value["Price"].'₫</div>';
								}	

								echo '	<button type="button" class="pdm-btn">Xem nhanh</button>
									</div></a>';
							}
						}
					}
				?>

				<div class="pdm-btn_next">
					<i class="fas fa-angle-right"></i>
				</div>
				<div class="pdm-btn_next_l">
					<i class="fas fa-angle-left"></i>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- dành cho phiên bản mobile -->
<!-- footer fixed -->
<div class="product_buying_div-moblie hidden-sm hidden-md hidden-lg">
	<div class="product_buying-moblie" id="buying1-mobile">
		<button type="button" name="product" class="addtocart" onclick='addToCart(
			<?php 
				if ($PriceDiscount != 0) {
					echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$PriceDiscount;
				} else {
					echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$Price;
				}
			?>, 0)'>Thêm vào giỏ hàng</button>
	</div>
	<div class="product_buying-moblie" id="buying2-mobile">
		<button type="button" name="product" class="addtocart" onclick='addToCart(
			<?php 
				if ($PriceDiscount != 0) {
					echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$PriceDiscount;
				} else {
					echo $ProductID.', "'.$Thumbnail.'", "'.$ProductName.'", '.$Price;
				}
			?>, 1)'>Mua Ngay</button>
	</div>

</div>
<!-- end:: mobile -->

<script type="text/javascript" charset="utf-8">
	$(document).on('click', '.addtocart', function(e) {
		e.preventDefault();
		var parent = $('.img_product');
		var src = parent.find('img').attr('src');

		var parTop = parent.offset().top;
		var parLeft = parent.offset().left;

		$('<img />', {
			class: 'img-fly-cart',
			src: src
		}).appendTo('body').css({
			'opacity': 0.1,
			'top': parTop,
			'left': parLeft,
			'width': parseInt(parent.width()),
			'height': parseInt(parent.height())
		});
		setTimeout(function() {
			$(document).find('.img-fly-cart').css({
				'opacity': 0.8,
				'top': $('.total-buy').offset().top,
				'left': $('.total-buy').offset().left,
				'width': '21px',
				'height': '21px'
			})
			setTimeout(function() {
				$(document).find('.img-fly-cart').css({
					'opacity': 0,
				})
			}, 500)
		}, 100)
		
		
		setTimeout(function() {
			$(document).find('.total-buy').css({
				'right': '-11px',
				'top': '-1px',
				'height': '26px',
				'width': '26px',
				'font-size': '14px',
				'font-weight': 'bold',
				'line-height': '25px'
			})
		}, 1000)
		setTimeout(function() {
			$(document).find('.total-buy').css({
				'right': '-8px',
				'top': '2px',
				'height': '20px',
				'width': '20px',
				'font-size': '13px',
				'font-weight': '500',
				'line-height': '20px'
			})
		}, 1500)
	})
</script>
