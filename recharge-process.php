<!-- <link rel="stylesheet" src="assets/css/style.css"> -->
<style>
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        
    }
    .btn{
        background-image: linear-gradient(#29B6F6, #29B6F6);
        border-radius: 5px 5px 5px 5px;
        border: 0.5px solid white;
        color: white;
        transition: 0.5s;
        height:44px;
        padding:0 20px;
        margin:6px 8px;
        font-size:14px;
        line-height:1.2em;
        font-weight:500;
        display:inline-flex;
        -webkit-box-align:center;
        align-items:center;
        -webkit-box-pack:center;
        justify-content:center;
        text-decoration:none !important;
    }
    .btn-primary {
        background:#565EFF;
        border-color:#565EFF;
    }
    #qrcode{
        border: 3px solid #565EFF;
        padding: 10px;
    }
</style>
<?php
session_start();
include "db.php";
if($_SESSION['frontuserid']==""){
    header("location:index.php");
    exit();
}
$rechargeamount = $_POST['userammount'];
$link = "upi://pay?pa=vickypedrosa0@okaxis&pn=Vignesh.%20S&am=$rechargeamount.00&cu=INR";
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
if($isMob){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['rechargeamount'] = $rechargeamount;
        echo "<script>
            $(document).ready(function () { 
                alert('');
                delay(5000);
                window.open('$link', '_blank');
            }
            </script>";
        header("location:recharge-confirmation.php");
    }
    else{
        header("location:recharge.php");
    }
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $rechargeamount = $_POST['userammount'];
        $_SESSION['rechargeamount'] = $rechargeamount;
        // $link = "upi://pay?pa=vickypedrosa0@okaxis&pn=Vignesh.%20S&am=$rechargeamount.00&cu=INR";
        echo "<div class = 'container'><center><h2>Scan to Pay</h2><div id='qrcode'></div><br><br>";
        echo "<a href='recharge-confirmation.php'><button class='btn btn-primary'>DONE</button></a></center></div>";
    }
}
?> 
<script src = "assets/js/qr-code.min.js"></script>
<script>
    new QRCode(document.getElementById("qrcode"), "<?php echo $link; ?>");
</script>