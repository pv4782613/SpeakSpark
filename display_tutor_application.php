<html>
<head>
<style>
#view {
  border-collapse: collapse;
  width: 100%;
}
#view td, #view th {
border: 1px solid #ddd;
padding: 5px;

}
//#view tr:hover {background-color: #c1dff7;}
#view th {	font-family:'Arial';}
#view th {
padding-top: 12px;
padding-bottom: 12px;
text-align:center;
background-color: #2f1669;
color: white;
}
#view td img{
padding-left:12px;
padding-right:2px;
}
</style>

</head>
<body>
<table id="view">
<tr><th>full_name</th> <th>Email</th> <th>Username</th>  <th>Password</th>  <th>Aadhar</th> <th>Pan</th> <th>Bank</th>  <th>Education</th> <th>Hire the tutor</th> 
</tr>
<tbody>
<?php 
include 'dbcon.php';
$selectquery="select * from tutor_registration";

$query=mysqli_query($con,$selectquery);

//$result=mysqli_fetch_array($query);
while($result=mysqli_fetch_array($query)){
?>

<tr>
<td><?php echo $result['full_name']; ?></td>
<td><?php echo $result['Email']; ?></td>
<td><?php echo $result['Username']; ?></td>
<td><img src="<?php echo $result['profile']; ?>" width="200" height="200"></td>
<td><img src="<?php echo $result['Aadhar']; ?>" width="200" height="200"></td>
<td><img src="<?php echo $result['Pan']; ?>" width="200" height="200"></td>
<td><img src="<?php echo $result['Bank']; ?>" width="200" height="200"></td>
<td><img src="<?php echo $result['Education']; ?>" width="200" height="200"></td>
<td>
  <form action="select_tutor.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="username" value="<?php echo $result['Username']; ?>">
	<input type="hidden" name="confirm" value="<?php echo $result['Confirm']; ?>">
	<input type="hidden" name="profile" value="<?php echo $result['profile']; ?>">
	<input type="hidden" name="Country" value="<?php echo $result['Country']; ?>">
	<input type="hidden" name="Introduction" value="<?php echo $result['Introduction']; ?>">
    <input type="submit" name="hire" value="Give Access">
  </form>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</body>
</html>