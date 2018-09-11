<?php
	include("_head.php");
	if($_POST['submit'])
		  {
	  
	  $s="select * from tbl_institute where  1 and mobile='".$_REQUEST['mobile']."' and id!='".$_REQUEST['id']."' ";
		$r=mysql_query($s);
		$n=mysql_num_rows($r);
		   if($n==0)
		   {
				  
				   $sql="update tbl_institute set
				  
				  name='".addslashes($_REQUEST['name'])."',
email='".addslashes($_REQUEST['email'])."',
designation='".addslashes($_REQUEST['designation'])."',
mobile='".addslashes($_REQUEST['mobile'])."',
office_email='".addslashes($_REQUEST['office_email'])."',
office_phone='".addslashes($_REQUEST['office_phone'])."',
ins_type='".addslashes($_REQUEST['ins_type'])."',
ins_name='".addslashes($_REQUEST['ins_name'])."',
zip='".addslashes($_REQUEST['zip'])."',
address='".addslashes($_REQUEST['address'])."',
ins_website='".addslashes($_REQUEST['ins_website'])."',
 status='".$_REQUEST['status']."' 
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
	$show="select * from tbl_institute where id='".$_GET['id']."' ";
	$qry=mysql_query($show);
	$result=mysql_fetch_array($qry);
	
	?>
<script type="text/javascript" src="js/edituserval.js"></script>
<script type="text/javascript">
function ValidateForm()
{
if(document.getElementById('ins_name').value=='')
{
alert("Pleae enter the  Intitute name ");
document.getElementById('ins_name').focus();
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
<td><font color="green">Intitutions's Data Edited Successfuuly</font></td>
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
<td align="right"><font color="red">*</font>Name of the Institution:</td>
<td><input type="text" name="ins_name" id="ins_name" size="30" value="<?php echo $result['ins_name'];?>"/></td>
</tr>


<tr>
<td align="right" valign="top">Address</td>
<td><textarea  name="address" id="address" rows="5" cols="31"/><?php echo $result['address'];?></textarea></td>
</tr>

<tr>
<td align="right">PIN Code:</td>
<td><input type="text" name="zip" id="zip"  size="30" value="<?php echo $result['zip'];?>"/></td>
</tr>


<tr>
<td align="right">Institute Type:</td>
<td><select  name="ins_type" id="ins_type"/>
  <option value="">--Select--</option>

  <option value="School" <?php if($result['ins_type']=='School') { echo 'selected'; }?>>School</option>
 <option value="College" <?php if($result['ins_type']=='College') { echo 'selected'; }?>>College</option>
 <option value="University" <?php if($result['ins_type']=='University') { echo 'selected'; }?>>University</option>
 <option value="Coaching Centre" <?php if($result['ins_type']=='Coaching Centre') { echo 'selected'; }?>>Coaching Centre</option>
  </select></td>
</tr>

<tr>
<td align="right">Office Email Id:</td>
<td><input type="text" name="office_email" id="office_email"  size="30" value="<?php echo $result['office_email'];?>"/></td>
</tr>

<tr>
<td align="right">Office Phone No.:</td>
<td><input type="text" name="office_phone" id="office_phone"  size="30" value="<?php echo $result['office_phone'];?>"/></td>
</tr>

<tr>
<td align="right">Institute Website:</td>
<td><input type="text" name="ins_website" id="ins_website"  size="30" value="<?php echo $result['ins_website'];?>"/></td>
</tr>


<tr>
<td align="right"><font color="red">*</font>Name of the Authorised Person:</td>
<td><input type="text" name="name" id="name" size="30" value="<?php echo $result['name'];?>"/></td>
</tr>
<tr>
<td align="right">Designation:</td>
<td><input type="text" name="designation" id="designation"  size="30" value="<?php echo $result['designation'];?>"/></td>
</tr>
<tr>
<td align="right"><font color="red">*</font>Email Address:</td>
<td><input type="text" name="email" id="email"  size="30" value="<?php echo $result['email'];?>"/></td>
</tr>


<tr>
<td align="right">Mobile No.:</td>
<td><input type="text" name="mobile" id="mobile"  size="30" value="<?php echo $result['mobile'];?>"/></td>
</tr>

<!--
<tr>
<td align="right">Password:</td>
<td><input type="text" name="state" id="state"  size="30" value="<?php echo $result['password'];?>" /></td>
</tr>-->


<tr>
<td align="right"><font color="red">*</font> Status:</td>
<td><input type="radio" name="status" id="st1"   value="1" <?php if($result['status']=='1') { echo "checked"; }?>/><b style="color:#009900">Active</b>
<input type="radio" name="status" id="st1"   value="1" <?php if($result['status']=='0') { echo "checked"; }?>/><b style="color:#FF0000">In-Active</b>

</td>
</tr>


<tr>
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Save" onclick="return ValidateForm();" class="formbutton"/></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</table>
</form>
</td></tr></table>
<?php include("_foot.php");  ?>