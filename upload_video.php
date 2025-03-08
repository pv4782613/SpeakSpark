<?php

include "dbcon.php";

// If the form has been submitted
if (isset($_POST['submit']))
{

    // Get the date and time from the form
    $date = $_GET['date'];
    $username = $_POST['username'];
    $Session = $_POST['Session'];
	
	// Check if username already exists in the database
        $check_query = "SELECT * FROM tutor_profile WHERE Username='$username'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0)
		{
			$insertquery="insert into upload_video(Username,Session_url) values('$username','$Session')";
			
			$query = mysqli_query($con, $insertquery);
			
			if($query)
			{
				echo "<script>alert('Video Uploaded');</script>";
			}
			else
			{
			echo "<script>alert('Failed to Upload');</script>";
			}
	
			$deletequery="DELETE FROM schedule where date='$date'";
			$query1 = mysqli_query($con, $deletequery);
			
			if($query1)
			{
				echo "<script>alert('Video has been moved to QC dashboard');
				</script>";
			}
			else
			{
				echo "<script>alert('Failed to move video to QC dashboard');
				</script>";
			}
        }
        else  
		{
            echo "<script>alert('This Tutor Username does not exists. Please choose a different one');window.location='tutor_main_page.html';</script>";
			
		}
}

?>

<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');
form{
font-family:'Concert One';
margin-top:5%;
margin-left:22%;
padding:10%;
width:35%;
box-shadow:5px 14px 14px 14px rgba(0,0,0,0.5);
}
form label{
color:#7e8ece;
font-size:20px;
margin-top:3%;
}
form input{
border-radius:2px;
height:50px;
width:275px;
background:#7e8ece;
color:white;
border:none;
margin-top:2%;
margin-left:5%;
}
input[type="time"]::-webkit-calendar-picker-indicator{
  filter: invert(100%) sepia(0%) saturate(2%) hue-rotate(96deg) brightness(107%) contrast(101%);
  font-size:25px;
}
input[type="date"]::-webkit-calendar-picker-indicator{
  filter: invert(100%) sepia(0%) saturate(2%) hue-rotate(96deg) brightness(107%) contrast(101%);
  font-size:25px;
}
.submit1{
margin-top:10%;	
margin-left:1%;
background:#7e8ece;
color:white;
border:none;
font-size:25px;
width:99%;
border-radius:2px;
padding:0 50px;
font-family:'Concert One';

}
.submit1:hover{
	cursor:pointer;
}
</style>
</head>
<body>
<!-- HTML form to input date and time -->
<form method="post">
    <label>Tutor's Username: </label>
    <input type="text" name="username" pattern="[A-Za-z]{6,}" title="UserName should be of 6 characters" required><br>

    <label>Session URL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
    <input type="text" name="Session" pattern="https?://[^\s/$.?#].[^\s]*$"  required><br>

    <input type="submit" name="submit" value="Upload" class="submit1">
</form>

</body>
</html>