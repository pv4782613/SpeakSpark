<?php
//Upload the form details to the database 
include 'dbcon.php';

if(isset($_POST['hire']))
{
  $username = $_POST['username'];
  $password = $_POST['confirm'];
  $profile_url = $_POST['profile']; 
  $Country = $_POST['Country'];
  $Introduction = $_POST['Introduction'];
  
  // insert into tutor_profile table
  $insertquery = "INSERT INTO tutor_selected (Username, Password, profile, Country, Introduction) VALUES ('$username', '$password', '$profile_url', '$Country', '$Introduction')";
  $query = mysqli_query($con, $insertquery);

  if ($query)
  {
    echo "<script>res=alert('Login Access given to the tutor'); </script>";
  }
  else
  {
    echo "<script>alert('Failed to give access'); window.location = 'display_tutor_application.php';</script>";
  }
  
  // Delete records from tutor_registration
  $deletequery = "DELETE FROM tutor_registration WHERE Username='$username'";
  $query1 = mysqli_query($con, $deletequery);

  if ($query1)
  {
    echo "<script>res=alert('Tutor moved in selected list'); window.location = 'display_tutor_application.php';</script>";
  }
  else
  {
    echo "<script>alert('Tutor not moved in selected list'); window.location = 'display_tutor_application.php';</script>";
  }
}
else
{
  echo "Submit button is not clicked";
}
?>
