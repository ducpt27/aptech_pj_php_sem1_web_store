<?php
const servername='localhost';
const username='root';
const password='';
const database='vinegarfood'; 
	function execute($sql){
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
	$sql='select count(OrderID) as number from orders ';
	$resultNumber=execute($sql);
	$number='';
	if ($resultNumber!='') {
		# code...
		$number=$resultNumber[0]['number'];
	}
	$pages=ceil($number/10);
	$order_page=1;
	if (isset($_GET['order_page'])) {
		# code...
		$order_page=$_GET['order_page'];
	}
	$index=($order_page-1)*10;
	$sql='select * from orders order by OrderID desc limit '.$index.',10';
	$resultID=execute($sql);
?>	

	<style type="text/css" media="screen">
		#orders_li {
			color: white !important;
			background-color: #0073A9 !important;
		}
	</style>
	<div class="content">
		<div class="products" id="products">
			<div class="header_pd">
				<span>Management Orders</span>
			</div>
			<div id="ct_orders">
				<div class="add_bgr" style="margin: 0px;">
					<form method="get" name="satus_group-orders">
						<h4><b>Orders</b></h4>
						<button type="submit" class="btn btn-saved">Save settings</button>
						</br></br>
						<div style="width: 100%; overflow-x: scroll;">
							<table class="table">
								<thead>
									<tr>
										<th>OrderID</th>
										<th>Address</th>
										<th>PhoneNumber</th>
										<th>BillCode</th>
										<th>TotalMoney</th>
										<th>RequiredDate</th>
										<th>Note</th> 
										<th>Delivery</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($resultID as $row) {
											# code...
											$sql='select * from orders ,address where  address.AddressID=orders.AddressID and orders.OrderID= '.$row['OrderID'];
											$result=execute($sql);
										foreach ($result as $row ) {
											# code...
												echo '
										<tr>
											<td><a href="?OrderID='.$row['OrderID'].'">'.$row['OrderID'].'</a></td>
											<th>'.$row['Address'].'</th>
											<th>'.$row['PhoneNumber'].'</th>
											<td>'.$row['BillCode'].'</td>
											';
											$sql='select sum(TotalMoney) as tongtien from orders ,orderdetail where orders.OrderID=orderdetail.OrderID and orders.OrderID= '.$row['OrderID'];
											
											$resultTotal=execute($sql);
											echo '<td>'.number_format($resultTotal[0]['tongtien']).'</td>';

											echo '<td>'.$row['RequiredDate'].'</td>
											<td>'.$row['Note'].'</td>
											<td>';
											$t1=$t0=$t2=$t3='';
											if($row['DeliveryStatus']==0){
												$t0 = 'selected';	
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
											echo '<select>
													<option '.$t0.' >Đang xác nhận</option>
													<option '.$t1.' >Đang giao hàng</option>
													<option '.$t2.' >Đã giao hàng</option>
													<option '.$t3.' >Đơn hàng bị hủy</option>
												</select>
												';
											echo'
											</td>
											<td><a href="?page=orderdetail&l&OrderID='.$row['OrderID'].'">Details</a></td>	
										</tr>
										';}
										}
									?>
								</tbody>
							</table>
					<div class="container" style="text-align: center;">
						<ul class="pagination" >
							<?php
							for ($i = 1; $i <= $pages; $i++) {
									echo '<li><a href="?page=admin_orders&order_page='.$i.'">'.$i.'</a></li>';
								}
							?>
						</ul>
					</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
