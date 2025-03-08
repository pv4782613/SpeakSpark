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
 #view th {	font-family:'Arial';}
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
		<th>Tutor's Username</th><th>Recorded Session</th><th>Submit Report</th>
	</tr>
<?php
session_start();
include 'dbcon.php';


$selectquery = "SELECT * FROM upload_video";
$query = mysqli_query($con, $selectquery);

if(mysqli_num_rows($query) > 0) 
{
  while($result = mysqli_fetch_assoc($query))
  {
?>
	<tr>
		<td><?php echo $result['Username'] ?></td>
		
		<td><a href="<?php echo $result['Session_url'] ?>" class="agenda_btn" target="_blank">Check Video QC<a/></td>
		
		<td><a href="qc_reports.php" class="agenda_btn" target="_blank">Submit Report<a/></td>
		
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