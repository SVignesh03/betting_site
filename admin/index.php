<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>V Club</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> --> 
  <style>
    .btn { 
      background-image: linear-gradient(#ffa500, #ffa523);
      border-radius: 5px 5px 5px 5px;
      border: 0.5px solid white;
      color: white;
      transition: 0.5s;
    }
    #eye{
      position: absolute;
      padding: 0px;
      pointer-events: none;
      font-size: 24px;
    }
    
</style>
</head>
<!-- <body style = "display: flex; justify-content: center; align-items: center; height: 100vh;"> -->
  <body>
  <div class="appHeader1" style="background-color:#ffa500 !important">
    <div class="left">
      <a onclick="goBack();" class="icon ion-md-arrow-back">&nbsp;</a>
      <div class="pageTitle">Admin Login</div>
    </div>
 </div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1">

    <form action="login_process.php" id="loginForm" method="post" class="card-body" autocomplete="off">
      <div class="inner-addon left-addon">
      <i class="icon ion-ios-person"></i>
        <input type="text" id="login_user" name="login_user" class="form-control" placeholder="username">
      </div>
      <div class="inner-addon left-addon">
      <i class="icon ion-md-key"></i>
        <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Password">
        <table>
          <tr>
            <td><i class="icon ion-ios-eye" id = "eye" onClick = "togglePasswordVisibility()"></i></td>
            <td style = "padding-left: 30px; padding-top: 24px; "><span style = "cursor : pointer;" id = "password_type" onClick = "togglePasswordVisibility()">Show Password</span></td>
          </tr>
        </table>
      </div>
      <input type="hidden" name="action" value="login">
      <div>
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-light" style="width:264px;"> Login </button>
        </div>
      </div>
    </form>
  </div>
</div>    <div class="row justify-content-center">
    <?php
    
    if(isset($_REQUEST['err'])){
      if($_REQUEST['err'] == 1){
          echo "<font color=red><b>Sorry you don't have a account create one</b></font>";
      }
      if($_REQUEST['err'] == 2){
        echo "<font color=red><b>Invalid Password!!</b></font>";
      }
      if($_REQUEST['err'] == 3){
        echo "<font color=red><b>OOPS! Server Down. Please try again later.</b></font>";
      }
      if($_REQUEST['err'] == 4){
        echo "<font color=red><b>Please Login to continue.</b></font>";
      }
      if($_REQUEST['err'] == 5){
        echo "<font color=green><b>Signed Out Sucessfully!</b></font>";
      }
    }
?>
</div>
<script src = "../assets/js/scripts.js"></script>
<script src = "../assets/js/app.js"></script>
  </body>
</html>
