<?php
    include("../db.php");
    $id = $_REQUEST["id"];
    $qry = "UPDATE tbl_withdrawal SET status = '1' WHERE id = '$id'";
    $conn->query($qry);
    header("Location: WithdrawConfirm.php");
    exit();
?>