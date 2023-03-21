<?php
	require_once '../lib/config.php';
    require_once '../server/classes/updateData.php';

	
	$id = $_POST['id'];
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    $updateResponse = $update->adminUpdate($id,$newUsername,$newPassword);

    header("location:".SITEURL."adminDashboard/successful.php");
?>



 