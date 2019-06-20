<link rel="stylesheet" type="text/css" href="include/css/style_listproduct.css">
	<div class="container">
		<div class="row">
			<div class="col-md-3 hidden-sm hidden-xs category-pd">
				<div class="category">
					<a href="?page=listproduct"><h4><b>Danh mục món ăn</b></h4></a>
					<?php
						function executeResult2($sql) {
							//connection to database
							$conn = new mysqli('localhost', 'root', '', 'vinegarfood');
							mysqli_set_charset($conn, 'utf8');

							//query
							$resultset = mysqli_query($conn, $sql);
							$data      = [];

							while ($row = mysqli_fetch_array($resultset, 1)) {
								$data[] = $row;
							}

							//close connection
							mysqli_close($conn);

							return $data;
						}

						$sql = 'SELECT * FROM categoryproduct WHERE CategoryParent = 0';
						$result = executeResult2($sql);

						foreach ($result as $value) {
							echo '<div class="category_parent">
									<i class="fas fa-caret-right" style="padding-right: 5px" onclick="ht_child(`ct_child'.$value["CategoryID"].'`)"></i> 
									<a href="?page=listproduct&CategoryID='.$value["CategoryID"].'">
											'.$value['CategoryName'].'
									</a>
									<i class="fas fa-angle-down category_pr-icon" onclick="ht_child(`ct_child'.$value["CategoryID"].'`)"></i>
								</div>
								';
							$CategoryParent = $value['CategoryID'];
							$sql2 = 'SELECT * FROM `categoryproduct` WHERE CategoryParent = '.$CategoryParent.'';
							$result2 = executeResult2($sql2);
								echo '<div class="ct_child" id="ct_child'.$value["CategoryID"].'">';
							foreach ($result2 as $value2) {
								echo '<a href="?page=listproduct&CategoryID='.$value2["CategoryID"].'"><div class="category_child">'.$value2["CategoryName"].'</div></a>';
							}
								echo '</div>';
						}
					?>
					<script type="text/javascript" charset="utf-8">
						function ht_child(id) {
							x = document.getElementById(id).style.display;
							if (x == 'none') {
								$('#'+id).css({
									'display': 'block',
									'opacity': 0.5,
								})
								setTimeout(function() {
									$('#'+id).css({
										'opacity': 'block',
										'opacity': 1,
									})
								}, 500)
							} else {
								$('#'+id).css({
									'opacity': 0.1,
								})
								setTimeout(function() {
									$('#'+id).css({
										'display': 'none'
									})
								}, 500)
							}
						}
					</script>
					<?php
						//GET URL -> ?=
						function getCurrentPageURL() {
							$pageURL = '';

							$pageURL .= $_SERVER["QUERY_STRING"];

							return $pageURL;
						}

						$pageURL = getCurrentPageURL();
						//echo $pageURL;
					?>
				</div>
				
				<br>
				<form method="post" name="sort" style="line-height: 22px;">
					<h4><b>Bộ lọc tìm kiếm</b></h4>
					<h5><b>Giá sản phẩm</b></h5>
					<div class="sort-price">
							<div class="checkbox form-group ">
							  	<input type="checkbox" value="50" name="price_s[]" id="sort7"><label for="sort7">Dưới 50.000₫</label>
							</div>
							<div class="checkbox form-group ">
							  	<input type="checkbox" value="100" name="price_s[]" id="sort8"><label for="sort8">Từ 50.000₫ - 100.000₫</label>
							</div>
							<div class="checkbox form-group ">
							  	<input type="checkbox" value="200" name="price_s[]" id="sort9"><label for="sort9">Từ 100.000₫ - 200.000₫</label>
							</div>
							<div class="checkbox form-group ">
							  	<input type="checkbox" value="500" name="price_s[]" id="sort10"><label for="sort10">Từ 200.000₫ - 500.000₫</label>
							</div>
							<div class="checkbox form-group ">
							  	<input type="checkbox" value="501" name="price_s[]" id="sort13"><label for="sort13">Trên 500.000₫</label>
							</div>
					</div>
					<hr>
					<div class="sort-danhgia">
						<h5><b>Đánh giá</b></h5>
						<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><br>

						<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star star-black"></i> trở lên<br>

						<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star star-black"></i><i class="fas fa-star star-black"></i> trở lên<br>

						<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star star-black"></i><i class="fas fa-star star-black"></i><i class="fas fa-star star-black"></i> trở lên<br>

						<i class="fas fa-star"></i><i class="fas fa-star star-black"></i><i class="fas fa-star star-black"></i><i class="fas fa-star star-black"></i><i class="fas fa-star star-black"></i> trở lên<br>
					</div>

					<br><br>
					<button type="submit">Áp dụng</button>
					<br>
					<button type="button">Xóa tất cả</button>
				</form>
			</div>
			
			<div class="col-md-9">
				<div class="category_slide">
					<?php
						if (isset($_GET["CategoryID"]) && $_GET["CategoryID"] != '') {
							$sql_pc = 'SELECT Picture FROM categoryproduct WHERE CategoryID ='.$_GET['CategoryID'];
							$result_pc = executeResult($sql_pc);
							if ($result_pc) {
								echo '<img src="'.$result_pc[0]["Picture"].'" width="100%">';
							}
						} else {
							echo '<img src="https://i.postimg.cc/pXC9v0by/slide-demo1.jpg" width="100%">';
						}
					?>
				</div>
				<div class="category_ut text-right">
					<form method="get" class="form" name="sortby">
						<label>Ưu tiên theo: </label>
						<div class="option_sort-style">
							<select name="sortby"><!-- 
								<option value="a-z" class="option-inlineclass="form-control"">Tên A-Z</option>
								<a href=""><option value="z-a">Tên Z-A</option></a> -->
								<option value="hotrend" selectd>Nổi bật nhất</option><!-- 
								<option value="min">Giá thấp đến cao</option>
								<option value="max">Giá cao xuống thấp</option> -->
							</select>
						</div>
					</form>
				</div>
				<div class="category_show">
					<div class="row">
						<?php
							$number = 0;
							$resultFind = '';

							//Page 1.2.3...
							//Phân trang
 							if (isset($_GET['CategoryID'])) {
 								//Lấy số lượng sản phẩm danh mục cha
								$CategoryID = $_GET['CategoryID'];

								$sqlFind = 'SELECT CategoryID FROM categoryproduct WHERE CategoryParent ='.$CategoryID;
								$resultFind = executeResult($sqlFind); //Trả về tất cả ID Danh mục con

								if ($resultFind != '' && count($resultFind) > 0) {

									foreach ($resultFind as $row) {

										$sql = "SELECT count(ProductID) AS number FROM product WHERE Status = 1 AND CategoryID = ".$row['CategoryID'].";";
										//echo $sql;
										$result = executeResult($sql);

										if ($result != '' && count($result) > 0) {

											$number += $result[0]['number'];
										}
									}
								} else {
									//Lấy số lượng từ danh mục con
									//Không tồn tại danh mục cha -> Tìm từ GET["CategoryID"]
									$sql = 'SELECT count(ProductID) AS number FROM product WHERE Status = 1 AND CategoryID = '.$CategoryID;
								}
							} else {
								//Lấy số lượng sản phẩm. Tất cả sản phẩm
								$sql = 'SELECT count(ProductID) AS number FROM product WHERE Status = 1';
							}

							//Trả về số lượng TH: tất cả, danh mục cha, danh mục con, 
							//NOTE: thiếu TH: khoảng giá, tìm kiếm
							if ($number == 0) {
								$result = executeResult($sql);
								if ($result != null && count($result) > 0) {
									$number = $result[0]['number'];
								}
							}
							$page_list = ceil($number/16);
							$current_page_list = 1;
							if (isset($_GET['page_list'])) {

								$current_page_list = $_GET['page_list'];
							}
							$index = ($current_page_list-1)*16;

							//Search -> Tạo query SELECT							
							if ($resultFind != '' && count($resultFind) > 0) {

								//TH tìm kiếm từ danh mục parent
								//$resultFind Trả về tất cả ID Danh mục con
								$sql_list = [];
								$sql_n = '';

								//Nối sql khi tìm kiếm theo giá
								if (isset($_POST['price_s'])) {
									$sql_n .= ' AND ( ';
									$isFind = false;

									foreach ($_POST['price_s'] as $value) {
										if (!$isFind) {
											if ($value == 50) $sql_n .= ' Price < 50000';
											else if ($value == 100) $sql_n .= ' Price BETWEEN 50000 AND 100000 ';
											else if ($value == 200) $sql_n .= ' Price BETWEEN 100000 AND 200000 ';
											else if ($value == 500) $sql_n .= ' Price BETWEEN 200000 AND 500000 ';
											else if ($value == 501) $sql_n .= ' Price > 500000 ';
											$isFind = true;
										} else {
											if ($value == 50) $sql_n .= ' OR ( Price < 50000 ';
											else if ($value == 100) $sql_n .= ' OR ( Price BETWEEN 50000 AND 100000 ';
											else if ($value == 200) $sql_n .= ' OR ( Price BETWEEN 100000 AND 200000 ';
											else if ($value == 500) $sql_n .= ' OR ( Price BETWEEN 200000 AND 500000 ';
											else if ($value == 501) $sql_n .= ' OR ( Price > 500000 ';
											$sql_n .= ' ) ';
										}
									}

									$sql_n .= ' ) ';
								}

								//Tạo sql_query tìm kiếm
								foreach ($resultFind as $row) {
									if (isset($sql_n) && $sql_n != '') {
										$sql = 'SELECT * FROM product WHERE Status = 1 AND CategoryID = '.$row['CategoryID'].'  '.$sql_n.' ORDER BY `product`.`ProductID` DESC LIMIT '.$index.', 16';
									} else {
										$sql = 'SELECT * FROM product WHERE Status = 1 AND CategoryID = '.$row['CategoryID'].'   ORDER BY `product`.`ProductID` DESC LIMIT '.$index.', 16';
									}

									$result = executeResult($sql);
									foreach ($result as $row) {

											echo 	'<div class="col-md-3 col-sm-4 col-xs-6 product">
														<a href="?productID='.$row["ProductID"].'">
															<div class="product_relative">
																<img src="'.$row["Thumbnail"].'">
																<div class="product_absolute"><b>XEM NGAY</b></div>
															</div>
															<div class="product_name">'.$row["ProductName"].'</div>';

										//Kiểm tra có tồn tại giá giảm
										if ($row["PriceDiscount"] != null && $row["PriceDiscount"] != '0') {

											echo 			'<div class="product_price">'.number_format($row["Price"]).'₫</div>
															<div class="product_pricediscount">'.number_format($row["PriceDiscount"]).'₫</div>
														</a>
													</div>';
										} else {

											echo '			<div class="product_pricediscount">'.number_format($row["Price"]).'₫</div>
														</a>
													</div>';
										}		
									}
								}																																																																																	
							} else if ($sql_search != '') {
								include('include/display_search_product.php');
							} else {
								if (isset($_GET['CategoryID'])) {
									$price_s = [];
									//TH tìm kiếm từ danh mục
									$CategoryID = $_GET['CategoryID'];
									//Kiểm tra có tồn tại yêu cầu tìm kiếm theo giá -> edit query $sql
									if (isset($sql_n) && $sql_n != '') {
										$sql = 'SELECT * FROM product WHERE Status = 1 AND CategoryID = '.$CategoryID.' '.$sql_n.'   ORDER BY `product`.`ProductID` DESC LIMIT '.$index.', 16';
									} else {
										$sql = 'SELECT * FROM product WHERE Status = 1 AND CategoryID = '.$CategoryID.'  ORDER BY `product`.`ProductID` DESC LIMIT '.$index.', 16';
									}
									// echo $sql;
								} else {//TH hiển thị tất cả

									$sql = 'SELECT * FROM product WHERE Status = 1 ORDER BY `product`.`ProductID` DESC LIMIT '.$index.', 16';
								}

								$result = executeResult($sql);

								//Hiển thị dữ liệu
								foreach ($result as $row) {

										echo 	'<div class="col-md-3 col-sm-4 col-xs-6 product">
													<a href="?productID='.$row["ProductID"].'">
														<div class="product_relative">
															<img src="'.$row["Thumbnail"].'">
															<div class="product_absolute"><b>XEM NGAY</b></div>
														</div>
														<div class="product_name">'.$row["ProductName"].'</div>';
									//Kiểm tra có tồn tại giá giảm
									if ($row["PriceDiscount"] != null && $row["PriceDiscount"] != '0') {

										echo 			'<div class="product_price">'.number_format($row["Price"]).'₫</div>
														<div class="product_pricediscount">'.number_format($row["PriceDiscount"]).'₫</div>
													</a>
												</div>';
									} else {

										echo '			<div class="product_pricediscount">'.number_format($row["Price"]).'₫</div>
													</a>
												</div>';
									}		
								}
							}
						?>
						
					</div>

					<div class="btn-page-group">
						<center>
							<?php
								$j = $current_page_list - 1;
								$q = $current_page_list + 1;

								if ($current_page_list > 1) {
									echo '<a href="?page=listproduct&page_list='.$j.'">
											<button type="button" class="btn-page-pre">
												<i class="fas fa-angle-left"></i>
											</button>
										</a>';
								}

								for ($i=1; $i<=$page_list; $i++) {

									if ($i == $current_page_list) {
										echo '<a href="?page=listproduct&page_list='.$i.'">
												<button type="button" class="btn-page_selected">'.$i.'</button>
											</a>';
									} else {
										echo '<a href="?page=listproduct&page_list='.$i.'">
												<button type="button" class="btn-page">'.$i.'</button>
											</a>';
									}

									
								}

								if ($current_page_list < $page_list) {
									echo '<a href="?page=listproduct&page_list='.$q.'">
											<button type="button" class="btn-page-pre">
												<i class="fas fa-angle-right"></i>
											</button>
										</a>';
								}
							?>
							<!-- <a href="?page=listproduct&page_list=2"><button type="button" class="btn-page_selected">2</button></a> -->
							<!-- <button type="button" class="btn-page-pre">...</button> -->

						</center>
					</div>

				</div>
			</div>

		</div>
	</div>