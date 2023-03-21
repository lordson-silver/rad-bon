<?php
   require_once 'header.php';
   $mainBalance =  $row['balance'];
?>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-money"></i></div><strong>Balance USD</strong>
                    </div>
                    <div class="number dashtext-1"><?php echo $row['currency'] . " ". number_format($row['balance'], 2) ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-bitcoin"></i></div><strong>Balance BTC  </strong>
                    </div>
                    <div class="number dashtext-2">
                      <span class=""> BTC 
        
   
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
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-credit-card"></i></div><strong>Profit USD</strong>
                    </div>
                    <div class="number dashtext-1"><?php echo $row['currency'] . " ". number_format($row['profit'], 2) ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-money"></i></div><strong>Amount Invested</strong>
                    </div>
                    <div class="number dashtext-1"><?php echo $row['currency'] . " ". number_format($row['amountinvested']==null || $row['amountinvested']=="" ? 0 : $row['amountinvested'] , 2) ?></div>
                  </div>
                  <div class="progress progress-template">
                    <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                  </div>
                </div>
              </div>
              
               
            </div>
          </div>
        </section>



        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3">
                <div class="stats-2-block block">
                  <div>
                    <?php
$servername = "localhost";
$username = "globalfxp_db";
$password = "G6bJQQ5SQ1sE";
$dbname = "globalfxp_db";

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
              </div>
              <div class="col-md-9">
                <div class="stats-2-block block">
                  <div style="width: 100%; height: 600px">
                    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="width: 100%; height: 600px">
  <div id="tradingview_15021" style="width: 100%; height: 600px"></div>

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
<!-- TradingView Widget END -->
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
            <section class="no-padding-top">
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
      </section>

<?php
  require_once 'footer.php';
?>

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