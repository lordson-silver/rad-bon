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
                                <i class="fa fa-dashboard"></i> Manage Wallets
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h4>Add New Wallet</h4>
                    <form method="POST" action="addwallet.php">
                      <div class="form-group mb-3">
                        <label for="username">Wallet Name In Full (eg. Bitcoin, Litecoin, Dodge etc..)</label>
                        <input type="text" name="name" class="form-control"  placeholder="Enter Wallet Name In Full">
                      </div>
                      <div class="form-group mb-3">
                        <label for="username">Wallet Sign (eg. BTC, ETH, LTC etc)</label>
                        <input type="text" name="sign" class="form-control"  placeholder="Enter Wallet Sign">
                      </div>
                      <div class="form-group mb-3">
                        <label for="username">Wallet Address </label>
                        <input type="text" name="address" class="form-control"  placeholder="Enter Wallet Address">
                      </div>
                      
                      
                      <button type="submit" class="btn btn-primary mb-3">Add Wallet</button>
                    </form>
                </div>
                

                <div class="col-lg-12 mt-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> All Wallet Details </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Wallet Name</th>
                                            <th>Wallet Sign</th>
                                            <th>Wallet Address</th>
                                            <th>Take Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchAdminWallets();
                                            if(is_array($fetchResponse)){
                                                if(isset($fetchResponse['status'])){
                                                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                                                }else {
                                                    foreach($fetchResponse as $row){

                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td><?php  echo $row['name'] ;?></td>
                                            <td><?php  echo $row['sign'] ;?></td>
                                            <td><?php  echo $row['address'] ;?></td>
                                            <td><a href="deletewallet.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" >Delete Wallet</button></a>
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