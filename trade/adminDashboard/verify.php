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
                                <i class="fa fa-dashboard"></i> All Verification Requests
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> All Verification Requests </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            
                                            <th>Email</th>
                                            <th>Document Front</th>
                                            <th>Document Back</th>
                                            <th>Verification Status</th>
                                            <th>Take Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchVerificationRequest();
                                            if(is_array($fetchResponse)){
                                                if(isset($fetchResponse['status'])){
                                                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                                                }else {
                                                    foreach($fetchResponse as $row){
                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td><?php  echo $row['email'] ;?></td>
                                            <td><?php
                                                    if(empty($row['front'])){
                                                        echo "NOT UPLOADED";
                                                    }else{
                                                ?>
                                                
                                                <img width="300px" class="img-responsive" src="../uploads/<?php  echo $row['front'] ;?>">
                                                <?php } ?>
                                                </td>
                                            <td>
                                                <?php
                                                    if(empty($row['back'])){
                                                        echo "NOT UPLOADED";
                                                    }else{
                                                ?>
                                                <img width="300px" class="img-responsive" src="../uploads/<?php  echo $row['back'] ;?>">
                                                <?php
                                                    }
                                                ?>
                                                </td>
                                            
                                            <td>
                                                <?php
                                                    $vstatus=$row['status'];
                                                    if ($vstatus==0) {
                                                        echo 'INACTIVE';
                                                    }
                                                    elseif ($vstatus==1) {
                                                        echo 'ACTIVE';
                                                    }else{
                                                        echo 'DEACTIVATED';
                                                    };
                                                ?>
                                            </td>
                                            
                                            
                                            <td>
                                                <a  class="btn btn-success" href="verifyAction.php?email=<?php echo $row['email']; ?>&&status=1">ACTIVE</a>
                                                <a  class="btn btn-danger" href="verifyAction.php?email=<?php echo $row['email']; ?>&&status=3">DEACTIVATE</a>
                                            </td>
                                            

                                        <?php }}}?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> All Verified Users </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Document</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchVerifiedData();
                                            if(is_array($fetchResponse)){
                                                if(isset($fetchResponse['status'])){
                                                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                                                }else {
                                                    foreach($fetchResponse as $row){
                                                    
                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td><?php  echo $row['fullname'] ;?></td>
                                            <td><?php  echo $row['email'] ;?></td>
                                            <td><?php
                                                    if(empty($row['front'])){
                                                        echo "NOT UPLOADED";
                                                    }else{
                                                ?>
                                                
                                                <img width="300px" class="img-responsive" src="../uploads/<?php  echo $row['front'] ;?>">
                                                <?php } ?>
                                                </td>
                                            
                                            
                                            <td><a  class="btn btn-danger" href="verifyAction.php?email=<?php echo $row['email']; ?>&&status=3">DEACTIVATE ACCOUNT</a></td>
                                            


                                        <?php }}}?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> All Deactivated Users </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Currency</th>
                                            <th>Account Type</th>
                                            <th>Phone</th>
                                            <th>Account Status</th>
                                            <th>Balance</th>
                                            <th>Profit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchDeactivated();
                                            if(is_array($fetchResponse)){
                                                if(isset($fetchResponse['status'])){
                                                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                                                }else {
                                                    foreach($fetchResponse as $row){
                                                    
                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td><?php  echo $row['fullname'] ;?></td>
                                            <td><?php  echo $row['email'] ;?></td>
                                            <td><?php  echo $row['currency'] ;?></td>
                                            <td><?php  echo $row['account_type'] ;?></td>
                                            <td><?php  echo $row['phone'] ;?></td>
                                            <td>
                                                <?php if ($row['status']==0) {
              echo '<span class="badge badge-warning p-2"> Account Status : INACTIVE</span>';
            }elseif($row['status']==1){
              echo '<span class="badge bg-success p-2"> Account Status : ACTIVE</span>';
            }
            else{
              echo '<span class="badge badge-danger p-2"> Account Status : DEACTIVATED</span>';
            } 
            ?>

                                            </td>
                                            
                                            <td><?php  echo $row['balance'] ;?></td>
                                            <td><?php  echo $row['profit'] ;?></td>
                                            <td><a  class="btn btn-success" href="verifyAction.php?email=<?php echo $row['email']; ?>&&status=1">ACTIVATE</a></td>
                                            


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