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
                                <i class="fa fa-dashboard"></i> All Payment Proofs
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> All Payment Proofs </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Payment Proof</th>
                                            <th>Email</th>
                                            <th>Date Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchAllProofs();
                                            if(is_array($fetchResponse)){
                                                if(isset($fetchResponse['status'])){
                                                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                                                }else {
                                                    foreach($fetchResponse as $row){
                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td>
                                                <img src="../proofs/<?php echo $row['proof']?>" class="img-responsive img-fluid" width="300px" height="300px">
                                            </td>
                                            <td><?php  echo $row['email'] ;?></td>
                                            <td><?php  echo $row['created_at'] ;?></td>
                                            
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