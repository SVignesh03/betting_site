<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/css/adminheaderfooter.css">
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <style>
		:root {
	--clr-primary: hsl(20, 80%, 60%);
	--clr-primary-hover: hsl(20, 80%, 65%);
	--transition: 0.5s ease;
}
body {
	font-family: "Poppins", sans-serif;
	padding: 8rem 5%;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	background: hsl(40, 20%, 90%);
}
* {
	margin: 0;
	box-sizing: border-box;
}
h1 {
	position: relative;
	display: inline-block;
	text-align: center;
	font-size: 2.75rem;
	letter-spacing: -0.05em;
	font-weight: 700;
	margin-bottom: 2.5rem;
	text-shadow: 1px 1px 0px hsl(40, 20%, 90%), -1px 1px 0px hsl(40, 20%, 90%);
	&:after {
		content: "";
		position: absolute;
		opacity: 0.5;
		z-index: -1;
		bottom: 12px;
		left: 0;
		right: 0;
		background: var(--clr-primary);
		height: 12px;
		width: 100%;
	}
}
.container {
	max-width: 1200px;
	width: 100%;
	margin: 0 auto;
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
	gap: 1.5rem;
}
.hoverbox {
	position: relative;
	background: hsla(220, 10%, 20%, 0.9);
	padding: 32px 28px;
	overflow: hidden;
	border-radius: 0px;
	transition: 0.35s ease-in;
	&:after {
		content: "";
		position: absolute;
		top: 0;
		left: auto;
		right: 0;
		width: 0%;
		height: 0.35rem;
		background: var(--clr-primary);
		transition: var(--transition);
	}
	img {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		transition: var(--transition);
		filter: blur(1px) saturate(0);
	}
	h3 {
		font-size: 1.25rem;
		font-weight: 600;
		color: #fff;
		margin-bottom: 1rem;
	}
    h2 {
		font-size: 3rem;
		font-weight: 600;
		color: #fff;
		margin-bottom: 1rem;
	}
	p {
		color: rgba(255, 255, 255, 0.8);
		margin-bottom: 1.125rem;
		font-weight: 300;
	}
	a {
		position: relative;
		color: #fff;
		text-decoration: unset;
		text-transform: uppercase;
		font-size: 0.875rem;
		font-weight: 600;
		letter-spacing: 0.05em;
		transition: color 0.35s;
		&:after {
			content: ">";
			display: inline-flex;
			align-items: center;
			justify-content: center;
			margin-left: 1rem;
			border: 2px solid #fff5;
			border-radius: 50%;
			width: 1.5rem;
			height: 1.5rem;
			transition: all 0.35s, color 0s;
		}
		&:before {
			content: "";
			position: absolute;
			width: 0rem;
			height: 0.125rem;
			background: #fff;
			right: 0.75rem;
			top: calc(50% - 0.025rem);
			transition: 0.35s;
		}
	}
	&:hover {
		background: hsla(220, 20%, 20%, 0.75);
		box-shadow: 0px 16px 24px rgba(0, 15, 0, 0.1);
		&:after {
			width: 100%;
			left: 0;
			right: auto;
		}
		& a:after {
			border-color: transparent;
			margin-left: 2rem;
			transition: all 0.35s, color 0s;
		}
		& a:before {
			width: 1.5rem;
			background: var(--clr-primary);
		}
		& a {
			color: var(--clr-primary);
			&:hover {
				color: var(--clr-primary-hover);
				&:before {
					background: var(--clr-primary-hover);
				}
			}
		}
		img {
			transform: scale(1.2) rotate(-5deg);
			filter: blur(8px) saturate(0);
		}
	}
}

	.card{
		margin: 10px;
	}
  </style>
</head>
<body>
<?php 
include "auth.php";
ob_start();
session_start();
$user_id = $_SESSION["adminid"];
$user_name = $_SESSION["username"];
$_SESSION["adminid"] = $user_id;
$_SESSION["username"] = $user_name;
include("Report.php"); 
include("../db.php");
?>

<h1>Today's Analysis</h1>
<div class="container mt-3">
<div class="row">
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Recharge</h3>
		<h2>&#8377 <?php echo daily_recharge($conn); ?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Withdraw</h3>
		<h2>&#8377 <?php echo daily_withdraw($conn)?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Betting</h3>
		<h2>&#8377 <?php echo daily_betting($conn)?></h2>
		<a href="">More infos</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Winning</h3>
		<h2>&#8377 <?php echo daily_winning($conn)?></h2>
		<a href="">More infos</a>
	</div>
  </div>
</div>

</div>
</div>
<br><br>

<h1>Monthly Analysis</h1>
<div class="container mt-3">
<div class="row">
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Recharge</h3>
		<h2>&#8377 <?php echo monthly_recharge($conn); ?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Withdraw</h3>
		<h2>&#8377 <?php echo monthly_withdraw($conn)?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Betting</h3>
		<h2>&#8377 <?php echo monthly_betting($conn)?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Winning</h3>
		<h2>&#8377 <?php echo monthly_winning($conn)?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>

</div>
</div>
<br><br>


<h1>Yearly Analysis</h1>
<div class="container mt-3">
<div class="row">
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Recharge</h3>
		<h2>&#8377 <?php echo yearly_recharge($conn); ?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Withdraw</h3>
		<h2>&#8377 <?php echo yearly_withdraw($conn)?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Betting</h3>
		<h2>&#8377 <?php echo yearly_betting($conn)?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>
<div class = "col-6">
  <div class="card">
    <div class="hoverbox">
		<h3>Total Winning</h3>
		<h2>&#8377 <?php echo yearly_winning($conn)?></h2>
		<a href="">More info</a>
	</div>
  </div>
</div>

</div>
</div>
<?php include("templates/footer.php");?>
</body>
</html>
