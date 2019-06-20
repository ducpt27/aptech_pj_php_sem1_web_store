		<?php
			include('database.php');
			$img_productid = $img_imageurl = '';
			$note = '';
			if(!empty($_POST)) {
				$img_productid = $_POST['img_productid'];
				$img_imageurl = $_POST['img_imageurl'];
			}
			if($img_productid != '' && $img_imageurl != '') {

				$sql = 'INSERT INTO `image` (`ProductID`, `ImageURL`) VALUES ("'.$img_productid.'", "'.$img_imageurl.'")';

				$sql2 = 'SELECT * FROM `product` WHERE ProductID = "'.$img_productid.'"';

				$result = executeResult($sql2);
				if ($result== '' || count($result)>0) {
					execute($sql);
					$note = '<b style="color:green;">Đã thêm hình ảnh</b>';
				}
				else{
					$note = '<b style="color:red;">ID sản phẩm không tồn tại! Vui lòng kiểm tra lại</b>';
				}
			}
		?>
		<div id="ct_image">
			<div class="add_bgr" id="add_img">
				<form method="post" name="add_image">
					<h4><b>Add Image</b></h4>
					<center><?=$note?></center>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>ProductID</label>
								<input type="number" name="img_productid" class="form-control" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>ImageURL</label>
								<input type="text" name="img_imageurl" class="form-control" required>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Add</button>
					<button type="reset" class="btn btn-warning">Reset</button>
				</form>
			</div>
			<div class="add_bgr">
				
				<div class="container">
				<h4><b>List Image</b></h4>
				<a href="?page=<?php echo $page;?>&tbl=<?php echo $tbl;?>&add=add_img"><button type="button" class="btn btn-success">Add image</button></a>
				</br></br>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Picture</th>
								<th>ProductID</th>
								<th>ImageURL</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql5 = 'SELECT * FROM `image` ORDER BY `image`.`ProductID` ASC';
								$result5 = executeResult($sql5);

								foreach ($result5 as $row) {
									echo '<tr>
											<td>'.$row["ImageID"].'</td>
											<td><img src="'.$row["ImageURL"].'" width="50px" height="50px"></td>
											<th>'.$row["ProductID"].'</th>
											<th>'.$row["ImageURL"].'</th>
											<td><a href="?ed_img_ProductID='.$row["ImageID"].'">
												<button type="button" class="btn btn-warning">Edit</button>
											</a></td>
											<td><a href="?delete_img_ProductID='.$row["ImageID"].'">
												<button type="button" class="btn btn-danger">Delete</button>
											</a></td>						
										</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>