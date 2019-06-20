
<script type="text/javascript" charset="utf-8" async defer>
	function addNumber(t) 
	{
		//Thay đổi value input khi click tăng, giảm
		t = parseInt(t)
		number = parseInt(document.getElementById('countNumber').value)
		if (number == 1 && t == 1) {

			number +=1

		} else if (number == 5 && t == -1) {

			number -=1
		} else if (number > 1 && number < 5) {

			number +=t
		}

		document.getElementById('countNumber').value = number
	}

	function checkNo(sender)
	{
		//Khi số lượng
	    if (!isNaN(sender.value)){

	        if(sender.value > 5 )
	            sender.value = 5
	        if(sender.value < 1 ) {
	            sender.value = 1
	        }
	    } else {
	          sender.value = 1
	    }

	}
	

	function addToCart(id, thumbnail, title, price, stt) 
	{

		if (stt == 1) {
			setTimeout(function() {
				$(location).attr('href','vinegarfood.php?page=payment');
				console.log('vinegarfood.php?page=payment')
			}, 1500)
		}

		//Khi click button 'Thêm vào giỏ hàng'
		//Thêm data vào localStorage
		//
		number = document.getElementById('countNumber').value

		json = localStorage.getItem('cart')
		arr = []

		isFind = false

		if (json != null && json != '') {

			arr = JSON.parse(json)
			for (i = 0; i < arr.length; i++) {

				if(arr[i].id == id) {

					isFind = true
					x = parseInt(arr[i].number) + parseInt(number)
					x = parseInt(x)
					if (x > 0) {

						arr[i].number = parseInt(arr[i].number) + parseInt(number)
					}
				}
			}
		}

		if (!isFind) {

			obj = {
				'thumbnail': thumbnail,
				'title': title,
				'number': number,
				'price': price,
				'id': id
			}

			arr.push(obj)
		}

		localStorage.setItem('cart', JSON.stringify(arr))
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
</script>