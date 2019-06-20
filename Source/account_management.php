<?php
	include('checkforstatus_success.php');
?>
<link rel="stylesheet" href="include/css/style_quanlytaikhoan.css">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-12">
				<h4><b>Thông tin tài khoản</b> | <a href="?page=infor_account" style="font-size: 12px">Chi tiết</a></h4>
				<?php
					$result = $result2 ='';
					require_once('checkforstatus_success.php'); //get -> $username and $status

					$sql = 'SELECT * FROM account WHERE UserName = "'.$username.'"';
					$result = executeResult($sql);
					$number = 0;

					if ($result != null && $result != '') {

						echo '<p>'.$result[0]["FirstName"].' '.$result[0]["LastName"].'</p>
								<p>'.$result[0]["Email"].'</p>';

						$sql2 = 'SELECT * FROM address WHERE AccountID = "'.$result[0]["AccountID"].'"';
						$sql_dem = 'SELECT COUNT("AddressID") AS number FROM address WHERE AccountID = "'.$result[0]["AccountID"].'"';

						$result2 = executeResult($sql2);
						$number = executeResult($sql_dem);

						if($number != null && $number != '') {
							$number = $number[0]['number'];
						} else {
							$number = 0;
						}

						if ($result2 != null && $result2 != '') {

							echo '<hr>
								<div class="qltk-addressdf">
									<p style="font-size: 12px"><b>Địa chỉ nhận hàng mặc định</b></p>
									<p><b>'.$result2[0]["FirstName"].' '.$result2[0]["LastName"].'</b></p>
									<p>'.$result2[0]["PhoneNumber"].'</p>
									<p>'.$result2[0]["Address"].'</p>
									<a href="?page=address_list"><div class="btn-qltk">Sổ địa chỉ ('.$number.')</div></a>
								</div>';
						} else {
							echo '<hr>
								<div class="qltk-addressdf">
									<a href="?page=address_list"><div class="btn-qltk">Sổ địa chỉ ('.$number.')</div></a>
								</div>';
						}
					}
						
				?>
			</div>
			<div class="col-md-9 col-sm-12">
				<div class="tt_dh">
					<h4><b>Đơn hàng của tôi</b></h4>
					<div class="tt_dh_select">
						<select name="hienthi">
						    <option value="15">15 đơn hàng gần đây</option>
						    <!-- <option value="5">5 đơn hàng gần đây</option>
						    <option value="15">15 ngày gần đây</option>
						    <option value="30">30 ngày gần đây</option>
						    <option value="180">6 tháng</option>
						    <option value="all">Tất cả đơn hàng</option> -->
					  	</select>
					</div>
					<br>
					<div class="tt_dh_table">
						<table class="table">
							<thead>
								<tr style="background-color: #F5F6FA">
									<th class="hidden-xs"></th>
									<th>Thời gian đặt</th>
									<th>Người nhận</th>
									<th>Địa chỉ giao hàng</th>
									<th>Tổng cộng</th>
									<th>Trạng thái</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql0 = 'SELECT AccountID FROM account WHERE UserName = "'.$username.'";';
									$Result0 = executeResult($sql0);

									if ($Result0 != null && $Result0 != '') {
										$AccountID = $Result0[0]['AccountID'];
									}

									$sql1 = 'SELECT AddressID FROM address WHERE AccountID = "'.$AccountID.'";';
									$Result1 = executeResult($sql1);
									if($Result1) {
										$IsFind = false;
										$mp = '(';
										foreach ($Result1 as $value) {
											if (!$IsFind) {
												$mp .= '`address`.AddressID = "'.$value["AddressID"].'"';
												$IsFind = true;
											} else {
												$mp .= ' OR `address`.AddressID = "'.$value["AddressID"].'"';
											}
										}
										$mp .= ')';

										$i = 0;

										$sql = 'SELECT orders.*, address.* FROM orders, address WHERE '.$mp.' AND orders.AddressID = address.AddressID ORDER BY `orders`.`RequiredDate` DESC LIMIT 0,15';
												//echo $sql;
										$result = executeResult($sql);

										if ($result != null && $result != '') {

											foreach ($result as $value) {

												$sql2 = 'SELECT SUM(Totalmoney) AS Tong FROM `orderdetail` WHERE OrderID = '.$value['OrderID'].';';
												$result2 = executeResult($sql2);

												$tongtien = $result2[0]['Tong'];

												if ($value['TransportFee'] != null) {

													$tongtien += $value['TransportFee'];
												}

												if ($value['DeliveryStatus'] == 0) {
													$deliveryStatus = 'Đang xác nhận';
												} else if ($value['DeliveryStatus'] == 1) {
													$deliveryStatus = '<span style="color: blue">Đang giao hàng</span>';
												} else if ($value['DeliveryStatus'] == 2) {
													$deliveryStatus = '<span style="color: green">Đã giao hàng</span>';
												} else if ($value['DeliveryStatus'] == 3) {
													$deliveryStatus = '<span style="color: #E73918">Đơn hàng đã bị hủy</span>';
												} else {
													$deliveryStatus = '';
												}
												$i++;
												echo '<tr>
														<th class="hidden-xs"><a href="?page=orderdetail&order='.$value['OrderID'].'">#'.$i.'</a></th>
														<td>'.$value['RequiredDate'].'</td>
														<td>'.$value['FirstName'].' '.$value['LastName'].'</td>
														<td>'.$value['Address'].'</td>
														<td>'.number_format($tongtien).'₫</td>
														<th>'.$deliveryStatus.'</th>
														<td><a href="?page=orderdetail&order='.$value['OrderID'].'">Chi tiết</a></td>
													</tr>';
											}
										}
									}
								?>			
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>