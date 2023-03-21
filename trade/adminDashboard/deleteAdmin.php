<?php
    require_once '../lib/config.php';
    require_once '../server/classes/fetchData.php';
     require_once '../server/classes/deleteData.php';

     $id = $_GET['id'];
    
    $deleteResponse = $delete->adminDelete($id);

    header("location:".SITEURL."adminDashboard/successful.php");
?>



 