<?php
	const servername='localhost';
	const username='root';
	const password='';
	const database='vinegarfood';
	function executeResult($sql){
		$conn=new mysqli(servername,username,password,database);
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


?>
	<style type="text/css" media="screen">
		#statistic_li {
			color: white !important;
			background-color: #0073A9 !important;
		}
	</style>
<!-- 1. Số tiền bán được trong tháng
2. Số tiền bán được tất cả
3. Số đơn hàng đặt trong tháng
4. Tổng số đơn hàng được đặt
5. Số đơn hàng bị hủy
6. Số sản phẩm đã bán trong tháng
7. Tổng sản phẩm -->
<div class="container-fluid" style="background-color: white; margin-top: 50px; padding: 30px 0; color: #222;">
<div class="container">
	<h4>
	<p>1. Số tiền bán được trong 30 ngày gần nhất : <?php 
			$sql='select sum(TransportFee) as Trans from orders where RequiredDate between CURDATE()-30 and NOW() AND DeliveryStatus = 2';
			$TransportFee=executeResult($sql);
			$Trans=$TransportFee[0]['Trans'];
			$sql='select sum(TotalMoney) as Total from orderdetail,orders  where orderdetail.OrderID=orders.OrderID and RequiredDate between CURDATE()-30 and NOW() AND `orders`.DeliveryStatus = 2';
			$TotalMoney=executeResult($sql);
			$Total=$TotalMoney[0]['Total'];
			echo '<span style="color:red;">'.number_format($Trans + $Total).'đ</span>';
		?></p>
	<p>2. Số tiền bán được tất cả : <?php 
			$sql='select sum(TransportFee) as Trans from orders where DeliveryStatus =2';
			$TransportFee=executeResult($sql);
			$Trans=$TransportFee[0]['Trans'];
			$sql='select sum(TotalMoney) as Total from orderdetail,orders where orders.OrderID = orderdetail.OrderID and DeliveryStatus= 2';
			$TotalMoney=executeResult($sql);
			$Total=$TotalMoney[0]['Total'];
			echo '<span style="color:red;">'.number_format($Trans + $Total).'đ</span>';
		?></p>
	<p>3. Số đơn hàng được đặt trong 30 ngày gần nhất : <?php
		$sql='select count(OrderID) as count from orders where RequiredDate between CURDATE()-30 and NOW()';
		$countOrder=executeResult($sql);
		echo '<span style="color:red;">'.$countOrder[0]['count'].' </span>';
	?>đơn hàng</p>
	<p>4. Tổng số đơn hàng được đặt : <?php
		$sql='select count(OrderID) as count from orders ';
		$countOrder=executeResult($sql);
		echo '<span style="color:red;">'.$countOrder[0]['count'].' </span>';
	?> đơn hàng</p>
	<p>5. Số đơn hàng bị hủy : <?php
		$sql='select count(OrderID) as count from orders where DeliveryStatus = 3';
		$countOrder=executeResult($sql);
		echo '<span style="color:red;">'.$countOrder[0]['count'].' </span>';
	?> đơn hàng</p>
	<p>6. Số sản phẩm đã bán trong 30 ngày gần nhất : <?php
		$sql='select sum(Quantity) as count from orders,orderdetail where orders.OrderID=orderdetail.OrderID and DeliveryStatus = 2 and RequiredDate between CURDATE()-30 and NOW()';
		$countOrder=executeResult($sql);
		echo '<span style="color:red;">'.$countOrder[0]['count'].' </span>';
	?> sản phẩm</p>
	<p>7. Tổng sản phẩm đã bán : <?php
		$sql='select sum(Quantity) as number from orderdetail,orders where orders.OrderID=orderdetail.OrderID and DeliveryStatus=2 ';
		$Quantity=executeResult($sql);
		echo '<span style="color:red;">'.$Quantity[0]['number'].' </span>';
	?> sản phẩm</p>
	</p>
</div>
</div>