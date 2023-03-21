

<?php
	require_once "header.php";
	$fetchData = new fetchData;
    	$fetchResponse = $fetchData->transactionAll();
    	

?>
	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Withdrawal <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Confirm Withdrawal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Wallet/Bank account</th>
                                            <th>Withdrawal Amount</th>
                                            <th>Account Balance</th>
                                            <th>Withdrawal Status</th>
                                            <th>Take Action</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($fetchResponse as $row){

                                        ?>
                                        <tr>
                                            <td><?php  echo $row['email'] ;?></td>
                                            <td><?php  echo $row['wallet'] ;?></td>
                                            <td><?php  echo $row['amount'] ;?></td>
                                            <td><?php  echo $row['balance'] ;?></td>
                                            <td><?php
                                            $status =  $row['status'];
                                            if($status == "PENDING" ){
                                                echo "PENDING";
                                            }elseif($status == "APPROVED"){
                                                echo "APPROVED";
                                            }elseif($status == "DECLINED"){
                                                echo "DECLINED";
                                            }elseif($status == "UNSUCCESSFUL"){
                                                echo "UNSUCCESSFUL";
                                            }else{
                                                echo "TRANSACTION NOT PROCESSED";
                                            }
                                            
                                            
                                            ?></td>
                                            <td>
                                                <a class="btn btn-success" href="withProcess.php?id=<?php  echo $row['id'] ;?>&&status=1&&balance=<?php  echo $row['balance'] ;?>&&amount=<?php  echo $row['amount'] ;?>&&email=<?php  echo $row['email'] ;?>">APPROVE</a>
                                                <a class="btn btn-danger" href="withProcess.php?id=<?php  echo $row['id'] ;?>&&status=2&&balance=<?php  echo $row['balance'] ;?>&&amount=<?php  echo $row['amount'] ;?>&&email=<?php  echo $row['email'] ;?>">DECLINE</a>
                                            </td>
                                            
                                        <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>