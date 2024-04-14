<?php
    // include("../db.php");
    function daily_recharge($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y-m-d');
        $qry = "SELECT * from tbl_recharge_confirmation WHERE status = '1' AND DATE(createdate) = '$tdy'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }

    function daily_withdraw($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y-m-d');
        $qry = "SELECT * from tbl_withdrawal WHERE status = '1' AND DATE(createdate) = '$tdy'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }

    function daily_betting($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Ymd');
        $qry = "SELECT amount FROM tbl_betting WHERE periodid LIKE '$tdy%'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }

    function daily_winning($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Ymd');
        $qry = "SELECT winamt FROM tbl_winners WHERE periodid LIKE '$tdy%'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["winamt"];
            }
        }
        
        return $sum;
    }

    function monthly_recharge($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $current_month = date('Y-m');
        $start_of_month = date('Y-m-01', strtotime($current_month));
        $end_of_month = date('Y-m-t', strtotime($current_month));
        $qry = "SELECT * FROM tbl_recharge_confirmation WHERE status = '1' AND createdate BETWEEN '$start_of_month' AND '$end_of_month'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        return $sum;
    }
    

    function weekly_recharge($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y-m-d');
        $start_of_week = date('Y-m-d', strtotime('monday this week', strtotime($tdy)));
        $end_of_week = date('Y-m-d', strtotime('sunday this week', strtotime($tdy)));
        $qry = "SELECT * from tbl_recharge_confirmation WHERE status = '1' AND createdate BETWEEN '$start_of_week' AND '$end_of_week'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }

    
    function weekly_withdraw($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y-m-d');
        $start_of_week = date('Y-m-d', strtotime('monday this week', strtotime($tdy)));
        $end_of_week = date('Y-m-d', strtotime('sunday this week', strtotime($tdy)));
        $qry = "SELECT * from tbl_withdrawal WHERE status = '1' AND createdate BETWEEN '$start_of_week' AND '$end_of_week'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }

    function monthly_withdraw($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $current_month = date('Y-m');
        $start_of_month = date('Y-m-01', strtotime($current_month));
        $end_of_month = date('Y-m-t', strtotime($current_month));
        $qry = "SELECT * FROM tbl_withdrawal WHERE status = '1' AND createdate BETWEEN '$start_of_month' AND '$end_of_month'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        return $sum;
    }
    

    function monthly_betting($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Ym');
        $qry = "SELECT amount FROM tbl_betting WHERE periodid LIKE '$tdy%'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }

    function monthly_winning($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Ym');
        $qry = "SELECT winamt FROM tbl_winners WHERE periodid LIKE '$tdy%'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["winamt"];
            }
        }
        
        return $sum;
    }

    function yearly_recharge($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y');
        $start_of_year = $tdy . '-01-01';
        $end_of_year = $tdy . '-12-31';
        $qry = "SELECT amount FROM tbl_recharge_confirmation WHERE status = '1' AND createdate BETWEEN '$start_of_year' AND '$end_of_year'";
        $result = $conn->query($qry);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }


    function yearly_withdraw($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y');
        $start_of_year = $tdy . '-01-01';
        $end_of_year = $tdy . '-12-31';
        $qry = "SELECT amount FROM tbl_withdrawal WHERE status = '1' AND createdate BETWEEN '$start_of_year' AND '$end_of_year'";
        $result = $conn->query($qry);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }
    

    function yearly_betting($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y');
        $qry = "SELECT amount FROM tbl_betting WHERE periodid LIKE '$tdy%'";
        $result = $conn->query($qry);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["amount"];
            }
        }
        
        return $sum;
    }

    function yearly_winning($conn){
        $sum = 0;
        date_default_timezone_set('Asia/Kolkata');
        $tdy = date('Y');
        $qry = "SELECT winamt FROM tbl_winners WHERE periodid LIKE '$tdy%'";
        $result = $conn->query($qry);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sum += $row["winamt"];
            }
        }
        
        return $sum;
    }

?>