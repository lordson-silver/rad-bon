<?php
	require_once '../lib/config.php';
    require_once '../server/classes/fetchData.php';
    require_once '../server/classes/updateData.php';

	$id = $_GET['id'];
	$trade_type = $_GET['trade_type'];

$updateResponse = $update->updateTradeType($id,$trade_type);
// echo $updateResponse['status'];
 header("location:".SITEURL."adminDashboard/successful.php");
?>



