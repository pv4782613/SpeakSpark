<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="footer_style.css">
<style>

*{
	box-sizing:border-box;
}
body
{
	background:#f7f8fc;	
}
.column3
{
float:left;
width:50%;
}
.leftbox{
	border:2px solid grey;
	height:300px;
	width:300px;
	margin:5% 0 0 25%;
	float:left;
	box-shadow:8px 8px 8px grey;
}
.rightbox{
	border:1px solid grey;
	float:left;
	height:250px;
	width:600px;
	margin:5% 10% 0 0;
	padding-top:3%;
}
.rightbox h1{
margin-left:5%;
}
.rightbox p{
	font-size:20px;
	color:grey;
	margin-left:5%;
	line-height:0.2em;
}
.leftbox1{
	float:left;
	margin:5% 0 0 25%;
}
.leftbox1 button{
	background:#2f1399;
	color:white;
	font-size:20px;
	font-weight:bold;
	text-decoration:none;
	margin-top:2%;
	padding:8px 25px;
	box-shadow:0px 8px 8px grey;
}

</style>
</head>

<body>
<?php 
session_start();
$username = $_SESSION['Username'];

include 'dbcon.php';

$selectquery="select * from student_profile where Username='$username'";

$query=mysqli_query($con,$selectquery);

//$result=mysqli_fetch_array($query);
while($result=mysqli_fetch_array($query))
{
?>
<div class="column3">
<div class="leftbox">
<img src="<?php  echo $result['profile']  ?>" width="300" height="300">
</div>

<div class="leftbox1">
<button onclick="window.alert('Your Username is: <?php echo $result['Username'] ?>');">UserName</button>
<button onclick="window.alert('Your Password is: <?php echo $result['Create1'] ?>');">Password</button>
</div>

</div>



<div class="column3">
	<div class="rightbox">
		<h1>Student Details</h1>
		<p>Name: <?php echo $result['full_name']  ?></p>
		<p>Email: <?php  echo $result['Email']  ?></p>
		<p>Contact No: <?php  echo $result['Contact']  ?></p>
		<p>Address: <?php echo $result['Address'] ?></p>
	</div>
	
	<div class="rightbox">
		<h1>Plan Details</h1>
		<p>Subscription Plan: <?php  echo $result['Subscription']  ?></p>
		<p>Subscription Amount: <?php echo $result['rupees']   ?></p>
		<p>Transaction ID: <?php  echo $result['reference_id']  ?></p>
		<p>Payment Gateway: RazorPay</p>
	</div>
	
</div>



<?php
}
?>
</body>
</html>