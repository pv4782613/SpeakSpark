<?php 
include 'dbcon.php';
$file = file_get_contents('student_invalid_page.php');
$next_page = file_get_contents('student_main_page.html');


session_start(); 

if($_SERVER['REQUEST_METHOD']=='GET')
{
?>

<form method="post" class="form1" action="<?php echo $_SERVER['PHP_SELF']?>">	
<div class="profile">
<div style="box-shadow:15px 5px 55px red;"></div>
<img src="res/admin_login.png" style="height:190px;">
</div>
<input type="text" name="Username"  placeholder="Username" required>
<input type="password" name="Password" placeholder="Password" required>
<input type="submit" name="submit" class="submit1" value="submit">

</form>
<?php
}
elseif($_SERVER['REQUEST_METHOD']=='POST')
{
	if(!empty($_POST['submit']))
	{
		$Username=$_POST['Username'];
		$Password=$_POST['Password'];
		$query="select * from admin_registration where Username='$Username' and Password='$Password'";
		$result=mysqli_query($con,$query);
		$count=mysqli_num_rows($result);
		
		if($count>0)
		{
			echo "<p class='a1'>You have Successfully Login !! </p>";
			echo "<br><a href='admin_main_page.html' class='a2'>Proceed</a>";
		}
		else
		{
			echo "<p class='a11'>Invalid Credentials!! </p>";
			echo "<br><a href='admin_login_page.php' class='a22'>Try Again</a>";
		}
	}
}
else
{
	die("not able");
}

?>
<html>
<head>
<title>Admin Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<style>

body{
margin:0;
padding:0;
background: #edeef8;
}
*{
font-size:20px;
}

/*Login Page*/
.form1{
width:30%;
height:550px;
background:linear-gradient(#4049a5,white);
padding:40px 20px;
color:white;
margin-left:auto;
margin-right:auto;
margin-top:1%;
border:1px solid #1D3CAC;
box-shadow:5px 5px 5px grey;
}
.form1 p{
	color:black;
	margin-left:4%;
}
.form1 a{
color:blue;
font-family:'arial';
font-weight:bold;
margin-left:5%;
}
.form1 img{
	
		
}
.a1{
	color:green;
	margin-left:35%;
	margin-top:10%;
	font-size:30px;
}
.a2{
	background-color:green;
	border-radius:5px;
	padding:15px;
	margin-left:44%;
	font-size:25px;
	color:white;
	text-decoration:none;
}
.a11{
	color:#db4730;
	margin-left:40%;
	margin-top:10%;
	font-size:30px;
}
.a22{
	background-color:#db4730;
	border-radius:5px;
	padding:15px;
	margin-left:44%;
	font-size:25px;
	color:white;
	text-decoration:none;
}
input {
 width: 80%;
  padding: 10px;
  border-top:1px solid rgba(255,255,255,0.5);
  border-left:1px solid rgba(255,255,255,0.5);
  backdrop-filter:blur(5px);
  border-radius: 4px;
  box-sizing: border-box;
  margin:6px 0px 16px 42px;

}

/* Style the submit button */
.submit1{
background:#fc4812;
color: white;
 margin-top: 15px;
}
#tt
{
	font-size:15px;
	padding-left:60px;
}
.new{
padding-left:15%;
}
.new a
{
	font-size:18px;
	color:#fc4812;
}
.profile{
border:1px solid  #4049a5;
height:200px;
width:200px;
background:white;
padding:16px;
padding-left:26px;
border-radius:50%;
margin-left:20%;
margin-bottom:10%;
position:relative"
}
</style>
<body>


</body>
</html>



