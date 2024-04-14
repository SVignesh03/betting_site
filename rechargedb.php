<?php
    ob_start();
    session_start();
    if($_SESSION['frontuserid']==""){
        header("location:index.php");
        exit();
    }
    if(isset($_SESSION['rechargeamount'])){
        $amount = $_SESSION['rechargeamount'];
    }
    else{
        $amount = $_POST['amount'];
    }
    $id = $_SESSION['frontuserid'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "db.php";
        $utr = $_POST['utr'];
        $qry = "INSERT INTO tbl_recharge_confirmation (user_id, amount, utr) VALUES ('$id', '$amount', '$utr')";
        if (!($conn->query($qry))){
            header("Location: recharge.php?msg=2");
            exit();
        }
        else{
            header("Location: recharge.php?msg=1");
            exit();
        }
    }
?> 