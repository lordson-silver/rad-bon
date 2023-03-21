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

<?php
     $id = $_GET['id'];
     $status = $_GET['status'];
     $balance = $_GET['balance'];
     $amount = $_GET['amount'];
     $email = $_GET['email'];
     if($status == 1 && ($balance > $amount)){
        $balance = $balance - $amount;
        $newStatus = "APPROVED";
     }else{
        $newStatus = "UNSUCCESSFUL";
     }
     if ($status == 2) {
        $newStatus = "DECLINED";
     }
     
    if($status == 1 || $status == 2){
       
        require_once '../server/classes/updateData.php';
        
        $updateResponse = $update->withdrawalSuccess($id,$newStatus);
        $updateResponse2 = $update->balanceUpdate($email,$balance);
        if ((isset($updateResponse) && $updateResponse['status']==1) && (isset($updateResponse2) && $updateResponse2['status']==1) ) {
		    echo '<div class="container alert alert-success"> Withdrawal Update Successful </div>';
    	}
    	else{
    		echo '<div class="container alert alert-danger">  Sorry an error occured while trying to process your withdrawal request please try again Or check balance</div>';
    	}
    }
    
    else{
        echo '<div class="container alert alert-danger">  Sorry an error occured while trying to process your process request please try again</div>';
    }
    
    
			
	
	
	
?>