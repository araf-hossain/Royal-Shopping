<?php

include("../database/connection.php");

?>

<?php 
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$gender = $_POST['gender'];
$number = $_POST['number'];
$location = $_POST['location'];

$dob=$day."-".$month."-".$year;



if(isset($_POST['submit']))
{

	if(!empty($first) && !empty($last) && !empty($email) && !empty($password) && !empty($confirm) && !empty($month) && !empty($day) && !empty($year) && !empty($gender) && !empty($number) && !empty($location))
	{
		if ($_POST['password']==$_POST['confirm']) {

			$img_path ="../../images/$email.jpg";
			move_uploaded_file($_FILES['image']['tmp_name'],$img_path);

			mysql_query("INSERT INTO create_admin(`first`,`last`,`email`,`password`,`dob`,`gender`,`number`,`location`)VALUE('$first','$last','$email','$password','$dob','$gender','$number','$location')");
              
		}

		if (mysql_affected_rows()>0) 
		{

			print "You successfully registered";
		}
		else{
			print "You entered something wrong. Please try again.";
		}
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign UP</title>
</head>
<body background="assets/img/signup.jpg">
<!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/signup.jpg", {speed: 500});
    </script>

<style type="text/css">

select {
	background: lightgray;
    border: 300px;
    border-radius: px;
    
    border-size: auto;
    height: 25px;
}
select:hover{
	border: inset 2px solid lightgray;
	box-sizing: border-box;
	border-radius: inset 4px;
	box-shadow: inset 0 1px 2px lightgray; 
}
input {
	font-family: relevent;
	font-size: 17px;
	background: lightgray;
    border: 250px;
    border-radius: 2px;

    
}
input:hover{
	border: inset 5px solid rgb(46,208,211);
	box-sizing: border-box;
  	box-shadow: inset 0 1px 2px rgb(46,208,211);
}
input:focus {
    border: 0px solid rgb(46,208,211);
}
label{
	font-weight: normal;
	font-size: 19px;
}
.error{
	color: #ff0000;
}
.fieldset{
	background-color: rgba(0,0,0,0.1);
 	border: 1px solid rgba(0,0,0,0.1);
 	width: 300px;
 	margin:auto;
 	padding: 25px 25px;
}
.submit{
	background: rgb(46,208,211); 
	padding: 9px 13px; 
	color: white;
}
</style>

<form name="form1" method="post" action="" enctype="multipart/form-data">
 <fieldset class="fieldset">

 <!--************************************************ NAME ************************************-->
 	<tr>
 		<label>Name</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['first'])) 
 				{
 					echo "*Please fill First Name";
 				}
 				elseif (empty($_POST['last'])) 
 				{
 					echo "*Please fill Last Name";
 				}
 			} 
 		?></span><br>
		<label><input type="text" name="first" placeholder="First" size="13"></label>&nbsp;
		<label><input type="text" name="last" placeholder="Last" size="13"></label>
	</tr>
<!--**************************************** email ****************************************-->
	<tr>
		<br><br><label>Choose email</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['email'])) 
 				{
 					echo "*Please choose your email";
 				} 

 			}
 		?></span><br>
		<label><input type="text" name="email" placeholder="						   @gmail.com" size="31"></label>
	</tr>
<!--**************************** CREATE PASSWORD AND CONFIRM PASSWORD *************************-->
	<tr>
		<br><br><label>Create Password</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['password'])) 
 				{
 					echo "*Please create your password";
 				} 
 			}
 		?></span><br>
		<label><input type="password" name="password" size="31"></label>
	</tr>

	<tr>
		<br><br><label>Confirm Password</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['confirm'])) 
 				{
 					echo "*Please confirm you password";
 				} 
 				elseif ($_POST['password'] != $_POST['confirm']) {
 					echo "*Please confirm you password";
 				}
 			}
 		?></span><br>
		<label><input type="password" name="confirm" size="31"></label>
	</tr>


<!--******************************************* BIRTHDAY *************************************** -->
	

	<tr>
		<br><br><label>Birthday</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['month'])) 
 				{
 					echo "*You can't leave this empty";
 				}
 				elseif (empty($_POST['day']))
 				{
 					echo "*You can't leave this empty";
 				}
 				elseif (empty($_POST['year']))
 				{
 					echo "*You can't leave this empty";
 				}
 			}
 		?></span><br>
 		<label><input type="text" name="day" placeholder="Day" size="7"></label>&nbsp;
		<label><input type="text" name="month" placeholder="Month" size="7"></label>&nbsp;
		<label><input type="text" name="year" placeholder="Year" size="7"></label>
	</tr>


<!--******************************************* GENDER *************************************** -->


	<tr>
		
		<br><br><label>Gender</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['gender'])) 
 				{
 					echo "*Please select your gender";
 				} 
 			}
 		?></span><br>

		<select style="width: 312px" name="gender">
			<option value="">I am...</option>
			<option>Male</option>
			<option>Female</option>
		</select>
	</tr>


<!--**************************************** PHONE NUMBER *************************************** -->



	<tr>
		<br><br><label>Mobile Phone</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['number'])) 
 				{
 					echo "*Please type your number";
 				}

 			}
 		?></span><br>
		<label><input type="text" name="number" placeholder="Type your number" size="31"></label>
	</tr>



<!--******************************************* LOCATION *************************************** -->



	<tr>
		<br><br><label>Location</label><span class="error"><?php if(isset($_POST['submit']))
 			{ 
 				if (empty($_POST['location'])) 
 				{
 					echo "*Please select your country";
 				} 
 			}
 		?></span><br>
		<select style="width: 312px" name="location">
			<option value="">Select Country</option>
			<option>Bangladesh</option>
			<option>United States</option>
			<option>Switzerland</option>
		</select>
	</tr>



<!--**************************************** UPLOAD PICTURE ************************************* -->



	<tr>
		<br><br><label>Upload Profile Picture</label>
		<input type="file" name="image">
	</tr>
	
	<tr>
		<br><br><input type="submit" class="submit" name="submit" id="submit" value="Sign Up">
	</tr>
	<tr>
		<input type="button" onclick="parent.location='login.php'" style="background: rgb(46,208,211); padding: 10px 15px; color: white; float: right;" name="login" id="login" value="Login"><br>
	</tr>
 </fieldset>
</form>
</body>
</html>
