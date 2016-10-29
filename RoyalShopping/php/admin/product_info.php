<?php 
include("../database/connection.php");
$item_name=$_POST['item_name'];
$category_name=$_POST['category_name'];
$product_id=$_POST['product_id'];
$product_name=$_POST['product_name'];
$product_price=$_POST['product_price'];
$product_stoke=$_POST['product_stoke'];
$details=$_POST['details'];
$search_input=$_POST['search_input'];
$up_coming=$_POST['up_coming'];

$select_cat=mysql_query("SELECT * FROM cata_info");

/* ---------------------------------------------------- VIEW BUTTON ------------------------------------------ */




?>
<!Doctype html>
<html>
<head>
<title>Product-Information</title>
</head>
<style>
.wrapperrr{height:auto;
         width:500px;
		 margin-left:200px;
		 border:1px solid #ccc;
		 }
.text_field{height:35px;
            width:190px;
			margin-top:18px;
			border:1px solid #ccc;
			}
.textarea{height:45px;
          width:190px;
		  border:1px solid #ccc;
		  }
.button{width:85px;
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
        cursor:pointer
		}
.button:hover{background:#FF9900;}
.sear_tex{width:308px;
          height:30px;
          border:solid 1px #ccc;
          margin-top:18px;
          margin-left:50px;
          }
.button1{height:30px;
         width:85px;
		 color:#FFFFFF;
		 background:#FF6600;
		 border:none;
		 font-size:12px;
		 font-family:Arial, Helvetica, sans-serif;
		 font-weight:bold;
		 border-radius:2px 2px 2px;
		 cursor:pointer;
		 }
.button1:hover{background:#FF9900;}		 		  				  					 
        
</style>

</head>
<body>


<div class="wrapper">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

<?php


/*------------------------------------------------------ ADD BUTTON ----------------------------------------------*/

if(isset($_POST['add']))
{

$tmp_name=$_FILES['image']['tmp_name'];
for ($i=0; $i < count($tmp_name); $i++) 
{ 
$image_name=$product_id."($i)";
$path="../../images/$image_name.jpg";
move_uploaded_file($tmp_name[$i],$path);
}


mysql_query("INSERT INTO product_info(`item_name`,`category_name`,`product_id`,`product_name`,`product_price`,`product_stoke`,`product_details`)VALUE ('$item_name','$category_name','$product_id','$product_name','$product_price','$product_stoke','$details')");

if(mysql_affected_rows()>0)
{
	print "Successfully added";
}
else
{
	print "Unsuccessfull";
}

}



/* -------------------------------------------------------- EDIT BUTTON ------------------------------------------ */

if(isset($_POST['edit']))
{

  mysql_query("UPDATE product_info SET item_name='$item_name', category_name='$category_name', product_name='$product_name' , product_price='$product_price' , product_stoke='$product_stoke' , product_details='$details' WHERE product_id='$product_id'");
  if(mysql_affected_rows()>0)
  {
    print "You successfully added product information";
  }
  else
  {
    print "Something problem with you product information";
  }
}



/* ---------------------------------------------------- DELETE BUTTON ------------------------------------------ */

if(isset($_POST['delete']))
{
  if (!empty($product_id)) {

  mysql_query("DELETE FROM product_info WHERE product_id='$product_id' ");
  
  if(mysql_affected_rows()>0)
  {
    print "Successfully deleted";
  }
  else
  {
    print "Something wrong";
  }
}

else
{
  print "please fill up correctly";
}

}








?>

  <div align="center">
    <table width="500" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td height="81" colspan="2"><h1 align="center" style="color:#999999; font-family:Arial, Helvetica, sans-serif;
		 font-weight:bold; letter-spacing:1px;">Product Information </h1></td>
      </tr>
      <tr>
        <td height="27" colspan="2">
		  <p style="color:GREEN;"><?php print $success; ?></p>
		  <p style="color:RED;"><?php print $message; ?></p>
		</td>
      </tr>
      <tr>
        <td height="44" colspan="2"><label>
          <div align="center">
            <input type="text" name="search_input" placeholder="search................." class="sear_tex"/>
            <input type="submit" name="search" value="Search" class="button1" />
          </div>
        </label></td>
      </tr>
      <tr>
       <td width="255" height="44"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Item Name: </div></td>
        <td width="238"><label>
          </label>
          <label>
          <div align="center">
            <select name="item_name" class="text_field" id="item_name" value="<?php print $fetch_product[0]; ?>">
			<option>Item Name</option>
			<?php
			   $select=mysql_query("SELECT * FROM item_info");
			   while($fetch_item=mysql_fetch_array($select))
			   {
			 ?>
			 <option><?php print $fetch_item[1]; ?></option>
			 <?php  
			   }
			?>
            </select>
          </div>
          </label></td>
      </tr>
      <tr>
        <td height="44"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; letter-spacing:1px; font-weight:bold;">Category Name : </div></td>
        <td><label>
          <div align="center">
            <label>
            <select name="category_name" class="text_field" value="<?php print $fetch_product[1]; ?>">
			 <option>Category Name</option>
			 <?php
			  $select=mysql_query("SELECT * FROM cata_info");
			  while($fetch_cate=mysql_fetch_array($select))
			  {
			  ?>
			  <option><?php print $fetch_cate[2]; ?></option>
			  <?php
			  }
			 ?>
            </select>
            </label>
          </div>
        </label></td>
      </tr>
    
      <tr>
        <td height="44"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Product ID: </div></td>
        <td><label>
          <div align="center">
            <input type="text" name="product_id" placeholder="product id" class="text_field" 
			 value="<?php print $fetch_product[4]; ?>"/>
            </div>
        </label></td>
      </tr>
      <tr>
        <td height="44"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Product Name: </div></td>
        <td><label>
          <div align="center">
            <input type="text" name="product_name" placeholder="product name" class="text_field"
			 value="<?php print $fetch_product[5]; ?>"/>
            </div>
        </label></td>
      </tr>
      <tr>
        <td height="44"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Product Price: </div></td>
        <td><label>
          <div align="center">
            <input type="text" name="product_price" placeholder="product price" class="text_field"
			  value="<?php print $fetch_product[6]; ?>"/>
            </div>
        </label></td>
      </tr>
      <tr>
        <td height="44"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Product Stoke: </div></td>
        <td><label>
          <div align="center">
            <input type="text" name="product_stoke" placeholder="product stoke" class="text_field"
			  value="<?php print $fetch_product[7]; ?>"/>
            </div>
        </label></td>
      </tr>
      <tr>
        <td height="72"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Product Details: </div></td>
        <td><label>
          <div align="center">
            <textarea name="details" class="textarea" placeholder="details...."><?php print $fetch_product[0]; ?></textarea>
            </div>
        </label></td>
      </tr>
      <tr>
        <td height="100"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Picture Field: </div></td>
        <td><label>
          <input type="file" name="image[]" />
        </label>
          <label>
          <input type="file" name="image[]" />
        </label>
          <label>
          <input type="file" name="image[]" />
        </label>
          <label>
          <input type="file" name="image[]" />
        </label></td>
      </tr>
      <tr>
        <td height="30"><div align="center" style="font-size:14px; font-family:Geneva, Arial, Helvetica, sans-serif;
		 color:#999999; font-weight:bold; letter-spacing:1px;">Upcoming Product: </div></td>
        <td><label>
          <div align="center">
            <input type="checkbox" name="checkbox" value="checkbox" />
            </div>
        </label></td>
      </tr>
      <tr>
        <td height="70" colspan="2" align="center">
            <input type="submit" name="add" value="Add" class="button"/>
            <input type="submit" name="edit" value="Edit" class="button"/>
            <input type="submit" name="delete" value="Delete" class="button"/>
            <input type="submit" name="view" value="View" class="button"/>
       </td>
      </tr>
      
<?php 

if (isset($_POST['view'])) {
  
  $select_product=mysql_query("SELECT * FROM product_info");
  
 /* print '<table  width:900px><tr><td>'.'PRODUCT ID'.'</td><td>'.'ITEM NAME'.'</td><td>'.'CATEGORY NAME'.'</td><td>'.'PRODUCT NAME'.'</td><td>'.'PRODUCT PRICE'.'</td><td>'.'PRODUCT STOKE'.'</td><td>'.'DETAILS'.'</td></tr>';
  */
 
 print '<table border="2" align="center" width="600" cellpadding="1" cellspacing="3">'.
      '<tr>'.
        '<td>'.'PRODUCT ID'.'</td>'.
        '<td>'.'ITEM NAME'.'</td>'.
        '<td>'.'CATEGORY NAME'.'</td>'.
        '<td>'.'PRODUCT NAME'.'</td>'.
        '<td>'.'PRODUCT PRICE'.'</td>'.
        '<td>'.'PRODUCT STOKE'.'</td>'.
        '<td>'.'DETAILS'.'</td>'.
      '</tr>';

  while ($fetch_product=mysql_fetch_array($select_product)) {
    print '<tr>'.
    '<td>'.$fetch_product[2].'</td>'.
    '<td>'.$fetch_product[0].'</td>'.
    '<td>'.$fetch_product[1].'</td>'.
    '<td>'.$fetch_product[3].'</td>'.
    '<td>'.$fetch_product[4].'</td>'.
    '<td>'.$fetch_product[5].'</td>'.
    '<td>'.$fetch_product[6].'</td>'.
    '</tr>';
  }
}

 ?>

      </table>
	  
  </div>
</form>
</div>
</body>
</html>