<?php

include "dbcon.php";

// If the form has been submitted
if (isset($_POST['submit']))
{

    // Get the date and time from the form
    $date = $_POST['date'];
    $time = $_POST['time'];
	$tutor_username = $_GET['tutor_username'];


    // Check if the slot is available
    if (strtotime($date) < strtotime(date('Y-m-d'))) 
	{
        // Date is in the past
		echo "<script>alert('Invalid date. Please enter a date in the future.');</script>";
    } 
	else 
	{

        // Check if the slot is available
        $sql = "SELECT * FROM schedule WHERE date='$date' AND time='$time' AND tutor_username='$tutor_username'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) 
		{
            // Slot already booked
           echo "<script>alert('Slots already booked');</script>";
        } 
		else 
		{
            // Insert the slot into the database
            $sql = "INSERT INTO schedule (date, time, tutor_username) VALUES ('$date', '$time', '$tutor_username')";

            if (mysqli_query($con, $sql))
			{
                // Slot booked successfully
                echo "<script>alert('Slot booked successfully');window.location='available_tutor.php';</script>";
            } 
			else 
			{
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }
}

?>

<html>
<head>
<style>
form{
margin-top:5%;
margin-left:22%;
padding:10%;
width:35%;
box-shadow:5px 14px 14px 14px rgba(0,0,0,0.5);
}
form label{
color:#7e8ece;
font-size:40px;
margin-top:3%;
margin-left:15%;
}
form input{
border-radius:2px;
height:50px;
width:200px;
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
margin-left:15%;
background:#7e8ece;
color:white;
border:none;
font-size:30px;
width:69%;
border-radius:2px;
padding:0 50px;
}
.submit1:hover{
	cursor:pointer;
}
</style>
</head>
<body>
<!-- HTML form to input date and time -->
<form method="post">
    <label>Date: </label>
    <input type="date" name="date" required><br>

    <label>Time:</label>
    <input type="time" name="time" required><br>

    <input type="submit" name="submit" value="Book" class="submit1">
</form>

</body>
</html>