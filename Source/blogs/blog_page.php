<?php
	// const servername='localhost';
	// const username='root';
	// const password='';
	// const database='vinegarfood';
	// function executeresult($sql){
	// 	$conn= new mysqli(servername,username,password,database);
	// 	mysqli_set_charset($conn,'utf8');
	// 	$result=mysqli_query($conn,$sql);
	// 	$data=[];
	// 	if ($result!='') {
	// 		# code...
	// 		while ($row=mysqli_fetch_array($result,1)) {
	// 			# code...
	// 			$data[]=$row;
	// 		}
	// 	}
	// 	return $data;
	// }
	$sql='select * from categoryblog';
	$result1=executeresult($sql);

	$sql='select * from blog order by CreateDate limit 0,4';
	$result2=executeresult($sql);

	$sql='Select * from blog order by ViewCounts desc limit 3';
	$result3=executeresult($sql);

	$sql='select count(BlogID) as number from blog';
	$count=executeresult($sql);
	$number='';
	if ($count!='') {
		# code...
		$number=$count[0]['number'];
	}
	$pages=ceil($number/5);
	$page_blog=1;
	if (isset($_GET['page_blog'])) {
		# code...
		$page_blog=$_GET['page_blog'];
	}
	$index=($page_blog-1)*5;
	$sql='select * from blog order by CreateDate desc limit '.$index.',5';
	$result=executeresult($sql);
?>
	<style type="text/css">
		* {box-sizing: border-box;}

		.img {
		  position: relative;
		  width: 200px;
		}

		.img1{
		  display: block;
		  width: 100%;
		  height: auto;
		}

		.overlay {
		  position: absolute; 
		  bottom: 0; 
		  background: rgb(0, 0, 0);
		  background: rgba(0, 0, 0, 0.5);
		  color: #f1f1f1; 
		  width: 100%;
		  transition: .5s ease;
		  opacity:0;
		  color: white;
		  font-size: 15px;
		  padding: 10px;
		  text-align: center;
		}

		.img:hover .overlay {
		  opacity: 1;
		}
		body{
			padding-bottom: 20px;
		}
		.text1:hover{
			color: #E73918 !important;
		}
		.text1:hover a {
			color: #E73918 !important;
		}
		.text1 {
			color: black !important;
		}
		.text1 a {
			color: black !important;
		}
		.text2:hover {
			color: #E73918 !important;
		}
		.text2:hover a {
			color: #E73918 !important;
		}
		.text2 {
			color: gray !important;
		}
		.text2 a {
			color: gray !important;
		}
		.hover1 figure img {
			height: auto;
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover1 figure:hover img {
			width: 300px;
		}
		.button {
			color: black;
		}
		.button a {
			color: black;
		}
		.button:hover {
			color: #4CAF50;
		}
		.button:hover a {
			color: #4CAF50;
		}
		.content_he {
			display: none;
		}
		.title_he {
			padding: 0 15px;
		}
		.border {
			border-radius: 10px;
			border: 5px solid #E73918;
			padding: 5px;
			padding-bottom: 20px;
			padding-top: 10px;
			padding-right: 20px;
		}


		.clearfix {
		  overflow: auto;
		}
		.thumbnail_blogs {
			width: 100%;
		}
		.blog_page b {
			color: #002049;
		}
		.btn-blog-at {
			background-color: #E73918;
			border: none;
			color: white;
			font-weight: bold;
			min-width: 40px;
			height: 30px;
			line-height: 30px;
			border-radius: 3px;
		}
		.btn-blog-at:hover {
			color: #fff;
		}
		.btn-blog {
			background-color: inherit;
			border: none;
			color: #333;
			font-weight: bold;
			min-width: 40px;
			height: 30px;
			line-height: 30px;
			border-radius: 3px;
		}
	</style>
<body class="blog_page">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<p><h3>TẤT CẢ TIN TỨC</h3></p>
				<hr>
				<?php	
					if($result != null && $result != '') {
						$o = 0;
						foreach ($result as $row) {
							$o++;
							echo '<p class="hv_blog"><div class="row"  style="background-color: #F5F6FA;">
										<div class="col-sm-4 col-xs-12 hover1" style="margin: 0px; padding: 0px;">
											<a href="?page=blogs&blogid='.$row['BlogID'].'">
												<figure><img src="'.$row['Thumbnail'].'" class="thumbnail_blogs"></figure>
											</a>
										</div>
									<div class="col-sm-8 col-xs-12">
										<div>
											<a href="?page=blogs&blogid='.$row['BlogID'].'" style="text-decoration: none;" title=""><h4 class="text1"><b>'.$row['Title'].'</b></h4>
											</a>
										</div>
										<p style="color: gray">'.$row['CreateDate'].'</p>
										<p style="color: gray">'.substr($row['Content'], 0, 500).'...</p>
									</div>
								</div></p>';
							if ($o == 4) {
								echo '
				<br><div class="row hidden-xs">
					<div class="clearfix border">';
							if($result != null && $result != '') {
								foreach ($result2 as $row) {
									echo '<div class="col-sm-3">
											<div class="img">
												<p><img src="'.$row['Thumbnail'].'" class="img1" style="width=100%"></p>
												<a href="?page=blogs&blogid='.$row['BlogID'].'" title="Xem nhanh" ><div class="overlay">Xem nhanh</div></a>
											</div>'.
											'<a href="?page=blogs&blogid='.$row['BlogID'].'" style="text-decoration: none;" title="'.$row['Title'].'">
												<span class="text2"><b>'.$row['Title'].'</b></span></a>
											<p style="color: #E73918">'.substr($row['Content'], 0, 100).'</p>
										</div>';
								}
							}
								echo '
					</div>
				</div><br>';
							}
						}
					}
				?>
				<div style="text-align: center; padding-bottom: 10px; padding-top: 10px;">
					<?php
						$a = 1;
						if (isset($_GET['page_blog'])) {
							# code...
							$a = $_GET['page_blog'];
						}
						if ($number >= 2) {
							# code...
							if ($a >= 2){
								echo '<a href="?page=blogs&page_blog='.($a-1).'">
										<button class="btn-blog"><i class="fas fa-angle-left"></i></button>
									</a>';
							}
							for ($i = 1; $i <= $pages; $i++) {
								if ($i == $a) {
									echo '<a href="?page=blogs&page_blog='.$i.'">
											<button class="btn-blog-at">'.$i.'</button>
										</a>';

								} else {
									echo '<a href="?page=blogs&page_blog='.$i.'">
											<button class="btn-blog">'.$i.'</button>
										</a>';
								}
							}
							if ($a <= $pages-1){
								echo'<a href="?page=blogs&page_blog='.($a+1).'">
										<button class="btn-blog"><i class="fas fa-angle-right"></i></button>
									</a>';
							}
						}
					?>
				</div>
			</div>

			<div class="col-sm-3 hidden-xs" style="float: right;" >
				<div style="background-color: #E73918; text-align: center; padding-bottom: 3px; padding-top: 3px; color: white"><h4>DANH MỤC</h4>
				</div>
			<div style="text-align: left; padding: 0px; cursor: pointer;" class="padding">
				<p><ul class="nav nav-pills nav-stacked">
					<li>
						<?php
							if($result1 != null && $result1 != '') {
								foreach ($result1 as $row) {
									echo '<div class="title_he" onclick="hienthi("'.'content_he1'.'")">
											<a class="text1" style="text-decoration: none;"href="#" title="">'.$row['Title'].'</a>
											<span class="text1"><i style="float: right;" class="fas fa-angle-right"></i></span>
										</div>';
								}
							}
						?>
					</li>
				</ul></p>
			</div>

			<div style="background-color: #E73918; text-align: center; padding-bottom: 3px; padding-top: 3px; color: white">
				<h4>XEM NHIỀU NHẤT</h4>
			</div>
				</br>
				<?php
					if($result3 != null && $result3 != '') {
						foreach ($result3 as $row ) {
							echo '<div class="row" style="margin-bottom: 15px">
									<div class="col-xs-4 hidden-xs" style="padding-left: 25px">
										<a href="?page=blogs&blogid='.$row['BlogID'].'">
											<img src="'.$row['Thumbnail'].'" class="thumbnail_blogs">
										</a>
									</div>
									<div class="col-xs-8 hidden-xs" style="padding-left: 0">
										<a href="?page=blogs&blogid='.$row['BlogID'].'" style="text-decoration: none;" title="">
											<p class="text1">'.$row['Title'].'</p>
										</a>
											<p style="font-size: 10px; color: gray"><i>'.$row['CreateDate'].'</i></p>
									</div>
								</div>';
						}
					}
				?>
				<div class="text2" style="text-align: center;">
					<a href="" style="text-decoration: none;"> Xem Thêm </a>
				</div>	
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function hienthi(p) {
		console.log('');
		if(document.getElementById(p).style.display == 'none') {
			document.getElementById(p).style.display = 'block';
		} else {
			document.getElementById(p).style.display = 'none';
		}
	}
</script>
</body>

