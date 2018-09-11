<?php
session_start();
include("includes/connect.php");
if($_REQUEST['name'])
{
 if ($_FILES['file1']['name'])
               {
		               $file_name=(date("Y.m.d_H-i-s") .$_FILES['file1']['name']);
	      $file_name = str_replace(' ', '_', $file_name);
	      copy($_FILES['file1']['tmp_name'], "product_image/$file_name"); 
	        }	 
	     else
	       {
	     $file_name="";
	      }
 $sql="insert into tbl_student set
  year_reg='".addslashes($_REQUEST['year_reg'])."',
   reg_no='".addslashes($_REQUEST['reg_no'])."',
    roll_no='".addslashes($_REQUEST['roll_no'])."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_name='".addslashes($_REQUEST['course_name'])."',
student_name='".addslashes($_REQUEST['name'])."',
date_of_birth='".$_REQUEST['day']."-".$_REQUEST['month']."-".$_REQUEST['year']."',
dob='".$_REQUEST['year']."-".$_REQUEST['month']."-".$_REQUEST['day']."',

email='".addslashes($_REQUEST['email'])."',
mobile='".addslashes($_REQUEST['mobile'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Student Added successfully..");
location.href="manage_student.php";
</script>
<?php
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>


    
</head>

<body>
<h3>Hi <?php echo $_SESSION['ins_name'];?> as Institute</h3>

<table border="1" cellpadding="1" cellspacing="2" align="center" width="80%">
<tr>
<td width="30%" align="center" valign="top">
<?php include("dmenu.php");?>

</td>
<td  width="70%" align="center" valign="top"><h2>Add Student</h2>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">






<tr>
<td><b>Name of the Student:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="name" id="name"/></td>
</tr>



<tr>
<td><b>Academic Year:</b> <font color="red" size="2">*</font></td>
<td><select  name="year_reg" id="year_reg"/>
<option value="">--select--</option>
<option value="<?php echo (date("Y")-1);?>-<?php echo date("y");?>"><?php echo (date("Y")-1);?>-<?php echo date("y");?></option>
<option value="<?php echo date("Y");?>-<?php echo (date("y")+1);?>"><?php echo date("Y");?>-<?php echo (date("y")+1);?></option>
</select>
</td>
</tr>



<tr>
<td><b>Registration No.:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="reg_no" id="reg_no"/></td>
</tr>

<tr>
<td><b>Roll No.:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="roll_no" id="roll_no"/></td>
</tr>
<tr>
<td><b>Date Of Birth:</b> <font color="red" size="2">*</font></td>
<td><table width="49%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <label>
      <select name="day" id="day">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<32;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
      </label>      </td>
    <td align="center"><label>
        <select name="month" id="month">
          <option value="">Month</option>
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
        </select>
        </label></td>
    <td align="right"><label>
        <select name="year" id="year">
          <option value="">Year</option>
          <?php
for($n4=1960;$n4<2017;$n4++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n4);?>"><?php echo sprintf("%02d",$n4);?></option>
    <?php
}
?>
        </select>
        </label></td>
  </tr>
</table></td>
</tr>

<tr>
<td><b>Email:</b> </td>
<td><input type="text" name="email" id="email"/></td>
</tr>

<tr>
<td><b>Mobile No.:</b> </td>
<td><input type="text" name="mobile" id="mobile"/></td>
</tr>



<tr>
<td><b>Name of the Institute:</b></td>
<td><?php echo $_SESSION['ins_name'];?></td>
</tr>
<tr>
<td><b>Class/Course:</b> <font color="red" size="2">*</font></td>
<td><select name="course_name" id="course_name"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['course_name'];?></option>



<?php
$s2="select * from tbl_course where 1 and   pid='".$d['id']."'";
$r2=mysql_query($s2);
while($d2=mysql_fetch_array($r2))
{
?>
<option value="<?php echo $d2['id'];?>">---<?php echo $d2['course_name'];?></option>
<?php
}
?> 
<?php
}
?>
</select></td>
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
alert("Please enter the  Student Name");
document.getElementById('name').focus();
return false;
}

if(document.getElementById('year_reg').value=='')
{
alert("Please select the  Academic Year");
document.getElementById('year_reg').focus();
return false;
}


if(document.getElementById('reg_no').value=='')
{
alert("Please enter the  Registration No.");
document.getElementById('reg_bo').focus();
return false;
}

if(document.getElementById('roll_no').value=='')
{
alert("Please enter the  Roll No.");
document.getElementById('roll_no').focus();
return false;
}
var str=document.getElementById('name').value;
        for (var i = 0; i < str.length; i++)
{
var ch = str.substring(i, i + 1);
    if (((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && ch != ' ')
    {
    alert("The Student Name field only accepts letters & spaces.");
    document.getElementById('name').focus();
    return false;
    }
}


if(document.getElementById('day').value=='')
{
alert("Please select the Day of Date of Birth");
document.getElementById('day').focus();
return false;
}

if(document.getElementById('month').value=='')
{
alert("Please select the Month of Date of Birth");
document.getElementById('month').focus();
return false;
}

if(document.getElementById('year').value=='')
{
alert("Please select the Year of Date of Birth");
document.getElementById('year').focus();
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

if(document.getElementById('course_name').value=='')
{
alert("Please select the Course Name");
document.getElementById('course_name').focus();
return false;
}


return true;
}
</script>

</tr>
</table>
</body>
</html>
