<link rel="stylesheet" type="text/css" href="include/css/style_payment.css">
<div class="container">
	<div id="change">
		<div class="pm-h">
			Địa chỉ nhận hàng | <span><a href="?page=address_list">Thêm địa chỉ mới</a></span>
		</div>
		<div class="row">
			<form method="post">
				<div class="col-md-9">
					<table class="table">
						<tbody>
							<?php
								$choose = $AddressID = '';
									if (isset($_POST['choose'])) {
									$choose = $_POST['choose'];
								}
								$AccountID = '';
								//require_once('database.php');

								if ($username != null && $username != '') {

									$sql = 'SELECT AccountID FROM account WHERE UserName = "'.$_SESSION['username'].'"';
									$AccountID = executeResult($sql);
									$AccountID = $AccountID[0]['AccountID'];
								}

								if ($AccountID != '') {

									$sql = 'SELECT * FROM address WHERE AccountID = '.$AccountID;
									$result = executeResult($sql);
									$isFind = false;
									foreach ($result as $value) {

										if (!$isFind) {

											echo '<tr>
												<td style="padding: 0" id="btn_radio-choose">
													<input type="radio" name="choose" value="'.$value["AddressID"].'" checked>
												</td>';
										} else {

											echo '<tr>
												<td style="padding: 0" id="btn_radio-choose">
													<input type="radio" name="choose" value="'.$value["AddressID"].'">
												</td>';
										}

										echo '<td>'.$value['FirstName'].' '.$value['LastName'].'</td>
												<td>'.$value['Address'].'</td>
												<td>'.$value['PhoneNumber'].'</td>';

										if (!$isFind) {

											echo '<td style="color: #999">Mặc định</td>
											</tr>';
											$isFind = true;
										} else {

											echo '<td style="color: #999"></td>
											</tr>';
										}
									}
								}
							?>
						</tbody>
					</table>
				</div>
				<button type="reset" class="btn-pm-back" style="width: 100px; margin-left: 15px">HỦY</button>
				<button type="submit" class="btn-pm" style="width: 100px">LƯU</button>
			</form>
		</div>
	</div>
	<div class="pm-h">Giỏ hàng <span><!-- (3 sản phẩm) --></span></div>
		<form class="form form_checkout" method="post" name="form_checkout">
			<div class="row" style="padding: 0 15px !important;">
				<div class="col-md-9 mg-btm-group" id="mg_btm_group" style="margin-bottom: 30px">
					<!-- Data localStorage-->
				</div>

				<div class="col-md-3">
					<table class="table table-h">

						<div class="co_address">
							<div style="font-size: 18px"><b>Thông tin giao hàng</b></div>
							<div class="co_ad_re">
								<i>Giao hàng tới </i>
								
							</div>
							<?php
								if (!isset($_SESSION['status'])) {
									$_SESSION['status'] = '';
								}
								if ($_SESSION['status'] != 'success') {
									echo '<div class="row">
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="">Tên:</label>
													<input type="text" class="form-control" name="f_lastname" required>
												</div>
											</div>
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<label for="">Họ:</label>
													<input type="text" class="form-control" name="f_firstname" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="">Số điện thoại:</label>
											<input type="text" minlength="10" maxlength="12" class="form-control" name="f_phonenumber" required>
										</div>
										<div class="form-group">
											<label for="">Địa chỉ nhận hàng:</label>
											<input type="text" minlength="30" maxlength="255" class="form-control" name="f_address" required>
										</div>';
								} else {
									echo '<div style="color: blue; float: right; padding-right: 5px; cursor: pointer;" onclick="change()">Chỉnh sửa</div>';
								}
							
								if ($AccountID != '' && $_SESSION['status'] == 'success') {

									if ($choose == '') {

										$sql = 'SELECT * FROM address WHERE AccountID = '.$AccountID;
									} else {

										$sql = 'SELECT * FROM address WHERE AddressID = '.$choose;
										$AddressID = $choose;
									}

									$result = executeResult($sql);
									if ($result) {
										$AddressID = $result[0]['AddressID'];
									}

									if ($result != null && $result != '') {

										echo '<div class="co_ad_name">'.$result[0]['FirstName'].' '.$result[0]['LastName'].'</div>
											<div class="co_ad_address">'.$result[0]['Address'].'</div>
											<div class="co_ad_phone">'.$result[0]['PhoneNumber'].'</div>';
									}
								}
							?>
						</div>

						<h4><b>Thông tin đơn hàng</b></h4>
						<tr class="table-1">
							<th>Tạm tính: </th>
							<th class="text-right"><span id="tamtinh"></span>₫</th>
						</tr>
						<tr class="table-1">
							<th>Phí vận chuyển: </th>
							<th class="text-right" id="ht_transportFee">₫</th>
							<input type="number" id="transportFee" name="transportFee" hidden required value="0">
							<?php
								if ($AddressID != '') {
									echo '<input type="number" id="choose" name="choose" hidden required value="'.$AddressID.'">';
								}
							?>
						</tr>
						<tr>
							<th>Tổng cộng: </th>
							<th class="text-right pm_cl"><span id="tongcong"></span>₫</th>
						</tr>
						<tr>
							<th colspan="2">
								<textarea name="note" id="note" maxlength="255" style="width: 100%; height: 90px; padding: 5px 10px" placeholder="Ghi chú khách hàng!"></textarea>
							</th>
						</tr>
					</table>
					<?php
						$username = '';
						if (isset($_SESSION["username"])) {
							$username = $_SESSION["username"];
						}
						if ($username != '') {
							$sql = 'SELECT COUNT(`address`.AddressID) AS number FROM account, address WHERE `account`.AccountID = `address`.AccountID AND `account`.UserName = "'.$username.'"';
							$result = executeResult($sql);
							if ($result != null && $result[0]['number'] > 0) {
								echo '<button type="submit" class="btn-pm submit_order" title="Xác nhận giỏ hàng">Thanh toán</button>';
							} else {
								echo '<small><i>Vui lòng đăng ký địa chỉ nhận hàng trước khi thanh toán!</i></small>';
							}
						} else {
							echo '<button type="submit" class="btn-pm submit_order" title="Xác nhận giỏ hàng">Thanh toán</button>';
						}
					?>
					
				</div>
			</div>
		</form>
	</div>
<?php
	include('include/php/process_pm_checkout.php');
?>
<script type="text/javascript" charset="utf-8" async defer>

	function change() 
	{
		var x = document.getElementById('change');
		if (x.style.display === 'none') {
			x.style.display = 'block';
		} else {
			x.style.display = 'none';
		}
	}

	tamtinh = 0;
	tongcong = 0;
	transportFee = 0;
	transportFee = parseFloat(document.getElementById('transportFee').value)

	arr = []
	json = localStorage.getItem('cart')
	if (json != null && json != '') {

		arr = JSON.parse(json)
		var html = ''

		for (i = 0; i < arr.length; i++) {

			tamtinh += parseInt(arr[i].number)*parseFloat(arr[i].price)
			tamtinh = parseFloat(tamtinh)

			html += '<div class="row mg-btm">'+
						'<div class="col-xs-2 pm-img">'+
							'<img src="'+arr[i].thumbnail+'">'+
						'</div>'+
						'<div class="col-xs-10">'+
							'<div class="pm-pd_name">'+
								arr[i].title+
							'</div>'+
							'<div class="pm-group-count">'+
								'Số lượng: <b>'+arr[i].number+'</b>'+
							'</div>'+
							'<div class="pm-pd-price pm_cl">'+arr[i].price+'₫</div>'+
						'</div>'+
					'</div>'+
					'<input type="number" name="buy['+i+'][id]" value="'+arr[i].id+'" hidden>'+
					'<input type="number" name="buy['+i+'][number]" value="'+arr[i].number+'" hidden>'
					//Gửi lên POST = mảng 2 chiều
		}
		tamtinh = parseFloat(tamtinh);
		tongcong = tamtinh;
		tongcong = parseFloat(tongcong);
		if (tongcong < 200000) {
			document.getElementById('transportFee').value = 30000;
			transportFee = 30000;
			document.getElementById('ht_transportFee').innerHTML = '30.000₫';
		} else {
			document.getElementById('transportFee').value = 0;
			transportFee = 0;
			tongcong += transportFee;
			document.getElementById('ht_transportFee').innerHTML = '<b style="color: green">Free ship<b>';
		}
		tongcong += transportFee;

		document.getElementById('tongcong').innerHTML = tongcong;
		document.getElementById("mg_btm_group").innerHTML = html;
		document.getElementById('tamtinh').innerHTML = tamtinh;
	}

	$(document).on('click','.submit_order', function(e) {
		e.preventDefault();

		$('.submit_order-img').css({
			'top': '35%',
			'opacity': 1,
			'visibility': 'visible'
		});

		setTimeout(function(){
			$('.submit_order-img').css({
				'top': '15%',
				'opacity': 0,
				'visibility': 'hidden'
			});
		}, 3000)

		setTimeout(function(){
			$('.form_checkout').submit();
		}, 3300)
	});
</script>
<div class="submit_order-img">
	<p><b><i class="far fa-check-circle"></i> Đặt hàng thành công! </b></p>
	<p><b>Đơn hàng sẽ được giao đến bạn sớm nhất!</b></p>
</div>
