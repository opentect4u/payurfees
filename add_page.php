<?php
session_start();
include("includes/connect.php");
if($_REQUEST['name'])
{

 $sql="insert into tbl_page set
 ins_id='".addslashes($_SESSION['ins_id'])."',
 page_name='".addslashes($_REQUEST['name'])."',
details='".addslashes($_REQUEST['details'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Page Added successfully..");
location.href="manage_page.php";
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
<td  width="70%" align="center" valign="top"><h2>Add Page</h2>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">






<tr>
<td><b>Page Name:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="name" id="name"/></td>
</tr>

<tr>
<td valign="top"><b>Page Content:</b> <font color="red" size="2">*</font></td>
<td><textarea name="details" id="details" style="width:200px; height:100px;"/></textarea></td>
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





return true;
}
</script>

</tr>
</table>
</body>
</html>
