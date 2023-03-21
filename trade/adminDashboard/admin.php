<?php
	session_start();
	require_once '../server/classes/processrequest.php';
	require_once '../lib/config.php';
    require_once '../server/classes/fetchData.php';
    require_once '../server/classes/updateData.php';
    $processRequest = new processRequest;
    $fetchData = new fetchData;

	
	if (isset($_POST['login'])) {
		$username = $processRequest->test_input($_POST['username']);
		$password = $processRequest->test_input($_POST['password']);

		if (empty($username) || empty($password)) {
			 echo  '<h1 style="color:red;text-align:center"> ALL Field required  please go back to the login page and try again </h1>';
		}else {
			$fetchResponse = $fetchData->adminLogin($username, $password);
			    if(is_array($fetchResponse)){
			        if(isset($fetchResponse['status'])){
			        	if ($fetchResponse['status']=="0") {
			        		echo '<h1 style="color:red;text-align:center"> username or password is incorrect; please go back to the login page and try again </h1>';
			        	}
			        	else {
			        		echo $_SESSION['username']=$username;
			        		echo '
			        		    <script>
			        		        window.location = "index.php"
			        		    </script>
			        		';
			        		header('location:'.SITEURL.'adminDashboard/home');

			        	}
			            //'<div class="alert alert-danger">'.print_r($fetchResponse['data']).'</div>';
			        
			}}

		}
	}
?>