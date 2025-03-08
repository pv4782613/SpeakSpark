<?php
//Upload the form details to the database 
include 'dbcon.php';

	if(isset($_POST['submit']))
	{
		$full_name=$_POST['full_name'];
		$Email=$_POST['Email'];
		$Subscription=$_POST['Subscription'];
		$Username=$_POST['Username'];
		$Create1=$_POST['Create1'];
		$rupees=$_POST['rupees'];
		$reference_id=$_POST['reference_id'];
		$Contact=$_POST['Contact'];
		$Address=$_POST['Address'];
		$profile=$_FILES['profile'];
		
	    $filename = $profile['name'];
		$filepath = $profile['tmp_name'];
		$fileerror = $profile['error'];

		if ($fileerror == 0)
		{
			$check_query = "SELECT * FROM tutor_registration WHERE Username='$Username'";
			$check_result = mysqli_query($con, $check_query);

			if (mysqli_num_rows($check_result) > 0) 
			{
				// Username already exists, display error message
				echo "Username already exists. Please choose a different one.";
			}
			else 
			{
				$destfile = 'file_stored/' . $filename;
				 move_uploaded_file($filepath, $destfile);
				$insertquery="insert into student_registration(full_name,Email,Subscription,Create1,rupees,Username,reference_id,Contact,Address,profile) values('$full_name','$Email','$Subscription','$Create1','$rupees','$Username','$reference_id','$Contact','$Address','$destfile')";
				
				
				$insertquery1="insert into student_profile(full_name,Email,Subscription,Create1,rupees,Username,reference_id,Contact,Address,profile) values('$full_name','$Email','$Subscription','$Create1','$rupees','$Username','$reference_id','$Contact','$Address','$destfile')";
				
				$query=mysqli_query($con,$insertquery);
				$query1=mysqli_query($con,$insertquery1);
				
				if($query && $query1)
				{
					echo "\nYour Registration has been done Successfully !!";
				}
				else
				{
					echo "\n Failed to Register !!";
				}
			}
		}
	}
	else 
	{
		echo "\nSubmit button is not clicked";
	}

?>