<?php
	require_once 'header.php';
?>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Change Password</h2>
          </div>
        </div>
		<section class="no-padding-top">
          <div class="container-fluid block margin-bottom-sm" >
            
          	<div class="col-md-6 offset-md-3 card py-3 shadow shadow-lg">
				<form class="form ml-2 " method="POST">
				    <label>New Password</label>
				    <div class="md-form mb-3">
				        
				        <div class="md-form">
				            <input type="password" name="newPass" class="form-control" placeholder="Enter New Password">
				        </div>
				    </div>
				    <label>Confirm Password</label>
				    <div class="md-form mb-3">
				        
				        <div class="md-form">
				            <input type="Password" name="confirmPass" class="form-control" placeholder="Confirm Password">
				        </div>
				    </div>

				    <div class="pb-3  wow bounceIn text-center" data-wow-delay="0.6s">
				       <button name="updatePass" class="btn btn-success">Update</button>
				   </div>
				</form>
				<?php
					if (isset($_POST['updatePass']) && $_SERVER['REQUEST_METHOD'] == "POST") {
						$email = $_SESSION['email'];
						$newPass = $_POST['newPass'];
						$confirmPass = $_POST['confirmPass'];

						if (empty($newPass) || empty($confirmPass)) {
							$changePassErr = "Sorry All Fields Are Required";
							echo "<script>
								alert('Sorry All Fields Are Required');
							</script>";
						}elseif($newPass != $confirmPass){
							$changePassErr = "Sorry New Password Does not match confirm password";
							echo "<script>
								alert('Sorry New Password Does not match confirm password');
							</script>";
						}
						else{
							require_once 'server/classes/updateData.php';
							$updateResponse = $update->updatePassword($email, $newPass);
							echo "<script>
								alert('Password Changed Successfully');
							</script>";
						}
					}
				?>
			</div>
          </div>
      </section>
    

<?php
	require_once 'footer.php';
?>
