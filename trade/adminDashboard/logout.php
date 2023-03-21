<?php

    session_start();
    session_destroy();
    echo 'please login to continue';
    require_once '../lib/config.php';
    header('location:'.SITEURL.'admin.php');
?>