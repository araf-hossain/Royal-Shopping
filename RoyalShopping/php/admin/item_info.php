<?php 
include("../database/connection.php");

$item_id=$_POST['item_id'];
$item_name=$_POST['item_name'];
$search=$_POST['search'];



/*------------------------------------------------------ SEARCH -------------------------------------------------- */
if (isset($_POST['search'])) 
{
  $search_db=mysql_query("SELECT * FROM item_info");
  
  print "<table><tr><td>Item ID</td><td>Item Name</td></tr>";
  while ($fetch_item=mysql_fetch_array($search_db))
  {

    if ($search==$fetch_item[1]) 
  {

    print '<tr><td style="text-align:center;">' . $fetch_item[0] . '</td><td style="text-align:center;">' . $fetch_item[1] . '</td></tr>';
  
  }
  if ($search==$fetch_item[0]) 
  {

    print '<tr><td style="text-align:center;">' . $fetch_item[0] . '</td><td style="text-align:center;">' . $fetch_item[1] . '</td></tr>';
  
  }
  }
   print "</table>";
}



/* -------------------------------------------------------- ADD --------------------------------------------------*/

if(isset($_POST['add']))
{
  if(!empty($item_id) && !empty($item_name))
  {

  mysql_query("INSERT INTO item_info(`item_id`,`item_name`)VALUE('$item_id','$item_name')");

  if(mysql_affected_rows()>0)
  {

    print "data added successful";
  }
  else
  {

    print "data added unsuccessful";
  }
}
else
{

  print "Please fill out this page";
}

}
/* ------------------------------------------------------ EDIT --------------------------------------------------*/

if (isset($_POST['edit'])) {

	mysql_query("UPDATE item_info SET item_name='$item_name' WHERE item_id='$item_id'");
	
	if(mysql_affected_rows()>0){
		
		print "Item name is changed successfully";
	}

	else
	{
		print "Item name is not changed";
	}
}




/* --------------------------------------------------- DELETE --------------------------------------------------*/



if (isset($_POST['delete'])) {

	mysql_query("DELETE FROM item_info WHERE item_id='$item_id'");

	if(mysql_affected_rows()>0)
	{
		print "Item name is deleted successfully";
	}
	else
	{
		print "Item name deleted unsuccessfully";
	}
}





/* -------------------------------------------------------- VIEW ------------------------------------------------*/



if(isset($_POST['view']))
{
	$selec_db = mysql_query("SELECT * FROM item_info");
	
	echo "<table><tr><td>Item ID</td><td>Item Name</td></tr>";

	while ($fetch_array = mysql_fetch_array($selec_db)) {
		print "<tr><td>$fetch_array[0]</td><td>$fetch_array[1]</td></tr>";

	}
	echo "</table>";

}

?>

<html>
<head>
<style>
.wrapperr
{
float:left;
width:500px;
height:auto;
margin-left:200px;
border:solid 1px #ccc;
}
.text_filed
{
width:190px;
height:35px;
border:solid 1px #ccc;
margin-top:18px;
}
.text_filed1
{
width:250px;
height:35px;
border:solid 1px #ccc;
margin-top:18px;
margin-left:120px;
}
.button1
{
width:85px;
height:35px;
 background:#FF6600;
border:none;
color:#FFFFFF;
font-family:Arial, Helvetica, sans-serif;
font-weight:bold;
font-size:12px;
border-radius:2px 2px 2px;
margin-top:25px;
margin-left:5px;
cursor:pointer;
}
.button1:hover
{
background:#FF9900;


}
.button_div 
{
height:75px;
width:400px;
margin-left:80px;
float:left;
}
.text  
{
height:auto;
width:auto;
color:#FF0000;
margin-left:150px;
font-weight:600;
font-size:18px;
font-style:italic;
float:left;
}
.tex 
{
height:auto;
width:auto;
color:#339900;
margin-left:150px;
font-weight:600;
font-size:18px;
font-style:italic;
float:left;
}

</style>
<body>
<div class="wrapperr">
<form name="form" method="post" action="">

  
  <table width="529" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
      <h2  style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#999999; letter-spacing:2px; line-height:47px; text-align:center;">Item Information </h2>
	<div class="text">
	 </div>	
	<div class="tex">
	  </div>
    </tr>
    <tr>
	
	
	 <input id="search" name="search_input" placeholder="Item ID" type="search" class="text_filed1">
      <span style="font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#999999; letter-spacing:1px;">
        <input name="search" type="submit" value="Search" class="button1"></span>
    </tr>
    <tr>
    <tr>
  <tr>
      <td width="193" height="38" align="right"><span style="font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#999999; letter-spacing:1px;">Item ID: </span></td>
      <td width="329" align="center"><label>
        <input type="text" name="item_id" class="text_filed" placeholder="item id" value="">
      </label></td>
    </tr>
    <tr>
      <td align="right"><span style="font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#999999; letter-spacing:1px;">Item name:</span></td>
      <td align="center"><input type="phone" name="item_name" class="text_filed" placeholder="item name" value=""></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><span class="button_div">
        <input name="add" type="submit" value="Add" class="button1">
        <input name="edit" type="submit" value="Edit" class="button1">
        <input name="delete" type="submit" value="Delete" class="button1">
        <input type="submit" name="view" value="View" class="button1">
      </span></td>
      </tr>
  </table>
	<span style="margin-left:140px; color:#FF0000"></span>
	<p style="margin-left:40px;"></p>
</form>
</div>
</body>
</html>

