<?php
	$username_log = $password_log = $status = $note = '';
	if (isset($_SESSION['status'])) {
		$status = $_SESSION['status'];
	}
	if ($status == 'success') {
		echo '<script type="text/javascript" charset="utf-8">
				$(document).ready(
					setInterval(function(){
						window.location.href = "vinegarfood.php";
					}, 1000)
				);
			</script>';
		//header('Location: vinegarfood.php');
		die();
	}
	if (isset($_POST['username_log']) && isset($_POST['password_log'])) {
		$username_log = $_POST['username_log'];
		$password_log = $_POST['password_log'];
	}
	if ($username_log != '' && $password_log != '') {
		$sql = 'SELECT * FROM account WHERE UserName = "'.$username_log.'" AND Password = "'.$password_log.'"';
		$result = executeResult($sql);
		if ($result != null && count($result) > 0) {
			$_SESSION['status'] = 'success';
			$_SESSION['username'] = $username_log;
			echo '<script type="text/javascript" charset="utf-8">
					$(document).ready(
						setTimeout(function(){
							alert("Đăng nhập thành công");
							window.location.href = "vinegarfood.php";
						}, 1000)
					);
				</script>';
			//header('Location: vinegarfood.php');
			die();
		} else {
			$note = '<b style="color: red">Tên đăng nhập hoặc mật khẩu không đúng! Vui lòng thử lại</b>';
		}
	}
?>
<div class="container">
	<h1 style="color: #333;text-align: center;"> Đăng nhập tài khoản</h1>
	<center><?=$note?></center>
	<div class="row" style="margin-bottom: 30px">
		<div class="col-md-2 hidden-xs"></div>
		<div class="col-md-8 col-xs-12">
			<form method="post">
				<div class="form-group">
					<label for="0">User Name<span style="color: red;">*</span></label>
					<input id="0" type="text" name="username_log" class="form-control" required placeholder="Tên đăng nhập">
				</div>
				<div class="form-group">
					<label for="password">Password<span style="color: red;">*</span></label>
					<input type="password" name="password_log" class="form-control" id="password" required placeholder="Mật khẩu">
				</div>
				<div style="text-align: center;margin-top: 20px;">
					<button type="submit" class="btn btn-success">Đăng nhập</button>
				</div>
				<div style="font-weight: bolder;text-align: center;margin-top: 20px;">
					<a href="?page=forgetpassword">Quên mật khẩu</a>
				</div>
				<div style="text-align: center;margin-top: 20px;">
					Bạn chưa có tài khoản.<span><a href="?page=register"> Đăng kí</a></span> tại đây.
				</div>
			</form>	
		</div>
		<div class="col-md-2 hidden-xs"></div>
	</div>
</div>