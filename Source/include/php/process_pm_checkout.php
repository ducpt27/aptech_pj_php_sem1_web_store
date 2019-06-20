<?php
	
	$transportFee = $paymentMethod = $note = '';
	$OrderID = '';
	$buy = '';

	$f_firstname = $f_lastname = $f_address = $f_phonenumber = '';

	if (isset($_POST['buy'])) {
		$buy = $_POST['buy'];
		//var_dump($buy);
	}

	if (isset($_POST['transportFee'])) {
		$transportFee = $_POST['transportFee'];
	}

	if (isset($_POST['note'])) {
		$note = $_POST['note'];
	}
	
	if ($transportFee != '' && $AddressID != '' && $buy != '') {

		//connection to database
		$connect = new mysqli('localhost', 'root', '', 'vinegarfood');
		mysqli_set_charset($connect, 'utf8');

		$sql = 'INSERT INTO orders(AddressID, TransportFee, RequiredDate, Note, DeliveryStatus)
				VALUES("'.$AddressID.'", "'.$transportFee.'", CURTIME(), "'.$note.'", 0)';
		mysqli_query($connect, $sql);
		//get 'OrderID' insertlast
		$OrderID = mysqli_insert_id($connect); 

		//close connection
		mysqli_close($connect);

		if ($OrderID != null && $OrderID != '') {

			foreach ($buy as $value) {

				$Totalmoney = 0;
				$PriceDiscount = 0;

				$sql2 = 'SELECT Price, PriceDiscount FROM product WHERE ProductID = '.$value['id'];
				$result2 = executeResult($sql2);

				if ($result2[0]["PriceDiscount"] == 0) {

					$PriceDiscount = $result2[0]["Price"];
				} else {
					$PriceDiscount = $result2[0]["PriceDiscount"];
				}
				$Totalmoney = $value['number']*$PriceDiscount;

				$sql3 = 'INSERT INTO orderdetail(OrderID, ProductID, Totalmoney, Quantity) 
						VALUES("'.$OrderID.'", "'.$value["id"].'", "'.$Totalmoney.'", "'.$value["number"].'")';
				execute($sql3);
			}

			echo '<script type="text/javascript" charset="utf-8" async defer>
					localStorage.removeItem("cart");
				</script>';
		}	
	}

	if (isset($_POST['f_firstname'])) {
		$f_firstname = $_POST['f_firstname'];
	}
	if (isset($_POST['f_lastname'])) {
		$f_lastname = $_POST['f_lastname'];
	}
	if (isset($_POST['f_address'])) {
		$f_address = $_POST['f_address'];
	}
	if (isset($_POST['f_phonenumber'])) {
		$f_phonenumber = $_POST['f_phonenumber'];
	}

	if ($f_firstname != '' && $f_lastname != '' && $f_address != '' && $f_phonenumber != '') {

		//connection to database
		$conn = new mysqli('localhost', 'root', '', 'vinegarfood');
		mysqli_set_charset($conn, 'utf8');

		$sql = 'INSERT INTO address(FirstName, LastName, Address, PhoneNumber)
					VALUES ("'.$f_firstname.'", "'.$f_lastname.'", "'.$f_address.'", "'.$f_phonenumber.'");';
		mysqli_query($conn, $sql);
		//get 'AddressId' insertlast
		$AddressID = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		if ($buy != '' && $transportFee != '' && $AddressID != '') {

			//connection to database
			$connect = new mysqli('localhost', 'root', '', 'vinegarfood');
			mysqli_set_charset($connect, 'utf8');

			$sql = 'INSERT INTO orders(AddressID, TransportFee, RequiredDate, Note, DeliveryStatus)
					VALUES ("'.$AddressID.'", "'.$transportFee.'", CURTIME(), "'.$note.'", 0)';
			mysqli_query($connect, $sql);
			//get 'OrderID' insertlast
			$OrderID = mysqli_insert_id($connect); 

			//close connection
			mysqli_close($connect);

			if ($OrderID != null && $OrderID != '') {

				foreach ($buy as $value) {

					$Totalmoney = 0;
					$PriceDiscount = 0;

					$sql2 = 'SELECT Price, PriceDiscount FROM product WHERE ProductID = '.$value['id'];
					$result2 = executeResult($sql2);

					if ($result2[0]["PriceDiscount"] == 0) {

						$PriceDiscount = $result2[0]["Price"];
					} else {
						$PriceDiscount = $result2[0]["PriceDiscount"];
					}
					$Totalmoney = $value['number']*$PriceDiscount;

					$sql3 = 'INSERT INTO orderdetail(OrderID, ProductID, Totalmoney, Quantity) 
							VALUES("'.$OrderID.'", "'.$value["id"].'", "'.$Totalmoney.'", "'.$value["number"].'")';
					execute($sql3);
				}

				echo '<script type="text/javascript" charset="utf-8" async defer>
						localStorage.removeItem("cart");
					</script>';
			}	
		}
	}
?>