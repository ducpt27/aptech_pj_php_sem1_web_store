<link rel="stylesheet" type="text/css" href="include/css/style_payment.css">
	<div class="container" onload="loading()">
		<div class="pm-h"><b>Giỏ hàng </b><span><!-- (3 sản phẩm) --></span></div>
		<form class="form" method="get">
			<div class="row" style="padding: 0 15px !important">
				<div class="col-md-9" id="mg_btm_group">
					<!-- Data localStorage-->
					<!-- <div class="row mg-btm">
						<div class="col-xs-2 pm-img">
							<img src="image/product_demo1.jpg">
						</div>
						<div class="col-xs-10">
							<div class="pm-pd_name">
								Humberger cá hồi (Size L)
								<p><a href="#">Xóa</a></p>
							</div>
							<div class="pm-group-count">
								<button type="button" class="pm-btn_pd_count pm-btn_pd_c-l" onclick="addNumber(-1, 'number_id1')">-</button>
								<input type="number" min="1" readonly value="2" id="number_id1" required>
								<button type="button" class="pm-btn_pd_count pm-btn_pd_c-r" onclick="addNumber(1, 'number_id1')">+</button>
							</div>
							<div class="pm-pd-price pm_cl">289.000₫</div>
						</div>
					</div> -->
				</div>

				<div class="col-md-3">
					<table class="table table-h" style="margin-top: 20px;">
						<tr class="table-1">
							<th>Tạm tính: </th>
							<th class="text-right"><span id="tamtinh"></span>₫</th>
						</tr>
						<tr>
							<th>Thành tiền: </th>
							<th class="text-right pm_cl"><span id="tongtien"></span>₫</th>
						</tr>
					</table>
					<a href="?page=pm_checkout" id="xacnhan"><button type="button" class="btn-pm" title="Xác nhận giỏ hàng">Xác nhận giỏ hàng</button></a>
					<a href="?page=listproduct"><button type="button" class="btn-pm-back" title="Tiếp tục mua hàng">Tiếp tục mua hàng</button></a>
				</div>
			</div>
		</form>
	</div>
<script type="text/javascript" charset="utf-8" async defer>

	function getData() 
	{	
		arr = [];
		json = localStorage.getItem("cart");

		if (json != null && json != '') {
			arr = JSON.parse(json)
		}

		if (arr != '' && arr != null) {

			for (i = 0; i < arr.length; i++) {

				x = 'number_id'+arr[i].id;
				arr[i].number = document.getElementById(x).value
			}

			localStorage.setItem("cart", JSON.stringify(arr))
		}
		arr = [];
		tongtien = 0;
		json = localStorage.getItem("cart");
			var i

		if (json != null && json != '') {
			arr = JSON.parse(json)
		}

		if (arr != '' && arr != null) {
			for (i = 0; i < arr.length; i++) {
				tongtien += parseInt(arr[i].number)*parseFloat(arr[i].price);
			}
			tongtien = parseFloat(tongtien)

			document.getElementById("tongtien").innerHTML = tongtien
			document.getElementById("tamtinh").innerHTML = tongtien
		}
		var tongsanpham = 0;
		arr = []
		json = localStorage.getItem("cart");

		if (json != null && json != '') {
			arr = JSON.parse(json)
		}
		if (arr != '') {

			for(i = 0; i < arr.length; i++) {

				tongsanpham += parseInt(arr[i].number)
				tongsanpham = parseFloat(tongsanpham)
			}
			document.getElementById('total_buy').innerHTML = tongsanpham;
		}
	}

	function tongtien() {
		arr = [];
		tongtien = 0;
		json = localStorage.getItem("cart");
			var i

		if (json != null && json != '') {
			arr = JSON.parse(json)
		}

		if (arr != '' && arr != null) {
			for (i = 0; i < arr.length; i++) {
				tongtien += parseInt(arr[i].number)*parseFloat(arr[i].price);
			}
			tongtien = parseFloat(tongtien)

			document.getElementById("tongtien").innerHTML = tongtien
			document.getElementById("tamtinh").innerHTML = tongtien
		}
	}
	tongtien()

	function addNumber(t, id) 
	{
		t = parseInt(t)
		number = parseInt(document.getElementById(id).value)
		if (number == 1 && t == 1) {

			number +=1
		} else if (number > 1) {

			number +=t
		}

		document.getElementById(id).value = number
		getData()
	}

	arr = [];
	json = localStorage.getItem('cart')
	//isFind = false

	if (json != null && json != '') {
		document.getElementById("xacnhan").style.display = 'block';

		arr = JSON.parse(json);
		var html = '';

		for (i = 0; i < arr.length; i++) {

			html += '<div class="row mg-btm">'+
						'<div class="col-xs-2 pm-img">'+
							'<img src="'+arr[i].thumbnail+'">'+
						'</div>'+
						'<div class="col-xs-10">'+
							'<div class="pm-pd_name">'+
								'<span>'+arr[i].title+'</span>'+
								'<p><a href="#">Xóa</a></p>'+
							'</div>'+
							'<div class="pm-group-count">'+
								'<button type="button" class="pm-btn_pd_count pm-btn_pd_c-l" onclick="addNumber(-1, \'number_id'+arr[i].id+'\')">-</button>'+
								'<input onblur="checkNo(this)" type="number" min="1" value="'+arr[i].number+'" id="number_id'+arr[i].id+'" required readonly>'+
								'<button type="button" class="pm-btn_pd_count pm-btn_pd_c-r" onclick="addNumber(1, \'number_id'+arr[i].id+'\')">+</button>'+
							'</div>'+
							'<div class="pm-pd-price pm_cl">'+arr[i].price+'₫</div>'+
						'</div>'+
					'</div>';
		}
		document.getElementById("mg_btm_group").innerHTML = html;
	} else {
		document.getElementById("xacnhan").style.display = 'none';
	}
</script>