<?php
	require_once 'header.php';
?>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Your BTC Wallet</h2>
          </div>
        </div>
                <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Balance </strong>
                    </div>
                    <div class="number dashtext-1"><?php echo $row['currency'] . " ". number_format($row['balance'], 2) ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-contract"></i></div><strong>Balance BTC</strong>
                    </div>
                    <div class="number dashtext-2">
                      <span class="">BTC Balance  : <i class="fa fa-fw fa-bitcoin"></i>  
        
   
        <?php


   
$currency = 'USD';
$url = 'https://bitpay.com/api/rates/'.$currency;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result= curl_exec ($ch);
curl_close ($ch);
$info = json_decode($result, true);
$nbalance = $row['balance'] /$info['rate'];  
echo number_format($nbalance, 8) ;                   
        
        
        ?></span></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

  <!-- Modal Withdrawal-->
<div class="modal fade" id="withdrawalModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="background-color :#161551; color:#fff">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Withdrawal (Bank/BTC) </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Withdrawal (BTC)</h3>
        <p>
          For security reasons, all of the funds are kept in a cold storage, and withdrawals are processed manually, once a day, between 13:00 - 14:00 UTC. Withdrawals placed after 12:00 UTC will be processed the following day.
        </p>
        <form method="POST" action="#">
            <div class="form-group">
            <label>Current Balance </label>
            <input type="text" name="cBal" value="<?php echo $row['balance'] ?> " class="form-control" required readonly>
          </div>
          <div class="form-group">
            <label>Enter Amount(Multiples Of 10)</label>
            <input type="number" name="amount" placeholder="Please Enter Withdrawal Amount" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Enter Wallet Address</label>
            <input type="text" name="wallet" placeholder="Please Enter Wallet Address" class="form-control" required>
          </div>
          <div>
            <button name="btnwithdrawBtc" class="btn btn-success" >Withdraw</button>
          </div>
        </form>
        
        <h3 class="mt-5">Withdraw To Bank</h3>
        <p>
          Please fill in your bank details below.
        </p>
        <form method="POST" action="#">
            <div class="form-group">
            <label>Current Balance</label>
            <input type="text" name="cBal" value="<?php echo $row['balance'] ?> " class="form-control" required readonly>
          </div>
          <div class="form-group">
            <label>Enter Amount(Multiples Of 10)</label>
            <input type="number" name="amount" placeholder="Please Enter Withdrawal Amount" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Enter Account Number</label>
            <input type="text" name="wallet" placeholder="Please Enter Account Number" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Enter Account Name</label>
            <input type="text"  placeholder="Please Enter Account Name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Enter Bank Name</label>
            <input type="text"  placeholder="Please Enter Bank Name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Enter Bank Location (City/Country)</label>
            <input type="text"  placeholder="Please Enter Bank Location" class="form-control" required>
          </div>
          <div>
            <button name="btnwithdrawBank" class="btn btn-success" >Withdraw</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		    <section class="no-padding-top">
          <div class="container-fluid block margin-bottom-sm" >
            
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalDeppsit">
                Deposit
              </button>
              <button type="button" class="btn btn-light btn-lg" data-toggle="modal" data-target="#withdrawalModal">
                Withdraw
              </button>

    </div>
  </section>
    
        <section class="no-padding-top">
          <div class="container-fluid">
         
            <div class="block margin-bottom-sm">
              <div class="title"><strong>Your Withdrawal History and Status</strong></div>
              <div class="table-responsive">
  <table class="table table-stripe text-white">
    <tr>
      <th>Wallet/Bank Account Number</th>
      <th>Amount</th>
      <th>Transaction Status</th>
      
    </tr>
    <?php
        $fetchResponse2 = $fetchData->transaction($_SESSION['email']);
        if(is_array($fetchResponse2)){
          if(isset($fetchResponse2['status'])){
              '<div class="alert alert-danger">'.print_r($fetchResponse2['message']).'</div>';
          }else {
              foreach($fetchResponse2 as $row){
      ?>
    <tr>

      <td>
        <?php echo $row['wallet']?>
      </td>
      <td>
        <?php echo $row['amount']?>
      </td>
      <td>
        <?php echo $row['status']?>
      </td>
      

    </tr>
    <?php }}}?>
  </table>
</div>
 

            </div>
          </div>
      </section>
      
      
              <section class="no-padding-top">
          <div class="container-fluid">
         
            <div class="block margin-bottom-sm">
              <div class="title"><strong>Your Payment Proofs</strong></div>
              <div class="table-responsive">
  <table class="table table-stripe text-white">
    <tr>
      <th>Date Of Upload</th>
      <th>Payment Proof</th>
    </tr>
    <?php
        $fetchResponse3 = $fetchData->proofs($_SESSION['email']);
        if(is_array($fetchResponse3)){
          if(isset($fetchResponse2['status'])){
              '<div class="alert alert-danger">'.print_r($fetchResponse2['message']).'</div>';
          }else {
              foreach($fetchResponse3 as $row){
      ?>
    <tr>

      <td>
        <?php echo $row['created_at']?>
      </td>
      <td>
        <img src="proofs/<?php echo $row['proof']?>" class="img-responsive img-fluid" width="300px" height="300px">
      </td>
     
      

    </tr>
    <?php }}}?>
  </table>
</div>
 

            </div>
          </div>
      </section>


<!-- Modal Deposit-->
<div class="modal fade" id="modalDeppsit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="background-color :#161551; color:#fff">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Deposit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
              <h3>Deposit Crypto </h3>
                  <h5>Please Make Your Deposit Into The Company's Addresses Below</h5>
                  <hr>
                  <?php
                  $fetchData = new fetchData;
                  $fetchResponse = $fetchData->fetchAdminWallets();
                  if(is_array($fetchResponse)){
                      if(isset($fetchResponse['status'])){
                          '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                      }else {
                          foreach($fetchResponse as $rowWallets){
              ?>
              <div class="div">
             
                   
                <h6 class="card-title"><?php echo $rowWallets['name']?> (<?php echo $rowWallets['sign']?>) Payment Option</h6>
                
                <h5>Address : <?php echo $rowWallets['address']?></h5>
                <hr>
             </div>
             <?php }}}?>
        </div>
        <div class="no-padding-top">
          <div class="container-fluid block margin-bottom-sm" >
            
                <form method="post" action="#" enctype="multipart/form-data">
              <div class="">

                <div class="pb-3 ">
                  Upload Proof Of Payment
                  <input type="file" class="form-control mb-3" name="fileToUpload"> 
                  
                </div>
                <div class="pb-3 col-md-6">
                  <button class="btn btn-success" name="verify">Upload</button>
                </div>
               
                

          </form>
          </div>
      </div>

    


        
        
        <div class="col-md-6">
          <h4>Don't Have Bitcoin?</h4>
          <p>
            We provides a fast and secure way to deposit more than £ 100 by using a credit card. The service is provided by Changelly.
          </p>
          <h3>Where To Buy Bitcoin</h3>
          <a target="_blank" href="https://paxful.com/" class="btn btn-secondary mb-3 btn-lg">Paxful.com</a>
          <a target="_blank" href="https://abra.com/" class="btn btn-secondary mb-3 btn-lg">abra.com</a>
          <a target="_blank" href="https://instacoins.com/" class="btn btn-secondary mb-3 btn-lg">instacoins.com</a>
          <a target="_blank" href="https://changelly.com/" class="btn btn-secondary mb-3 btn-lg">changelly.com</a>
          <a target="_blank" href="https://moonpay.io/" class="btn btn-secondary mb-3 btn-lg">moonpay.io</a>
          <a target="_blank" href="https://coinbase.com/" class="btn btn-secondary mb-3 btn-lg">coinbase.com</a>
          <a target="_blank" href="https://banxa.com/" class="btn btn-secondary mb-3 btn-lg">banxa.com</a>
        </div>
        
    </div>

    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php

  if(isset($_POST['verify']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_SESSION['email'];
        


      $target_dir = "proofs/";
      if (empty($_FILES["fileToUpload"]["name"])) {
        echo '
          <script>
            alert("Please Upload Proof Of Payment")
          </script>
          ';
      }else{
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check == false) {
          echo '
          <script>
            alert("Invalid File Format")
          </script>
          ';
        } 


        if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg"
          && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) {
          
        echo '
          <script>
            alert("Sorry, only png, jpg, jpeg & png files are allowed")
          </script>
          ';

        }
        elseif ($_FILES["fileToUpload"]["size"] > 10000000) {
          
           echo '
          <script>
            alert("Sorry, THe Image Is Too Large, Image Must Not Be More Than 10MB")
          </script>
          ';

        }
        else{
          $temp = explode(".", $_FILES["fileToUpload"]["name"]);
          $doc = round(microtime(true)) . '.' . end($temp);
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $doc);

          // $olevel = basename($_FILES["fileToUpload"]["name"]);
          // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
      }


      

        if (empty($email)) {
          echo '
          <script>
            alert("Error Uploading Document, Please reload and try again")
          </script>
          ';
        }else{
         
          require_once 'server/classes/insertData.php';
          $insertData = new insertData;
          $insertResponse = $insertData->addProof($email, $doc);
          if($insertResponse['status'] == 1){
          echo "<script>
            alert('Payment Proof Uploaded Successfully');
            window.location = '';
          </script>";
      }else{
           echo "<script>
            alert('Sorry, there was an error Uploading Your Payment Proof');
          </script>";
      }
        }
        
    
    }
  
?>



<?php
  if (isset($_POST['btnwithdrawBtc']) && $_SERVER['REQUEST_METHOD']== 'POST') {
      $email = $_SESSION['email'];
      $balance = $_POST['cBal'];
      $amount = $_POST['amount'];
      $wallet = $_POST['wallet'];
      $status = "PENDING";
      if ($amount > $balance) {
        echo '<script>
          alert("Insufficient Ballance, Please Withdraw and amount less than or equal to your current balance");
        </script>';
      }else{
          require_once 'server/classes/insertData.php';
          $insertData = new insertData;
          $insertResponse = $insertData->addTransaction($email,$wallet,$amount, $status, $balance);
          if ($insertResponse['status']==1) {
            echo '<script>
            alert("Transaction Successful, Your Transaction Will Be processed as soon as possible. Thank you");
            window.location = "withdrawal-history.php"
          </script>';
          }else{
            echo '<script>
            alert("There was an Error processing your transaction please try again");
          </script>';
          }

      }
  }
  if (isset($_POST['btnwithdrawBank']) && $_SERVER['REQUEST_METHOD']== 'POST') {
      $email = $_SESSION['email'];
      $amount = $_POST['amount'];
      $wallet = $_POST['wallet'];
      $balance = $_POST['cBal'];
      $status = "PENDING";
      if ($amount > $balance) {
        echo '<script>
          alert("Insufficient Ballance, Please Withdraw and amount less than or equal to your current balance");
        </script>';
      }else{
          require_once 'server/classes/insertData.php';
          $insertData = new insertData;
          $insertResponse = $insertData->addTransaction($email,$wallet,$amount, $status, $balance);
          if ($insertResponse['status']==1) {
            echo '<script>
            alert("Transaction Successful, Your Transaction Will Be processed as soon as possible. Thank you");
            window.location = "withdrawal-history.php"
          </script>';
          }else{
            echo '<script>
            alert("There was an Error processing your transaction please try again");
          </script>';
          }

      }
  }
?>

<?php
	require_once 'footer.php';
?>
