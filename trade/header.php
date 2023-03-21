<?php 
    session_start();
    require_once 'server/classes/fetchData.php';
    require_once 'lib/config.php';
    $url = "https://blockchain.info/stats?format=json";
    $stats = json_decode(file_get_contents($url), true);
    $btcValue = $stats['market_price_usd'];
    if (empty($_SESSION['email'])) {
      header('location: logout.php');
    }
    $fetchData = new fetchData;
    $fetchResponse = $fetchData->userData($_SESSION['email']);
    if(is_array($fetchResponse)){
        if(isset($fetchResponse['status'])){
            '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
        }else {
            foreach($fetchResponse as $row){
              $tradeType = $row['trade_type'];
                

?>

<!DOCTYPE html>
<html>
  
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trading Area</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <style>
      *{
          font-size:12px !important;
      }
  </style>
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">

        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.php" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Trading</strong><strong>Area</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">T</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="icon-email"></i><span class="badge dashbg-1">*</span></a>
              <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages"><a href="#" class="dropdown-item message d-flex align-items-center">
                  <div class="profile"><img src="https://source.unsplash.com/random/200x200" alt="..." class="img-fluid">
                    <div class="status online"></div>
                  </div>
                  <div class="content" style="overflow-x: scroll;">   <strong class="d-block">From Admin : </strong><span class="d-block"><?php echo $row['message']?></span></div></a>
              </div>
                 
            </div>

  
            <!-- Languages dropdown   
            <div class="list-inline-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
              <div aria-labelledby="languages" class="dropdown-menu"><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2"><span>German</span></a><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2"><span>French  </span></a></div>
            </div>
             -->
            <!-- Log out               -->
            <div class="list-inline-item logout">                   <a id="logout" href="logout.php" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">


      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="https://source.unsplash.com/random/200x200" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"><?php echo $row['fullname']?></h1>
            <p>User Account</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class=""><a href="index.php"> <i class="fa fa-bar-chart"></i>Live Trading </a></li>
          <li class=""><a href="trade-history.php"> <i class="fa fa-bolt"></i>Trade History </a></li>
          <li class=""><a href="transaction-history.php"> <i class="fa fa-folder-open"></i>Transaction History </a></li>
          <li class=""><a href="wallet.php"> <i class="fa fa-credit-card"></i>Wallet </a></li>
          <li><a href="support.php"> <i class="fa fa-cogs"></i>Support </a></li>
          <li><a href="withdrawal-history.php"> <i class="fa fa-money"></i>Withdrawal History </a></li>
          <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>Account </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="profile.php">Profile</a></li>
              <li><a href="password.php">Change Password</a></li>
            </ul>
          </li>
          <li><a href="logout.php"> <i class="icon-logout"></i>Logout </a></li>
        </ul>
      </nav>
        <?php } } }?>
      <!-- Sidebar Navigation end-->
      <?php
        if ($row['status'] !=1) {
           echo "<script>
            alert('Your Account Has Not Been Verified, Please Proceed To Account Verification');
            window.location = 'verify.php';
          </script>";
        }

        if ($row['status'] ==3) {
          echo "<script>
           alert('Your Account Has Been Deactivated. Please Contact Support For Account Activation Process');
           window.location = 'logout.php';
         </script>";
       }
      ?>