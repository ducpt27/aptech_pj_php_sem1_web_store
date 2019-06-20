<?php
	if (isset($_SESSION['username']) && isset($_SESSION['status'])) {

		$username = $_SESSION['username'];
		$status = $_SESSION['status'];

		if ($username == null || $username == '') {

			echo '<center><b style="color: red">Vui lòng đăng nhập!</b></center>';
			die();
		}
	}
?>