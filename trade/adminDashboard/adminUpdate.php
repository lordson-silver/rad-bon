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
                    
               
            <h4>Edit Admin</h4>
            <?php
                $id = $_GET['id'];
                $fetchData = new fetchData;
                $fetchResponse = $fetchData->fetchSingleAdmin($id);
                if(is_array($fetchResponse)){
                    if(isset($fetchResponse['status'])){
                        '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                    }else {
                        foreach($fetchResponse as $row){

            ?>
            <form method="POST" action="editAdmin.php">
                <div class="form-group" style="visibility: hidden;display: none;">
                    <label> id</label>
                    <input type="text" name="id"  class="form-control disabled" placeholder="id" required autocomplete="off" value="<?php echo $row['id']; ?>" >
                    </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?php  echo $row['username'] ;?>"  placeholder="Enter new username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" value="<?php  echo $row['password'] ;?>"  placeholder="Enter New Password">
              </div>
              
              <button type="submit" class="btn btn-primary">Update Admin</button>
            </form>
        <?php }}} ?>
        </div>
                </div>
                <br><br>

                

        </div>
           


<?php
	require_once 'footer.php';
?>