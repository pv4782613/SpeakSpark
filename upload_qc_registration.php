<?php
// Upload the form details to the database
include 'dbcon.php';

if(isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $Email = $_POST['Email'];
    $Username = $_POST['Username'];
    $Confirm = $_POST['Confirm'];
	$Country = $_POST['Country'];
    $profile = $_FILES['Profile'];
	$Aadhar = $_FILES['Aadhar'];
    $Pan = $_FILES['Pan'];
    $Bank = $_FILES['Bank'];
    $Education = $_FILES['Education'];

    $filename = $Aadhar['name'];
    $filepath = $Aadhar['tmp_name'];
    $fileerror = $Aadhar['error'];

    $filename1 = $Pan['name'];
    $filepath1 = $Pan['tmp_name'];
    $fileerror1 = $Pan['error'];

    $filename2 = $Bank['name'];
    $filepath2 = $Bank['tmp_name'];
    $fileerror2 = $Bank['error'];

    $filename3 = $Education['name'];
    $filepath3 = $Education['tmp_name'];
    $fileerror3 = $Education['error'];
	
    $filename4= $profile['name'];
    $filepath4 = $profile['tmp_name'];
    $fileerror4 = $profile['error'];

    if ($fileerror == 0 && $fileerror1 == 0 && $fileerror2 == 0 && $fileerror3 == 0 && $fileerror4==0) 
	{

        // Check if username already exists in the database
        $check_query = "SELECT * FROM qc_registration WHERE Username='$Username'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0)
		{
            // Username already exists, display error message
            echo "Username already exists. Please choose a different one.";
        }
        else 
		{
            // Username does not exist, insert the data into the database
            $destfile = 'file_stored/' . $filename;
            $destfile1 = 'file_stored/' . $filename1;
            $destfile2 = 'file_stored/' . $filename2;
            $destfile3 = 'file_stored/' . $filename3;
		    $destfile4 = 'file_stored/' . $filename4;

            move_uploaded_file($filepath, $destfile);
            move_uploaded_file($filepath1, $destfile1);
            move_uploaded_file($filepath2, $destfile2);
            move_uploaded_file($filepath3, $destfile3);
	    	move_uploaded_file($filepath4, $destfile4); 

            $insertquery = "INSERT INTO qc_registration(full_name, Email, Username, Confirm, Aadhar, Pan, Bank, Education,profile,Country) VALUES ('$full_name', '$Email', '$Username', '$Confirm', '$destfile', '$destfile1', '$destfile2', '$destfile3','$destfile4','$Country')";
			
			$insertquery1 = "INSERT INTO qc_profile(full_name, Email, Username, Confirm, Aadhar, Pan, Bank, Education,profile,Country) VALUES ('$full_name', '$Email', '$Username', '$Confirm', '$destfile', '$destfile1', '$destfile2', '$destfile3','$destfile4','$Country')";
			
            $query = mysqli_query($con, $insertquery);
			$query1 = mysqli_query($con, $insertquery1);

			if($query && $query1)
			{
                echo "<br>Your Details have been sent Successfully !!";
				echo "<br>You will get Exam link on the registered email address !!";
                echo "<br>It will require 2-3 working days to give login access!!";
            }
            else 
			{
                echo "\nYour Details have not been sent Successfully !!";
            }
        }
    }
    else 
	{
        echo "\nFailed to upload one or more files !!";
    }
}
else 
{
    echo "<br>Submit button is not clicked";
}
?>



