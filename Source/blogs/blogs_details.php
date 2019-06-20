<?php
	$blogid='';
	if (isset($_GET['blogid'])) {
		$blogid=$_GET['blogid'];
	}
	const servername='localhost';
	const username='root';
	const password='';
	const database='vinegarfood';
	function executeresult12($sql){
		$conn= new mysqli(servername,username,password,database);
		mysqli_set_charset($conn,'utf8');
		$result=mysqli_query($conn,$sql);
		$data=[];
		if ($result!='') {
			# code...
			while ($row=mysqli_fetch_array($result,1)) {
				# code...
				$data[]=$row;
			}
		}
		return $data;
	}
	if($blogid != '') {
		$sql='select * from blog where BlogID ='.$blogid.'';
		$result=executeresult12($sql);
	} 
	$sql='Select * from blog order by ViewCounts desc limit 3';
	$result3=executeresult12($sql);
	$sql='select * from categoryblog ';
	$result1=executeresult12($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vinegar Food | <?php foreach ($result as $row ) {
		# code...
		echo $row['Title'];
	}?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<style type="text/css">
		.text1:hover{
			color: red !important;
		}
		.text1:hover a {
			color: red !important;
		}
		.text1 {
			color: black !important;
		}
		.text1 a {
			color: black !important;
		}
		.text2:hover {
			color: red !important;
		}
		.text2:hover a {
			color: red !important;
		}
		.text2 {
			color: gray !important;
		}
		.text2 a {
			color: gray !important;
		}
		.content_he {
			display: none;
		}
		.title_he {
			padding: 0 15px;
		}
		.thumbnail_blog {
			width: 95%;
			max-width: 650px;
			max-height: 350px;
			object-fit: cover;
		}
	</style>
</head>
<body>
<!--  -->
	<div class="container">
		<div class="row">
			<div class="col-xs-9">
				<?php 
					if($result != null && $result != '') {
						foreach ($result as $row) {
							echo '<p><h3><b> '.$row['Title'].'</b></h3></p></br>';
						} 
					}
					if($result != null && $result != '') {
						foreach ($result as $row ) {
							echo '<p><small style="color: gray"> Đăng bởi <b> '.$row['Author'].
									'</b> vào lúc '.$row['CreateDate'].'</small></p>
								<p><h4><b>'.$row['Title'].'</b></h4></p>
								<p style="text-align: center;">
									<img src="'.$row['Thumbnail'].'" class="thumbnail_blog" >
								</p>
								<p style="text-align: center;"><small></small></p>
								'.htmlspecialchars_decode($row['Content']).'
								</div>';
						}
					}
				?>
				<div class="col-xs-3" style="float: right;" >
					<div style="background-color: #E73918; text-align: center; padding-bottom: 3px; padding-top: 3px; color: white; cursor: pointer;">
						<h4>DANH MỤC</h4>
					</div>
					<div style="text-align: left; padding: 0px; cursor: pointer;" class="padding">
						<p><ul class="nav nav-pills nav-stacked">
							<li>
								<?php
									if($result1 != null && $result1 != '') {
										foreach ($result1 as $row) {
											echo '<div class="title_he" onclick="hienthi("'.'content_he1'.'")">
											<a class="text1" style="text-decoration: none;"href="#" title="">'.$row['Title'].'</a>
											<span class="text1"><i style="float: right;" class="fas fa-angle-down"></i></span>
										</div>';
										}
									}	
								?>
							</li>
						</ul></p>

					<div style="background-color: #E73918; text-align: center; padding-bottom: 3px; padding-top: 3px; color: white">
						<h4>XEM NHIỀU NHẤT</h4>
					</div>
						</br>
						<?php
							if($result3 != null && $result3 != '') {
								foreach ($result3 as $row ) {
									echo '<div class="row" style="cursor: pointer; margin: 10px -15px">
											<div class="col-md-4">
												<a href="?page=blogs&blogid='.$row['BlogID'].'">
													<img src="'.$row['Thumbnail'].'" class="thumbnail_blog">
												</a>
											</div>
											<div class="col-md-8">
												<a href="?page=blogs&blogid='.$row['BlogID'].'" style="text-decoration: none;"  title="">
													<p  class="text1"><b>'.$row['Title'].'</b></p>
												</a>
													<p style="font-size: 10px; color: gray"><i>'.$row['CreateDate'].'</i></p>
											</div>
										</div>';
								}
							}
						?>
					<div class="text2" style="text-align: center; margin-top: 15px">
						<a href="#" style="text-decoration: none;"> Xem Thêm </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function hienthi(p) {
			if(document.getElementById(p).style.display == 'none') {
				document.getElementById(p).style.display = 'block';
			} else {
				document.getElementById(p).style.display = 'none';
			}
		}
	</script>
</body>
</html>