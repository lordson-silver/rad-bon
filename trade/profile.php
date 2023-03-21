<?php
	require_once 'header.php';
?>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Profile Update</h2>
          </div>
        </div>
		<section class="no-padding-top">
          <div class="container-fluid block margin-bottom-sm" >
            
          	    <form method="post" action="#" >
			        <div class="row">
			            <div class="pb-3 col-md-6">
			            Full Name : <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname']?>"> 
			          </div>
			         
			          <div class="pb-3 col-md-6">
			            Email Address :<input type="text" name="email" class="form-control " value="<?php echo $row['email']?>" readonly>
			          </div>
			        
			          <div class="pb-3 col-md-6">
			            Currency :<input type="text" name="currency" class="form-control " value="<?php echo $row['currency']?>">
			          </div>
			        
			          <div class="pb-3 col-md-6">
			            Account Type : <input type="text" class="form-control " value="<?php echo $row['account_type']?>" readonly disabled>
			          </div>
			        
			          <div class="pb-3 col-md-6">
			            Phone Number : <input type="text" class="form-control " name="phone" value="<?php echo $row['phone']?>"> 
			          </div>
			          
			          
          
         
          
					              <div class="pb-3 col-md-6">
					                Bitcoin Wallet : <input type="text" class="form-control " name="btc_account" value="<?php echo $row['btc_account']?>">
					              </div>
					             </div>
					      <div class="text-center pt-3">
					          <button class="btn btn-success" name="update">Update</button>
					      </div>
					</form>
          </div>
      </section>
    

<?php

	if(isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $currency = $_POST['currency'];
        $phone = $_POST['phone'];
        $btc_account = $_POST['btc_account'];
     
        
        require_once 'server/classes/updateData.php';
        
		$updateResponse = $update->updateDetails($email, $fullname, $currency, $phone, $btc_account);
		
		if($updateResponse['status'] == 1){
		    echo "<script>
    			alert('Details Updated Successfully');
    			window.location = 'profile.php';
    		</script>";
		}else{
		     echo "<script>
    			alert('Sorry, there was an error updating your details, please try again');
    		</script>";
		}
		
    }
	require_once 'footer.php';
?>
