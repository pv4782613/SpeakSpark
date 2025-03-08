<html>
<head>
<title>Available Tutors</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
@import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');
body
{
	font-family:'Concert One';
	background: #edeef8;
}
#view {
  border-collapse:collapse;
  width: 100%;
}
#view td, #view th {
border: 1px solid #2f1669;
padding:10px;
text-align:center;
}
#view td{
	padding:20px 15px;
}
#view th {
padding-top: 12px;
padding-bottom: 12px;
text-align:center;
background-color: #2f1669;
color: white;
}
#view th {	font-family:'Arial';}
.agenda_btn{ 
background:green;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:5px;
}
</style>

</head>
<body>
<table id="view">
	<tr>
		<th>Qc_Username</th><th>Tutor_Username</th><th>Description</th><th>Badge</th><th>Blocked Status</th>
	</tr>
<?php
session_start();
include 'dbcon.php';

$username = $_SESSION['Username'];
$selectquery = "SELECT * FROM QC_Reports where Tutor_Username='$username'";
$query = mysqli_query($con, $selectquery);

if(mysqli_num_rows($query) > 0) 
{
  while($result = mysqli_fetch_assoc($query))
  {
?>
	<tr>
		<td><?php echo $result['Qc_Username'] ?></td>
		<td><?php echo $result['Tutor_Username'] ?></td>
		<td><?php echo $result['Description'] ?></td>
		<td><?php echo $result['Badge'] ?></td>
		<td><?php echo $result['block'] ?></td>
	</tr>
<?php
  }
} 
else 
{
?>
	</table>
    <p style="text-align:center;font-size:30px;">No record found</p>
<?php
}
?>
  </body>
  </html>