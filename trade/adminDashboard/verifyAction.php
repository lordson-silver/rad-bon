<?php
	require_once '../lib/config.php';
    require_once '../server/classes/fetchData.php';
    require_once '../server/classes/updateData.php';

	$email = $_GET['email'];
    $newStatus=$_GET['status'];
	
$updateResponse = $update->verifyUpdate($email,$newStatus);

header("location:".SITEURL."adminDashboard/successful.php");
?>



 