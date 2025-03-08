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
		<th>Date</th><th>Time</th><th>Join Session</th><th>Upload the video</th>
	</tr>
<?php
session_start();
include 'dbcon.php';

$username = $_SESSION['Username'];
$selectquery = "SELECT * FROM schedule where tutor_username='$username'";
$query = mysqli_query($con, $selectquery);

if(mysqli_num_rows($query) > 0) 
{
  while($result = mysqli_fetch_assoc($query))
  {
?>
	<tr>
		<td><?php echo $result['date'] ?></td>
		<td><?php echo date('H:i:s', strtotime($result['time'])); ?></td>
		<td><a href="https://teams.microsoft.com/dl/launcher/launcher.html?url=%2F_%23%2Fl%2Fmeetup-join%2F19%3A6J2GkloifKcz4TMwhaVuNXqqglVUhv8Sy_5XpIMgcoY1%40thread.tacv2%2F1681019570493%3Fcontext%3D%257B%2522Tid%2522%3A%25227676ed11-82d5-40f2-ae3c-7d482c942c46%2522%2C%2522Oid%2522%3A%2522870c295d-c639-4e89-a009-6d6ad04012d0%2522%257D%26anon%3Dtrue&type=meetup-join&deeplinkId=e3c2b83e-9517-49fd-a74e-e4ebd4c84db9&directDl=true&msLaunch=true&enableMobilePage=true&suppressPrompt=true" class="agenda_btn" target="_blank">Join</a></td>
		
		<td><a href="upload_video.php?date=<?php echo $result['date'] ?>" class="agenda_btn" target="_blank">Upload<a/></td>
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