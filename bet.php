<?php include "auth.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>V Club</title>
  <link rel="stylesheet" href="assets/css/headerfooter.css">
  <link href="assets/css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <style>
.btn {
    border-radius: 10px 10px 10px 10px;
    border: 2px solid white;

    transition: 0.5s;
    
}

.container{
        padding-top : 100px;
        padding-bottom : 200px;
    }
.text-right {
    text-align: right!important;
}
.appHeader1 {
	background-color: #fff !important;
	border-color: #fff !important;
}
.appContent3 {
	background-color: #2196f3 !important;
	border-color: #2196f3 !important;
	padding:10px;
	border-radius:3px;
	font-size:16px;
}
.user-block img {
	width: 40px;
	height: 40px;
	float: left;
	margin-right:10px;
	background:#333;
}
.img-circle {
	border-radius: 50%;
}
.reaload {
	box-shadow:none;
}
.ion-md-refresh {
	font-size:30px !important;
}
.responsive {
	height:300px;
	overflow-x: auto;
}
.vcard {
	box-shadow:none;
}
h5{ color:#888; font-size:20px; font-weight:normal;}
h5 span{ color:#333; font-size:20px;}
.divsize4 .btn{padding: 0 10px; width:100px;}
.left-addon input {
    padding-left: 20px;
}
.error {
    top: 45px;
}
.containerrecord{border-bottom: solid 2px #565EFF;}
.recordlink{
    font-size: 30px;
    color: #333;
	border-bottom: solid 2px #565EFF ;
}
.recordlink .title{font-size: 14px;
font-weight: 500;}
#alert h4{font-size: 1rem;}
#alert p{font-size: 13px; margin-top:30px;}
#alert .modal-content{border-radius:3px}
#alert .modal-dialog{padding:30px; margin-top:200px;}
#payment .modal-dialog{padding:10px;margin-top:60px;}
#loader .modal-dialog{padding:30px; margin-top:200px;}

.btn-lg {
    height: 42px;
    padding: 0px 24px;
    font-size: 15px;
}
.vg{
    background: linear-gradient(137.11deg, #7400AB -9.13%, #7400AB 49.79%, #1DCC70 49.8%, #1DCC70 107.5%) !important;
    }
.rv{
  background: linear-gradient(137.11deg, #7400AB -9.13%, #7400AB 49.79%, #ff2d55 49.8%, #ff2d55 107.5%) !important;
}
.btn-blue{
 background-color:#2196f3;
}
.btn {
     border-radius: 3px 3px 3px 3px; 
    border: 0px solid white;
    transition: 0.5s;
    color:#d9d5db;
}
.btn-blue{
    background-color:#2196f3;
    color:#d9d5db;
}
/* .modal { */
  /* display: none; Hidden by default */
  /* position: fixed; Stay in place */
  /* z-index: 1000; Sit on top */
  /* left: 0;
  top: 0; */
  /* width: 100%; Full width */
  /* height: 100%; Full height */
  /* overflow: auto; Enable scroll if needed */
  /* background-color: rgba(0,0,0,0.4); Black w/ opacity */
/* } */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}
.close {
  /* color: #aaa; */
  float: right;
  font-size: 12px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
  <?php include 'templates/header.php'; ?>  
  <?php include "auth.php"; ?>
  <br><br><br><br>
  <div class="container">
    <?php
      include("db.php");
      $userid=9;//$_SESSION['frontuserid'];
      $selectruser=mysqli_query($conn,"select * from cno_users where id='.$userid.'");
      $userresult=mysqli_fetch_array($selectruser);
      $selectwallet=mysqli_query($conn,"select * from tbl_wallet where user_id='.$userid.'");
      $walletResult=mysqli_fetch_array($selectwallet);
    ?>
    <!-- Page loading -->


    <!-- App Header -->
    <div class="vcard" >
      <div class="appContent3 text-white" style="background-color:#00A36C !important">
        <div class="row">
          <div class="col-12">
            <div class="col-12 mb-1" style="font-size: 18px;">
              Available balance: ₹ 
              <span id="balance"><?php echo number_format(wallet($conn, $userid), 2); ?></span>
            </div>
            <div class="col-12">
              <div> <a href="recharge.php" class="btn btn-blue btn-blue m-0">Recharge</a> <button id="openModal" class="btn btn-blue btn-blue">Read Rule</button> <a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);" class="reaload text-white pull-right mt-1" onClick="reloadPage()"> <i class="icon ion-md-refresh"></i></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="alert alert-success" id="success-alert">
        <span id="msg">
            <strong>Success!</strong> Bid placed!.
        </span>
    </div>
    <div class="mb-5">
      <div class="long mb-3">      
      <!-- game area -->
        <div class="appContent1 bg-light mt-n1">
          <div class="layout">
            <div class="gameidtimer"> 
              <h5 class="mb-2"><i class="icon ion-md-trophy"></i> Period</h5>
          
              <h5>
                <!-- <span class="showload">
                <div class="spinnner-border text-danger" role="status">
                </div>
                </span> -->
                <span id="gameid" class="none"><?php echo sprintf("%03d",gameid($conn));?></span>
                <input type="hidden" id="futureid" name="futureid" value="<?php echo sprintf("%03d",gameid($conn));?>">
              </h5>
            </div>
            <div class="gameidtimer text-right"> 
              <h5 class="mb-2">Count Down</h5>
              <h5 id="demo"></h5>
            </div>
          </div>
          <div class="bg-light  layout text-center mt-2">
            <div class="divsize4">
              <button type="button"  class="btn btn-lg btn-success gbutton none" onClick="bet(1,1)" data-toggle="modal" data-target="#exampleModal">Join Green</button>
            </div>
            <div class="divsize4">
              <button type="button" class="btn btn-lg btn-violet gbutton none" onClick="bet(1,2)" data-toggle="modal" data-target="#exampleModal">Join Violet</button>
            </div>
            <div class="divsize4">
              <button type="button" class="btn btn-lg btn-danger gbutton none" onClick="bet(1,3)" data-toggle="modal" data-target="#exampleModal">Join Red</button>
            </div>
          </div> 
          <div cla="container-fluid  ">
            <div class="layout text-center bg-light  d-flex justify-content-center">
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none redvio" onClick="bet(2,0)" data-toggle="modal" data-target="#exampleModal">0</button>
              </div>
              <div class="divsize2">
                <button type="numbutton" class="btn btn-lg gbutton none btn-success" onClick="bet(2,1)" data-toggle="modal" data-target="#exampleModal">1</button>
              </div>
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none btn-danger" onClick="bet(2,2)" data-toggle="modal" data-target="#exampleModal">2</button>
              </div>
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none btn-success" onClick="bet(2,3)" data-toggle="modal" data-target="#exampleModal">3</button>
              </div>
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none btn-danger" onClick="bet(2,4)" data-toggle="modal" data-target="#exampleModal">4</button>
              </div>
            </div>
            <div class="layout text-center bg-light d-flex justify-content-center">
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none grnvio" onClick="bet(2,5)" data-toggle="modal" data-target="#exampleModal">5 </button>
              </div>
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none btn-danger" onClick="bet(2,6)" data-toggle="modal" data-target="#exampleModal"> 6</button>
              </div>
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none btn-success" onClick="bet(2,7)" data-toggle="modal" data-target="#exampleModal">7 </button>
              </div>
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none btn-danger" onClick="bet(2,8)" data-toggle="modal" data-target="#exampleModal"> 8</button>
              </div>
              <div class="divsize2">
                <button type="button" class="btn btn-lg gbutton none btn-success" onClick="bet(2,9)" data-toggle="modal" data-target="#exampleModal">9 </button>
              </div>
            </div>
          </div>
        </div>
        <!-- game area end -->
        <div class="mt-1 pb-5">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="parity" role="tabpanel"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="modal-title" style="color: #fff;"></span></h5>
                </div>
                <div class="modal-body">
                    <!-- Modal body content goes here -->
                   <select style="cursor:pointer;" name="dlamt" class="form-control" id="dlamt" onchange="calc()" required>
                        <option value="0">Choose</option>
                        <option value="10">&#8377; 10</option>
                        <option value="100">&#8377; 100</option>
                        <option value="1000">&#8377; 1000</option>
                        <option value="10000">&#8377; 10000</option>
                    </select>
                    <br><br>
                    Quantity
                    <input class="form-control" type="number" value="1" min="1" max="10" id="txtQuantity" onchange="calc()" onkeyup="calc()"/><br><br>
                    Total Amount
                    <input type="text" readonly="readonly" id="txtTotal"/>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="hideModal()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="UpdateBid(); hideModal();" class="btn btn-primary" data-dismiss="modal">CONFIRM
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- appCapsule -->
<?php include("templates/footer.php");?>
<div id="ruleModal" class="modal">
  <div class="modal-content">
    <!-- <span id="closeModal" class="close">&times;</span> -->
    <center><?php echo content($conn,"rule");?>
    <a id="closeModal" class="close"><strong>CLOSE</strong></a></center>
  </div>
</div>
<div id="alert" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" id="alertmessage"> </div>
      <div class="text-right pb-1 pr-2">
        <a type="button" class="text-info" data-dismiss="modal">OK</a>
      </div> 
    </div>
  </div>
</div>
    <input type="text" id="txtPeriodid" hidden/>
    <input type="text" id="txtBidtype" hidden/>
    <input type="text" id="txtBidcolornumber" hidden/>
<div id="loader" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" style="background:transparent; border:none;">
      <div class="text-center pb-1">
        <a type="button" id="closbtnloader" data-dismiss="modal"> <div class="spinner-grow text-success"></div></a></div>
      </div>
    </div>
  </div>
</div>
<div class = "paritywait" id = "paritywait" hidden></div>
   <?php include 'templates/footer.php'; ?>  
    <script src="assets/js/jquery-3.7.1.js"></script>
    <script src="assets/js/popper.min.js"></script> 
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script> 
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/betting.js"></script>

<!-- <script src="assets/js/bootstrap-4.5.2.min.js"></script>   -->
<script>
  $("#success-alert").hide();
  function hideModal() {
        $('#exampleModal').modal('hide');
    }
$(document).ready(function () {
   
var x = setInterval(function() { 
start_count_down(); 
  $('#closbtnloader').click(); 
}, 1e3);

getResultbyCategory('parity','parity');
// tabname('parity');

$('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
});
function start_count_down() {
  // alert("countdown started"); 
$(".showload").hide();
$(".none").show();
var countDownDate = Date.parse(new Date) / 1e3;
  var now = new Date().getTime();
  var distance = 180 - countDownDate % 180;
  // console.log(distance);
  //alert(distance);
  var i = distance / 60,
   n = distance % 60,
   o = n / 10,
   s = n % 10;
  var minutes = Math.floor(i);
  var seconds = ('0'+Math.floor(n)).slice(-2);
  document.getElementById("demo").innerHTML = "<span class='timer'>0"+Math.floor(minutes)+"</span>" + "<span>:</span>" +"<span class='timer'>"+seconds+"</span>";
// document.getElementById("counter").value = distance;
if(distance==180 || distance==175 || distance==170 || distance==165 || distance==160){
getResultbyCategory('parity','parity');
}
if(distance==180){
  // alert("game id generation");
  generateGameid();
}

// if(distance==50){


// }
if(distance<=30)
{
  // alert("disabled");
$(".gbutton").prop('disabled', true);
}else{ 
$(".gbutton").prop('disabled', false);
	}
  if(distance == 5){
    finishBid();
  }
}

function finishBid() {
  console.log("finish bid function called");
  var pid = document.getElementById("gameid").innerHTML;

  // Construct the URL with query parameters
  const url = 'winnerResult.php?pid=' + pid;

  // Redirect to the URL
  window.location.href = url;
}

function generateGameid() {
  console.log("game id generation function");

  // Construct the URL for the POST request (assuming "generatePeriodid.php" expects POST)
  const url = "generatePeriodid.php";

  // Create a new FormData object (optional, could use URLSearchParams instead)
  const formData = new FormData();

  // No data needed to be sent for generating the game ID, comment out if not needed
  // formData.append("key", "value"); // Example usage

  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.text();
    })
    .then(newGameId => {
      document.getElementById("gameid").innerHTML = newGameId;

      // Optional: Redirect after updating the game ID
      // window.location.href = "your_redirect_page.php";
    })
    .catch(error => {
      console.error("Error:", error);
    });
}


    function bet(type, val) {
        $("#txtBidtype").val(type);
        $("#txtBidcolornumber").val(val);
        $("#exampleModal").modal("show");
        if(type == 1){
            if(val == 1){
                document.getElementById("modal-header").style.backgroundColor = "#198754" //green
                document.getElementById("modal-title").innerHTML = "Join Green";
            }
            else if(val == 2){
                document.getElementById("modal-header").style.backgroundColor = "#9c27b0" //violet
                document.getElementById("modal-title").innerHTML = "Join Violet";
            }
            else if (val == 3){
                document.getElementById("modal-header").style.backgroundColor = "#ff2d55" //red
                document.getElementById("modal-title").innerHTML = "Join Red";
            } 
        }
        else if(type == 2){
            if(val == 1 || val == 3 || val == 7 || val == 9){
                document.getElementById("modal-header").style.backgroundColor = "#198754" //green
                document.getElementById("modal-title").innerHTML = "Join " + val;
            }
            else if(val == 2 || val == 4 || val == 6 || val == 8){
                document.getElementById("modal-header").style.backgroundColor = "#ff2d55" //red
                document.getElementById("modal-title").innerHTML = "Join " + val;
            }
            else if(val == 0 || val == 5){
                document.getElementById("modal-header").style.backgroundColor = "#9c27b0" //violet
                document.getElementById("modal-title").innerHTML = "Join " + val;
            }
        }
    }

    function calc() {
        var amt = $("#dlamt").val();
        var quantity = $("#txtQuantity").val();
        var total = (amt * quantity);
        $("#txtTotal").val(total);
    }

    function UpdateBid() {
    var periodid = $("#txtPeriodid").val();
    var bidtype = $("#txtBidtype").val();
    var bidcolornumber = $("#txtBidcolornumber").val();
    var amt = $("#dlamt").val();
    var quantity = $("#txtQuantity").val();
    var total = $("#txtTotal").val();

    // Redirect to the PHP script with query parameters
    window.location.href = "test-bet_process.php?pid=" + periodid + "&btype=" + bidtype + "&bcn=" + bidcolornumber + "&amt=" + amt + "&q=" + quantity + "&t=" + total;
}

// function tabname(tabname){
// document.getElementById('tab').value = tabname;	
// 	}	

//amount calculation
//get Result

function getResultbyCategory(category,containerid)
{ 
$.ajax({
    type: "Post",
    data:"category=" + category,
    url: "getResultbyCategory.php",
    success: function (html) {
	 document.getElementById(containerid).innerHTML=html;
	 waitlist('parity',<?php echo $userid;?>,'paritywait');
	//  waitlist('sapre',<?php //echo $userid;?>,'saprewait');
	//  waitlist('bcone',<?php //echo $userid;?>,'bconewait');
	//  waitlist('emerd',<?php //echo $userid;?>,'emerdwait');
	 if(category=='parity'){
	  $('#parityt').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
	$('#myrecordparityt').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
	 }
      return false;
      },
      error: function (e) {}
      });
	 
	}

$(document).ready(function () {
	waitlist('parity',<?php echo $userid;?>,'paritywait');
});
function reloadbtn(id){
    // Show loader modal
    // $('#loader').modal({ backdrop: 'static', keyboard: false });
    // $('#loader').modal('show');

    $.ajax({
        type: "Post",
        data: "userid=" + id,
        url: "getwalletbalance.php",
        success: function (html) {
            // Update balance
            document.getElementById('balance').innerHTML = html;
            // alert(html);
            // console.log(html);
            // Hide the loader modal
            // $('#loader').modal('hide');

            return false;
        },
        error: function (xhr, status, error) {
            // Hide the loader modal
            // $('#loader').modal('hide');
            
            // Display an error message to the user
            alert("An error occurred while fetching wallet balance: " + error);

            // Optionally, you can log the error to the console for debugging purposes
            console.error("Error:", error);

            // You can also perform additional error handling actions here if needed
        }
    });
}

var modal = document.getElementById("ruleModal");
var btn = document.getElementById("openModal");
var btn_close = document.getElementById("closeModal");
btn.onclick = function() {
  modal.style.display = "block";
}
btn_close.onclick = function() {
  modal.style.display = "none";
}

function reloadPage() {
  location.reload();
}
</script>
</body>
</html>