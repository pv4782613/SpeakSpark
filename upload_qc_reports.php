<?php
// Upload the form details to the database
include 'dbcon.php';

if(isset($_POST['submit'])) 
	{
			$Qc_Username = $_POST['Qc_Username'];
			$Tutor_Username = $_POST['Tutor_Username'];
			$Description = $_POST['Description'];
			$Badge = $_POST['Badge'];
			$block = $_POST['block'];
			

		    $check_query = "SELECT * FROM tutor_profile WHERE Username='$Tutor_Username'";
			$check_query1 = "SELECT * FROM qc_profile WHERE Username='$Qc_Username'";
			
			$check_result = mysqli_query($con, $check_query);
			$check_result1 = mysqli_query($con, $check_query1);

			if (mysqli_num_rows($check_result) > 0 && mysqli_num_rows($check_result1) > 0 )
			{
				 $insertquery = "INSERT INTO QC_Reports(Qc_Username,Tutor_Username,Description,Badge,block) values('$Qc_Username','$Tutor_Username','$Description','$Badge','$block')";
			
			
				$query = mysqli_query($con, $insertquery);
				
				if($query)
				{
					echo "<script>alert('QC reports has been submitted to tutor');
					</script>";
				}
				else 
				{
					 echo "<script>alert('Failed to submit the QC reports');
					</script>";
			
				}
				
				$deletequery="delete from upload_video where Username='$Tutor_Username'";
				 $query1 = mysqli_query($con, $deletequery);
				 
				if($query)
				{
					echo "<script>alert('Quality Check has been done for this tutor');
					window.location='qc_main_page.html';
					</script>";
				}
				else 
				{
					 echo "<script>alert('Failed to do Quality Check of this tutor');
					 window.location='qc_main_page.html';
					</script>";
			
				}
       
			}
			else  
			{
				echo "<script>alert('Members Username does not exists. Please choose a registered one');window.location='qc_main_page.html';</script>";
				
			}

           
	}
	else 
	{
		  echo "<script>alert('Submit button is not clicked');</script>";
	}
?>



