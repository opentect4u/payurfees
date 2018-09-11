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
 pid='0',
  year_reg='".addslashes($_REQUEST['year_reg'])."',
   reg_no='".addslashes($_REQUEST['reg_no'])."',
    roll_no='".addslashes($_REQUEST['roll_no'])."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_name='".addslashes($_REQUEST['course_name'])."',
 sub_course_name='".addslashes($_REQUEST['sub_course_name'])."',
student_name='".addslashes($_REQUEST['name'])."',
date_of_birth='".$_REQUEST['day']."-".$_REQUEST['month']."-".$_REQUEST['year']."',
dob='".$_REQUEST['year']."-".$_REQUEST['month']."-".$_REQUEST['day']."',
class_name='".addslashes($_REQUEST['class_name'])."',

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
<script type="text/javascript">
var xmlhttp;

function showUser(str)
{
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="get_sub_course.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
{
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>


    
</head>

<body>
<h3><span style="color:#990000"> <?php echo $_SESSION['ins_name'];?></span> logged in as Institute </h3>

<table border="1" cellpadding="1" cellspacing="2" align="center" width="80%">
<tr>
<td width="30%" align="center" valign="top">
<?php include("dmenu.php");?>

</td>
<td  width="70%" align="center" valign="top"><h2>Add Student</h2>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">


<!--
<tr>
<td><b>Under Parent:</b> <font color="red" size="2">*</font></td>
<td><select name="pid" id="pid"/>
<option value="">--select--</option>
<?php
$s6="select * from tbl_parent where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r6=mysql_query($s6);
while($d6=mysql_fetch_array($r6))
{
?>
<option value="<?php echo $d6['id'];?>"><?php echo $d6['name'];?> [<?php echo $d6['mobile'];?>]</option>


<?php
}
?>
</select></td>
</tr>-->


<tr>
<td><b>Name of the Student:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="name" id="name"/></td>
</tr>



<tr>
<td><b>Academic Year:</b> <font color="red" size="2">*</font></td>
<td><select  name="year_reg" id="year_reg"/>
<option value="">--select--</option>

<?php
for($yy=2017;$yy<2030;$yy++)
{
?>
<option value="<?php echo $yy;?>-<?php echo substr(($yy+1),2);?>"><?php echo $yy;?>-<?php echo substr(($yy+1),2);?></option>
<?php
}
?>
</select>
</td>
</tr>



<tr>
<td><b>Registration No.:</b> </td>
<td><input type="text" name="reg_no" id="reg_no"/></td>
</tr>

<tr>
<td><b>Roll No.:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="roll_no" id="roll_no"/></td>
</tr>


<tr>
<td><b>Class:</b><font color="red" size="2">*</font> </td>
<td><input type="text" name="class_name" id="class_name"/></td>
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
<td><b>Course:</b> <font color="red" size="2">*</font></td>
<td><select name="course_name" id="course_name" onChange="showUser(this.value)"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['course_name'];?></option>


<?php
}
?>

</select><br/><div id="txtHint"></div></td>
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


if(document.getElementById('class_name').value=='')
{
alert("Please enter the  Class Name.");
document.getElementById('class_name').focus();
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

if(document.getElementById('pid_num').value!='0')
{
	if(document.getElementById('sub_course_name').value=='')
	{
	alert("Please select the Sub Course Name");
	document.getElementById('sub_course_name').focus();
	return false;
	}
}
return true;
}
</script>

</tr>
</table>
</body>
</html>
