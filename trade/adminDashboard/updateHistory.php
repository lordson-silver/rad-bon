<?php
	require_once '../lib/config.php';
    require_once '../server/classes/fetchData.php';
    require_once '../server/classes/updateData.php';

	$id = $_POST['id'];
    $volume=$_POST['volume'];
	$type = $_POST['type'];
	$status = $_POST['status'];
	$profit = $_POST['profit'];
	$loss = $_POST['loss'];
$updateResponse = $update->updateTrading($id,$volume,$type,$status,$profit,$loss);
// echo $updateResponse['status'];
 header("location:".SITEURL."adminDashboard/successful.php");
?>



