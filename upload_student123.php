<?php
session_start();
include("includes/connect.php");
if($_REQUEST['name'])
{

 $sql="insert into tbl_student set
 ins_id='".addslashes($_REQUEST['ins_id'])."',
 course_name='".addslashes($_REQUEST['name'])."',

doj='".date("Y-m-d")."'";
//mysql_query($sql);
?>
<script type="text/javascript">
alert("Course Added successfully..");
//location.href="manage_course.php";
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
<h3><?php echo $_SESSION['ins_name'];?> loogedin as Institute</h3>

<table border="1" cellpadding="1" cellspacing="2" align="center" width="80%">
<tr>
<td width="30%" align="center" valign="top">
<?php include("dmenu.php");?>

</td>
<td  width="70%" align="center" valign="top"><h2>Import Student Details</h2>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">






<tr>
<td><b>Select CSV File:</b> <font color="red" size="2">*</font></td>
<td><input type="file" name="file1" id="file1"/></td>
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
if(document.getElementById('file1').value=='')
{
alert("Please up[load the CSv File ");
document.getElementById('file1').focus();
return false;
}

if(document.getElementById('name').value=='')
{
alert("Please enter the  Course/Class Name");
document.getElementById('name').focus();
return false;
}

return true;
}
</script>

</tr>
</table>
</body>
</html>
