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
                    
               
            <h4>Edit User</h4>
            <?php
                $id = $_GET['id'];
                $fetchData = new fetchData;
                $fetchResponse = $fetchData->singleUser($id);
                if(is_array($fetchResponse)){
                    if(isset($fetchResponse['status'])){
                        '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                    }else {
                        foreach($fetchResponse as $row){

            ?>
            <form method="POST" action="updateUser.php">
                <div class="form-group" style="visibility: hidden;display: none;">
                    <label> id</label>
                    <input type="text" name="id"  class="form-control disabled" placeholder="id" required autocomplete="off" value="<?php echo $row['id']; ?>" >
                    </div>
                    <div class="form-group">
                <label for="username">email</label>
                <input type="email" name="email" class="form-control" value="<?php  echo $row['email'] ;?>"  placeholder="Enter new email">
              </div>
              <div class="form-group">
                <label for="username">balance</label>
                <input type="hidden" name="old-balance" class="form-control" value="<?php  echo $row['balance'] ;?>"  placeholder="Enter new balance">
                <input type="number" name="balance" class="form-control" value="<?php  echo $row['balance'] ;?>"  placeholder="Enter new balance">
              </div>
              <div class="form-group">
                <label for="password">profit</label>
                <input type="number" name="profit" class="form-control" value="<?php  echo $row['profit'] ;?>"  placeholder="Enter New profit">
              </div>
              <div class="form-group">
                <label for="password">Currency</label>
                <input type="text" name="currency" class="form-control" value="<?php  echo $row['currency'] ;?>"  placeholder="Enter Investment Amount">
              </div>
              <div class="form-group">
                <label for="password">Account Type</label>
                <input type="text" name="account_type" class="form-control" value="<?php  echo $row['account_type'] ;?>"  placeholder="Enter Account Type">
              </div>
              <div class="form-group">
                <label for="password">Amount Invested</label>
                <input type="number" name="amountinvested" class="form-control" value="<?php  echo $row['amountinvested'] ;?>"  placeholder="Enter Amount Invested">
              </div>
               <div class="form-group">
                <label for="password">Update Message</label>
                <input type="text" name="message" class="form-control" value="<?php  echo $row['message'] ;?>"  placeholder="Enter Update Message">
              </div>
              
              <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        <?php }}} ?>
        </div>
                </div>
                <br><br>

                

        </div>
           


<?php
	require_once 'footer.php';
?>