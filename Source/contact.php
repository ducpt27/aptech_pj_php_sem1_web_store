<?php
	const servername='localhost';
	const username='root';
	const password='';
	const database='vinegarfood';
	$sql='';
	$note = '';
	$ten=$ho=$email=$chude=$noidung='';
	if(isset($_POST['ten']) && isset($_POST['ho']) &&isset($_POST['chude']) && isset($_POST['noidung']) && isset($_POST['email'])){
		$ten=$_POST['ten'];
		$ho=$_POST['ho'];
		$chude=$_POST['chude'];
		$noidung=$_POST['noidung'];
		$email=$_POST['email'];
	if ($ten!='' && $ho!='' && $email!='' && $chude!='' && $noidung!='')  {
		# code...
		$conn=new mysqli(servername,username,password,database);
		mysqli_set_charset($conn,'utf8');
		$sql='insert into feedback(FirstName ,LastName,Email,Title,Content,CreateDate) values ("'.$ho.'","'.$ten.'","'.$email.'","'.$chude.'","'.$noidung.'",CURTIME())';
		mysqli_query($conn,$sql);
		mysqli_close($conn);
		$note = "<b style='color: green'>Cảm ơn bạn đã phản hồi</b>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liên hệ & Phản hồi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand"/>
    <link rel="stylesheet" href="include/css/style_directional.css" type="text/css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<style type="text/css" media="screen">
		/**font**/
		* {
			font-family: 'Quicksand', sans-serif !important;
		}
		.fab {
			font-family: "Font Awesome 5 Brands" !important;
		}
		.fa, .far, .fas {
			font-family: "Font Awesome 5 Free" !important;
		}
		/**font**/

		.bd tbody tr td {
			border-top: none !important;
		}
		#bando {
			width: 100%;
			height: 500px;
		}
	</style>
</head>
<body>
	<div class="container" style="margin-top:50px;">
		<center><?=$note?></center>
		<h1 style="font-weight: bold;"> 
			VINEGAR FOOD - Món ngon đích thực , cuộc sống đích thực
		</h1>
		<h3 style="line-height: 50px;">
			Hãy liên hệ cho chúng tôi ngay hôm ngay để được trải nghiệm những món ăn ngon, hấp dẫn, chất lượng hàng đầu của VINEGAR FOOD.
			<br>
			Mọi thắc măc hay đánh giá về VINEGAR FOOD xin vui lòng liên hệ ngay cho chúng tôi.
			<br>
			<h5>
				24/7 : VINEGAR FOOD - Người bạn của mọi bữa ăn.
			</h5>
		</h3>
		<div class="row" >
			<div class="col-md-4 col-xs-6"style="margin-top: 60px;">
				<div style="text-align: center;">
					<a href="" style="text-decoration: none;"><i class="fas fa-map-marker-alt" style="font-size: 80px;"></i></a>
				</div>
				<div style="text-align: center;margin-top: 20px;">
					<h4 style="font-weight: bold;">ĐỊA CHỈ</h4>
					285 Đội Cấn ,Ba Đình , Hà Nội
				</div>
			</div>
			<div class="col-md-4 col-xs-6"style="margin-top: 60px;">
				<div style="text-align: center;">
					<a href="" style="text-decoration: none"><i class="fas fa-phone" style="font-size: 80px;"></i></a>
				</div>
				<div style="text-align: center;margin-top: 20px;">
					<h4 style="font-weight: bold;">CALL</h4>
					<a href="" style="text-decoration: none;">+84 123 456 789</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12"style="margin-top: 60px;">
				<div style="text-align: center;">
					<a href="" style="text-decoration: none;"><i class="far fa-envelope" style="font-size: 80px;"></i></a>
				</div>
				<div style="text-align: center;margin-top: 20px;">
					<h4 style="font-weight: bold;">EMAIL</h4>
					<a href="vinegarfood183@gmail.com" style="text-decoration: none;"> vinegarfood183@gmail.com </a>
				</div>
			</div>
		</div>
		<div style="margin-top: 100px;margin-left: 20%;margin-right: 20%;">
			<h1 style="font-weight: bold; text-align: center">Điền thông tin phản hồi</h1>
			<form method="post">
				<div class="row">
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="ten">Tên</label>
							<input type="text" name="ten" id="ten" class="form-control" required>
						</div>
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="ho">Họ</label>
							<input type="text" name="ho" id="ho" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control" required>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="chude">Chủ đề</label>
							<input type="text" name="chude" id="chude" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label for="noidung">Nội dung</label>
							<textarea required type="text" name="noidung" id="noidung" class="form-control" cols="10" style="height: 100px;"></textarea>
						</div>
					</div>
				</div>
				<div style="text-align: center;">
					<button type="submit" class="btn btn-success" style="width: 100px">Gửi</button>
				</div>
			</form>
		</div>
	</div>
	<div class="container-fuild" style="margin-top: 45px; margin-bottom: -30px">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8719004726663!2d105.80739231488351!3d21.037810985993435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab145bf89bd7%3A0xd94a869b494c04b6!2zMjg1IMSQ4buZaSBD4bqlbiwgVsSpbmggUGjDuiwgQmEgxJDDrG5oLCBIw6AgTuG7mWkgMTAwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1551456026962" id="bando" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</body>
</html>