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
<?php include 'templates/header.php' ?>
a{
    text-decoration: none;
}
.appHeader1 {
	background-color: #fff !important;
	border-color: #fff !important;
}
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/headerfooter.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>
.appContent3 {
	background-color: #00A36C !important;
	border-color: #2196f3 !important;
	padding:12px;
	border-radius:3px;
	font-size:16px;
}
.user-block img {
	width: 40px;
	height: 40px;
	float: left;
	margin-right:10px;
	background:#b0c4de;
}
.img-circle {
	border-radius: 50%;
}
.accordion .btn-link {
	box-shadow:none;
	padding:8px !important;
	margin:0px 0px;
	color: #333 !important;
	font-size: 16px;
	font-weight: normal;
	border-top:solid 1px #ccc;
}
.accordion .collapsed {
	border:none;
}
.accordion .show {
	border-bottom:solid 1px #ccc;
}
.accordion .sub-link {
	box-shadow:none;
	padding:8px !important;
	color: #333 !important;
	font-size: 20px;
	font-weight: normal;
	display:block;
}
.accordion .sub-link:hover {
color:#00F !important;
}
.accordion .btn-link:hover {
	background:#F5F5F5;
}
.accordion .btn-link {
	position: relative;
}
 .accordion .btn-link::after {
 content: "\f107";
 color: #333;
 top: 8px;
 right: 9px;
 position: absolute;
 font-family: "FontAwesome";
 font-size:30px;
}
 .accordion .btn-link[aria-expanded="true"]::after {
 content: "\f106";
}
.light{
    height: 24px;
    padding: 0px 0px;
	margin: 5px 2px;
	border-radius: 20px;
width: 24px;}
.light1{
    height: 26px;
    padding: 0px 0px;
	margin: 5px 2px;
	border-radius: 20px;
width: 26px;}

.container{
  padding-top: 175px;
  /* padding-bottom: 200px; */
}
</style>
</head>

<body>
<?php
include("db.php");
$userid=$_SESSION['frontuserid'];
$selectruser = mysqli_query($conn,"select * from `cno_users` where `id`='".$userid."'");
$userresult=mysqli_fetch_array($selectruser);
$selectwallet=mysqli_query($conn,"select * from `tbl_wallet` where `user_id`='".$userid."'");
$walletResult=mysqli_fetch_array($selectwallet);
?>
<!-- Page loading -->
<!-- <div class="loading" id="loading">
  <div class="spinner-grow"></div>
</div> -->
<!-- * Page loading --> 
<div class = "container">
<!-- App Header -->
<div class="vcard"> 
  <div class="appContent3 text-white">
    <div class="row">
      <div class="col-12 mb-1">
        <div class="user-block"> <img class="img-circle img-bordered-lg" src="assets/img/avatar.svg"> </div>
        User Name: <?php echo sprintf("%06s",user($conn,'usr_name',$userid));?>
        </div>
        <div class="col-12 mb-0">Mobile: +91 <?php echo user($conn,'pno',$userid);?></div>
      <div class="col-12 mb-1">Available Balance: ₹ <?php echo number_format(wallet($conn,$userid), 2);?></div>
     <div class="col-12">
     <a href="recharge.php" class="btn btn-sm btn-success pull-left m-0" style="background-color:#2196f3 !important">Recharge</a> 
      </div>
    </div>
  </div>
</div>
</div>
<!-- searchBox --> 

<!-- * searchBox --> 
<!-- * App Header --> 

<!-- App Capsule -->
<div class="appContent1 mb-5">
  <div class="contentBox long mb-3">
    <div class="contentBox-body card-body"> 
      
      <!-- listview -->
<p style="color: white; font-size:11px;" ><strong>______________________________________________________________________________ </p>      
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOrder">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrder" aria-expanded="false" aria-controls="collapseOrder">
            <i class="fa fa-list text-primary" style="font-size:16px"></i> Order
        </button>
    </h2>
    <div id="collapseOrder" class="accordion-collapse collapse" aria-labelledby="headingOrder" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <a href="order.php" class="btn btn-link"><i class="fa fa-list text-primary" style="font-size:16px"></i> Order</a>
        </div>
    </div>
</div>

<p style="color: white; font-size:11px;" ><strong>______________________________________________________________________________ </p>             
<div class="accordion-item">
    <h2 class="accordion-header" id="headingTransactions">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTransactions" aria-expanded="false" aria-controls="collapseTransactions">
            <i class="fa fa-money text-primary" style="font-size:16px"></i> Transactions
        </button>
    </h2>
    <div id="collapseTransactions" class="accordion-collapse collapse" aria-labelledby="headingTransactions" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <a href="transactions.php" class="btn btn-link"><i class="fa fa-money text-primary" style="font-size:16px"></i> Transactions</a>
        </div>
    </div>
</div>

<p style="color: white; font-size:11px;" ><strong>______________________________________________________________________________________________________________________________________________________________ </p>             
<div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <i class="fa fa-rupee text-primary"></i> Wallet
        </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <a href="recharge.php" class="btn btn-link"><i class="fa fa-mobile-phone text-primary" style="font-size:16px"></i> Recharge</a>
            <a href="withdraw.php" class="btn btn-link"><i class="fa ion-ios-qr-scanner text-primary" style="font-size:16px"></i> Withdraw</a>
            <a href="transactions.php" class="btn btn-link"><i class="fa fa-angle-double-up text-primary" style="font-size:16px"></i>Transactions</a>
        </div>
    </div>
</div>

<p style="color: white; font-size:11px;" ><strong>______________________________________________________________________________ </p>           
<div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <i class="fa fa-shield text-primary"></i> Account Security
        </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <a href="resetpassword.php" class="btn btn-link"><i class="fa fa-window-restore text-primary" style="font-size:16px"></i>Reset Password</a>
        </div>
    </div>
</div>
<p style="color: white; font-size:11px;" ><strong>______________________________________________________________________________ </p>           
<div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            <i class="fa fa-user text-primary"></i> About
        </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <a href="privacy.php" class="btn btn-link"><i class="fa ion-ios-print text-primary" style="font-size:16px"></i>Privacy Policy</a>
        <a href="riskagreement.php" class="btn btn-link"><i class="fa fa-print text-primary" style="font-size:16px"></i>Risk Disclosure Agreement</a>
        </div>
    </div>
</div>

<p style="color: white; font-size:11px;" ><strong>_____________________________________________________________________</p>            
<div class="accordion-item">
    <h2 class="accordion-header" id="headingSupport">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSupport" aria-expanded="false" aria-controls="collapseSupport">
            <i class="fa fa-telegram text-primary" style="font-size:16px"></i> Support
        </button>
    </h2>
    <div id="collapseSupport" class="accordion-collapse collapse" aria-labelledby="headingSupport" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <a href="https://t.me/s_vignesh03" class="btn btn-link"><i class="fa fa-telegram text-primary" style="font-size:16px"></i> Support</a>
        </div>
    </div>
</div>
         </div>
      <!-- * listview --> 
      </div>
  </div>
   <!-- app Footer -->
  <div class="text-center mt-4"> <a href="signout.php" class="btn btn-sm btn-light" style="width:200px; background-image: linear-gradient(
#29B6F6, 
#29B6F6);">Logout</a> </div>
  <!-- * app Footer --> 
  
</div>
  </div>
<!-- appCapsule -->
<?php include("templates/footer.php");?>
<!-- Jquery --> 
<script src="assets/js/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/popper.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
</body>
</html>