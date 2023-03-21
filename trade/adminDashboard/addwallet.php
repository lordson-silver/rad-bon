<?php
	require_once '../lib/config.php';
    require_once '../server/classes/insertData.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
		$name = $_POST['name'];
		$sign = $_POST['sign'];
		$address = $_POST['address'];
		
		$insertData = new insertData;
		$addResponse = $insertData->addWallet($name,$sign,$address);
		header("location:".SITEURL."adminDashboard/successful.php");
	}
	
?>