<?php
	$AccountID = $LastName = $FirstName = $Address = $PhoneNumber = '';
	$note = '';

	include('checkforstatus_success.php'); //get -> $username and $status

	if ($username != null && $username != '') {

		$sql = 'SELECT AccountID FROM account WHERE UserName = "'.$_SESSION['username'].'"';
		$AccountID = executeResult($sql);
		$AccountID = $AccountID[0]['AccountID'];
	}

	if (isset($_POST['lastname'])) {
		$LastName = $_POST['lastname'];
	}
	if (isset($_POST['firstname'])) {
		$FirstName = $_POST['firstname'];
	}
	if (isset($_POST['address'])) {
		$Address = $_POST['address'];
	}
	if (isset($_POST['phonenumber'])) {
		$PhoneNumber = $_POST['phonenumber'];
	}

	if ($AccountID != '' && $LastName != '' && $FirstName != '' && $Address != '' && $PhoneNumber != '') {

		$sql = 'SELECT count(AddressID) AS number FROM address WHERE AccountID = '.$AccountID.' AND Address = "'.$Address.'"';
		$result = executeResult($sql);

		if ($result != null && $result[0]['number'] > 0) {

			$note = '<center><b style="color: red">Địa chỉ đã tồn tại trên hệ thống! Vui lòng kiểm tra lại!</b></center>';
		} else {

			$sql = 'INSERT INTO address(AccountID, LastName, FirstName, PhoneNumber, Address)
					VALUES(
						"'.$AccountID.'",
						"'.$LastName.'",
						"'.$FirstName.'",
						"'.$PhoneNumber.'",
						"'.$Address.'"
					)';
			execute($sql);
			$note = '<center><b style="color: green">Đã thêm địa chỉ mới</b></center>';
		}
	}
?>
<link rel="stylesheet" href="include/css/style_quanlytaikhoan.css">
	<div class="container">
		<h4><b>Sổ địa chỉ</b></h4>
				<?=$note?>

		<div class="tt-table_sdc">

			<table class="table">
				<tbody>
					<tr style="background-color: #F5F6FA">
						<th>Tên</th>
						<th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th></th>
					</tr>
					<?php
						if ($AccountID != '') {
							$sql = 'SELECT * FROM address WHERE AccountID = '.$AccountID;
							$result = executeResult($sql);
							foreach ($result as $value) {
								
								echo '<tr>
										<td>'.$value['FirstName'].' '.$value['LastName'].'</td>
										<td>'.$value['Address'].'</td>
										<td>'.$value['PhoneNumber'].'</td>
										<td><a href="#">Chỉnh sửa
											<p class="hidden-md hidden-lg" style="color: #666"><i>(Mặc định)</i></p>
										</a></td>
									</tr>';
							}
						}
					?>
				</tbody>
			</table>

			<div class="tt-table-sdc_add" id="form-add_address">
				<br>
				<hr>
				<h4><b>Điền thông tin</b></h4>
				<form method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên: </label>
								<input type="text" class="form-control" name="lastname" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Họ: </label>
								<input type="text" class="form-control" name="firstname" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Số điện thoại: </label>
								<input type="text" class="form-control" name="phonenumber" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Địa chỉ: </label>
								<input type="text" class="form-control" name="address" required>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Thêm</button>
				</form>
			</div>

			<div onclick="add_address(1)" class="btn-qltk" id="btn-add_address" style="padding: 7px 20px; max-width: 200px">
				+ Thêm địa chỉ mới
			</div>

			<hr>
			<a href="?page=account_management"><div style="width: 250px;">
				<i class="fas fa-angle-double-left"></i> Quản lý tài khoản
			</div></a>
			
		</div>
	</div>
<script type="text/javascript" charset="utf-8" async defer>
	function add_address(n) {
		if(n == 1) {
			document.getElementById('form-add_address').style.display = "block";
			document.getElementById('btn-add_address').style.display = "none";
		} else if(n == 0) {
			document.getElementById('form-add_address').style.display = "none";
			document.getElementById('btn-add_address').style.display = "block";
		}
	}
</script>