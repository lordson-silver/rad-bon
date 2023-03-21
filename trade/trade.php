<?php 
    session_start();
    require_once 'server/classes/fetchData.php';
    require_once 'lib/config.php';
    $url = "https://blockchain.info/stats?format=json";
    $stats = json_decode(file_get_contents($url), true);
    $btcValue = $stats['market_price_usd'];
    if (empty($_SESSION['email'])) {
      header('location: logout.php');
    }
    $fetchData = new fetchData;
    $fetchResponse = $fetchData->userData($_SESSION['email']);
    if(is_array($fetchResponse)){
        if(isset($fetchResponse['status'])){
            '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
        }else {
            foreach($fetchResponse as $row){
              $tradeType = $row['trade_type'];
              $mainBalance =  $row['balance'];
            }
        }
    }

    if ($row['status'] !=1) {
        echo "<script>
         alert('Your Account Has Not Been Verified, Please Proceed To Account Verification');
         window.location = 'verify.php';
       </script>";
     }

     if ($row['status'] ==3) {
       echo "<script>
        alert('Your Account Has Been Deactivated. Please Contact Support For Account Activation Process');
        window.location = 'logout.php';
      </script>";
    }
                

?>

<!DOCTYPE html>
<html>
  
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Trading Area</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom Font Icons CSS-->
        <link rel="stylesheet" href="css/font.css">
        <!-- Google fonts - Muli-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <style>
            *{
                font-size:12px !important;
            }
        </style>
    </head>
    <body class="bg-dark">
        <div class="bg-dark">
            <div class="p-2"><a href="index.php" class="mr-3"><i class="fa fa-arrow-left fa-2x"></i> Back</a> Trading Area | 
        
            Main Balance : <?php echo $row['currency'] . " ". number_format($row['balance'], 2) ?> | 
                <span class=""> BTC Balance : 
        
   
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
            <div>
                <div style="width: 100%; height: 80vh">
                                        <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="width: 100%; height: 80vh">
                        <div id="tradingview_15021" style="width: 100%; height: 80vh"></div>

                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                        new TradingView.widget(
                        {
                        "autosize": true,
                        "symbol": "CRYPTOCAP:BTC",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "toolbar_bg": "#f1f3f6",
                        "enable_publishing": false,
                        "withdateranges": true,
                        "range": "YTD",
                        "hide_side_toolbar": false,
                        "allow_symbol_change": true,
                        "watchlist": [
                            "COINBASE:BTCUSD",
                            "COINBASE:ETCUSD",
                            "BITFINEX:XRPUSD",
                            "HUOBI:BTCHUSD"
                        ],
                        "details": true,
                        "hotlist": true,
                        "calendar": true,
                        "studies": [
                            "CCI@tv-basicstudies"
                        ],
                        "container_id": "tradingview_15021"
                        }
                        );
                        </script>
                    </div>
                </div>
                <div>
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trade";

  if (isset($_POST['buy'])) {

$email = $_SESSION['email'];
$trade_order = rand(111111, 999999);
$type = 'buy';
$volume = $_POST['volume'];
$status = 0;
$profit ='-';
$loss ='-';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO trading (email,trade_order, type,volume, status,profit,loss)
  VALUES ('$email','$trade_order', '$type','$volume', '$status','$profit','$loss')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo '<div class="alert alert-success">Your Buy Order Has Been Placed With The Order Id Of <strong>'.$trade_order.'</strong><br> You can click on the trading history button to view your order progress</div>';
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

require_once 'server/classes/updateData.php';

$email = $_SESSION['email'];
$balance = $mainBalance - $volume;
$updateResponse2 = $update->updateNBalance($email,$balance);
  
  }

if (isset($_POST['sell'])) {

$email = $_SESSION['email'];
$trade_order = rand(111111, 999999);
$type = 'sell';
$volume = $_POST['volume'];
$status = 0;
$profit ='-';
$loss ='-';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO trading (email,trade_order, type,volume, status,profit,loss)
  VALUES ('$email','$trade_order', '$type','$volume', '$status','$profit','$loss')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo '<div class="alert alert-success">Your Sell Order Has Been Placed With The Order Id Of <strong>'.$trade_order.'</strong><br> You can click on the trading history button to view your order progress</div>';
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
require_once 'server/classes/updateData.php';

$email = $_SESSION['email'];
$balance = $mainBalance - $volume;
$updateResponse2 = $update->updateNBalance($email,$balance);
  }
  


?>
                </div>
                <div class="text-center py-3">
                Main Balance : <?php echo $row['currency'] . " ". number_format($row['balance'], 2) ?> | 
                <span class=""> BTC Balance : 
        
   
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
        
        
        ?></span>
                <button type="button" class="btn btn-success btn-lg "  data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-caret-up"></i> BUY</button>
                <button type="button" class="btn btn-danger btn-lg "  data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-caret-down"></i> SELL</button>
                </div>
            </div>
            
          <div class="container-fluid">
         
            <div class="block margin-bottom-sm">
              <div class="title"><strong>Your Trading History (Use the close button to close an open trade)</strong></div>
              <div class="table-responsive">
  <table class="table table-stripe table-dark">
    <tr>
      <th>Order</th>
      <th>Volume</th>
      <th>Type</th>
      <th>Status</th>
      <th>Profit</th>
      <th>Loss</th>
      <th>Time</th>
      <th>CLOSE</th>
    </tr>
    <?php
        $fetchResponse2 = $fetchData->trading($_SESSION['email']);
        if(is_array($fetchResponse2)){
          if(isset($fetchResponse2['status'])){
              '<div class="alert alert-danger">'.print_r($fetchResponse2['message']).'</div>';
          }else {
              foreach($fetchResponse2 as $row){
      ?>
    <tr>
      <td>
        <?php echo $row['trade_order']?>
      </td>
      <td>
        <?php echo $row['volume']?>
      </td>
      <td>
        <?php echo $row['type']?>
      </td>
      <td>
        <?php 
        if ($row['status'] == 0) {
          echo "Open";
        }elseif ($row['status'] == 1) {
          echo "Closed";
        }
        

        ?>
      </td>
      <td>
          <?php 
        if ($row['status'] == 0) {
          echo '+<span class="change2 text-success"></span>.<span class="change text-success"></span>  ';
        }elseif ($row['status'] == 1) {
          if ($row['profit'] > $row['loss']) {
            echo '<span class="text-success">+'.$row['profit'].'</span>';
          }else{
            echo '-';
          }
          
        }
        

        ?>
        
        
      </td>
      <td>
        <?php 
        if ($row['status'] == 0) {
          echo '-<span class="change3 text-danger"></span>.<span class="change4 text-danger"></span>   ';
        }elseif ($row['status'] == 1) {
          if ($row['loss'] > $row['profit']) {
            echo '<span class="text-danger">-'.$row['loss'].'</span>';
          }else{
            echo '-';
          }
        }
        

        ?>
      </td>
      <td>
        <?php echo $row['trade_time']?>
      </td>
      <td>
          <?php 
        if ($row['status'] == 0) {
            $id = $row['id'];
            if ($tradeType == 1) {
              $loss = rand(0, 1).".".rand(99,99);
              $profit = rand(3, 9).".".rand(99,99);
            }else{
              $loss = rand(3, 9).".".rand(99,99);
              $profit = rand(0, 1).".".rand(99,99);
            }
          ?>
          <a class="btn btn-sm btn-success" href="?id=<?php echo $id?>&&profit=<?php echo $profit ?>&&loss=<?php echo $loss ?>">CLOSE</a>
          <?php
        }elseif ($row['status'] == 1) {
          echo "CLOSED";
        }
        

        ?>
        
      </td>

    </tr>
    <?php }}}?>
  </table>
</div>
 
 <?php
    if(isset($_GET['id']) && isset($_GET['profit']) && isset($_GET['loss'])){
        $id = $_GET['id'];
        $profit = $_GET['profit'];
        $loss = $_GET['loss'];
        $status = 1;

        if($profit > $loss){
            $balance = $mainBalance + $profit;
        }else{
            $balance = $mainBalance - $loss;
        }
        require_once 'server/classes/updateData.php';
    $updateResponse = $update->updateTrade($id, $profit,$loss,$status);
    $email = $_SESSION['email'];
    $updateResponse2 = $update->updateNBalance($email,$balance);
    echo "<script>
      alert('Closed Successfully, Account Balance Updated');
      window.location = 'trade-history.php';
    </script>";
        
    }
 ?>
            </div>
          </div>







<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST">
                    <div class="mb-4">
                      <label>Order Size/Volume (USD)</label>
                      <input type="number" value="0" name="volume" class="form-control" max="<?php echo $mainBalance ?>">
                    </div>
                    <div class="mb-4">
                      <label>Pair</label>
                      <select class="form-control">
                        <option>BTC/USD</option>
                        <option>BTC/USDT</option>
                        <option>USD/TRY</option>
                        <option>ETH/USDT</option>
                        <option>ETH/BTC</option>
                        <option>ETH/USDT</option>
                        <option>BTC/USDT</option>
                        <option>LTC/USDT</option>
                        <option>LTC/BTC</option>
                        <option>XRP/USDT</option>
                        <option>XRP/BTC</option>
                        <option>BCH/USDT</option>
                        <option>LINK/USDT</option>
                        <option>BCH/BTC</option>
                        <option>TRX/USDT</option>
                        <option>DOGE/USDT</option>
                        <option>TRX/BTC</option>
                        <option>EOS/USDT</option>
                        <option>ETC/USDT</option>
                        <option>ADA/USDT</option>
                        <option>COMP/USDT</option>
                        <option>BTT/USDT</option>
                        <option>SHIB/USD</option>
                      </select>
                    </div>
                    <div class="mb-4">
                      <label>Limit Price (USD)</label>
                      <input type="number" class="form-control" max="<?php echo $mainBalance ?>" value="0">
                    </div>
                    <div class="mb-4">
                      <label>Take Profit  (USD)</label>
                      <input type="number" class="form-control" max="<?php echo $mainBalance ?>" value="0">
                    </div>
                    <div class="mb-4">
                      <label>Stop Loss  (USD)</label>
                      <input type="number" class="form-control" max="<?php echo $mainBalance ?>" value="0">
                    </div>
                    
                    <div>
                        <?php
                            if($mainBalance > 0):
                        ?>
                        <button class="btn btn-success btn-lg btn-block mb-4" name="buy"> <i class="fa fa-caret-up"></i> BUY</button>
                        <button class="btn btn-danger btn-lg btn-block" name="sell"> <i class="fa fa-caret-down"></i> SELL</button>
                        <?php
                            else :
                        ?>
                        <div class="alert alert-danger">Please Fund Your Account To Start Trading</div>
                        <?php endif; ?>
                    </div>
                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


         
      

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  
      
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
            $(" .change").text(Math.floor(Math.random() * 99));
        }, 1000);
    });
    $(document).ready(function () {
        setInterval(function () {
            $(".change2").text(Math.floor(Math.random() * 4));
        }, 1000);
    });
    $(document).ready(function () {
        setInterval(function () {
            $(".change3").text(Math.floor(Math.random() * 5));
        }, 1000);
    });
    $(document).ready(function () {
        setInterval(function () {
            $(".change4").text(Math.floor(Math.random() * 89));
        }, 1000);
    });
</script>