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
                                <i class="fa fa-dashboard"></i> Admin Accounts
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12">
                    <h4>Add New Admin</h4>
                    <form method="POST" action="addAdmin.php">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Enter new username">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Enter New Password">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Add Admin</button>
                    </form>
                </div>
                <br><br>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> All Admin Details </h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Take Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchData = new fetchData;
                                            $fetchResponse = $fetchData->fetchAllAdmin();
                                            if(is_array($fetchResponse)){
                                                if(isset($fetchResponse['status'])){
                                                    '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                                                }else {
                                                    foreach($fetchResponse as $row){

                                        ?>
                                        <tr>
                                            <td><?php  echo $row['id'] ;?></td>
                                            <td><?php  echo $row['username'] ;?></td>
                                            <td><?php  echo $row['password'] ;?></td>
                                            <td><a href="deleteAdmin.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" >Delete Admin</button></a>
                                            <a href="adminUpdate.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary" >Edit Admin</button></a></td>
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