<?php
	require_once '../lib/config.php';
    require_once '../server/classes/updateData.php';
    require_once '../server/classes/insertData.php';
    $insertData = new insertData;

	
	$id = $_POST['id'];
    $newBalance = $_POST['balance'];
    $newProfit = $_POST['profit'];
    $account_type = $_POST['account_type'];
    $amountinvested = $_POST['amountinvested'];
    $currency = $_POST['currency'];
    $email = $_POST['email'];
    $umessage = $_POST['message'];
    $randomNum = rand(1111, 9999);
    $tDate = date('d-m-Y');
    $oldBalance = $_POST['old-balance'];

    

    if ($oldBalance > $newBalance) {
        $amount = " - " . ($oldBalance - $newBalance);
        $type = "Debit/Loss";
        $status = "Completed";
        $transaction_date = date('d-m-Y');
        $balance = $newBalance;
        $insertData->addTransHistory($email,$type,$amount,$balance,$status, $transaction_date);
    }else if($newBalance - $oldBalance){
        $amount = " + " . ($newBalance - $oldBalance);
        $type = "Deposit/Profit";
        $status = "Completed";
        $transaction_date = date('d-m-Y');
        $balance = $newBalance;
        $insertData->addTransHistory($email,$type,$amount,$balance,$status, $transaction_date);
    }else{
        echo "Balance not changed";
    }



    $headers = 'From: support@Globalfxport.com' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $message = '<html><body style="background-color: #eee;">';
    
    
    $message .='Dear '.$email. '<br>This is to confirm that you have earned from the stock market. Please Check Your Notification Menu on Your dashboard to view other notification messages <br>Below are your transaction details :<br>';
    $message .= '<table  rule="all" style="background-color: #eee;" >';
    $message .= "<tr><td><strong>New Notification Message:</strong> </td><td>" . $umessage . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
    $message .= "<tr><td><strong>Balance:</strong> </td><td>" . $newBalance . "</td></tr>";
    $message .= "<tr><td><strong>Profit:</strong> </td><td>" . $newProfit . "</td></tr>";
    $message .= "<tr><td><strong>Transaction Id:</strong> </td><td>" . $randomNum . "</td></tr>";
    $message .= "<tr><td><strong>Transaction Date:</strong> </td><td>" . $tDate . "</td></tr>";
    $message .= "</table>";
    $message .= "<p>If you did not initiate this transaction, please send us an email to support@Globalfxport.com</p>";
    $message .= "</body></html>";
    
  
    
    $updateResponse = $update->userUpdate($id,$newBalance,$newProfit,$account_type,$currency,$amountinvested, $umessage);
    
    mb_send_mail($email, "Transactions from Globalfxport", $message,$headers);

    header("location:".SITEURL."adminDashboard/successful.php");
?>



 