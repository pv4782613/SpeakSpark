<?php
	include "dbcon.php";
		
	$Username1=$_GET['Username'];


	$delete_query = "DELETE FROM tutor_selected WHERE Username='$Username1'";
	$query = mysqli_query($con, $delete_query);
		
	if($query)
	{
		echo "<script>alert('Tutor has been blocked and removed from selected list');
		window.location='selected_page.php';
		</script>";
	}
	else 
	{
		 echo "<script>alert('Failed to block the tutor');window.location='selected_page.php';
		</script>";
	}
?>
