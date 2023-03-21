<?php
	require_once 'header.php';
?>

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>User Settings</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo SITEURL ?>adminDashboard/editUser.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Cash Menu</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Verify User</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo SITEURL ?>adminDashboard/verify">
                                <div class="panel-footer">
                                    <span class="pull-left">Verify User</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>Manage Admin</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo SITEURL ?>adminDashboard/account">
                                <div class="panel-footer">
                                    <span class="pull-left">Manage Admin</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"></div>
                                        <div>View all Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo SITEURL ?>adminDashboard/all">
                                <div class="panel-footer">
                                    <span class="pull-left">View all Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> All User Details </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Currency</th>
                                            <th>Account Type</th>
                                            <th>Account Status</th>
                                            <th>Balance</th>
                                            <th>Profit</th>
                                            <th>password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchAllUsers();
                                            foreach($fetchResponse as $row){
                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td><?php  echo $row['fullname'] ;?></td>
                                            <td><?php  echo $row['email'] ;?></td>
                                            <td><?php  echo $row['phone'] ;?></td>
                                            <td><?php  echo $row['currency'] ;?></td>
                                            <td><?php  echo $row['account_type'] ;?></td>
                                            <td>
                                                <?php  
                                                    if ($row['status'] == 0) {
                                                     echo 'INACTIVE';
                                                    }elseif($row['status'] == 1){
                                                        echo 'ACTIVE';
                                                    }else{
                                                        echo 'DEACTIVATED';
                                                    }
                                                ?>        
                                            </td>
                                            <td><?php  echo $row['balance'] ;?></td>
                                            <td><?php  echo $row['profit'] ;?></td>
                                            <td><?php  echo $row['password'] ;?></td>
                                        <?php }?>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.row -->

        </div>
            <!-- /.container-fluid -->

    </div>
        <!-- /#page-wrapper -->

<?php
	require_once 'footer.php';
?>