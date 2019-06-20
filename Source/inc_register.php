<?php
	$note = $status = '';
	if (isset($_SESSION['status'])) {
		$status = $_SESSION['status'];
	}
	if ($status == 'success') {
		echo '<script type="text/javascript" charset="utf-8">
					$(document).ready(
						setTimeout(function(){
							window.location.href = "vinegarfood.php";
						}, 1000)
					);
				</script>';
		//header('Location: vinegarfood.php');
		die();
	}
	$firstname_reg = $lastname_reg = $username_reg = $password_reg = $email_reg = $phonenumber_reg = '';

	if (isset($_POST['firstname_reg']) && isset($_POST['lastname_reg']) && isset($_POST['password_reg']) && isset($_POST['username_reg']) && isset($_POST['email_reg']) ) {
		$firstname_reg = $_POST['firstname_reg'];
		$lastname_reg = $_POST['lastname_reg'];
		$password_reg = $_POST['password_reg'];
		$username_reg = $_POST['username_reg'];
		$email_reg = $_POST['email_reg'];
		$phonenumber_reg = $_POST['phonenumber_reg'];
	}
	
	if ($username_reg != '' && $password_reg != '' && $email_reg != '') {
		$sql = 'SELECT * FROM account WHERE UserName = "'.$username_reg.'" OR Email = "'.$email_reg.'"';
		$result = executeResult($sql);
		if ($result != null && count($result) > 0) {
			$note = '<b style="color: red">Tên đăng nhập hoặc email đã tồn tại! Vui lòng chọn tên đăng nhập hoặc email khác</b>';
		} else {
			$sql = 'INSERT INTO account (Email, PhoneNumber, UserName, Password, FirstName, LastName) 
					VALUES ("'.$email_reg.'", "'.$phonenumber_reg.'", "'.$username_reg.'", "'.$password_reg.'", "'.$firstname_reg.'", "'.$lastname_reg.'")';
			execute($sql);
			$note = '<b style="color: green">Đăng ký thành công</b>';
			echo '<script type="text/javascript" charset="utf-8">
					$(document).ready(
						setTimeout(function(){
							alert("Đăng ký thành công");
							window.location.href = "vinegarfood.php?page=login";
						}, 1000)
					);
				</script>';			
			die();
		}
	}
?>
	<script type="text/javascript">
		function check(){
			var password = document.getElementById('password').value;
			var confirmpassword = document.getElementById('confirmpassword').value;
			if (password != confirmpassword) {
				document.getElementById('confirmpassword').value='';
				alert('Mật khẩu xác nhận không đúng!');
			}
		}
	</script>
	<div class="container">
		<h1 style="text-align: center;">Đăng kí tài khoản</h1>
		<div class="row" style="margin-bottom: 30px">
			<div class="col-md-2 hidden-xs"></div>
			<div class="col-md-8 col-xs-12">
				<center><?=$note?></center>
				<form method="post">
					<div class="form-group">
						<label for="12">Firts Name<span style="color: red;">*</span></label>
						<input id="12" type="text" name="firstname_reg" class="form-control" required placeholder="Tên">
					</div>
					<div class="form-group">
						<label for="13">Last Name<span style="color: red;">*</span></label>
						<input id="13" type="text" name="lastname_reg" class="form-control" required placeholder="Họ">
					</div>
					<div class="form-group">
						<label for="0">User Name<span style="color: red;">*</span></label>
						<input id="0" type="text" name="username_reg" class="form-control" required placeholder="Tên đăng nhập">
					</div>
					<div class="form-group">
						<label for="password">Password<span style="color: red;">*</span></label>
						<input type="password" name="password_reg" class="form-control" id="password" required placeholder="Mật khẩu">
					</div>
					<div class="form-group">
						<label for="confirmpassword">Confirm Password<span style="color: red;">*</span></label>
						<input type="password" name="confirmpassword_reg" id="confirmpassword" class="form-control" placeholder="Xác nhận mật khẩu" required onchange="check()">
					</div>
					<div class="form-group">
						<label for="3">Email<span style="color: red;">*</span></label>
						<input id="3" type="email" name="email_reg" class="form-control" placeholder=" Email" required>
					</div>
					<div class="form-group">
						<label for="4">Phone Number<span style="color: red;">*</span></label>
						<input id="4" type="text" name="phonenumber_reg" class="form-control" placeholder="Số điện thoại" required>
					</div>
					<div style="text-align: center;margin-top: 20px;">
						<button type="submit" class="btn btn-success">Đăng kí </button>
					</div>
					<div style="text-align: center;margin-top: 20px;">
						Bạn đã có tài khoản.<span><a href="?page=login"> Đăng nhập</a></span> tại đây.
					</div>
				</form>
			</div>
			<div class="col-md-2 hidden-xs"></div>
		</div>
	</div>