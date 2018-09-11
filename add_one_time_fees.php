<?php
session_start();
include("includes/connect.php");
if($_REQUEST['title'])
{
$maxid=mysql_fetch_array(mysql_query("select max(id) as max_id from tbl_one_time_fees where 1 "));
if($maxid['max_id'])
{
$a=1001+$maxid['max_id'];
}
else
{
$a=1001;
}
  $sql="insert into tbl_one_time_fees set
  fee_code='".addslashes($a)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_id='".addslashes($_REQUEST['course_id'])."',
note='".addslashes($_REQUEST['details'])."',
due_date='".$_REQUEST['year']."-".$_REQUEST['month']."-".$_REQUEST['day']."',
title='".addslashes($_REQUEST['title'])."',
 ses_year='".addslashes($_REQUEST['ses_year'])."',
late_amount='".addslashes($_REQUEST['late_amount'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
$myid=mysql_insert_id();



?>
<script type="text/javascript">
alert("Fees Added successfully..");
location.href="manage_one_time_fees.php";
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
<td  width="70%" align="center" valign="top"><h2>Add One Time Fee Structure </h2>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">










<tr>
<td><b>Institute Name:</b></td>
<td><?php echo $_SESSION['ins_name'];?></td>
</tr>
<tr>
<td><b>Course:</b> <font color="red" size="2">*</font></td>
<td><select name="course_id" id="course_id"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>" style="font-weight:bold; font-size:large"><b><?php echo $d['course_name'];?></b></option>



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

<input type="hidden" name="ses_year" id="ses_year"  readonly="readonly" value="<?php echo (date("Y")-1)?>-<?php echo date("y")?>"/>
<tr>
<td><b>Title:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="title" id="title"/></td>
</tr>
<tr>
<td><b>Late Fee Per Day:</b> </td>
<td><input type="text" name="late_amount" id="late_amount"/></td>
</tr>


<tr>
<td><b>Description:</b></td>
<td><textarea type="text" name="note" id="note"/></textarea></td>
</tr>


<tr><td colspan="2"><h4 style="color:#3300CC">Fee Details</h4></td></tr>
<tr>
<td><b>Fee Type:</b> <font color="red" size="2">*</font></td>
<td><select  name="fee_type" id="fee_type"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['fee_type'];?></option>
<?php
}
?> 
</select>
</td>
</tr>

<tr>
<td><b>Fee Amount:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="amount" id="amt"/></td>
</tr>


<tr>
<td><b>Payment Mode:</b> <font color="red" size="2">*</font></td>
<td><select  name="pmode" id="pmode"/>
<option value="">--select--</option>
<option value="1">Exact Amount</option>
<option value="2">Advanced Amount</option>
<option value="3">Any Amount</option>

</select>
</td>
</tr>


<tr>
<td><b>Payment Frequency:</b> <font color="red" size="2">*</font></td>
<td><select  name="pfre" id="pfre"/>
<option value="">--select--</option>
<option value="1">Monthly</option>  
<option value="2">Quatarly</option>
<option value="3">Half Yearly</option>
<option value="4">Yearly</option>
<option value="5">Onetime</option>   
</select>
</td>
</tr>


<!--
<tr>
<td><b>Description:</b> </td>
<td><textarea type="text" name="details" id="details"/></textarea></td>
</tr>

<tr>
<td><b>Start Date:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="start_date" id="start_date"/></td>
</tr>

<tr>
<td><b>End Date:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="end_date" id="end_date"/></td>
</tr>-->

<tr>
<td><b>Due Date:</b> </td>
<td>
      <label>
      <select name="day" id="day">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<=31;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
      </label> 
      <label><input type="hidden" name="month" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year" value="<?php echo date("Y");?>"/></label>     </td>

</tr>




















<tr>
<td colspan="2"><h4 style="color:#3300CC">Additional Option 1 </h4></td>
</tr>

<tr>
<td><b>Fees Type :</b> </td>
<td><select  name="fee_type1" id="fee_type1"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['fee_type'];?></option>
<?php
}
?> 
</select>
</td>
</tr>
<tr>
<td><b>Fee Amount :</b> </td>
<td><input type="text" name="amount1" id="amt1"/></td>
</tr>


<tr>
<td><b>Payment Mode:</b> <font color="red" size="2">*</font></td>
<td><select  name="pmode1" id="pmode1"/>
<option value="">--select--</option>
<option value="1">Exact Amount</option>
<option value="2">Advanced Amount</option>
<option value="3">Any Amount</option>

</select>
</td>
</tr>


<tr>
<td><b>Payment Frequency:</b> <font color="red" size="2">*</font></td>
<td><select  name="pfre1" id="pfre1"/>
<option value="">--select--</option>
<option value="1">Monthly</option>  
<option value="2">Quatarly</option>
<option value="3">Half Yearly</option>
<option value="4">Yearly</option>
<option value="5">Onetime</option>   
</select>
</td>
</tr>
<tr>
<td><b>Due Date:</b> </td>
<td> <label>
      <select name="day1" id="day1">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<=31;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
      </label> 
      <label><input type="hidden" name="month1" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year1" value="<?php echo date("Y");?>"/></label></td>
</tr>



<tr>
<td colspan="2"><h4 style="color:#3300CC">Additional Option 2 </h4></td>
</tr>

<tr>
<td><b>Fees Type :</b> </td>
<td><select  name="fee_type2" id="fee_type2"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['fee_type'];?></option>
<?php
}
?> 
</select>
</td>
</tr>
<tr>
<td><b>Fee Amount :</b> </td>
<td><input type="text" name="amount2" id="amt2"/></td>
</tr>

<tr>
<td><b>Payment Mode:</b> <font color="red" size="2">*</font></td>
<td><select  name="pmode2" id="pmode2"/>
<option value="">--select--</option>
<option value="1">Exact Amount</option>
<option value="2">Advanced Amount</option>
<option value="3">Any Amount</option>

</select>
</td>
</tr>


<tr>
<td><b>Payment Frequency:</b> <font color="red" size="2">*</font></td>
<td><select  name="pfre2" id="pfre2"/>
<option value="">--select--</option>
<option value="1">Monthly</option>  
<option value="2">Quatarly</option>
<option value="3">Half Yearly</option>
<option value="4">Yearly</option>
<option value="5">Onetime</option>   
</select>
</td>
</tr>

<tr>
<td><b>Due Date:</b> </td>
<td> <label>
      <select name="day2" id="day2">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<=31;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
      </label> 
      <label><input type="hidden" name="month2" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year2" value="<?php echo date("Y");?>"/></label></td>
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


if(document.getElementById('course_id').value=='')
{
alert("Please enter the  Course Name ");
document.getElementById('course_id').focus();
return false;
}



if(document.getElementById('title').value=='')
{
alert("Please enter the  Title ");
document.getElementById('title').focus();
return false;
}






if(document.getElementById('fee_type').value=='')
{
alert("Please enter the Fee Type");
document.getElementById('fee_type').focus();
return false;
}

if(document.getElementById('amt').value=='')
{
alert("Please enter the Amount");
document.getElementById('amt').focus();
return false;
}




if(document.getElementById('pmode').value=='')
{
alert("Please enter the payment Mode");
document.getElementById('pmode').focus();
return false;
}

if(document.getElementById('pfre').value=='')
{
alert("Please enter the payment Frequency");
document.getElementById('pfre').focus();
return false;
}
return true;
}
</script>

</tr>
</table>
</body>
</html>
