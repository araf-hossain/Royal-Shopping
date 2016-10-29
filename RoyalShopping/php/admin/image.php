<?php

if(isset($_POST['submit'])){

	$img_path = realpath(dirname(__FILE__));
	move_uploaded_file($_FILES['image']['tmp_name'],$img_path . '/araf23.jpg');
	 //print "Received {$_FILES['userfile']['name']}";
	print $img_path;

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">	
	<input type="file" name="image">
	<input type="submit" name="submit" value="test">
</form>
</body>
</html>
