<?php
	session_start();
	require_once('database.php');
	if ( isset($_SESSION['adm_status']) && $_SESSION['adm_status'] == 'success' ) {
		header('Location: admin_page.php');
		die();
	}

	$username_reg = $password_reg = $email_reg = $phonenumber_reg = '';
	$firstname_reg = $lastname_reg = '';
	if(isset($_POST['adm_username_reg']) && isset($_POST['adm_password_reg']) && isset($_POST['adm_email_reg'])) {
		$username_reg = $_POST['adm_username_reg'];
		$password_reg = $_POST['adm_password_reg'];
		$email_reg = $_POST['adm_email_reg'];
		$phonenumber_reg = $_POST['adm_phonenumber_reg'];
		$firstname_reg = $_POST['adm_firstname_reg'];
		$lastname_reg = $_POST['adm_lastname_reg'];
	}
		

	$sql = $sql2 = '';
	$result = '';
	$note = '';
	if($username_reg != '' && $password_reg != '' && $email_reg != '') {
		$sql = 'INSERT INTO `account`(`Email`, `PhoneNumber`, `UserName`, `Password`, `FirstName`, `LastName`) VALUES ("'.$email_reg.'", "'.$phonenumber_reg.'", "'.$username_reg.'", "'.$password_reg.'", "'.$firstname_reg.'", "'.$lastname_reg.'")';

		$sql2 = 'select * from account where UserName= "'.$username_reg.'"';
		$result = executeResult($sql2);

		if ($result== '' || count($result)>0) {
			# code...
			$note = '<p style="color:red;text-align:center;">'.'Tên đăng nhập đã tồn tại vui lòng chọn tên đăng nhập khác!'.'</p>';
		}
		else{
			execute($sql);
			header('Location: admin_login.php');
			die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
</head>
<body style="background-color: #111 !important;">
	<div class="container" style="background-color: #222; color: #fff !important; margin-top: 120px;">
		<h1 style="text-align: center;">Form đăng kí</h1>
		<div class="row" style="padding-bottom: 50px;">
			<div class="col-md-2 hidden-xs"></div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<?=$note?>
					<form method="post">
						<div class="col-xs-6">
							<div class="form-group">
								<label for="12">Firts Name<span style="color: red;">*</span></label>
								<input id="12" type="text" name="adm_firstname_reg" class="form-control" required placeholder="Tên">
							</div>
							<div class="form-group">
								<label for="13">Last Name<span style="color: red;">*</span></label>
								<input id="13" type="text" name="adm_lastname_reg" class="form-control" required placeholder="Họ">
							</div>
							<div class="form-group">
								<label for="0">User Name<span style="color: red;">*</span></label>
								<input id="0" type="text" name="adm_username_reg" class="form-control" required placeholder="Tên đăng nhập">
							</div>
							<div class="form-group">
								<label for="password">Password<span style="color: red;">*</span></label>
								<input type="password" name="adm_password_reg" class="form-control" id="password" required placeholder="Mật khẩu">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="confirmpassword">Confirm Password<span style="color: red;">*</span></label>
								<input type="password" name="adm_confirmpassword_reg" id="confirmpassword" class="form-control" placeholder="Xác nhận mật khẩu" required onchange="check()">
							</div>
							<div class="form-group">
								<label for="3">Email<span style="color: red;">*</span></label>
								<input id="3" type="email" name="adm_email_reg" class="form-control" placeholder=" Email" required>
							</div>
							<div class="form-group">
								<label for="4">Phone Number<span style="color: red;">*</span></label>
								<input id="4" type="text" name="adm_phonenumber_reg" class="form-control" placeholder="Số điện thoại" required>
							</div>
							<div style="text-align: center;margin-top: 20px;">
								<button type="submit" class="btn btn-success">Đăng kí </button>
							</div>
							<div style="text-align: center;margin-top: 20px;">
								Bạn đã có tài khoản.<span><a href="admin_login.php"> Đăng nhập</a></span> tại đây.
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-2 hidden-xs"></div>
		</div>
	</div>
</body>
</html>