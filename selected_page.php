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

.agenda_btn{ 
background-color:#db4730;
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
		<th>Tutor_Username</th><th>Block</th>
	</tr>
<?php
session_start();
include 'dbcon.php';


$selectquery = "SELECT * FROM tutor_selected";
$query = mysqli_query($con, $selectquery);

if(mysqli_num_rows($query) > 0) 
{
  while($result = mysqli_fetch_assoc($query))
  {
?>
	<tr>
		<td><?php echo $result['Username'] ?></td>
		<td><a href="block_tutor.php?Username=<?php echo $result['Username'] ?>" class="agenda_btn">Block tutor</a></td>
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