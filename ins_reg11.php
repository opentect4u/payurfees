<?php
session_start();
include("includes/connect.php");
if($_REQUEST['ins_name'])
{
 $same_num=mysql_num_rows(mysql_query("select * from tbl_institute where 1 and mobile='".addslashes($_REQUEST['mobile'])."'"));
 $same_num2=mysql_num_rows(mysql_query("select * from tbl_institute where 1 and ins_name='".addslashes($_REQUEST['ins_name'])."'"));
if($same_num=='0' && $same_num2=='0')
{

 $sql_user="insert into tbl_institute set
 st_month='".addslashes($_REQUEST['st_month'])."',
 st_year='".addslashes($_REQUEST['st_year'])."',
 en_month='".addslashes($_REQUEST['en_month'])."',
 en_year='".addslashes($_REQUEST['en_year'])."',
 
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
 //$myid = mysql_insert_id();
 //$_SESSION['ins_id'] = $myid;
// $_SESSION['ins_name'] = $_REQUEST['ins_name'];
	$msg=1;		   
?>
<script type="application/javascript">
location.href="thanks-reg.php";
</script>
<?php
}
else
{
if($same_num2!='0')
{
$msg3=3;
}
if($same_num!='0')
{
$msg2=2;
}
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
if($msg3=='3')
{
?>
<p align="center" style="color:#FF0000">Same Institute Name is already used in our database </p>
<?php
}
?>
<?php
if($msg2=='2')
{
?>
<p align="center" style="color:#FF0000">Same Mobile No. of Authorised Person is already used in our database </p>
<?php
}
?>
<form name="aa" action="" method="post">
<table width="0%" border="0" cellspacing="4" cellpadding="5">


  <tr>
  <td ><b>Name of the Institution</b> <font size="2" color="#FF0000">*</font></td>
  <td ><input type="text" name="ins_name" id="ins_name"/></td>
  </tr>
  
   <tr>
  <td ><b>Session Start</b> <font size="2" color="#FF0000">*</font></td>
  <td ><select name="st_month" id="st_month">
         
          <option value="01">Jan</option>
  <option value="02">Feb</option>
  <option value="03">Mar</option>
  <option value="04">Apr</option>
  <option value="05">May</option>
  <option value="06">Jun</option>
  <option value="07">Jul</option>
  <option value="08">Aug</option>
  <option value="09">Sep</option>
  <option value="10">Oct</option>
  <option value="11">Nov</option>
  <option value="12">Dec</option>
        </select>-<select name="st_year" id="st_year"/>
        <?php
		for($i2=2018;$i2<=2030;$i2++)
		{
		?> <option value="<?php echo $i2;?>"><?php echo $i2;?></option>
        <?php
		}
		?>
        </select></td>
  </tr>
  
  
    <tr>
  <td ><b>Session End </b> <font size="2" color="#FF0000">*</font></td>
  <td ><select name="en_month" id="en_month">
         
          <option value="01">Jan</option>
  <option value="02">Feb</option>
  <option value="03">Mar</option>
  <option value="04">Apr</option>
  <option value="05">May</option>
  <option value="06">Jun</option>
  <option value="07">Jul</option>
  <option value="08">Aug</option>
  <option value="09">Sep</option>
  <option value="10">Oct</option>
  <option value="11">Nov</option>
  <option value="12" selected="selected">Dec</option>
        </select>-<select name="en_year" id="en_year"/>
        <?php
		for($i3=2018;$i3<=2030;$i3++)
		{
		?> <option value="<?php echo $i3;?>"><?php echo $i3;?></option>
        <?php
		}
		?>
        </select></td>
  </tr>
  
  
    <tr>
  <td ><b>Address</b> <font size="2" color="#FF0000">*</font></td>
  <td ><input type="text" name="address" id="address"/></td>
  </tr>
  
   <tr>
  <td ><b>PIN Code</b> <font size="2" color="#FF0000">*</font></td>
  <td ><input type="text" name="zip" id="zip"/></td>
  </tr>
  
    <tr>
  <td ><b>Type of Institution</b> <font size="2" color="#FF0000">*</font></td>
  <td ><select  name="ins_type" id="ins_type"/>
  <option value="">--Select--</option>

  <option value="School">School</option>
 <option value="College">College</option>
 <option value="University">University</option>
 <option value="Coaching Centre">Coaching Centre</option>
  </select></td>
  </tr>
  
  
  
   <tr>
  <td><b>Office Phone No.</b> <font size="2" color="#FF0000">*</font> </td>
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
  <td width="177"><b>Name of the Authorised Person</b> <font size="2" color="#FF0000">*</font></td>
  <td width="284"><input type="text" name="name" id="name"/></td>
  </tr>
   <tr>
  <td width="177"><b>Designation</b> <font size="2" color="#FF0000">*</font></td>
  <td width="284"><input type="text" name="designation" id="designation"/></td>
  </tr>
   <tr>
  <td width="177"><b>Email</b> </td>
  <td width="284"><input type="text" name="email" id="email"/></td>
  </tr>
 
   <tr>
  <td width="177"><b> Mobile No.</b> <font size="2" color="#FF0000">*</font></td>
  <td width="284"><input type="text" name="mobile" id="mobile"/></td>
  </tr>
  
  
  
  
   <tr>
  <td><b>Password</b> <font size="2" color="#FF0000">*</font></td>
  <td><input type="password" name="password" id="password"/></td>
  </tr>
  
    <tr>
  <td><b>Re-type Password</b> <font size="2" color="#FF0000">*</font></td>
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
/*var str5=document.getElementById('ins_name').value;
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
*/
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


if(document.getElementById('zip').value.length!='6')
{
alert("Please enter the  PIN Code 6 Digit No.");
document.getElementById('zip').focus();
return false;
}	
	var mobexp12 =/^[0-9]+$/;
if (! document.getElementById('zip').value.match(mobexp12))
{
alert("please enter digit only for PIN Code feild");
 //document.getElementById('mobile').value='';
document.getElementById('zip').focus();
return false ;
}

if(document.getElementById('ins_type').value=='')
{
alert("Please choose the  Type of Institution");
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


if(document.getElementById('email').value!='')
{

var oldemail=document.getElementById('email').value ;
	if(oldemail.split("@")==oldemail || oldemail.split(".")==oldemail)
	{
	alert("Please enter the correct email address");
	document.getElementById('email').focus();
	return false;
	}
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
var paswd=/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]{5,})$/;
//var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,8}$/;  
if(!document.getElementById('password').value.match(paswd))   
{   
alert('Enter Password which must be minimum 5 character ,containing at least 1 character 1 number')  
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
