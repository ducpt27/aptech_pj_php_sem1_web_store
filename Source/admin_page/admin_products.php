	<style type="text/css" media="screen">
		#products_li {
			color: white !important;
			background-color: #0073A9 !important;
		}
		<?php
			$add = '';
			if(isset($_GET['add'])) {
				$add = $_GET['add'];
			}
			if($add != '') {
				echo '#'.$add.' {display: block !important;}';
			}
		?>
	</style>
	<div class="content">
		<div class="products" id="products">
			<div class="header_pd">
				<span>Management Products</span>
				<a href="?page=admin_products&tbl=inc/inc_categoryproduct"><div class="btn-add">Category</div></a>
				<a href="?page=admin_products&tbl=inc/inc_products"><div class="btn-add">Product</div></a>
				<a href="?page=admin_products&tbl=inc/inc_image"><div class="btn-add">Picture</div></a>
			</div>
		</div>
	</div>