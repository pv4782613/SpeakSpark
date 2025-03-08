<html>
<head>
<title></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
padding:0;
margin:0;
box-sizing:border-box;
font-size:22px;
}
body{
font-family:'Poppins';
O
}
.container{
width:100%;
margin-left:28%;
margin-top:5%;
max-width:600px; 
padding:20px;
box-shadow:0px 0px 20px grey;
background:linear-gradient(#7e8ece,#e91e63);
border-radius:8px;
color:white;
}
.form-group{
width:100%;
margin-top:10px;
font-size:20px;
}
.form-group input,.form-group select,.form-group option
.form-group textarea{
width: 100%;
padding: 12px;
border-top:1px solid rgba(255,255,255,0.5);
border-left:1px solid rgba(255,255,255,0.5);
backdrop-filter:blur(5px);
border-radius: 4px;
box-sizing: border-box;
margin-top: 6px;
margin-bottom: 16px;
background:rgba(255,255,255,0.1); 
color:white;
} 
.form-group option{
color:black;
}
textarea{
resize:vertical; 
}

input[type="submit"]
{
	width:100%;
	border:none;
	outline:none;
	padding:20px;
	font-size:24px;
	border-radius:8px;
	font-family:'Poppins';
	color:rgb(27,166,247);
	text-align:center;
	cursor:pointer;
	margin-top:10px;
	transition: .3s ease background-color; 
	background:#7e8ece;
	color:white;
}
</style>
</head>
<body>
<form action="upload_qc_reports.php" method="post" enctype="multipart/form-data">
<div class="container">

<h3 style="color:#e91e63;font-size:30px;text-align:center;">Enter the Details</h3>

<div class="form-group">
<label>Enter Qc Username:</label>
<input type="text"  name="Qc_Username"   pattern="[A-Za-z]{6,}" title="UserName should be of 6 characters" required>
</div>

<div class="form-group">
<label>Enter Tutor Username:</label>
<input type="text"  name="Tutor_Username"   pattern="[A-Za-z]{6,}" title="UserName should be of 6 characters" required>
</div>

<div class="form-group">
<label>Enter Quality Check Description:</label>
<input type="text"  name="Description"  pattern="[A-Za-zÀ-ÿ '-]{1,50}" title="Quality Check Description should consist of characters" required>
</div>

<div class="form-group">
	<label>Badge received for this session:</label>
	<select name="Badge" required>
	    <option value=""></option>
		<option value="Green">Green</option>
		<option value="Orange">Orange</option>
		<option value="Red">Red</option>
	</select>
</div>

<div class="form-group">
<label>Do we have to block the tutor:</label>
	<select name="block" required>
    	<option value=""></option>
		<option value="No">No</option>
		<option value="Yes">Yes</option>
	</select></div>

<input type="submit" name="submit" value="Submit Reports" required> 
</div>
</form>

<script>
  
</script>
</body>
</html>
