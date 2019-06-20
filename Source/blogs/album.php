<?php
	// const servername='localhost';
	// const username='root';
	// const password='';
	// const database='vinegarfood';
	// function executeResult($sql){
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
	require_once('checkforstatus_success.php');

	$sql='select * from account where UserName = "'.$username.'"';
	$result=executeResult($sql);

?>
<style type="text/css">
	a:hover {
		text-decoration: none !important;
	}
	.background {
		background-image: url('https://i.ytimg.com/vi/rdGhwe1Q6LY/maxresdefault.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		font-weight: bold !important;
		padding: 30px 0;
	}
	#title, #title2, #title3, #loicamon, #khuyenmai {
		transition: all 2000ms ease;
	}
</style>
<script type="text/javascript">

	setInterval(function title1(){
		var title=document.getElementById('title');
		title.style.color='#E73918';
	},1000);
	setInterval(function title1(){
		var title=document.getElementById('title');
		title.style.color='#0073A9';
	},3000);
	setInterval(function title1(){
		var title=document.getElementById('title');
		title.style.color='#002a3d';
	},5000);

	setInterval(function title1(){
		var title=document.getElementById('title2');
		title.style.color='#002a3d';
	},1000);
	setInterval(function title1(){
		var title=document.getElementById('title2');
		title.style.color='#E73918';
	},3000);
	setInterval(function title1(){
		var title=document.getElementById('title2');
		title.style.color='#0073A9';
	},5000);
	setInterval(function title1(){
		var title=document.getElementById('title3');
		title.style.color='#0073A9';
	},1000);
	setInterval(function title1(){
		var title=document.getElementById('title3');
		title.style.color='#002a3d';
	},3000);
	setInterval(function title1(){
		var title=document.getElementById('title3');
		title.style.color='#E73918';
	},5000);
	setInterval(function title1(){
		var title=document.getElementById('loicamon');
		title.style.color='#E73918';
	},1000);
	setInterval(function title1(){
		var title=document.getElementById('loicamon');
		title.style.color='#0073A9';
	},3000);
	setInterval(function title1(){
		var title=document.getElementById('loicamon');
		title.style.color='#002a3d';
	},5000);
	setInterval(function title1(){
		var title=document.getElementById('khuyenmai');
		title.style.color='#E73918';
	},1000);
	setInterval(function title1(){
		var title=document.getElementById('khuyenmai');
		title.style.color='#0073A9';
	},3000);
	setInterval(function title1(){
		var title=document.getElementById('khuyenmai');
		title.style.color='#002a3d';
	},5000);
</script>
<div class="background" style="margin: -30px 0">
	<div class="container">
		<div class="row">
			<div class="col-sm-6" style="border-right: 1px solid #DCDDE1;">
				<a href=""><h3 id="title" style="text-align: center;"><b>Vinegar Food cảm ơn bạn</b></h3></a>
				<p>Chúng tôi xin chân thành cảm ơn bạn đã ủng hộ <a href="?page=trangchu">Vinegar Food</a> trong suốt thời gian qua.
					<br>
					Vinh dự của <a href="?page=trangchu" >Vinegar Food</a> là được làm người bạn đồng hành cùng những bữa ăn của bạn.
				</p>
				<div>
					<p style="font-size: 16px;">Kết quả của <span style="color: #E73918;"><?php
						foreach ($result as $row) {
							# code...
							echo $row['UserName'];
						}
					?></span> trong thời gian qua:</p>
				</div>
				<table class="table">
					<tr>
						<td><p>Số lần đặt mua hàng:</p></td>
						<td><p style="color: #E73918;"><?php foreach ($result as $row) {
							# code...
							$sql='select * from address where AccountID = '.$row['AccountID'];
							$result1=executeResult($sql);
							foreach ($result1 as $row) {
								# code...
								$sql='select count(OrderID) as number from orders where AddressID= '.$row['AddressID'];
								$result2=executeResult($sql);
								foreach ($result2 as $row) {
									# code...
									echo $row['number'];
								}
							}
						} ?></p></td>
					</tr>
					<tr>
						<td><p>Số sản phẩm đã mua:</p></td>
						<td><p style="color: #E73918;"><?php foreach ($result as $row) {
							# code...
							$sql='select * from address where AccountID = '.$row['AccountID'];
							$result1=executeResult($sql);
							$ssp = 0;
							foreach ($result1 as $row) {
								# code...
								$sql='select * from orders where AddressID= '.$row['AddressID'];
								$result3=executeResult($sql);
								foreach ($result3 as $row) {
									# code...
									$sql='select sum(Quantity) as count from orderdetail where OrderID = '.$row['OrderID'].';';
									// echo $sql;
									$result4=executeResult($sql);
										foreach ($result4 as $value) {
											# code...
											$ssp = $ssp + $value['count'];
										}
								}
							}
							echo $ssp;
						} ?></p></td>
					</tr>
					<tr>
						<td><p>Tần suất mua hàng:</p></td>
						<td><p style="color: #E73918;"><?php foreach ($result as $row) {
							# code...
							$sql='select * from address where AccountID = '.$row['AccountID'];
							$result1=executeResult($sql);
							foreach ($result1 as $row) {
								# code...
								$sql='select count(OrderID) as number from orders where AddressID= '.$row['AddressID'].' and RequiredDate between NOW()-interval 7 day and CURTIME()';
								$result8=executeResult($sql);
								foreach ($result8 as $row) {
									# code...
									echo $row['number'] ;
								}
							}
						} ?> lần/ tuần</p></td>
					</tr>
				</table>

				<div>
					<p style="font-size: 16px;" id="loicamon">Vinegar Food trân trọng cảm ơn quý khách <i class="fas fa-heart" style="color: #E73918;"></i></p>
				</div>
			</div>

			<div class="col-sm-6">
				<a href=""><h3 id="title3" style="text-align: center;"><b>Yêu thích của bạn</b></h3></a>
				<p style="font-size: 16px;" id="loicamon"><i class="fas fa-heart" style="color: #E73918;"></i> Để cảm ơn <span style="color: #E73918;"><?php
						foreach ($result as $row) {
							# code...
							echo $row['UserName'];
						}
					?></span> chúng tôi xin gửi đến bạn <a href=""> phiếu khuyến mãi mua hàng </a>tại <a href=""> Vinegar Food </a><a href=""><i class="fas fa-arrow-alt-circle-right" title="click để nhận mã giảm giá của Vinegar Food" style="color: #E73918;" id="khuyenmai"></i></a></p>
				<div style="margin-top: 30px;"><p><i class="fas fa-star" style="color: #E73918;"></i> Những món ăn được bạn mua gần nhất:</p></div>
				<div class="row">
					<?php
						foreach ($result as $row) {
								# code...
							$sql='select AddressID  from address where  AccountID= '.$row['AccountID'];
							$AddressID=executeResult($sql);
							foreach ($AddressID as $row) {
								# code...
								$sql='select distinct ProductID from orders,orderdetail where orders.OrderID = orderdetail.OrderID and AddressID= '.$row['AddressID'].' order by RequiredDate limit 0,4';
								$productID=executeResult($sql);
								foreach ($productID as $row) {
									# code...
									$sql='select * from product where ProductID = '.$row['ProductID'];
									$product=executeResult($sql);
									foreach ($product as $row) {
										# code...
											echo'<div class="col-sm-3" style="margin-bottom:30px;">
															<a href="?productID='.$row['ProductID'].'"><img src="'.$row['Thumbnail'].'" style="width:100%; height:100px;"></a>
													  </div>';
											
										}
									}

								}
							}	
					?>
				</div>
				<div style="margin-top: 30px;"><p><i class="fas fa-angle-double-right" style="color: #E73918;"></i> Gợi ý cho bạn</p></div>
				<div class="row">
					<?php
						$sql='select * from product order by ModifiedDate desc limit 0,8';
						$goiy=executeResult($sql);
						foreach ($goiy as $row) {
								# code...
							echo '<div class="col-sm-3 col-xs-6" style="margin-bottom:30px;">
															<a href="?productID='.$row['ProductID'].'"><img src="'.$row['Thumbnail'].'" style="width:100%;"></a>
													  </div>';
							}	
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>