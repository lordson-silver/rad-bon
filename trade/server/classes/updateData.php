<?php
require_once('dbconnection.php');

class update extends DbConnection{
    public function verifyUpdate($email,$newStatus){
        $sql = "UPDATE allusers SET status = :newStatus WHERE email = '$email'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':newStatus'=>$newStatus));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function adminUpdate($id,$newUsername,$newPassword){
        $sql = "UPDATE admin SET username = :newUsername, password = :newPassword WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':newUsername'=>$newUsername,':newPassword'=>$newPassword));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
    public function userUpdate($id,$newBalance,$newProfit,$account_type,$currency,$amountinvested, $umessage){
        $sql = "UPDATE allusers SET balance = :newBalance, profit = :newProfit, account_type = :account_type, currency = :currency, amountinvested =:amountinvested, message =:umessage WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':newBalance'=>$newBalance,':newProfit'=>$newProfit, ':account_type'=>$account_type, ':currency'=>$currency, ':amountinvested'=>$amountinvested, 'umessage'=>$umessage));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function updateTradeType($id,$trade_type){
        $sql = "UPDATE allusers SET trade_type = :trade_type WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':trade_type'=>$trade_type));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
    
    

    public function updateDetails($email, $fullname, $currency, $phone, $btc_account){
         $sql = "UPDATE allusers SET fullname = :fullname, currency = :currency, phone = :phone, btc_account =:btc_account WHERE email = :email";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':fullname'=>$fullname,':phone'=>$phone, ':btc_account'=>$btc_account, ':currency'=>$currency, ':email'=>$email));
       

        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }

    public function updateVerifyUser($email, $status, $doc){
         $sql = "UPDATE allusers SET status = :status, front = :doc, back = :doc WHERE email = :email";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':status'=>$status, ':doc'=>$doc, ':email'=>$email));
       

        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }

    


    public function balanceUpdate($email,$balance){
        $sql = "UPDATE allusers SET balance = :balance WHERE email = '$email'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':balance'=>$balance));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function updateTrading($id,$volume,$type,$status,$profit,$loss){
        $sql = "UPDATE trading SET volume = '$volume',type = '$type', status = '$status', profit = '$profit', loss= '$loss' WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function updateTrade($id, $profit,$loss,$status){
        $sql = "UPDATE trading SET  status = '$status', profit = '$profit', loss= '$loss' WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
    
    public function updateNBalance($email,$balance){
        $sql = "UPDATE allusers SET  balance = '$balance' WHERE email = '$email'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
    
    


    public function withdrawalSuccess($id,$newStatus){
        $sql = "UPDATE transaction SET status = :newStatus WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':newStatus'=>$newStatus));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function updatePassword($email, $newPass){
        $sql = "UPDATE allusers SET password = :newPass WHERE email = '$email'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':newPass'=>$newPass));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    
}
$update = new update;
?>