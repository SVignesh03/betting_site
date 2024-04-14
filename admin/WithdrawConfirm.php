<?php 
ob_start();
session_start();
// if($_SESSION['frontuserid']=="")
// {header("location:index.php");exit();}?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php //include'templates/header.php' ?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/ionicons.min.css">
<link rel="stylesheet" href="../assets/css/adminheaderfooter.css">
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
include("../db.php");
include "auth.php";
ob_start();
session_start();
$user_name = $_SESSION["adminid"];
$user_name = $_SESSION["username"];
$_SESSION["adminid"] = $user_id;
$_SESSION["username"] = $user_name;
// $userid=$_SESSION['frontuserid'];
?>


<!-- App Header -->
<div class="appHeader1" style="background-color:#ffa500 !important">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Withdraw Approval</div>
        </div>
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1">
    <?php 
        $qry = "SELECT * from tbl_withdrawal WHERE status = '0'";
        $result = $conn->query($qry);
        if ($result->num_rows <= 0) {
            echo "<center>No Request for Approval</center>";
        }
        else{
            echo "<table class='table'>
                <tr>
                <th scope='col'>User ID</th>
                <th scope='col'>Amount</th>
                <th scope='col'>Platform</th>
                <th scope='col'>ID/No.</th>
                <th scope='col'>Approve</th>
                </tr>
            ";
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                echo "<tr><td scope='row'>".$row["userid"]."</td><td>".$row["amount"]."</td><td>".$row["platform"]."</td><td>".$row["payoutid"]."</td><td><button class = 'btn btn-primary' onclick = 'approve($id)'>APPROVE</button></td>";
            }
        }

    ?>
  </div>
</div>

<!-- appCapsule -->

<?php include("templates/footer.php");?>
<script src="../assets/js/jquery-3.4.1.min.js"></script> 
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/app.js"></script> 
<!-- Bootstrap--> 
<script src="../assets/js/popper.min.js"></script> 
<script src="../assets/js/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="../assets/js/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="../assets/js/app.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<script>
    function approve(id){
        window.location.href = "withdrawdb.php?id=" + id;
    }
</script>
</body>
</html>