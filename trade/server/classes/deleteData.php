

<?php
require_once('dbconnection.php');

class delete extends DbConnection{ 
   public function adminDelete($id){
        $sql = "DELETE FROM  admin  WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function adminWallet($id){
        $sql = "DELETE FROM  wallets  WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

public function userDelete($id){
        $sql = "DELETE FROM  allusers  WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }

    public function coinDelete($id){
        $sql = "DELETE FROM  coin  WHERE id = '$id'";

        $query = $this->connection->prepare($sql);
        $exec = $query->execute();
        
        if ($query->errorCode() == 0) {
            return array('status'=>1);
            
        } else {
            return array('status'=>0, 'message'=>$query->errorInfo());
        }
    }
}
$delete = new delete;
?>