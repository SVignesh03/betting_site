<?php
    include "db.php";
    ob_start();
    session_start();
    if(isset($_SESSION['rechargeamount'])){
        $rechargeamount = $_SESSION['rechargeamount'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Confirmation</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/headerfooter.css">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> --> 
  <style>
    .btn { 
      background-image: linear-gradient(#29B6F6, #29B6F6);
      border-radius: 5px 5px 5px 5px;
      border: 0.5px solid white;
      color: white;
      transition: 0.5s;
    }
    </style>
</head>
<body>
        <div class="appHeader1" style="background-color:#009688 !important">
            <div class="left">
                <a onclick="goBack();" class="icon ion-md-arrow-back">&nbsp;</a>
                <div class="pageTitle">Recharge Confirmation</div>
            </div>
        </div>
        <div id="appCapsule">
            <div class="appContent1">
                <form action="rechargedb.php" method="post" class="card-body" autocomplete="off">
                <div class="inner-addon left-addon">
                    <i class="icon ion-md-key"></i>
                    <input type="text" id="utr" name="utr" class="form-control" placeholder="UTR / Reference Number">
                </div>
                <?php if(!isset($_SESSION['rechargeamount'])){ ?>
                <div class="inner-addon left-addon">
                    <i class="icon ion-md-wallet"></i>
                    <input type="text" id="amount" name="amount" class="form-control" placeholder="Recharged Amount">
                </div>
                <?php } ?>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-light" style="width:264px;"> Confirm </button>
            </div>
        </div>
        <script src="assets/js/app.js"></script> 
</body>
</html>