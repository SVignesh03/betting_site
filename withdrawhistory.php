<?php 
ob_start();
session_start();
// if($_SESSION['frontuserid']=="")
// {header("location:login.php");exit();}?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>
h3 {
	font-weight:normal;
}
.tdtext{ font-size:16px !important; color:#090 !important; font-weight:normal; text-align:right;}
.tdtext2{ font-size:16px !important; color:#f00 !important; font-weight:normal; text-align:right;}
.tdtext3{ font-size:16px !important; color:#FFB400 !important; font-weight:normal; text-align:right;}

.text small{ font-size:12px; color:#888;}
.listView .listItem {
   padding: 0px 55px 0px 0px;
}
.listView .listItem .text {
    font-size: 16px;
}
</style>
</head>

<body>
<?php
include("db.php");
$userid=9;//$_SESSION['frontuserid'];?>

<!-- App Header -->
<div class="appHeader1" style="background-color: #1DCC70 !important;">
  <div class="left"> <a href="#" onClick="goBack();" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
    <div class="pageTitle">Withdraw History</div>
  </div>
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1 listView">
    <table class="table table-borderless">
      <thead>
      </thead>
      <tbody>
      <?php
	  $userid=$_SESSION['frontuserid'];
      $summary=mysqli_query($conn,"select * from `tbl_withdrawal` where `userid`='".$userid."' order by id desc");
	  $summaryRows=mysqli_num_rows($summary);
	  if($summaryRows!=''){
		  while($summaryResult=mysqli_fetch_array($summary)){
            $post_date = $summaryResult['createdate'];
            $convert = date('d/m/Y',strtotime($post_date));
            $amount = $summaryResult['amount'];
            if($summaryResult['status'] == 1){
	  ?>
        <tr>
          <td>
          <div class="listItem">
          <div class="image">
              <div class="iconBox bg-success"> 
              <i class="icon ion-md-wallet"></i> 
              </div>
            </div>
            <div class="text text-success">
              <strong>Withdrawal Success</strong>
            <p class="text-primary text-center" style="font-size:12px;">
                To: <?php echo user($conn,'pno',$userid);?>
            </p>
            <small class="success"><?php echo $convert;?></small>
            </td>
          <!-- <td class="tdtext">+ <?php //echo number_format($summaryResult['amount'],2);?></td> -->
          <td class="td-text">
            <strong class="text-success text-right" >
                <?php echo number_format($summaryResult['amount'],2);?>
            </strong>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
        <?php 
        }
        if($summaryResult['status'] == 0){  
        ?>
        <tr>
          <td>
          <div class="listItem">
          <div class="image">
              <div class="iconBox bg-warning"> 
              <i class="icon ion-md-wallet"></i> 
              </div>
            </div>
            <div class="text text-warning">
              <strong>Withdrawal Pending</strong>
            <small class="success"><?php echo $convert;?></small>
            </td>
          <!-- <td class="tdtext">+ <?php //echo number_format($summaryResult['amount'],2);?></td> -->
          <td class="td-text">
            <strong class="text-warning text-right" >
                <?php echo number_format($summaryResult['amount'],2);?>
            </strong>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php }}} ?>