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
    <div class="pageTitle">Recharge History</div>
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
      $summery=mysqli_query($conn,"select * from `tbl_recharge_confirmation` where `user_id`='".$userid."' order by id desc");
	  $summeryRows=mysqli_num_rows($summery);
	  if($summeryRows!=''){
		  while($summeryResult=mysqli_fetch_array($summery)){
            $post_date = $summeryResult['createdate'];
            $convert = date('d/m/Y',strtotime($post_date));
            $amount = $summeryResult['amount'];
	  ?>
        <tr>
          <td>
          <div class="listItem">
          <div class="image">
              <div class="iconBox bg-success"> 
              <i class="icon ion-md-wallet"></i> 
              </div>
            </div>
            <div class="text"><div><strong>Recharge</strong><small><?php echo $convert;?></small></div></div>
            </div>
            </td>
          <td class="tdtext">+ <?php echo number_format($summeryResult['amount'],2);?></td>
        </tr>
        
        <?php }}?>
      </tbody>
    </table>
  </div>
</div>