<?php
	include("_head.php");
	if($_POST['submit'])
		  {
	  
	  $s="select * from user where  1 and email='".$_REQUEST['email']."' and id!='".$_REQUEST['id']."' ";
		$r=mysql_query($s);
		$n=mysql_num_rows($r);
		   if($n==0)
		   {
				  
				   $sql="update user set
				   name='".$_REQUEST['name']."',
				  
				   address='".$_REQUEST['address']."',
				phone='".$_REQUEST['phone']."',
				mobile='".$_REQUEST['mobile']."',
				city='".$_REQUEST['city']."',
				state='".$_REQUEST['state']."',
				zip='".$_REQUEST['zip']."',
				country='".$_REQUEST['country']."',
				password='".$_REQUEST['password']."',
				   email='".$_REQUEST['email']."' 
				   where id='".$_REQUEST['id']."'";
				  //echo  $sql;
				  mysql_query($sql);
				   ?>
				   
				   
			   
				   
				   
				   
				  <?php 
				   $msg=1;
		   }
		   
		   if($n>0)
		   {
		   $msg=2;
		   }
	  
	  
	 }
	
	?>
	<?php 
	$show="select * from user where id='".$_GET['id']."' ";
	$qry=mysql_query($show);
	$result=mysql_fetch_array($qry);
	
	?>
<script type="text/javascript" src="js/edituserval.js"></script>
<script type="text/javascript">
function ValidateForm()
{
if(document.getElementById('name').value=='')
{
alert("Pleae enter the   name ");
document.getElementById('name').focus();
return false;
}


if(document.getElementById('mobile').value=='')
{
alert("Pleae enter the mobile number ");
document.getElementById('mobile').focus();
return false;
}
/*var phone1=document.getElementById('hand_phone').value;
var ph=/^[0-9]+$/;
if(!phone1.match(ph))
{
alert("Pleae enter  digit only for the hand phone number feild ");
document.getElementById('hand_phone').focus();
return false;
}
*/




if(document.getElementById('email').value=='')
{
alert("Pleae enter the email ");
document.getElementById('email').focus();
return false;
}
var oldemail=document.getElementById('email').value ;
	if(oldemail.split("@")==oldemail || oldemail.split(".")==oldemail)
	{
	alert("Please enter the correct email address");
	document.getElementById('email').focus();
	return false;
	}



if(document.getElementById('password').value=='')
{
alert("Pleae enter the password ");
document.getElementById('password').focus();
return false;

}


return true;
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="infoBoxContents1">
<tr><td>




<form name="f1" action="" method="post">
<table border="0" cellpadding="3" cellspacing="3" align="center"  width="700">
<?php
if($msg==1)
{
?>
<tr>
<td></td>
<td><font color="green">User's Data Edited Successfuuly</font></td>
</tr>
<?php
}
if($msg==2)
{
?>
<tr>
<td></td>
<td><font color="red">This Email address alredy used in our database..</font></td>
</tr>
<?php
}
?>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td align="right"><font color="red">*</font> Name:</td>
<td><input type="text" name="name" id="name" size="30" value="<?php echo $result['name'];?>"/></td>
</tr>

<tr>
<td align="right"><font color="red">*</font>Email Address:</td>
<td><input type="text" name="email" id="email"  size="30" value="<?php echo $result['email'];?>"/></td>
</tr>



<tr>
<td align="right" valign="top">Address</td>
<td><textarea  name="address" id="address" rows="5" cols="31"/><?php echo $result['address'];?></textarea></td>
</tr>

<tr>
<td align="right">City:</td>
<td><input type="text" name="city" id="city"  size="30" value="<?php echo $result['city'];?>"/></td>
</tr>

<tr>
<td align="right">State:</td>
<td><input type="text" name="state" id="state"  size="30" value="<?php echo $result['state'];?>"/></td>
</tr>
<tr>
    <td align="right">Country Name  </td>

    <td align="left"><select name="country"  id="country"class="finput3">
        <option value="">---- Select ----</option>
		<?php 

  $sql2 = "select * from country where 1 order by printable_name asc";

  $res2 = mysql_query($sql2);

  while($row2 = mysql_fetch_array($res2))

  {

  ?>

  <option value="<?php echo $row2['printable_name'];?>"  <?php if ($row2['printable_name']==$result['country']) {echo "selected";}?>><?php echo $row2['printable_name'];?></option>

 <?php }?>
      </select></td>
  </tr>
<tr>
<td align="right">Postal Code:</td>
<td><input type="text" name="zip" id="zip"  size="30" value="<?php echo $result['zip'];?>"/></td>
</tr>

<tr>
<td align="right">Phone:</td>
<td><input type="text" name="phone" id="phone"  size="30" value="<?php echo $result['phone'];?>"/></td>
</tr>

<tr>
<td align="right"><font color="red">*</font>Mobile:</td>
<td><input type="text" name="mobile" id="mobile"  size="30" value="<?php echo $result['mobile'];?>"/></td>
</tr>

<tr>
<td align="right"><font color="red">*</font> Password:</td>
<td><input type="text" name="password" id="password"  size="30" value="<?php echo $result['password'];?>"/></td>
</tr>


<tr>
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Edit" onclick="return ValidateForm();" class="formbutton"/></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</table>
</form>
</td></tr></table>
<?php include("_foot.php");  ?>