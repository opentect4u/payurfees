<?php
session_start();
include("includes/connect.php");
if($_REQUEST['ins_name'])
{
$same_num=mysql_num_rows(mysql_query("select * from tbl_institute where 1 and mobile='".addslashes($_REQUEST['mobile'])."'"));
if($same_num=='0')
{

 $sql_user="insert into tbl_institute set
zip='".addslashes($_REQUEST['zip'])."',
ins_name='".addslashes($_REQUEST['ins_name'])."',
ins_type='".addslashes($_REQUEST['ins_type'])."',
address='".addslashes($_REQUEST['address'])."',
office_email='".addslashes($_REQUEST['off_email'])."',
office_phone='".addslashes($_REQUEST['off_mobile'])."',
ins_website='".addslashes($_REQUEST['off_website'])."',
head_name='".addslashes($_REQUEST['head_name'])."',




name='".addslashes($_REQUEST['name'])."',
designation='".addslashes($_REQUEST['designation'])."',
mobile='".addslashes($_REQUEST['mobile'])."',
email='".addslashes($_REQUEST['email'])."',

password='".addslashes($_REQUEST['password'])."',



doj='".date("Y-m-d")."' ";
mysql_query($sql_user);
 $myid = mysql_insert_id();
 $_SESSION['ins_id'] = $myid;
 $_SESSION['ins_name'] = $_REQUEST['ins_name'];
	$msg=1;		   
?>
<script type="application/javascript">
location.href="dashboard.php";
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
<title>Welcome To pay your fees</title>
</head>

<body>
<center>
<h2> Institute's Registration</h2>
<?php
if($msg=='2')
{
?>
<p align="center" style="color:#FF0000">Same Mobile No. of Authorised Person is already used in our database </p>
<?php
}
?>
<form name="aa" action="" method="post">
<table width="0%" border="0" cellspacing="4" cellpadding="5">


  <tr>
  <td ><b>Name of the Institution</b></td>
  <td ><input type="text" name="ins_name" id="ins_name"/></td>
  </tr>
  
  
  
    <tr>
  <td ><b>Address</b></td>
  <td ><input type="text" name="address" id="address"/></td>
  </tr>
  
   <tr>
  <td ><b>PIN Code</b></td>
  <td ><input type="text" name="zip" id="zip"/></td>
  </tr>
  
    <tr>
  <td ><b>Institute Type</b></td>
  <td ><select  name="ins_type" id="ins_type"/>
  <option value="">--Select--</option>

  <option value="School">School</option>
 <option value="College">College</option>
 <option value="University">University</option>
 <option value="Coaching Centre">Coaching Centre</option>
  </select></td>
  </tr>
  
  
  
   <tr>
  <td><b>Office Phone No.</b> </td>
  <td><input type="text" name="off_mobile" id="off_mobile"/></td>
  </tr>
  
  
   <tr>
  <td><b>Office Email Id</b></td>
  <td><input type="text" name="off_email" id="off_email"/></td>
  </tr>
  
  
   <tr>
  <td><b>Institute's Website</b></td>
  <td><input type="text" name="off_website" id="off_website"/></td>
  </tr>
   <!-- <tr>
  <td><b>Institute Head Name</b></td>
  <td><input type="text" name="head_name" id="head_name"/></td>
  </tr>-->
  
   <tr>
  <td width="177"><b>Name of the Authorised Person</b></td>
  <td width="284"><input type="text" name="name" id="name"/></td>
  </tr>
   <tr>
  <td width="177"><b>Designation</b></td>
  <td width="284"><input type="text" name="designation" id="designation"/></td>
  </tr>
   <tr>
  <td width="177"><b>Email</b></td>
  <td width="284"><input type="text" name="email" id="email"/></td>
  </tr>
 
   <tr>
  <td width="177"><b> Mobile No.</b></td>
  <td width="284"><input type="text" name="mobile" id="mobile"/></td>
  </tr>
  
  
  
  
   <tr>
  <td><b>Password</b></td>
  <td><input type="password" name="password" id="password"/></td>
  </tr>
  
    <tr>
  <td><b>Re-type Password</b></td>
  <td><input type="password" name="cpassword" id="cpassword"/></td>
  </tr>
    <tr>
  <td>&nbsp;</td>
  <td><input type="submit" name="submit" id="submit" value="Submit" onClick="return validate();"/></td>
  </tr>
  
  
  </table>
  </form>
  
  <script type="text/javascript" >
function validate()
{


if(document.getElementById('ins_name').value=='')
{
alert("Please enter the  Institute name");
document.getElementById('ins_name').focus();
return false;
}
var str5=document.getElementById('ins_name').value;
        for (var i = 0; i < str5.length; i++)
{
var ch = str5.substring(i, i + 1);
    if (((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && ch != ' ')
    {
    alert("The Institute Name field only accepts letters & spaces.");
    document.getElementById('ins_name').focus();
    return false;
    }
}

if(document.getElementById('address').value=='')
{
alert("Please enter the  Institute Address");
document.getElementById('address').focus();
return false;
}
if(document.getElementById('zip').value=='')
{
alert("Please enter the  PIN Code");
document.getElementById('zip').focus();
return false;
}

if(document.getElementById('ins_type').value=='')
{
alert("Please choose the  Institute Type");
document.getElementById('ins_type').focus();
return false;
}

if(document.getElementById('off_mobile').value=='')
{
alert("Please enter the  Office Phone No.");
document.getElementById('off_mobile').focus();
return false;
}

/*
if(document.getElementById('head_name').value=='')
{
alert("Please enter the Institute Head Name");
document.getElementById('head_name').focus();
return false;
}
*/
if(document.getElementById('name').value=='')
{
alert("Please enter the  Contact Person Name");
document.getElementById('name').focus();
return false;
}

var str=document.getElementById('name').value;
        for (var i = 0; i < str.length; i++)
{
var ch = str.substring(i, i + 1);
    if (((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && ch != ' ')
    {
    alert("The Name field only accepts letters & spaces.");
    document.getElementById('name').focus();
    return false;
    }
}


if(document.getElementById('designation').value=='')
{
alert("Please enter the  Contact Person Designation");
document.getElementById('designation').focus();
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



if(document.getElementById('password').value=='')
{
alert("Please enter the Password");
document.getElementById('password').focus();
return false;
}

var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,8}$/;  
if(!document.getElementById('password').value.match(paswd))   
{   
alert('Input password between 5 to 8 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character')  
return false;  
}  



if(document.getElementById('cpassword').value=='')
{
alert("Please enter the Re-type Password");
document.getElementById('cpassword').focus();
return false;
}

if(document.getElementById('password').value!=document.getElementById('cpassword').value)
{
alert("Password and Re-type Password do not match");
document.getElementById('cpassword').focus();
return false;
}


return true;
}
</script>
  </center>
</body>
</html>
