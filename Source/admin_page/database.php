<?php
function execute($sql) {
	//connection to database
	$conn = new mysqli('localhost', 'root', '', 'vinegarfood');
	mysqli_set_charset($conn, 'utf8');

	//query
	mysqli_query($conn, $sql);

	//close connection
	mysqli_close($conn);
}

function executeResult($sql) {
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