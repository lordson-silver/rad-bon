<?php
	require_once '../lib/config.php';
    require_once '../server/classes/insertData.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
		$username = $_POST['username'];
		$password = $_POST['password'];
		echo $username;
		$insertData = new insertData;
		$addResponse = $insertData->addAdmin($username,$password);
		header("location:".SITEURL."adminDashboard/successful.php");
	}
	
?>