<?php
session_start();
require_once("processrequest.php");

$requestingPage = stripslashes($_GET['_mode']);
$processRequest = new processRequest;
$header = "From: hello@mps.org.ng";
$date =  date("Y/m/d");
switch ($requestingPage) {
	case "user-login":
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$email = $processRequest->test_input($_POST['email']);
			$password = $processRequest->test_input($_POST['password']);
			
			if (empty($email) or (!filter_var($email, FILTER_VALIDATE_EMAIL,$email))) {
				$response = array('status'=>0,'input'=>"email",'message'=>"*email is required and must be a valid email format");
			}
			elseif (empty($password)) {
				$response =array('status'=>0, 'input'=>"password",'message'=>"*password is required");
			}

			else {
				

				
				
			    require_once 'fetchData.php';
			    $processRequest = new processRequest;
			    $fetchData = new fetchData;
				
				

				$fetchResponse = $fetchData->userLogin($email, $password);
			    if(is_array($fetchResponse)){
			        if(isset($fetchResponse['status'])){
			        	if ($fetchResponse['status']=="0") {
			        		$response =array('status'=>0, 'input'=>"details",'message'=>"email or password is incorrect");
			        	}
			        	else {
			        		$response =array('status'=>1, 'input'=>"details",'message'=>"Details Valid",'email'=>$email,'password'=>$password);
			        		  $_SESSION['email']=$email;
			        		  $_SESSION['password']=$password;
			        	// 	 header('location:http://empirefxtrade.com/userDashboard/index.php');

			        	}
			            //'<div class="alert alert-danger">'.print_r($fetchResponse['data']).'</div>';
			        
			}
		    }
		}}
		break;




		case "user-register":
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
				$email = $processRequest->test_input($_POST['email']);
				$password = $processRequest->test_input($_POST['password']);
				$fullname = $processRequest->test_input($_POST['fullname']);
				$currency = "USD";
				$account_type = "Gold";
				$phone = $processRequest->test_input($_POST['phone']);
				$profit = 0.00;
				$balance = 0.00;
				$status = 0;
				$code = rand(111111, 999999);
				
				
				if (empty($email) or (!filter_var($email, FILTER_VALIDATE_EMAIL,$email))) {
					$response = array('status'=>0,'input'=>"name",'message'=>"*email is required ");
				}
				
				elseif (empty($password)) {
					$response = array('status'=>0,'input'=>"name",'message'=>"*password is required");
				}
	
				elseif (empty($phone)or (!preg_match("/^[0-9]*$/",$phone))) {
					$response =array('status'=>0, 'input'=>"name",'message'=>"*phone number is required and 
						must contain only numbers");
				}
				else {
					// $subject = 'New Contact Message';
					// $message = "Name ".ucwords($name).", Sent A New Contact Message";
					// $myMail=CONTACT_EMAIL;
					// if($processRequest->sendMail($message,$subject,$myMail,$header) == true){
					require_once 'fetchData.php';
					$fetchData = new fetchData;
					$fetchResponse = $fetchData->registerCheck($email);
					if(is_array($fetchResponse)){
						if(isset($fetchResponse['status']) && $fetchResponse['status'] ==1){
							
							$response = array('status'=>0,'input'=>"name",'message'=>"*A User already exist with this email. If You Have already registered please proceed to login page, else try a different email address");
						}else {
						require_once 'insertData.php';
						$insertData = new insertData;
						$insertResponse = $insertData->register($fullname, $email, $password, $currency, $account_type, $phone, $profit, $balance, $status,$code);
						if ($insertResponse['status']) {
							$headers = 'From: support@Globalfxport.com' . "\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
										
							
							mb_send_mail($email, "Registration Successful", "Your registration to Globalfxport was successful, please visit the website to login, verify your account and track your trading processes.\nYour Verification Code is :" . $code . "\n Thank you", $headers);
							$response = array('status'=>1,'input'=>"name",'message'=>"*Your Registration Was Successful");
							
						}else {
							$response = array('status'=>0,'message'=>$insertResponse['message']);
						}
					}
					// }else {
					// 	$response = array('status'=>0,'message'=>"Mail not sent");
					// }
					
				}}
			}
			break;

		case "buyCoin-form":
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			foreach($fetchResponse as $row){
	             $surname = $row['surname'];
	             $othernames=$row['othernames']; 
	             $email=$row['email'];
	             $phone=$row['phone'];  
	             $coin = $processRequest->test_input($_POST['coin']);
	             $quantity = $processRequest->test_input($_POST['numberOfCoin']);

	             if (empty($coin)) {
				$response = array('status'=>0,'input'=>"name",'message'=>"*Please Enter Coin");
				}
				elseif (empty($quantity)or (!preg_match("/^[0-9]*$/",$premiumPhone))) {
				$response =array('status'=>0, 'input'=>"name",'message'=>"*Please Enter Valid Number OF Coin");
				}
				else {
				// $subject = 'New Premium Message';
				// $message = "Name ".ucwords($name).", Sent A New Premium Message";
				// $myMail=CONTACT_EMAIL;
				//if($processRequest->sendMail($message,$subject,$myMail,$header) == true){
				
					require_once 'insertData.php';
					$insertData = new insertData;
					$insertResponse = $insertData->buyerRequests($surname,$othernames,$email,$phone,$coin,$quantity,$date);
					if ($insertResponse['status']) {
						$response = array('status'=>1,'input'=>"name",'message'=>"*Your Request  Was Sent  Successfully");
						
					}else {
						$response = array('status'=>0,'message'=>$insertResponse['message']);
					}
				}
				// }else {
				// 	$response = array('status'=>0,'message'=>"Mail not sent");
				// }
				
		    }
	        }; 
			
			
			

			
			


			

		
		break;
	
	default:
		$response = array("status"=>0,"message"=>"Invalid Request, please check what you're doing");
		break;
}
 
echo json_encode($response);
?>



