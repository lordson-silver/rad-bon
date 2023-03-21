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
                                <i class="fa fa-dashboard"></i> Adding Profits/Cash
                            </li>
                        </ol>
                    </div>
                </div>
                
                <br><br>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Users Balance/Profit </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>email</th>
                                            <th>balance</th>
                                            <th>profit</th>
                                            <th>Amount Invested</th>
                                            <th>Trading Status</th>
                                            <th>Take Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchAllUsers();
                                            if(is_array($fetchResponse)){
                                                if(isset($fetchResponse['status'])){
                                                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                                                }else {
                                                    foreach($fetchResponse as $row){

                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td><?php  echo $row['email'] ;?></td>
                                            <td><?php  echo $row['balance'] ;?></td>
                                            <td><?php  echo $row['profit'] ;?></td>
                                            <td><?php  echo $row['amountinvested'] ;?></td>
                                            <td>
                                                <?php
                                                    if ($row['trade_type'] == 0):
                                                ?>
                                                <span class="text-danger">Set To LOSS</span>
                                                
                                                <?php 
                                                    elseif ($row['trade_type'] == 1):
                                                ?>
                                                <span class="text-success">Set To PROFIT</span>

                                                <?php else: ?>
                                                   <span class="text-danger">Set To LOSS</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><a href="userDelete.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" >Delete User</button></a>
                                                <a href="userUpdate.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary" >Edit User</button></a>
                                                <a href="addHistory.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-info" >Add / Edit Trading History</button></a>
                                                <?php
                                                    if ($row['trade_type'] == 0):
                                                ?>
                                                <a href="set_trade.php?id=<?php echo $row['id']; ?>&&trade_type=1"><button type="button" class="btn btn-success" >Set Trade To Profit</button></a>
                                                
                                                <?php 
                                                    elseif ($row['trade_type'] == 1):
                                                ?>
                                                <a href="set_trade.php?id=<?php echo $row['id']; ?>&&trade_type=0"><button type="button" class="btn btn-danger" >Set Trade To Loss</button></a>

                                                <?php else: ?>
                                                    <a href="set_trade.php?id=<?php echo $row['id']; ?>&&trade_type=0"><button type="button" class="btn btn-danger" >Set Trade To Loss</button></a>
                                                <?php endif; ?>
                                            </td>

                                            
                                        <?php }}}?>
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