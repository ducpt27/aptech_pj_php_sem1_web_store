<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		include('inc_header.php');
		$page = '';
		$tbl = '';

		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		if(isset($_GET['tbl'])) {
			$tbl = $_GET['tbl'];
		}
		if ($page != '') {
			include($page.'.php');
			if ($tbl != '') {
				include($tbl.'.php');
			}
		}
	?>
</body>
</html>