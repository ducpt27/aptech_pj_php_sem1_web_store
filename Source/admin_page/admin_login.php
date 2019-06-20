<?php
	session_start();
	require_once('database.php');
	$note = $data = '';

	$username_log = $password_log = '';

	if(isset($_POST['adm_username_log']) && isset($_POST['adm_password_log'])) {
		$username_log = $_POST['adm_username_log'];
		$password_log = $_POST['adm_password_log'];
	}

	if($username_log != '' && $username_log != '') {
		$sql = "SELECT * FROM `account` WHERE `UserName` = '".$username_log."' AND `Planlevel` >= 4 AND `Password` = '".$password_log."'";
		
		$data = executeResult($sql);

		if($data != null && count($data) > 0) {
			$_SESSION['adm_status'] = 'success';
			$_SESSION['adm_username'] = $username_log;
		} else {
			$note = '<p style="color: red">Sai tên đăng nhập hoặc mật khẩu</p>';
		}
	}

	if(isset($_SESSION['adm_status']) && $_SESSION['adm_status'] == 'success') {
		header('Location: admin_page.php');
		die();
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
</head>
<body style="background-color: #111 !important;">
	<div class="container" style="background-color: #222; color: #fff !important; margin-top: 120px">
		<h1 style="text-align: center;">AdminLogin</h1>
		<div class="row" style="padding-bottom: 50px;">
			<div class="col-md-2 hidden-xs"></div>
			<div class="col-md-8 col-xs-12">
				<form method="post">
					<div class="form-group">
						<label for="adm_username_log">User Name<span style="color: red;">*</span></label>
						<input id="adm_username_log" type="text" name="adm_username_log" class="form-control" required placeholder="Tên đăng nhập">
					</div>
					<div class="form-group">
						<label for="adm_password_log">Password<span style="color: red;">*</span></label>
						<input id="adm_password_log" type="password" name="adm_password_log" class="form-control" required placeholder="Mật khẩu">
					</div>
					<div style="text-align: center;margin-top: 20px;">
						<button type="submit" class="btn btn-success">Sign in</button>
					</div>
					<div style="text-align: center;margin-top: 20px;">
						<?=$note?>
					</div>
				</form>
			</div>
			<div class="col-md-2 hidden-xs"></div>
		</div>
	</div>
</body>
</html>