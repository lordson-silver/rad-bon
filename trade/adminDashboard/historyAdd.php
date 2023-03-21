<?php
	require_once '../lib/config.php';
    require_once '../server/classes/insertData.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = $_POST['email'];
		$trade_order = rand(111111, 999999);
		$volume = $_POST['volume'];	
		$profit = $_POST['profit'];
		$type = $_POST['type'];
		$loss = $_POST['loss'];
		$status = $_POST['status'];
		
		$insertData = new insertData;
		$addResponse = $insertData->addHistory($email,$trade_order,$type,$volume,$status,$profit,$loss);
		
		 header("location:".SITEURL."adminDashboard/successful.php");
		
	}
	
?>