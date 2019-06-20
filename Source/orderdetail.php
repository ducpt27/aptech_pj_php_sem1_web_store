<?php
	include('checkforstatus_success.php'); //get $username and $status 
	function executeData($sql) 
	{
		//connection to database
		$conn = new mysqli('localhost', 'root', '', 'vinegarfood');
		mysqli_set_charset($conn, 'utf8');

		//query
		$resultset = mysqli_query($conn, $sql);
		$data      = [];
		if($resultset) {
			while ($row = mysqli_fetch_array($resultset, 1)) {
			$data[] = $row;
			}
		} else {
			echo 'error';
		}
		//close connection
		mysqli_close($conn);

		return $data;
	}

	$data = [];
	if (isset($_GET['order'])) 
	{
		$orderid = $_GET['order'];
		$sql = 'SELECT `address`.AddressID, `account`.AccountID, `address`.AccountID, `orders`.AddressID FROM address, orders, account WHERE `address`.AddressID = `orders`.AddressID AND `address`.AccountID = `account`.AccountID AND `account`.UserName = "'.$username.'" AND `orders`.OrderID = '.$orderid;
		$result = executeData($sql);
		
		if($result != null && count($result) > 0) 
		{
			$select = 'SELECT orders.*, orderdetail.*, address.* FROM orders, orderdetail, address WHERE `orders`.OrderID = `orderdetail`.OrderID AND `address`.AddressID = `orders`.AddressID  AND `orders`.OrderID = '.$orderid;
			$data = executeData($select);
		} else 
			die();
	}
?>
<body>
	<div class="container">
		<div class="row" style="padding: 0 15px; margin-bottom: 20px">
			<div class="col-md-4 col-sm-3 col-xs-5">
				<h4><b>Chi tiết đơn hàng</b></h4>
				<?php 
					if ($data != '') 
					{
						if ($data[0]['DeliveryStatus'] == 1) {
							$DeliveryStatus = '<i style="color: blue">Đang giao hàng</i>';
						} else if ($data[0]['DeliveryStatus'] == 2) {
							$DeliveryStatus = '<i style="color: green">Đã giao hàng</i>';
						} else if ($data[0]['DeliveryStatus'] == 3) {
							$DeliveryStatus = '<i style="color: black">Đơn hàng đã hủy</i>';
						} else {
							$DeliveryStatus = '<i style="color: red">Chưa giao hàng</i>';
						}
						echo '<i>Đơn hàng: #1000'.$data[0]["OrderID"].'</i>
							<p><i>Đã đặt lúc: '.$data[0]["RequiredDate"].'</i></p>
							<p>Trạng thái đơn hàng: '.$DeliveryStatus.'</p>';
					}
				?>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-7">
				<h4><b>Thông tin giao hàng</b></h4>
				<div class="tt-giaohang_address" style="line-height: 15px">
					<?php
						if ($data != '') {
							echo '<p>'.$data[0]["LastName"].' '.$data[0]["FirstName"].'</p>
								<p>'.$data[0]["Address"].'</p>
								<p>'.$data[0]["PhoneNumber"].'</p>';
						}
					?>
				</div>
			</div>
			<?php 
				$sql2 = 'SELECT `orders`.TransportFee, `orderdetail`.Totalmoney 
						  FROM orders, orderdetail 
						    WHERE `orders`.OrderID = `orderdetail`.OrderID 
						      AND `orders`.OrderID = '.$orderid;
				$result2 = executeData($sql2);
				if ($result2) {
					$totalmoney = $result2[0]["TransportFee"] + $result2[0]["Totalmoney"];
					$totalmoney = number_format($totalmoney);
				} else {
					$totalmoney = '';
				}
			?>
			<div class="col-md-3 col-sm-4 col-xs-12"><h4>Tổng cộng: <b><?=$totalmoney?>₫</b></h4></div>
		</div>
		<div class="row" style="padding: 0 15px">
			<div class="tt_dh-tb_chitiet">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Mã sản phẩm</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Số tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql3 = 'SELECT `orders`.TransportFee, `orderdetail`.Quantity, `orderdetail`.Totalmoney, `product`.ProductName, `product`.ProductID
								FROM orders, orderdetail, product 
								  WHERE `orders`.OrderID = `orderdetail`.OrderID 
									AND `product`.ProductID = `orderdetail`.ProductID 
									  AND `orders`.OrderID = '.$orderid;
							$result3 = executeData($sql3);
							if ($result3) 
							{	
								$tamtinh = 0;
								foreach ($result3 as $value) {
									$tamtinh += $value["Totalmoney"];
									echo '<tr>
											<td><a href="?productID='.$value["ProductID"].'">#1000'.$value["ProductID"].'</a></td>
											<td>'.$value["ProductName"].'</td>
											<td>'.$value["Quantity"].'</td>
											<td>'.number_format($value["Totalmoney"]).'₫</td>
										</tr>';
								}
								$tongcong = $tamtinh + $result3[0]["TransportFee"];
								$tongcong = number_format($tongcong);
								$tamtinh = number_format($tamtinh);
							}
						?>
					</tbody>
				</table>
			</div>
			<div class="tt_dh-tb_sc">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>Tạm tính: </td>
							<td style="width: 13%"><?=$tamtinh?>₫</td>
						</tr>
						<tr>
							<td>Phí vận chuyển: </td>
							<td><?=number_format($result3[0]["TransportFee"])?>₫</td>
						</tr>
						<tr>
							<th>Tổng cộng: </th>
							<th><?=$tongcong?>₫</th>
						</tr>
					</tbody>
				</table>
			</div>
			<a href="?page=account_management"><div style="width: 250px;">
				<i class="fas fa-angle-double-left"></i> Quản lý tài khoản
			</div></a>
		</div>	
	</div>
</body>