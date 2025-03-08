<?php
//Upload the form details to the database 
include 'dbcon.php';

if(isset($_POST['hire']))
{
  $username = $_POST['username'];
  $password = $_POST['confirm'];
  
  $insertquery = "INSERT INTO qc_selected (Username,Password) VALUES ('$username','$password')";
  $query = mysqli_query($con, $insertquery);

  if ($query)
  {
    echo "<script>res=alert('Login Access given to the QC'); </script>";
  }
  else
  {
    echo "<script>alert('Failed to give access'); window.location = 'display_qc_application.php';</script>";
  }
  
  // Delete records from tutor_registration
  $deletequery = "DELETE FROM qc_registration WHERE Username='$username'";
  $query1 = mysqli_query($con, $deletequery);

  if ($query1)
  {
    echo "<script>res=alert('QC moved in selected list'); window.location = 'display_qc_application.php';</script>";
  }
  else
  {
    echo "<script>alert('QC not moved in selected list'); window.location = 'display_qc_application.php';</script>";
  }
  
}
else
{
  echo "Submit button is not clicked";
}
?>
