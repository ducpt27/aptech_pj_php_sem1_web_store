<?php
	const servername='localhost';
	const username='root';
	const password='';
	const database='vinegarfood';

	function execute22($sql){
		$conn= new mysqli(servername,username,password,database);
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
?>


	<style type="text/css">
	* {box-sizing: border-box;}
	.style-fix-things .img1 {
	  position: relative !important;
	  width: 100% !important;
	}
	.glyphicon {
		font-family: "Glyphicons Halflings" !important;
	}

	.style-fix-things .img2 {
	  display: block !important;
	  width: 100% !important;
	  height: auto !important;
	}

	 .overlay {
	  position: absolute !important; 
	  bottom: 0 !important; 
	  background: rgb(0, 0, 0) !important;
	  background: rgba(0, 0, 0, 0.5) !important; /* Black see-through */
	  color: #f1f1f1; 
	  width: 100% !important;
	  transition: .5s ease !important;
	  opacity: 0 ;
	  color: white !important;
	  font-size: 15px !important;
	  padding: 20px !important;
	  text-align: center !important;
	}

	.img1:hover > .overlay {
	  opacity: 1;
	}
	.style-fix-things .blackground {
	    background-image: url('https://i.postimg.cc/dtp4NwGc/nen-slide-min.jpg');
	    background-repeat: no-repeat;
	    background-position: center;
	    background-size: cover;
	    height: 470px;
	}
	  .style-fix-things .col-md-4 h3{
	    margin: 0;
	    font-size: 50px;
	    color: #fff;
	    margin-bottom: 20px;
	  }
	  .style-fix-things .col-md-4 h4{
	    margin: 0;
	    font-size: 15px;
	    font-weight: 500;
	    color: #fff;
	    line-height: 1.7;
	  }
	  .style-fix-things .col-md-4 a{
	    margin-top: 30px;
	    background-color: #e73918;
	    font-size: 15px;
	    border: none;
	    color: #fff;
	    text-transform: capitalize;
	    padding: 10px 42px;
	    border-radius: 5px;
	    display: inline-block;
	    text-align: center;
	    cursor: pointer;
	    position: relative;
	  }
	  .style-fix-things .sdsarticleHeader a{
	    margin: 0;
	    padding: 3px 0 0;
	    line-height: 22px;
	    color: #222;
	    display: block;
	    font-weight: 500;
	    font-size: 16px;
	  }
	.style-fix-things .sdsarticle-info {
	  margin-bottom: 5px;
	    color: rgba(0,0,0,0.5);
	    font-weight: 500;
	}
	.style-fix-things .desc{
	  font-size: 14px;
	    font-weight: 400;
	    margin-bottom: 10px;
	    color: #666;
	}

	.style-fix-things .fa{
		display: inline-block;
	    font: normal normal normal 14px/1 FontAwesome;
	    font-size: inherit;
	    text-rendering: auto;
	    -webkit-font-smoothing: antialiased;
	}
	.style-fix-things .fa-long-arrow-right {
	    content: "\f178";
	}
	.style-fix-things img .col-sm-4 {
	    vertical-align: middle;
	}
	.style-fix-things img .col-sm-4 {
	    border-style: none;
	}
	.style-fix-things .hover{
		color: gray !important;
	}
	.style-fix-things .hover:hover{
		color: red !important;
	}
	.style-fix-things .hover1{
		color: black !important;
	}
	.style-fix-things .hover1:hover{
		color: red !important;
	}
	.style-fix-things .hover2 figure:hover img {
		opacity: 1;
		-webkit-animation: flash 1.5s;
		animation: flash 1.5s;
	}
	@-webkit-keyframes flash {
	0% {
		opacity: .4;
	}
	100% {
		opacity: 1;
	}
	}
	@keyframes flash {
	0% {
		opacity: .4;
	}
	100% {
		opacity: 1;
	}
</style>
 <div class="style-fix-things" > 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://bizweb.dktcdn.net/thumb/2048x2048/100/336/947/themes/693577/assets/slider_1.jpg?1548734743802" style="width: 100%; object-fit: cover;" class="img_mb_banner">
      </div>

      <div class="item">
        <img src="https://i.postimg.cc/xdsPzH3Q/53570996-370715730186946-4216858887610957824-n.jpg" style="width: 100%; object-fit: cover;" class="img_mb_banner">
      </div>
    
      <div class="item">
        <img src="https://i.postimg.cc/G2HxJ2Xy/54258100-2382909571753775-2253521902297415680-n.jpg" style="width: 100%; object-fit: cover;" class="img_mb_banner">
      </div>
    </div>
    <script type="text/javascript" charset="utf-8" async defer>
    	rong = parseInt(screen.availWidth);
    	cao = rong/3;
    	$('.img_mg_banner')css({
    		'width': rong,
    		'height': cao
    	})
    </script>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 <div class="container">
		<div class="row" style="margin-top: 20px;">
			<div class="col-sm-3 col-xs-6" style="min-height: 50px">
				<img src="//bizweb.dktcdn.net/100/336/947/themes/693577/assets/policy_images_1.png?1548734743802" width="40px" style="float: left">
				<div class=""  style="float: left; padding-left: 10px">
				   <a class="hover1" href="" style="text-decoration: none;">Bảo đảm chất lượng</a><br>
				   <p style="color: gray">Sản phẩm chất lượng</p> 
		  	  	</div>
			</div>
		    <div class="col-sm-3 col-xs-6" style="min-height: 50px">
		    	<img src="//bizweb.dktcdn.net/100/336/947/themes/693577/assets/policy_images_2.png?1548734743802" width="40px" style="float: left">
				<div class=""  style="float: left; padding-left: 10px">
				   <a class="hover1" href="" style="text-decoration: none;">Miễn phí giao hàng</a><br>
				   <span style="color: gray">Cho đơn hàng từ 2 triệu đồng</span> 
		  	  	</div>
		   </div>
		    <div class="col-sm-3 col-xs-6" style="min-height: 50px">
		    	<img src="//bizweb.dktcdn.net/100/336/947/themes/693577/assets/policy_images_3.png?1548734743802" width="40px" style="float: left">
				<div class=""  style="float: left; padding-left: 10px">
				   <a class="hover1" href="" style="text-decoration: none;">Hỗ trợ 24/7</a><br>
				   <span style="color: gray">Hotline : 0123 456 789</span> 
		  	  	</div>
			</div>
			<div class="col-sm-3 col-xs-6" style="min-height: 50px">
		    	<img src="//bizweb.dktcdn.net/100/336/947/themes/693577/assets/policy_images_4.png?1548734743802" width="40px" style="float: left">
				<div class=""  style="float: left; padding-left: 10px">
				   <a class="hover1" href="" style="text-decoration: none;">Đổi trả hàng</a><br>
				   <span style="color: gray">Trong vòng 7 ngày</span> 
		  	  	</div>
			</div>
 		</div>
 </div>
<div class="container" style="margin-top: 15px">
  <div class="row">
    <div class="col-sm-6 col-xs-12" style="margin-bottom: 15px">
    	<div class="hover2">
    		<a href=""><figure>
    		<img src="https://i.postimg.cc/fyxR4wkq/nen-home2-min.jpg"
    		 style="width: 100%; height: 280px; object-fit: cover;"></figure></a>
    	</div>
 	</div>
    <div class="col-sm-6 col-xs-12" style="margin-bottom: 15px">
    	<div class="hover2">
    		<a href=""><figure>
    		<img src="https://i.postimg.cc/yxq8rJ6S/nen-home1-min.jpg"
    		 style="width: 100%; height: 280px; object-fit: cover;"></figure></a>
    	</div>
 	</div>
  </div>
</div>
<div class="container">
  <div class="row" style="text-align: center;margin-top: 20px">
    <div class="col-md-12" >
          <p style="text-transform: uppercase;color: red"><b>Sản Phẩm</b></p>
          <p><b style="font-size: 35px">Khuyến mãi trong ngày</b></p>
          <p><i style="color: gray">Rau củ, thịt cá, trứng, trái cây các loại, hàng luôn tươi mới mỗi ngày.</i></p>
    </div>
     	 <ul style="text-align: center;">
            <?php
            	$sql='select * from categoryproduct limit 0,5';
            	$CategoryName=execute22($sql);
            	foreach ($CategoryName as $row) {
            		# code...
            		echo '<a class="hover" href="?page=listproduct&CategoryID='.$row["CategoryID"].'"style="padding: 10px;text-transform: 	uppercase;text-decoration:none">
           	 '.$row['CategoryName'].'</a>';
            	}
            ?>
          </ul>
   </div>
   <div class="row">
      	<?php
      		$sql='SELECT * FROM product WHERE PriceDiscount != 0 ORDER BY (Price-PriceDiscount) DESC limit 0,4';
      		$product=execute22($sql);
      		foreach ($product as $row) {
      			echo '<p><div class="col-sm-3 col-xs-6">
	      <a href="?productID='.$row["ProductID"].'"><p><div class="img1">
				<img src="'.$row['Thumbnail'].'" class="img2">
				<div class="overlay">Xem Thêm</div>
			</div></p></a>
	      <a href="?productID='.$row["ProductID"].'" class="hover" style="text-decoration: none;" title="'.$row['ProductName'].'">'.$row['ProductName'].'</a>
	      <div class="price product-price sale-price" style="color: #e73918">'.number_format($row['PriceDiscount']).'₫  
	      <span style="color: #666; text-decoration: line-through; padding-left: 5px">'.number_format($row["Price"]).'₫</span>
	      </div>
	    </div></p>';
      		}
      	?>
  </div>
   <div class="col-md-12">
   	<p><div style="text-align: center;">
      		<a class="hover1" style="text-decoration: none;" href="?page=listproduct" title="Xem thêm các sản phẩm khác">Xem thêm các sản phẩm khác
      		<i class="fas fa-arrow-right"></i>      
      		</a>
      	</div></p>
    </div>
</div>
<hr>
<div class="container">
  <div class="row" style="text-align: center">
    <div class="col-xs-12" >
          <span style="text-transform: uppercase;color: red"><b>Vinegar Food</b></span>
          <p><b style="font-size: 40px">Sản phẩm nổi bật</b></p>
          <i style="color: gray">Thức ăn tự nhiên được lấy từ các trang trại hiện đại nhất </br> thế giới với chu kì an toàn nghiêm ngặt.</i>
        </div>
      </div></br>
      <p><div class="row" style="color: black; text-align: center;">
        <?php
        	$sql='select * from product order by Quantity desc limit 0,4';
        	$product2=execute22($sql);
        	foreach ($product2 as $row) {
        		# code...
        		echo '<div class="col-sm-3 col-xs-6">
		    <a href="?productID='.$row["ProductID"].'"><p><div class="img1">
				<img src="'.$row['Thumbnail'].'" class="img2">
				<div class="overlay">Xem Thêm</div>
			</div></p></a>
	      <b><a href="?productID='.$row["ProductID"].'" class="hover" style="text-decoration: none;" title="'.$row['ProductName'].'">'.$row['ProductName'].'</a></b>
	      <div style="color: gray"><i>('.$row['Quantity'].')</i></div>
	    </div>';
        	}
        ?>

</p>

	    <div class="col-md-12" style="margin-top: 30px" >
          <p style="text-transform: uppercase;color: red"><b>Sản Phẩm</b></p>
          <p><b style="font-size: 35px">Gợi ý cho bạn</b></p>
          <p><i style="color: gray">Rau củ, thịt cá, trứng, trái cây các loại, hàng luôn tươi mới mỗi ngày.</i></p>
    </div>
   </div>
   <div class="row">
      	<?php
      		$sql='select * from product order by Price asc limit 0,4';
      		$product3=execute22($sql);
      		foreach ($product3 as $row) {
      			# code...
      			echo '<p><div class="col-sm-3 col-xs-6">
		    <a href="?productID='.$row["ProductID"].'"><p><div class="img1">
				<img src="'.$row['Thumbnail'].'" class="img2">
				<div class="overlay">Xem Thêm</div>
			</div></p></a>
	      <a href="?productID='.$row["ProductID"].'" class="hover" style="text-decoration: none;" title="'.$row['ProductName'].'">'.$row['ProductName'].'</a>';
	      if($row["PriceDiscount"] != null && $row["PriceDiscount"] != 0) {
	     echo '<div class="price product-price sale-price" style="color: #e73918">'.number_format($row['PriceDiscount']).'₫  
	      <span style="color: #666; text-decoration: line-through; padding-left: 5px">'.number_format($row["Price"]).'₫</span>
	      </div>';
	  	} else {
	  		 echo '<div class="price product-price sale-price" style="color: #e73918">'.number_format($row['Price']).'₫</div>';

	  	}
	    echo '</div></p>';
      		}
      	?>
  </div>
  <div class="col-md-12">
   	<p><div style="text-align: center;">
      		<a class="hover1" style="text-decoration: none;" href="?page=productlist" title="Xem thêm các sản phẩm khác">Xem thêm các sản phẩm khác
      		<i class="fas fa-arrow-right"></i>      
      		</a>
      	</div></p>
    </div>
</div>
 <div class="container-fluid blackground" style="margin-top: 20px;">
    <div class="container">
      	<div class="row">
            <div class="col-md-4" style="color: red;text-align: center; padding-top: 50px;" > 
              <p><h3>Chuyên mục sản phẩm</h3></p>
              <p><h4>Vào bếp cùng chuyên gia với nhiều công thức nấu ăn ngon mỗi ngày đơn giản dễ làm ,hướng dẫn làm bánh ,món mặn,món chay, món ăn theo các dịp lễ  .</h4></p>
              <a href="?page=blogs" style="text-decoration: none;">Xem thêm</a>
            </div> 
  		</div>
	</div>
</div>
<div class="container">
  <div class="row" style="text-align: center;margin-top: 20px">
    <div class="col-md-12" >
          <p style="text-transform: uppercase;color: red"><b>Sản Phẩm</b></p>
          <p><b style="font-size: 35px">Bán chạy nhất</b></p>
          <p><i style="color: gray;">Rau củ, thịt cá, trứng, trái cây các loại, hàng luôn tươi mới mỗi ngày.</i></p>
    </div>
     	 <ul style="text-align: center;"><b>
             <?php
            	$sql='select CategoryName from categoryproduct limit 0,5';
            	$CategoryName=execute22($sql);
            	foreach ($CategoryName as $row) {
            		# code...
            		echo '<a class="hover" href="?page=listproduct"style="padding: 10px;text-transform: 	uppercase;text-decoration:none">
           	 '.$row['CategoryName'].'</a>';
            	}
            ?>
          </b></ul>
   </div>
   <div class="row">
      	<?php
      		$sql='select distinct ProductID from orderdetail order by Quantity desc limit 0,4';
      		$productID=execute22($sql);
      		foreach ($productID as $row) {
      			# code...
      			$sql='select * from product where ProductID= '.$row['ProductID'];
      			$product4=execute22($sql);
      			foreach ($product4 as $row) {
      				# code...
      				echo '<p><div class="col-sm-3 col-xs-6">
	      <a href="?productID='.$row["ProductID"].'"><p><div class="img1">
				<img src="'.$row['Thumbnail'].'" class="img2">
				<div class="overlay">Xem Thêm</div>
			</div></p></a>
	      <a href="?productID='.$row["ProductID"].'" class="hover" style="text-decoration: none;" title="'.$row['ProductName'].'">'.$row['ProductName'].'</a>';
	      if($row["PriceDiscount"] != null && $row["PriceDiscount"] != 0) {
	     echo '<div class="price product-price sale-price" style="color: #e73918">'.number_format($row['PriceDiscount']).'₫  
	      <span style="color: #666; text-decoration: line-through; padding-left: 5px">'.number_format($row["Price"]).'₫</span>
	      </div>';
	  	} else {
	  		 echo '<div class="price product-price sale-price" style="color: #e73918">'.number_format($row['Price']).'₫</div>';

	  	}
	    echo '</div></p>';
      			}
      		}
      	?>
  </div>
  <div class="col-md-12">
   	<p><div style="text-align: center;">
      		<a class="hover1" style="text-decoration: none;" href="?page=listproduct" title="Xem thêm các sản phẩm khác">Xem thêm các sản phẩm khác
      		<i class="fas fa-arrow-right"></i>      
      		</a>
      	</div></p>
    </div>
</div>
<hr>
<div class="container">
  <div class="row" style="text-align: center;margin-top: 10px">
    <div class="col-md-12" >
          <span style="text-transform: uppercase;color: red"><b>tin tức</b></span></br>
          <p><b style="font-size: 35px">Tin mới nhất</b></p>
          <i style="color: #8E8E8E">Rau củ, thịt cá, trứng, trái cây các loại, hàng luôn tươi mới mỗi<br> ngày,nguồn gốc rõ ràng,đạt tiêu chuẩn Vietgap tại Ant Fruit.</i>
    </div>
  </div>
</div>
  <div class="container" style="margin-top: 15px">
  <div class="row">
   <?php
   		$sql='select * from blog order by CreateDate desc limit 0,3';
   		$blog=execute22($sql);
   		foreach ($blog as $row) {
   			# code...
   			echo ' <div class="col-sm-4 col-xs-12" style="margin-bottom: 15px">
    	<div class="hover2">
    		<a href="?page=blogs&blogid='.$row["BlogID"].'" title="'.$row['Title'].'"><figure>
    		<p><img src="'.$row['Thumbnail'].'"
    		 style="width: 100%; object-fit: cover;"></p></figure></a>
    		<p style="color: gray">'.$row['CreateDate'].'</p>
    		<a class="hover1" title="$row['.$row['Title'].']" href="?page=blogs&blogid='.$row["BlogID"].'" style="text-decoration: none;">
    			<b><p>'.$row['Title'].'</p></a></b>
    		<p style="color: gray; margin: 2px">';
    			$sql='select LEFT(Content, 200) as content from blog where BlogID= '.$row['BlogID'];
    			$content=execute22($sql);
    			foreach ($content as $row) {
    				# code...
    				echo $row['content'];
    			}
    		echo '...</p>
    	</div>
 	</div>';
   		}
   ?>
    
 	<div class="col-md-12">
   	<p><div style="text-align: center;">
      		<a class="hover1" style="text-decoration: none;" href="?page=blogs" title="Xem thêm các sản phẩm khác">Xem thêm các tin tức khác
      		<i class="fas fa-arrow-right"></i>      
      		</a>
      	</div></p>
    </div>

  </div>
</div>
</div>
</div>