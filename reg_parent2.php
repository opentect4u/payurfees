<?php
session_start();
include("includes/connect.php");
if($_REQUEST['name'])
{
$same_num=mysql_num_rows(mysql_query("select * from tbl_parent where 1 and mobile='".addslashes($_REQUEST['mobile'])."'"));
$same_num2=mysql_num_rows(mysql_query("select * from tbl_parent where 1 and password='".addslashes($_REQUEST['password'])."'"));
if($same_num=='0')
{
 $sql="insert into tbl_parent set
 
 ins_id='".addslashes($_SESSION['ins_id'])."',
name='".addslashes($_REQUEST['name'])."',
password='".addslashes($_REQUEST['password'])."',
email='".addslashes($_REQUEST['email'])."',
mobile='".addslashes($_REQUEST['mobile'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Parent Added successfully..");
location.href="log_parent.php";
</script>
<?php
}
else
{
$msg=2;
}

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pareent Signup</title>


    
</head>

<body>
<h3>Registration to Pay Fees</h3>
<?php
if($msg=='2')
{
?>
<p align="center" style="color:#FF0000">Same Mobile No.  is already used in our database </p>
<?php
}
?>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">






<tr>
<td width="27%"><b>Name:</b> <font color="red" size="2">*</font></td>
<td width="73%"><input type="text" name="name" id="name"/></td>
</tr>



<tr>
<td><b>Email:</b> </td>
<td><input type="text" name="email" id="email"/></td>
</tr>





<tr>
<td><b>Mobile No.:</b>  <font color="red" size="2">*</font></td>
<td><input type="text" name="mobile" id="mobile"/></td>
</tr>



<tr>
<td><b>Password:</b>  <font color="red" size="2">*</font></td>
<td><input type="password" name="password" id="password"/></td>
</tr>

<tr>
<td><b>Re-Password:</b> <font color="red" size="2">*</font> </td>
<td><input type="password" name="cpassword" id="cpassword"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Submit" onClick="return test1();"/></td>
</tr>

</table>
</form>

<script type="text/javascript" >
function test1()
{


if(document.getElementById('name').value=='')
{
alert("Please enter the   Name");
document.getElementById('name').focus();
return false;
}

if(document.getElementById('email').value=='')
{
alert("Please enter the  Email Address");
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
/*
if(document.getElementById('email').value=='')
{
alert("Please enter the  Email Address");
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

if(document.getElementById('mobile').value=='')
{
alert("Please enter the  Mobile No.");
document.getElementById('mobile').focus();
return false;
}

if(document.getElementById('mobile').value.length!='10')
{
alert("Please enter the  Mobile No 10 Digit No.");
document.getElementById('mobile').focus();
return false;
}	
	var mobexp1 =/^[0-9]+$/;
if (! document.getElementById('mobile').value.match(mobexp1))
{
alert("please enter number only for mobile feild");
 //document.getElementById('mobile').value='';
document.getElementById('mobile').focus();
return false ;
}
*/

if(document.getElementById('mobile').value=='')
{
alert("Please enter the Mobile No.");
document.getElementById('mobile').focus();
return false;
}
if(document.getElementById('mobile').value.length!='10')
{
alert("Please enter the  Mobile No 10 Digit No.");
document.getElementById('mobile').focus();
return false;
}	
	var mobexp1 =/^[0-9]+$/;
if (! document.getElementById('mobile').value.match(mobexp1))
{
alert("please enter number only for mobile feild");
 //document.getElementById('mobile').value='';
document.getElementById('mobile').focus();
return false ;
}
if(document.getElementById('password').value=='')
{
alert("Please enter the Password");
document.getElementById('password').focus();
return false;
}
var paswd=/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]{5,})$/;
//var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,8}$/;  
if(!document.getElementById('password').value.match(paswd))   
{   
alert('Enter Password which must be minimum 5 character ,containing at least 1 character 1 number')  
return false;  
}  
if(document.getElementById('cpassword').value=='')
{
alert("Please enter the Re-Password");
document.getElementById('cpassword').focus();
return false;
}

if(document.getElementById('password').value!=document.getElementById('cpassword').value)
{
alert("Do not match  Password and Re-Password");
document.getElementById('cpassword').focus();
return false;
}

return true;
}
</script>


</body>
</html>
