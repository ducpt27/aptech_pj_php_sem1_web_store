<?php
							$result_search = executeResult($sql_search);
								foreach ($result_search as $row) {

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
?>