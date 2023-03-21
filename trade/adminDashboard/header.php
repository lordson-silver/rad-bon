
<?php 
    session_start();

     
    require_once '../lib/config.php';
    require_once '../server/classes/fetchData.php';

    if (empty($_SESSION['username'])) {
      header('location:'.SITEURL.'admin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo SITEURL ?>adminDashboard/home"> <?php echo $_SESSION['username']?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                

                <li class="dropdown">
                    <a href="<?php echo SITEURL ?>adminDashboard/home" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo SITEURL ?>adminDashboard/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/editUser.php"><i class="fa fa-fw fa-bar-chart-o"></i>User Settings</a>
                    </li> 
                   <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/proofs.php"><i class="fa fa-fw fa-table"></i> View Payment Proofs</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/verify"><i class="fa fa-fw fa-edit"></i> Verify User Details</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/all"><i class="fa fa-fw fa-desktop"></i> All Registered Users</a>
                    </li>
                     <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/withdrawal"><i class="fa fa-fw fa-desktop"></i> Confirm Withdrawal</a>
                    </li> 
                    
                    <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/wallet.php"><i class="fa fa-fw fa-btc"></i> Set Wallet</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/account"><i class="fa fa-fw fa-wrench"></i> Manage Admin Account</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>adminDashboard/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


    