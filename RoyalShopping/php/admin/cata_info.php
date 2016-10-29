<?php 
include("../database/connection.php");

$cata_id=$_POST['cata_id'];
$item_name=$_POST['item_name'];
$cata_name=$_POST['cata_name'];
$search=$_POST['search_input'];

/*------------------------------------------------------ SEARCH -------------------------------------------------- */
if (isset($_POST['search'])) 
{
  $search_db=mysql_query("SELECT * FROM cata_info");
  
  print "<table><tr><td>Item Name</td><td>Cata ID</td><td>Cata Name</td></tr>";
  while ($fetch_cata=mysql_fetch_array($search_db))
  {

    if ($search==$fetch_cata[1]) 
  {

    print '<tr><td style="text-align:center;">' . $fetch_cata[1] . '</td><td style="text-align:center;">' . $fetch_cata[0] . '</td><td>' . $fetch_cata[2] . '</td></tr>';
  
  }
  if ($search==$fetch_cata[0]) 
  {

    print '<tr><td style="text-align:center;">' . $fetch_cata[1] . '</td><td style="text-align:center;">' . $fetch_cata[0] . '</td><td>' . $fetch_cata[2] . '</td></tr>';
  
  }
  if ($search==$fetch_cata[2]) 
  {

    print '<tr><td style="text-align:center;">' . $fetch_cata[1] . '</td><td style="text-align:center;">' . $fetch_cata[0] . '</td><td>' . $fetch_cata[2] . '</td></tr>';
  
  }
   
  }
   print "</table>";
}


/* ------------------------------------------------------ ADD  ---------------------------------------------------*/

if(isset($_POST['add']))
{
  if(!empty($cata_id) && !empty($item_name) && !empty($cata_name))
  {
  mysql_query("INSERT INTO cata_info(`cata_id`,`item_name`,`cata_name`)VALUE('$cata_id','$item_name','$cata_name')");
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

/* -------------------------------------------------------- EDIT --------------------------------------------------*/

if (isset($_POST['edit'])) {


	mysql_query("UPDATE cata_info SET item_name='$item_name', cata_name='$cata_name' WHERE cata_id='$cata_id'");

	if(mysql_affected_rows()>0)
  {
		
		print "Item name is changed successfully";
	}

	else
	{
		print "Item name is not changed";
	}
  
  }
 





/* -------------------------------------------------------- DELETE -----------------------------------------------*/



if (isset($_POST['delete'])) {

	mysql_query("DELETE FROM cata_info WHERE cata_id='$cata_id'");

	if(mysql_affected_rows()>0)
	{
		print "Item name deleted successfully";
	}
	else
	{
		print "Item name deleted unsuccessfully";
	}
}






/* ---------------------------------------------------------- VIEW -----------------------------------------------*/



if(isset($_POST['view']))
{
	$selec_db = mysql_query("SELECT * FROM cata_info");

	print "<table width:300px><tr><td>Catagory ID</td><td>Item Name</td><td>Catagory Name</td></tr>";

	while ($fetch_catagory = mysql_fetch_array($selec_db)) 
  {
		print "<tr><td>$fetch_catagory[0]</td><td>$fetch_catagory[1]</td><td>$fetch_catagory[2]</td></tr>";

	}
  print "</table>";
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
      <h2  style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#999999; letter-spacing:2px; line-height:47px; text-align:center;">Catagory Information </h2>
	<div class="text">
	 </div>	
	<div class="tex">
	  </div>
    </tr>
    <tr>
	
	
	 <input id="search" name="search_input" placeholder="Catagory ID" type="search" class="text_filed1">
      <span style="font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#999999; letter-spacing:1px;">
        <input name="search" type="submit" value="Search" class="button1"></span>
    </tr>
    <tr>
    <tr>
  <tr>
      <td width="193" height="38" align="right"><span style="font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#999999; letter-spacing:1px;">Catagory ID: </span></td>
      <td width="329" align="center"><label>
        <input type="text" name="cata_id" class="text_filed" placeholder="Catagory ID" value="">
      </label></td>
    </tr>
    <tr>


    <?php 
      
      $select_db=mysql_query("SELECT * FROM item_info");
    
    ?>

      <td align="right"><span style="font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#999999; letter-spacing:1px;">Item Name:</span></td>
      <td width="329" align="center"><label>
      <select name="item_name" style="width:190px; height:35px; border:solid 1px #ccc;margin-top:18px;">
        <option value="">Select Name</option>
        <?php 
        
        while ($fetch_item=mysql_fetch_array($select_db)) 
        {

        ?>        
        <option><?php print $fetch_item[1]; ?></option>
        <?php 
        
        }
        
        ?>
      </select></label>
      </td>
    </tr>
     <tr>
      <td width="193" height="38" align="right"><span style="font-weight:bold; font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#999999; letter-spacing:1px;">Catagory Name: </span></td>
      <td width="329" align="center"><label>
        <input type="text" name="cata_name" class="text_filed" placeholder="Catagory Name" value="">
      </label></td>
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

