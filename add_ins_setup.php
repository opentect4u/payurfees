<?php
session_start();
include("includes/connect.php");
if($_REQUEST['location'])
{

  $sql="insert into tbl_ins_setup set
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_name='".addslashes($_REQUEST['course_id'])."',
year_name='".addslashes($_REQUEST['year_name'])."',
div_name='".addslashes($_REQUEST['div_name'])."',
term_name='".addslashes($_REQUEST['term_name'])."',
location='".addslashes($_REQUEST['location'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Institute Setup Added successfully..");
location.href="manage_ins_setup.php";
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
<td  width="70%" align="center" valign="top"><h2>Add Institute Setup</h2>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">









<tr>
<td><b>Location:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="location" id="location"/></td>
</tr>


<tr>
<td><b>Course Name:</b> <font color="red" size="2">*</font></td>
<td><select name="course_id" id="course_id"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and pid='0' and ins_id='".$_SESSION['ins_id']."'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['course_name'];?></option>

<?php
$s="select * from tbl_course where 1 and pid='".$d['id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>">---<?php echo $d['course_name'];?></option>
<?php
}
?> 
<?php
}
?>
</select></td>
</tr>




<tr>
<td><b>Year Name:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="year_name" id="year_name"/></td>
</tr>

<tr>
<td><b>Term Name:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="term_name" id="term_name"/></td>
</tr>

<tr>
<td><b>Division Name:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="div_name" id="div_name"/></td>
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

if(document.getElementById('location').value=='')
{
alert("Please enter the  Location ");
document.getElementById('location').focus();
return false;
}



if(document.getElementById('course_id').value=='')
{
alert("Please enter the  Course Name ");
document.getElementById('course_id').focus();
return false;
}












if(document.getElementById('year_name').value=='')
{
alert("Please enter the Year Name");
document.getElementById('amt').focus();
return false;
}

if(document.getElementById('term_name').value=='')
{
alert("Please enter the Term Name");
document.getElementById('term_name').focus();
return false;
}

if(document.getElementById('div_name').value=='')
{
alert("Please enter the Division Name");
document.getElementById('div_name').focus();
return false;
}


return true;
}
</script>

</tr>
</table>
</body>
</html>
