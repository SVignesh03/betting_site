<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    #eye{
      position: absolute;
      padding: 0px;
      pointer-events: none;
      font-size: 24px;
    }
  </style>
</head>
<body>
<?php
    if(isset($_REQUEST['msg'])){
      if($_REQUEST['msg'] == 1){
          echo "<font color=green><b>Registered Sucessfully!</b></font>";
          sleep(4);
          header("Location:index.php");
          exit();
      }
      if($_REQUEST['msg'] == 2){
        echo "<font color=red><b>Registeration failed! Please try again.</b></font>";
    }
    }
  ?>
  <!-- App Header --> 
<div class="appHeader1" style="background-color:#ffa500 !important">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Register</div>
        </div>
 
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1 mb-2">

    <form action="register_process.php" method="post" id="Register" class="card-body" autocomplete="off">
    <div class="row">
      <div class="col-12">
        <div class="inner-addon left-addon">
          <i class="icon ion-ios-person"></i>
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="">
        </div>
      </div>
      <div class="col-12">
        <div class="inner-addon left-addon">
          <i class="icon ion-md-phone-portrait"></i>
          <input type="tel" name="mobile" id="mobile" onKeyPress="return isNumber(event)" class="form-control" placeholder="Mobile Number" value="" maxlength="10">
        </div>
      </div>
      <div class="inner-addon left-addon">
        <i class="icon ion-ios-mail"></i>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email-id">
      </div>
      <div class = "col-8">
        <div class="inner-addon left-addon">
          <i class="icon ion-md-key"></i>
          <input type="password" name="password" id="login_password" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class = "col-4">
        <a onClick = "togglePasswordVisibility()" style = "cursor : pointer;">
          <table>
            <tr>
              <td><i class="icon ion-ios-eye" id = "eye"></i></td>
              <td style = "padding-left: 30px; padding-top: 24px; "><span id = "password_type">Show Password</span></td>
            </tr>
          </table>
        </a>
      </div>
      <input type="hidden" name="action" value="register">
      <div class="form-group row mt-3 mb-3">
        <div class="col-12">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" checked class="custom-control-input" id="remember" name="remember">
            <label class="custom-control-label text-muted" for="remember">I agree <a data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false">PRIVACY POLICY</a></label>
          </div>
        </div>              
      </div>
      <div>
        <div class="text-center mt-3">
          <button type="submit" class="btn btn-light" style="width:264px; background-image: linear-gradient(#ffa500, #ffa523);"> Register </button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- appCapsule -->
<div id="privacy" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-weight:normal;">Privacy Policy</h5>
      </div>
      <div class="modal-body responsive">
        <?php echo content($conn,"privacy");?>
      </div>
      <div class="modal-footer">
        <a class="pull-left" data-dismiss="modal"><strong>CLOSE</strong></a>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/account.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/bootstrap-4.5.2.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="assets/js/popper.min.js.min.js"></script> -->
</body>
</html>
