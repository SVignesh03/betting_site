<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:index.php");exit();}?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php //include'templates/header.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/headerfooter.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>
h3{ font-weight:normal; font-size:14px;}


    .btn { background-image: linear-gradient(#29B6F6, #29B6F6);
    border-radius: 5px 5px 5px 5px;
    border: 0.5px solid white;
    color: white;
    transition: 0.5s;
    
}
  
    /* body{
      padding-top: 120px !important;
    } */

</style>
</head>

<body>
<?php
include("db.php");
$userid=$_SESSION['frontuserid'];
?>


<!-- App Header -->
<div class="appHeader1" style="background-color:#009688 !important">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Recharge</div>
        </div>
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1">
<h3 class="text-center m-2">Balance: <span>₹ <?php echo number_format(wallet($conn,$userid), 2);?></span></h3>
    <form action="recharge-process.php" id="paymentForm" method="post" class="card-body" autocomplete="off">
      <div class="inner-addon left-addon">
      <i class="icon ion-md-wallet"></i>
        <input type="number" id="userammount" name="userammount" class="form-control" placeholder="Enter recharge amount" onKeyPress="return isNumber(event);" onkeydown="check();" onchange="check();" Minimmum=100>
      </div>
      <div style="color: red; font-size:8px;" id="message"></div>
            <div>
        <p style="color: red; font-size:11px;" ><strong>Note:</strong> <br>
        1.Minimmum Recharge = 100 Rs 
        <br>

  2. If any one  not add Rechrge amount in wallet contact our customer service 
      
      <a class="badge badge-danger" href="https://t.me/s_vignesh03">Recharge Support</a>
        </p>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary submit" style="width:264px;" disabled> Recharge </button>
    </div>
    <div class="text-center mt-3">
        <a href = "recharge-confirmation.php"><button class="btn btn-primary" style="width:264px;"> Recharged Already </button></a>
    </div>
        
       </div>
    </form>
  </div>
</div>

<div class="container d-flex justify-content-center"><a href="rechargehistory.php" class = "badge bg-info"> Recharge Record</a>
</div>

<?php 
    if(isset($_REQUEST['msg'])){
        if($_REQUEST['msg'] == 1){
            echo "<font color=green><b>Recharge Sucessful. Please wait for our Confirmation.</b></font>";
        }
        if($_REQUEST['msg'] == 2){
          echo "<font color=red><b>OOPS!! Something went wrong! Please try again sometimes later.</b></font>";
        }
    }
?>
<!-- appCapsule -->

<?php include("templates/footer.php");?>
<script src="assets/js/jquery-3.4.1.min.js"></script> 
<script src="assets/js/scripts.js"></script>
<script src="assets/js/app.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/popper.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<!-- <script src="assets/js/payment.js.php"></script> -->
<script>
  function check(){
    var txt = document.getElementById("userammount");
    var msg = document.getElementById("message");
    if(parseInt(txt.value) < 100 || txt.value == ""){
      msg.innerHTML = "Please Enter a valid amount!";
      $(".submit").prop('disabled', true);
    }
    else{
      msg.innerHTML = "";
      $(".submit").prop('disabled', false);
    }
  }
</script>
</body>
</html>