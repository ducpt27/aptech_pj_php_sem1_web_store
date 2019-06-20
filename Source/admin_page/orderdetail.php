<?php
	include('database.php');
	$OrderID='';
	if (isset($_GET['OrderID'])) {
		# code...
		$OrderID=$_GET['OrderID'];
	}

	$sql='select sum(TotalMoney )as tongtien from orders ,orderdetail where orders.OrderID=orderdetail.OrderID and orders.OrderID= '.$OrderID;
	$resulttotal=executeResult($sql);
	$sql='select * from orders ,address where  address.AddressID=orders.AddressID and orders.OrderID= '.$OrderID;
	$result=executeResult($sql);
	$sql='select * from orderdetail where OrderID= '.$OrderID;
	$result1=executeResult($sql);

	if (isset($_POST['status'])) {
		# code...
		$status=$_POST['status'];
		$sql='update orders set DeliveryStatus ='.$status.' where OrderID = '.$OrderID;
		execute($sql);
	}
?>
<?php
	$tongcong=$tongtien=$phivanchuyen='';
	foreach ($resulttotal as $row) {
		# code...
		$tongtien=$row['tongtien'];
	}
	foreach ($result as $row) {
		# code...
		$phivanchuyen=$row['TransportFee'];
	}
	$tongcong=$tongtien+$phivanchuyen;
?>
<div class="container" style="margin-top: 30px;">
	<div class="row">
		<div class="col-sm-4">
			<h3 style="font-weight: bold;">Chi tiết đơn hàng</h3>
			<?php foreach ($result as $row) {
				# code...
				echo '<p>Đơn hàng: '.$row['OrderID'].'</p>';
			} ?>
			<p>Đã đặt lúc: <?php foreach ($result as $row) {
				# code...
				echo $row['RequiredDate'];
			} ?></p>
			<p>Trạng thái đơn hàng: <?php foreach ($result as $row) {
				# code...
				$t0=$t1=$t2=$t3='';
				if ($row['DeliveryStatus']==0) {
					# code...
					$t0='selected';
				}
				if ($row['DeliveryStatus']==1) {
					# code...
					$t1='selected';
				}
				if ($row['DeliveryStatus']==2) {
					# code...
					$t2='selected';
				}
				if ($row['DeliveryStatus']==3) {
					# code...
					$t3='selected';
				}
				echo'<form method="post" id="status_form">
					<select name="status" id="status_dh">
						<option '.$t0.' value="0">Đang xác nhận</option>
						<option style="color: blue" '.$t1.' value="1">Đang giao hàng</option>
						<option style="color: green" '.$t2.' value="2">Đã giao hàng</option>
						<option style="color: red" '.$t3.' value="3">Hủy đơn hàng</option>
					</select>';
			}
			 ?></p>
		</div>
		<script type="text/javascript" charset="utf-8">
			$(document).on('change', '#status_dh', function(e) {
				e.preventDefault();
				$('#status_form').submit();
			})
		</script>
		<div class="col-sm-4">
			<h3 style="font-weight: bold;">Thông tin đơn hàng</h3>
			<p>Khách hàng: <?php foreach ($result as $row) {
				# code...
				echo $row['FirstName'].' '.$row['LastName'];
			} ?></p>
			<p>Địa chỉ: <?php foreach ($result as $row) {
				# code...
				echo $row['Address'];
			} ?></p>
			<p>Số điện thoại: <?php foreach ($result as $row) {
				# code...
				echo $row['PhoneNumber'];
			} ?></p>
		</div>
		<div class="col-sm-4">
			<h3 style="font-weight: bold;">Tổng thanh toán: <?php foreach ($resulttotal as $row) {
				# code...
				echo '<span style="color:red;">'.number_format($tongcong).' đ</span>';
			} ?></h3>
		</div>
	</div>

	<table class="table table-bordered  table-hover" >
		<tr>
			<td><p style="font-weight: bold;">Mã sản phẩm<p></td>
			<td><p style="font-weight: bold;">Sản phẩm<p></td>
			<td><p style="font-weight: bold;">Số lượng<p></td>
			<td><p style="font-weight: bold;">Số tiền<p></td>
		</tr>
		<?php
			foreach ($result1 as $row) {
				echo '<tr>
						<td>'.$row['ProductID'].'</td>
						';
			$sql='select * from product where ProductID= '.$row['ProductID'];
			$result2=executeResult($sql);
			$sql='select * from orderdetail where OrderDetailID= '.$row['OrderDetailID'];
			$result3=executeResult($sql);
				foreach ($result2 as $row) {		
				echo '	
						<td>'.$row['ProductName'].'</td>
						';
			 	}
			 	foreach ($result3 as $row) {
			 		# code...
			 	echo '<td>'.$row['Quantity'].'</td>
					  	<td>'.number_format($row['Totalmoney']).'</td></tr>';
			 }
			}
		?>
	</table>
	<div style="margin-top: 30px;margin-bottom: 50px;">
		<table class="table table-bordered table-hover-">
			<tr>
				<td><p>Tạm tính:</p></td>
				<td><?php foreach ($resulttotal as $row) {
					# code...
					echo number_format($row['tongtien']);
				} ?></td>
			</tr>
			<tr>
				<td>Phí vận chuyển:</td>
				<td><?php foreach ($result as $row) {
					# code...
					echo number_format($row['TransportFee']);
				} ?></td>
			</tr>
			<tr>
				<td>Tổng cộng:</td>
				<td><?php echo number_format($tongcong); ?></td>
			</tr>
		</table>
	</div>
</div>
