		<?php
			require('database.php');
			$pd_thumbnail = $pd_name = $pd_category = $pd_ingredients = $pd_netweight = $pd_usermanual = $pd_expiration = $pd_price = $pd_quantity = $pd_discount = $pd_status = '';
			$note = '';
			if(isset($_POST['pd_thumbnail']) && isset($_POST['pd_name'])) {
				$pd_thumbnail = $_POST['pd_thumbnail'];
				$pd_name = $_POST['pd_name'];
				$pd_category = $_POST['pd_category'];
				$pd_ingredients = $_POST['pd_ingredients'];
				$pd_netweight = $_POST['pd_netweight'];
				$pd_usermanual = $_POST['pd_usermanual'];
				$pd_expiration = $_POST['pd_expiration'];
				$pd_price = $_POST['pd_price'];
				$pd_discount = $_POST['pd_discount'];
				$pd_quantity = $_POST['pd_quantity'];
				$pd_status = $_POST['pd_status'];
			}
			if($pd_name != '' && $pd_netweight != '' && $pd_price != '' && $pd_quantity != '' && $pd_thumbnail != '' && $pd_status != '' && $pd_usermanual != '') {
				if($pd_discount == '') {
					$pd_discount = 0;
				}

				$sql = 'INSERT INTO product(CategoryID, ProductName, Thumbnail, Ingredients, NetWeight, Quantity, UserManual, ExpirationDate, Price, PriceDiscount, ModifiedDate, Status) 
						VALUES ('.$pd_category.', "'.$pd_name.'", "'.$pd_thumbnail.'", "'.$pd_ingredients.'", '.$pd_netweight.', '.$pd_quantity.', "'.$pd_usermanual.'", "'.$pd_expiration.'", '.$pd_price.', '.$pd_discount.', CURTIME(), '.$pd_status.')';

				$sql2 = 'SELECT * FROM categoryproduct WHERE CategoryID = "'.$pd_category.'"';
				$sql3 = 'SELECT * FROM product WHERE ProductName = "'.$pd_name.'"';

				$result2 = executeResult($sql2);
				$result3 = executeResult($sql3);

				if ($result2 == null || count($result2)>0) {
					if(count($result3)<1 || $result3 != null) {
						execute($sql);
						$note = '<b style="color:green;">Đã thêm sản phẩm</b>';
					}
				}
				else{
					if(count($result3)<1 || $result3 != null) {
						$note = '<b style="color:red;">Tên sản phẩm đã tồn tại! Vui lòng kiểm tra lại</b>';
					} else {
						$note = '<b style="color:red;">ID danh mục sản phẩm không tồn tại! Vui lòng kiểm tra lại</b>';
					}
				}
			}
		?>
		<div id="ct_products">
			<div class="add_bgr" id="add_pd">
				<form method="post" name="add_pd">
					<h4><b>Add Product</b></h4>
					<center><?=$note?></center>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Thumbnail</label>
								<input type="text" name="pd_thumbnail" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="pd_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Category ID</label>
								<input type="number" name="pd_category" class="form-control">
							</div>
							<div class="form-group">
								<label>Ingredients</label>
								<input type="text" name="pd_ingredients" class="form-control">
							</div>
							<div class="form-group">
								<label>Net Weight(g)</label>
								<input type="number" name="pd_netweight" min="0" class="form-control" required>
							</div>
							<div class="form-group">
								<label>User Manual</label>
								<input type="text" name="pd_usermanual" class="form-control" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Expiration Date</label>
								<input type="text" name="pd_expiration" class="form-control">
							</div>
							<div class="form-group">
								<label>Price</label>
								<input type="number" name="pd_price" min="0" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Price Discount</label>
								<input type="number" name="pd_discount" min="0" class="form-control" value="0">
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" name="pd_quantity" min="0" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Status</label>
								<input type="number" name="pd_status" min="0" max="1" class="form-control" required placeholder="'0' hidden - '1' visible" required>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Add</button>
					<button type="reset" class="btn btn-warning">Reset</button>
				</form>
			</div>
			<div class="add_bgr">
				<form method="post" id="status_group-products">
					<h4><b>List Products</b></h4>
					<button type="button" class="btn btn-saved" onclick="saveSetting()">Save settings</button>
					<a href="?page=<?php echo $page;?>&tbl=<?php echo $tbl;?>&add=add_pd"><button type="button" class="btn btn-success">Add products</button></a>
					</br></br>
					<div style="overflow-x: scroll; width: 100%">
						<table class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Picture</th> <!-- ảnh -->
									<th>Name</th> <!-- tên -->
									<th>Category</th> <!-- danh mục -->
									<th>Ingredients</th> <!-- thành phần -->
									<th>Weight(g)</th> <!-- khối lượng tịnh / thể tích-->
									<th>UserManual</th> <!-- hướng dẫn sử dụng -->
									<th>ExpirationDate</th> <!-- hạn sử dụng -->
									<th>Price</th>
									<th>Discount</th>
									<th>Quantity</th> <!-- số lượng -->
									<th>ModifiedDate</th> <!-- ngày chỉnh sửa -->
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sql4 = 'SELECT product.*, `categoryproduct`.CategoryName
											FROM product, categoryproduct 
											WHERE `product`.CategoryID = `categoryproduct`.CategoryID';
									$result4 = executeResult($sql4);

									
									if(isset($_POST['stt_id'])) {
										$sql = 'UPDATE product SET status = 0;';
										execute($sql);
								        foreach ($_POST['stt_id'] as $value) {
								        	$sql = 'UPDATE product SET status = 1 WHERE ProductID = '.$value.';';
								        	execute($sql);
								        }
									}

									foreach ($result4 as $row) {
										$stt = '';
										if($row["Status"] == '1') {
											$stt = 'checked';
										}
										echo '<tr>
											<td>'.$row["ProductID"].'</td>
											<td><img src="'.$row["Thumbnail"].'" width="50px" height="50px"></td>
											<td>'.$row["ProductName"].'</td>
											<td>'.$row["CategoryName"].'</td>
											<td>'.$row["Ingredients"].'</td>
											<td>'.$row["NetWeight"].'</td>
											<td>'.$row["UserManual"].'</td>
											<td>'.$row["ExpirationDate"].'</td>
											<td>'.number_format($row["Price"]).'</td>
											<td>'.number_format($row["PriceDiscount"]).'</td>
											<td>'.number_format($row["Quantity"]).'</td>
											<td>'.$row["ModifiedDate"].'</td>
											<td><label class="switch"><input type="checkbox" name="stt_id[]" value="'.$row["ProductID"].'" '.$stt.'><span class="slider round"></span></label></td>
											<td><a href="?ed_ProductID='.$row["ProductID"].'">
												<button type="button" class="btn btn-warning">Edit</button>
											</a></td>			
										</tr>';
									}
								?>
								<script type="text/javascript" charset="utf-8" async defer>
									function saveSetting() {
										alert('Vui lòng reload lại trang để hiển thị kết quả mới nhất!');
										document.getElementById('status_group-products').submit();
									}
								</script>
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>
