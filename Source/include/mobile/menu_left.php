<style type="text/css" media="screen">
	/**  STYLE 1 copyright: https://codepen.io/akinjide/pen/BpggrZ */
.scrollbar-design::-webkit-scrollbar {
	width: 7px;
	background-color: #F5F5F5;
}
.scrollbar-design::-webkit-scrollbar-thumb {
	border-radius: 7px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #888;
}
.scrollbar-design::-webkit-scrollbar-track {
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 7px;
	background-color: #F5F5F5;
}	
</style>
<div class="visible-sm visible-xs mobile-menu">
	<!-- for mobile -->
		<div class="mb-account" style="height: 70px">
			<div class="mb-account-icon">
				<img src="https://png.pngtree.com/svg/20170331/businessman_863430.png" width="100%">
			</div>
			<div class="mb-account-text">
				<a href="?page=login"><p>ĐĂNG NHẬP</p></a>
				<p>Để nhận nhiều ưu đãi hơn</p>
			</div>
		</div>
		<!-- mb-status 60px - margin: 10px 0; -->
		<div class="mb-status" style="height: 60px; border-bottom: 2px solid #F5F6FA;">
			<a href="?page=register" style="color: #333"><p>Đăng ký</p></a>
			<p>Free ship cho đơn hàng trên 200.000₫</p>
		</div>
		<div class="mb-show">
			<div class="mb-show-h">Danh mục sản phẩm</div> 
			<div class="mb-show-list scrollbar-design">
				<hr>
				<?php
					function executeResult11($sql) {
						//connection to database
						$conn = new mysqli('localhost', 'root', '', 'vinegarfood');
						mysqli_set_charset($conn, 'utf8');

						//query
						$resultset = mysqli_query($conn, $sql);
						$data      = [];

						while ($row = mysqli_fetch_array($resultset, 1)) {
							$data[] = $row;
						}

						//close connection
						mysqli_close($conn);

						return $data;
					}
					$sql_cate_l = 'SELECT * FROM categoryproduct WHERE CategoryParent = 0 AND Status = 1';
					$result_cate_l = executeResult11($sql_cate_l);
					foreach ($result_cate_l as $value) {
						echo '<div class="mb-s-l-item">
								<a href="?page=listproduct&CategoryID='.$value["CategoryID"].'"><p class="margin-0"><b>'.$value["CategoryName"].'</b></p></a>';

						$sql_cate_l_c = 'SELECT * FROM categoryproduct WHERE Status = 1 AND CategoryParent = "'.$value['CategoryID'].'"';

						$result_cate_l_c = executeResult11($sql_cate_l_c);
						if ($result_cate_l_c) {
							echo '<div class="ms-s-l-item-c">';
							foreach ($result_cate_l_c as $value) {
								echo '<a href="?page=listproduct&CategoryID='.$value["CategoryID"].'"><div class="ms-s-l-item-child">'.$value["CategoryName"].'</div></a>';
							}
							echo '</div>';
						}		
						echo '</div><hr>';
					}
				?>
			</div>
		</div>
		<div class="mb-show-category" style="height: 165px">
			<div class="mb-show-h">Danh mục</div> 
			<div class="mb-show-list2 scrollbar-design" style="height: 130px">
				<hr>
				<div class="mb-s-l-item mb-item-ac">
					<a href="?page=home"><b>Trang chủ</b></a>
				</div>
				<hr>
				<div class="mb-s-l-item mb-item-ac">
					<a href="?page=introduce"><b>Giới thiệu</b></a>
				</div>
				<hr>
				<div class="mb-s-l-item mb-item-ac">
					<a href="?page=listproduct"><b>Món ăn</b></a>
				</div>
				<hr>
				<div class="mb-s-l-item mb-item-ac">
					<a href="?page=album"><b>Sưu tập</b></a>
				</div>
				<hr>
				<div class="mb-s-l-item mb-item-ac">
					<a href="?page=service"><b>Dịch vụ</b></a>
				</div>
				<hr>
				<div class="mb-s-l-item mb-item-ac">
					<a href="?page=blogs"><b>Công thức tháng</b></a>
				</div>
				<hr>
				<div class="mb-s-l-item mb-item-ac">
					<a href="?page=contact"><b>Liên hệ</b></a>
				</div>
				<hr>
			</div>
		</div>
		<div class="mb-contact" style="height: 90px">
			<p style="padding-left: 5px;"><b>HỖ TRỢ</b></p>
			<div class="mb-ct-list">
				<p><i class="fas fa-phone-volume"></i> HOTLINE: <span>0123 456 789</span></p>
				<p><i class="fas fa-envelope"></i> EMAIL: <span>vinegarfood183@gmail.com</span></p>
			</div>
		</div>
	</div>
	<div class="mobile-menu-off"></div>
	<script type="text/javascript" charset="utf-8">
		setInterval(function() {

			height1 = parseInt(screen.height) - 60 - 70 - 180 - 90;
			cao = height1 + 'px';
			height3 = height1 - 34;
			cao3 = height3 + 'px';

			$(".mb-show").css({
				'height': cao
			});
			$(".mb-show-list").css({
				'height': cao3
			})
			$('.mobile-menu-off').css({
				'width': parseInt(screen.width)+'px'
			})
			$('.mobile-menu').css({
				'height': parseInt(screen.height)+'px'
			})
		})

		$('.mobile-menu').css({
			'left': '-290px'
		})

		$(document).on('click', '.menu-left_icon', function(e) {
			e.preventDefault();
			$('.mobile-menu').css({
				'left': 0
			});
			$('.mobile-menu-off').css({
				'opacity': '0.8',
				'visibility': 'visible'
			});
		})
		$(document).on('click', '.mobile-menu-off', function(e) {
			e.preventDefault();
			$('.mobile-menu').css({
				'left': '-290px'
			});

			$('.mobile-menu-off').css({
				'opacity': '0',
				'visibility': 'hidden'
			});
		})
	// <!-- end for mobile -->
</script>