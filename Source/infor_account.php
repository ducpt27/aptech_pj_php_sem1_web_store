<?php
	include('checkforstatus_success.php');
?>
<style>
	.infor {
		background-color: #fff;
		min-height: 460px;
	}
	.avatar img {
		width: 100%;
		object-fit: cover;
		background-color: #F5F6FA;
		border-radius: 50%;
	}
</style>
<div class="container-fluid infor">
<div class="container">
	<div class="row">
		<?php
			include('checkforstatus_success.php');
			if ($username != '') {
				$sql = 'SELECT * FROM account WHERE UserName = "'.$username.'"';
				$result = executeResult($sql);
			}
		?>
		<div class="col-md-2"></div>
		<div class="col-md-2">
			<div class="avatar">
				<img src="https://i.postimg.cc/cJZ4txRM/avatar-demo0-1.png" title="Ảnh đại diện">
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-4">
					<h4>ducpham27</h4>
				</div>
				<div class="col-xs-7">
					<button class="btn"><b>Chỉnh sửa thông tin</b></button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-3">
					68 đơn hàng
				</div>
				<div class="col-xs-4">
					312 sản phẩm đã mua
				</div>
				<div class="col-xs-4">
					0 phản hồi
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-5">
					<p><b>Trung Đức</b></p>
				</div>
				<div class="col-xs-5">
					<p><i>Level: Khách hàng VIP</i></p>
				</div>
				<div class="col-xs-1"></div>
			</div>
			<br><br><br>
			<div class="row">
				<div class="col-xs-12">
					<table class="table">
						<tr>
							<td>Giới tính:</td>
							<td>nam</td>
						</tr>
						<tr>
							<td>Email:</td>
							<td>ducpham27022k@gmail.com</td>
						</tr>
						<tr>
							<td>Số điện thoại:</td>
							<td>0363523090</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</div>