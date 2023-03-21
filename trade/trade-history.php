<?php
	require_once 'header.php';
	$mainBalance =  $row['balance'];
?>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Trading History</h2>
          </div>
        </div>
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