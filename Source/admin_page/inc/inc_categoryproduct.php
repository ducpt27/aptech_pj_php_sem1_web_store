		<?php
			include('database.php');
			$ctg_name = $ctg_picture = $ctg_parent = '';
			$note = '';
			$ctg_id = '';
			if (isset($_GET['ed_CtgID'])) {
				$ctg_id = $_GET['ed_CtgID'];
			}
			if (!empty($_POST)) {
				$ctg_name = $_POST['ctg_name'];
				$ctg_picture = $_POST['ctg_picture'];
				$ctg_parent = $_POST['ctg_parent'];
			}
			$rsl = '';
			if ($ctg_name != '') {

				$sql2 = 'SELECT * FROM categoryproduct WHERE CategoryName = "'.$ctg_name.'"';
				$result2 = executeResult($sql2);

				if ($result2 != null && count($result2) > 0 && $ctg_id == '') {
					$note = '<b style="color:red;">Tên danh mục đã tồn tại!</b>';
				} else if ($ctg_id != '') {
					$sql = 'UPDATE categoryproduct SET CategoryName = "'.$ctg_name.'", Picture = "'.$ctg_picture.'", CategoryParent = "'.$ctg_parent.'" WHERE `categoryproduct`.`CategoryID` = '.$ctg_id;
					execute($sql);
					$note = '<b style="color:green;">Sửa thành công!</b>';
				} else {
					$sql = 'INSERT INTO categoryproduct (CategoryName, Picture, CategoryParent) VALUES ("'.$ctg_name.'", "'.$ctg_picture.'", "'.$ctg_parent.'")';
					execute($sql);
					$note = '<b style="color:green;">Đã thêm danh mục sản phẩm</b>';
				}
			}
			// xóa danh mục
			if (isset($_GET['dlt_CtgID']) && $_GET['dlt_CtgID'] != '') {
				$sql3 = "DELETE FROM categoryproduct WHERE CategoryID = ".$_GET['dlt_CtgID'];
				execute($sql3);
				$note = '<b style="color:green;">Đã xóa danh mục</b>';
			}

			// sửa danh mục
			$rsl5 = '';
			if(isset($_GET['ed_CtgID']) && $_GET['ed_CtgID'] != '') {
				$sql5 = 'SELECT * FROM categoryproduct WHERE CategoryID = "'.$_GET['ed_CtgID'].'"';
				$rsl5 = executeResult($sql5);
			}
			$ed_CtgName = $ed_Picture = $ed_CtgPrID = '';
			if($rsl5 != '') {
				$ed_CtgName = $rsl5[0]['CategoryName'];
				$ed_Picture = $rsl5[0]['Picture'];
				$ed_CtgPrID = $rsl5[0]['CategoryParent'];
			}
		?>		
		<div id="ct_category">
			<div class="add_bgr" id="add_ctg">
				<h4><b>Add Category</b></h4>
				<center><?=$note?></center>
				<form method="post" name="add_ctg">
					<div class="form-group">
						<label>Category Name</label>
						<input type="text" name="ctg_name" class="form-control" required value="<?=$ed_CtgName?>">
					</div>
					<div class="form-group">
						<label>Picture</label>
						<input type="text" name="ctg_picture" class="form-control" value="<?=$ed_Picture?>">
					</div>
					<div class="form-group">
						<label>Category Parent</label>
						<input type="number" name="ctg_parent" class="form-control" value="<?=$ed_CtgPrID?>">
					</div>
					<?php $add_edit = ''; if(isset($_GET['ed_CtgID'])) { $add_edit = 'Edit';} else { $add_edit = 'Add';} ?>
					<button type="submit" class="btn btn-success"><?=$add_edit?></button>
					<button type="reset" class="btn btn-warning">Reset</button>
				</form>
			</div>
		</div>



			<div class="add_bgr">
				<form method="get" name="satus_group-products">
					<center><?=$note?></center>
					<h4><b>Category</b></h4>
					<a href="?page=<?php echo $page;?>&tbl=<?php echo $tbl;?>&add=add_ctg"><button type="button" class="btn btn-success">Add category</button></a>
					</br></br>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Picture</th>
								<th>Picture URL</th>
								<th>Category Parent ID</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = 'SELECT * FROM `categoryproduct` ORDER BY `categoryproduct`.`CategoryParent` ASC';
								$result = executeResult($sql);

								foreach ($result as $row) {
									echo '<tr>
										<td>'.$row["CategoryID"].'</td>
										<td>'.$row["CategoryName"].'</td>
										<td><img src="'.$row["Picture"].'" width="300px"></td>
										<td>'.$row["Picture"].'</td>
										<td>'.$row["CategoryParent"].'</td>

										<td><a href="?page=admin_products&tbl=inc/inc_categoryproduct&add=add_ctg&ed_CtgID='.$row["CategoryID"].'">
											<button type="button" class="btn btn-warning">Edit</button>
										</a></td>

										<td><a href="?page=admin_products&tbl=inc/inc_categoryproduct&dlt_CtgID='.$row["CategoryID"].'">
											<button type="button" class="btn btn-danger">Delete</button>
										</a></td>						
									</tr>';
								}
							?>
						</tbody>
					</table>
				</form>
			</div>