<?php
	require_once 'header.php';
?>

	<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Trading History
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12">
                    
               
            <h4>Trading History</h4>
            <?php
                $id = $_GET['id'];
                $fetchData = new fetchData;
                $fetchResponse = $fetchData->singleUser($id);
                if(is_array($fetchResponse)){
                    if(isset($fetchResponse['status'])){
                        '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                    }else {
                        foreach($fetchResponse as $row){
                        
            ?>
            <form method="POST" action="historyAdd.php">
                <div class="form-group">
                    <label> Email</label>
                    <input type="text" name="email"  class="form-control disabled" placeholder="email" required autocomplete="off" value="<?php echo $row['email']; ?>" readonly>
                </div>
                 <div class="form-group">
                    <label> Volume</label>
                    <input type="text" name="volume"  class="form-control" placeholder="volume" required>
                </div>
                    
              <div class="form-group">
                <label for="username">Type</label>
                <select name="type" class="form-control" >
                    <option value="buy">buy</option>
                    <option value="sell">sell</option>
                </select> 
              </div>
              <div class="form-group">
                <label for="password">profit</label>
                <input type="text" name="profit" class="form-control"   placeholder="Enter New profit">
              </div>
              <div class="form-group">
                <label for="password">Loss</label>
                <input type="text" name="loss" class="form-control"   placeholder="Enter New looss">
              </div>
              <div class="form-group">
                <label for="username">Status</label>
                <select name="status" class="form-control" >
                    <option value="0">Pending</option>
                    <option value="1">Completed</option>
                </select> 
              </div>
              
              <button type="submit" class="btn btn-success">Add Trading</button>
            </form>
            
            <?php
	require_once 'header.php';
	$fetchData = new fetchData;
	$email = $row['email'];
    	$fetchResponse = $fetchData->trading($email);
        if ($fetchResponse == 0) {
            echo "No Record Found";
        }else{
           
        
    	

?>
<div class="container">
<h1>Edit/Update Trading Records</h1>
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
    <th>Id</th>
      <th>Order</th>
      <th>Volume</th>
      <th>Type</th>
      <th>Status</th>
      <th>Profit</th>
      <th>Loss</th>
      
      <th>Update</th>
    </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            foreach($fetchResponse as $row){

                                        ?>
                                        <form action="updateHistory.php" method="POST">
                                        <tr>
     <td>
        <input type="text" name="id" value="<?php echo $row['id']?>" readonly>
      </td>
      <td>
        <?php echo $row['trade_order']?>
      </td>
      <td>
        <input type="text" name="volume" value="<?php echo $row['volume']?>">
        
      </td>
      <td>
        <select name="type">
            <option value="buy"
                <?php if($row['type'] == 'buy'){
                    echo "Selected";
                } ?>
            >Buy</option>
            <option value="sell"
                <?php if($row['type'] == 'sell'){
                    echo "Selected";
                } ?>
            >Sell</option>
        </select>
        
      </td>
      <td>
        <select name="status">
            <option value="0"
                <?php if($row['status'] == '0'){
                    echo "Selected";
                } ?>
            >Pending</option>
            <option value="1"
                <?php if($row['status'] == '1'){
                    echo "Selected";
                } ?>
            >Completed</option>
        </select>
        
      </td>
      <td>
        <input type="text" name="profit" value="<?php echo $row['profit']?>">
        
      </td>
      <td>
        <input type="text" name="loss" value="<?php echo $row['loss']?>">
        
      </td>

      <td>
         <button class="btn btn-primary" >Update Trading History</button>
                                            </td>
     

    </tr>
</form>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            </div>

            
            
            
            
            
        <?php }}}} ?>
        </div>
                </div>
                <br><br>

                

        </div>
           
           

<?php
	require_once 'footer.php';
?>