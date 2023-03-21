<?php
	require_once 'header.php';
?>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Support</h2>
          </div>
        </div>
		<section class="no-padding-top">
          <div class="container-fluid block margin-bottom-sm" >
            <div class="row">
              <div class="col-md-6 py-3" >
                <h5 class="text-white">Send A Support Email To Admin</h5>
                 <div class="my-5">
                  <form method="POST" action="#">
                    <label>Message :</label>
                    <textarea class="form-control" name="message" placeholder="Type Your Message Here..." rows="8"></textarea>
                    <button class="btn btn-success mt-3" name="sendMessage">Send Message</button>
                  </form>
                 </div>
              </div>
              <div class="table-responsive shadow-lg z-depth-5 text-center font-weight-bold col-md-6 py-5">
                <h5 class="text-white">Contact Admin Directly</h5>
                <table class="table table-striped my-5" width="100%" border="2" >
                  <tr>
                    <th >Support Email </th>
                    <td >support@Globalfxport.com</td>
                  </tr>
                  <!-- <tr>
                    <th >Support Phone Number</th>
                    <td >+13053060812</td>
                  </tr> -->
                </table>
              </div>
            </div>

          </div>
      </section>
    

<?php

    if (isset($_POST['sendMessage']) && $_SERVER['REQUEST_METHOD']== 'POST') {
      $email = $_SESSION['email'];
      $message = $_POST['message'];
      
      if (empty($message)) {
        echo '<script>
          alert("Message Cannot be empty");
        </script>';
      }else{
          if (mb_send_mail("support@Globalfxport.com", "New Support Message From Main Website", $message)) {
            echo '<script>
            alert("Your Message Was Sent Successfully, One Of Our Support Staffs Will Contact you Shortly");
            window.location = ""
          </script>';
          }else{
            echo '<script>
            alert("There was an Error sending your message, please try again");
          </script>';
          }

      }
  }

	require_once 'footer.php';
?>
