<?php include "auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>V Club</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/headerfooter.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link href="assets/css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <style>
    .container{
        padding-top : 175px;
        padding-bottom : 200px;
    }
  </style>
</head>
<body>
   <!-- Include header -->
   <?php include 'templates/header.php'; 
    session_start();
    $id = $_SESSION["frontuserid"];
   ?>  
   <div class="container">
    <div class="container py-5">
        <div class = "row">
            <div class = "col-12">
                <div class="text-center mb-4 animate__animated animate__fadeInUp">
                        <img src="assets/img/Logo.png" alt="V-Club Logo" class="logo">
                </div>
            </div>
    
            <!-- <div class = "row"> -->
            <div class = "col-6">
                <div class="section animate__animated animate__fadeInUp" id="box1">
                    <div class="text-center">
                        <h4>About V-Club</h4>
                        <p>Welcome to V-Club, where the thrill of betting meets the excitement of winning big! We're passionate about creating an immersive and entertaining betting experience that brings together the thrill-seekers, risk-takers, and strategic thinkers.</p>
                    </div>
                </div>
            </div>
    
            <div class = "col-6">
                <div class="section animate__animated " id="box2" style="visibility: hidden;">
                    <div class="text-center">
                        <h4>What Sets Us Apart</h4>
                        <p>At V-Club, we're not just another betting platform; we're a community-driven space where your intuition meets opportunity. Whether it's predicting colors or numbers, our platform offers a diverse range of engaging betting opportunities designed to cater to every preference and strategy.</p>
                    </div>
                </div>
            </div>
            <!-- </div> -->
    
            <!-- <div class = "row"> -->
            <div class = "col-6">
                <div class="section animate__animated " id="box3" style="visibility: hidden;">
                    <div class="text-center">
                        <h4>Our Commitment to Fairness and Security</h4>
                        <p>We understand the importance of trust when it comes to betting. That's why we prioritize fairness and security above all else. Our platform is built on robust technology and stringent security measures to ensure a transparent and safe environment for all our users.</p>
                    </div>
                </div>
            </div>
    
            <div class="col-6">
                <div class="section animate__animated " id="box4" style="visibility: hidden;">
                    <div class="text-center">
                        <h4>Join the Excitement</h4>
                        <p>Ready to elevate your betting experience? Join V-Club today and immerse yourself in a world of possibilities. With user-friendly interfaces and real-time updates, we make betting on colors and numbers an exhilarating adventure.</p>
                    </div>
                </div>
            </div>
        </div>
    
            <div class="section animate__animated " id="box5" style="visibility: hidden;">
                <div class="text-center">
                    <h4>Start Betting, Start Winning</h4>
                    <p>Join V-Club now and unlock a world of betting opportunities. Let your instincts guide you as you dive into the thrill of predicting colors and numbers. Embrace the excitement and start winning today!</p>
                </div>
            </div>
    
            
    
        </div>
    </div>
</div>
<br><br><br><br>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.getElementById('box2').style.visibility = 'visible';
                    document.getElementById('box2').classList.add('animate__fadeInUp');
                    document.getElementById('box2').style.opacity = '1';
                }, 1000);
                setTimeout(function() {
                    document.getElementById('box3').style.visibility = 'visible';
                    document.getElementById('box3').classList.add('animate__fadeInUp');
                    document.getElementById('box3').style.opacity = '1';
                }, 2000);
                setTimeout(function() {
                    document.getElementById('box4').style.visibility = 'visible';
                    document.getElementById('box4').classList.add('animate__fadeInUp');
                    document.getElementById('box4').style.opacity = '1';
                }, 3000);
                setTimeout(function() {
                    document.getElementById('box5').style.visibility = 'visible';
                    document.getElementById('box5').classList.add('animate__fadeInUp');
                    document.getElementById('box5').style.opacity = '1';
                }, 4000);
            });
        </script>
<?php include 'templates/footer.php';
    $_SESSION["frontuserid"] = $id;
?>  

<script src="assets\js\scripts.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>