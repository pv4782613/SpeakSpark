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
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}
.column {
  float: left;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 28px;
}
.card1 {
background:white;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
margin:10px;
height:333px;
border:10px solid white;
border-radius:15px;
}

.card1:hover{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8);
}
.container {
  width:100%;
  padding:10px;
  background:white;
  height:300px;

}
.card1 img
{
	float:left;
	width:30%;
	border-radius:5px;
	height:100px;
	margin-top:5%;
}
.card1 h1
{
	float:right;
	width:70%;
	padding-left:10%;
	font-size:22px;
	
}
.card1 p
{
	color:grey;
	line-height:25px;
	margin-bottom:30px;
}
.container  a{ 
background: #7e8ece;
color:white;
font-size:19px;
padding:10px 16px;
float:right;
margin-right:8px;
text-decoration:none;
border-radius:4px;
}
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}
.btn:hover{
background-color:grey;
color:white;
}
@media screen and (max-width: 400px) {
  .column {
    width: 100%;
    display: block;
  }
}

@media screen and (min-width: 401px) {
  .column {
    width: 50%;
    display: block;
  }
}

@media screen and (min-width: 700px) {
  .column {
    width: 33.3%;
    display: block;
  }
}
#country{
	width:45px;
	height:50px;
	margin-left:30px;
	float:left;
}
#countryp{
	float:right;
	color:black;
	margin-right:25%;
	margin-top:8%;
	font-size:20px;
}
</style>

</head>
<body>
<?php
session_start();
include 'dbcon.php';

$selectquery = "SELECT * FROM tutor_selected";
$query = mysqli_query($con, $selectquery);

if(mysqli_num_rows($query) > 0) {
  while($result = mysqli_fetch_assoc($query)) {
?>
<div class="row">
    <div class="column">
      <div class="card1">
        <div class="container">
          <img src="<?php echo $result['profile'] ?>">
		    <h1><?php echo $result['Username'] ?></h1>
          <?php
            $country_code = $result['Country'];
            switch ($country_code) {
              case '86':
                echo '<img src="res/china.png" id="country"><p id="countryp">China</p>';
                break;
			  case '91':
                echo '<img src="res/india1.png" id="country"><p id="countryp">India</p>';
                break;	
			case '1':
                echo '<img src="res/canada.png" id="country"><p id="countryp">Canada</p>';
                break;
			case '44':
                echo '<img src="res/uk.png" id="country"><p id="countryp">United Kingdom</p>';
                break;
			case '49':
                echo '<img src="res/germany.png" id="country"><p id="countryp">Germany</p>';
                break;
              default:
                echo '<img src="" id="country"><p id="countryp">NA</p>';
                break;
            }
          ?>
          <br><br><br><br><br><br><p><?php echo $result['Introduction'] ?></p>
          <a href="schedule.php?tutor_username=<?php echo $result['Username'] ?>">Book a Session</a>

        </div>
      </div>
    </div>
<?php
  }
} else {
?>
    <p>No record found</p>
<?php
}
?>

  </body>
  </html>