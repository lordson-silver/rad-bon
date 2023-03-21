<?php


require_once('dbconnection.php');


class insertData extends DbConnection {
	public function addAdmin($username,$password) {
		$sql = "INSERT INTO admin(username, password) VALUES(:username, :password)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':username'=>$username, ':password'=>$password));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
		
	}

    public function addWallet($name,$sign,$address) {
        $sql = "INSERT INTO wallets(name, sign, address) VALUES(:name, :sign, :address)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':name'=>$name, ':sign'=>$sign, ':address'=>$address));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }
    
    
    public function addProof($email, $doc) {
        $sql = "INSERT INTO proofs(email, proof) VALUES(:email, :doc)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email, ':doc'=>$doc));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }
    
    


    public function addTransHistory($email,$type,$amount,$balance,$status, $transaction_date) {
        $sql = "INSERT INTO transaction_history(email, type, amount, status, balance, transaction_date) VALUES(:email, :type, :amount, :status, :balance, :transaction_date)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email, ':type'=>$type, ':amount'=>$amount,':status'=>$status, ':balance'=>$balance, ':transaction_date'=>$transaction_date));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }

    



    public function addTransaction($email,$wallet,$amount, $status, $balance) {
        $sql = "INSERT INTO transaction(email, wallet, amount, status, balance) VALUES(:email, :wallet, :amount, :status, :balance)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email, ':wallet'=>$wallet, ':amount'=>$amount,':status'=>$status, ':balance'=>$balance));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }
    public function addHistory($email,$trade_order,$type,$volume,$status,$profit,$loss) {
        $sql = "INSERT INTO trading(email,trade_order,type,volume,status,profit,loss) VALUES(:email,:trade_order,:type,:volume,:status,:profit,:loss) ";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email,':trade_order'=>$trade_order,':type'=>$type,':volume'=>$volume,':status'=>$status,':profit'=>$profit,':loss'=>$loss));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }

    public function register($fullname, $email, $password, $currency, $account_type, $phone,$profit, $balance, $status,$code) {
        $sql = "INSERT INTO allusers(fullname, email, password, currency, account_type, phone, profit, balance, status,code) VALUES(:fullname, :email, :password, :currency, :account_type, :phone, :profit, :balance, :status, :code)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':fullname'=>$fullname, ':email'=>$email, ':password'=>$password, ':currency'=>$currency, ':account_type'=>$account_type, ':phone'=>$phone, ':profit'=>$profit, ':balance'=>$balance, ':status'=>$status, ':code' => $code ));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }

    public function buyerRequests($surname,$othernames,$email,$phone,$coin,$quantity,$date) {
        $sql = "INSERT INTO buyerrequests(surname, othernames, email, phone, coin, quantity, date) VALUES(:surname, :othernames, :email, :phone, :coin, :quantity, :date)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':surname'=>$surname, ':othernames'=>$othernames, ':email'=>$email, ':phone'=>$phone, ':coin'=>$coin, ':quantity'=>$quantity, ':date'=>$date));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }
    
    public function sellerRequests($surname,$othernames,$email,$phone,$coin,$quantity,$price,$date) {
        $sql = "INSERT INTO sellerrequests(surname, othernames, email, phone, coin, quantity,price, date) VALUES(:surname, :othernames, :email, :phone, :coin, :quantity, :price, :date)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':surname'=>$surname, ':othernames'=>$othernames, ':email'=>$email, ':phone'=>$phone, ':coin'=>$coin, ':quantity'=>$quantity, ':price'=>$price, ':date'=>$date));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }

    public function verifyRequests($surname,$othernames,$email,$phone,$state,$gender,$dateOfBirth,$verificationDocument,$status,$image) {
        $sql = "INSERT INTO verificationrequests(surname,othernames,email,phone,state,gender,dateOfBirth,verificationDocument,status,image) VALUES(:surname, :othernames, :email, :phone, :state, :gender, :dateOfBirth, :verificationDocument, :status, :image)";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':surname'=>$surname, ':othernames'=>$othernames, ':email'=>$email, ':phone'=>$phone, ':state'=>$state, ':gender'=>$gender, ':dateOfBirth'=>$dateOfBirth, ':verificationDocument'=>$verificationDocument, ':status'=>$status, ':image'=>$image ));
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
        
    }

    



	
}
?>