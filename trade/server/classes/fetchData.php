<?php


require_once('dbconnection.php');


class fetchData extends DbConnection {
	public function fetchAllUsers() {
		$sql = "SELECT * FROM allusers ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
		
	}
	
	public function fetchAllProofs() {
		$sql = "SELECT * FROM proofs ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
		
	}

    public function fetchAdminWallets() {
        $sql = "SELECT * FROM wallets ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    public function fetchAllUser($id) {
        $sql = "SELECT * FROM allusers WHERE id ='$id' ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

	public function fetchBuyerRequests() {
		$sql = "SELECT * FROM buyerRequests ORDER BY id DESC";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
		
	}

	public function fetchSellerRequests() {
		$sql = "SELECT * FROM sellerRequests ORDER BY id DESC";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
		
	}

	public function fetchAllAdmin() {
		$sql = "SELECT * FROM admin ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
		
	}

    public function fetchSingleAdmin($id) {
        $sql = "SELECT * FROM admin WHERE id ='$id' ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    public function fetchSingleCoin($id) {
        $sql = "SELECT * FROM coin WHERE id ='$id' ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    public function adminLogin($username, $password) {
        $sql = "SELECT username, password FROM admin WHERE username = :username and password =:password";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':username'=>$username, ':password'=>$password));
            
            if($query->errorCode() == 0){
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return array('status'=>0);
                } 
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        
    }

    public function userLogin($email, $password) {
        $sql = "SELECT email, password FROM allusers WHERE email = :email and password =:password";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':email'=>$email, ':password'=>$password));
            
            if($query->errorCode() == 0){
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return array('status'=>0);
                } 
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        
    }



    public function userData($email) {
        $sql = "SELECT * FROM allusers WHERE email = :email ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }
     public function trading($email) {
        $sql = "SELECT * FROM trading WHERE email = :email ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    public function tradingAll() {
        $sql = "SELECT * FROM trading WHERE email = :email ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }
     public function transaction($email) {
        $sql = "SELECT * FROM transaction WHERE email = :email ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    public function transactionHistory($email) {
        $sql = "SELECT * FROM transaction_history WHERE email = :email ORDER BY id DESC";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }
    
    public function proofs($email) {
        $sql = "SELECT * FROM proofs WHERE email = :email ORDER BY id DESC";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    

    public function transactionAll() {
        $sql = "SELECT * FROM transaction ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }
    
    public function singleUser($id) {
        $sql = "SELECT * FROM allusers WHERE id = :id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':id'=>$id));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    public function userVerify($email) {
        $sql = "SELECT * FROM allusers WHERE email = :email ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute(array(':email'=>$email));
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll(PDO::FETCH_ASSOC);
                return array('status'=>1,'data'=>$data);
            }else{
                return array('status'=>0);
            } 
        }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        
    }

	public function fetchVerificationRequest() {
		$sql = "SELECT * FROM allusers WHERE status = '0' ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
		
	}
	public function fetchVerifiedData() {
		$sql = "SELECT * FROM allusers WHERE status = '1' ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
		
	}


    public function fetchDeactivated() {
        $sql = "SELECT * FROM allusers WHERE status = '3' ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }

    

    public function registerCheck($email) {
        $sql = "SELECT email FROM allusers WHERE email = :email ";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':email'=>$email));
            
            if($query->errorCode() == 0){
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return array('status'=>0);
                } 
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        
    }

    public function search($email) {
        $sql = "SELECT * FROM verificationRequests WHERE email = :email And status=1 ";
            $query = $this->connection->prepare($sql);
            $exec = $query->execute(array(':email'=>$email));
            
            if($query->errorCode() == 0){
                if ($query->rowCount() > 0) {
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    return array('status'=>1,'data'=>$data);
                }else{
                    return array('status'=>0);
                } 
            }else{
                return array('status'=>0, 'message'=>$query->errorInfo()); 
            }
        
    }

    public function fetchAllCoin() {
        $sql = "SELECT * FROM coin ORDER BY id ";
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if($query->errorCode() == 0){
            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_ASSOC);    
            }else{
                return 0;
            } 
        }else{
            return array('status'=>0, 'message'=>$query->errorInfo()); 
        }
        
    }
    


}
?>