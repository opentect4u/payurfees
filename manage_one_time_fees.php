<?php
session_start();
include("includes/connect.php");
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
<td width="20%" align="center" valign="top">
<?php include("dmenu.php");?>

</td>
<td  width="80%" align="center" valign="top"><h2>Manage One Time Fees</h2>



<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">
<tr>
<th>Sl No.</th>

<th>Academic Details</th>
<th>Academic Year</th>

<th>Total Amount</th>
<th>Fee Code</th>
<th>Action</th>
</tr>
<?php
$s="select * from tbl_fees where 1 and ins_id='".$_SESSION['ins_id']."' order by id desc";
   $r=mysql_query($s);
   $n=mysql_num_rows($r);
   if($n>0)
   {
   $c=1;
   while($d=mysql_fetch_array($r))
   {
   ?>
   <tr>
   <td align="center"><?php echo $c;?></td>
  
 <!--<td align="center"> <?php $rcse=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$d['course_id']."' ")); echo $rcse['course_name']?></td>--> 
  <td align="center"><?php echo $_SESSION['ins_name'];?> -  <?php echo $d['title'];?></td> 
  <td align="center"> <?php echo $d['ses_year'];?></td> 
  <!-- <td align="center"><?php $dt=explode("-",$d['due_date']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>-->
   <td align="center">Rs. <?php
   
   $tot=mysql_fetch_array(mysql_query("select sum(amount) as amount from tbl_fees_data where 1 and fee_id='".$d['id']."'"));
   
    echo $tot['amount'];?></td> 
     <td align="center"> <?php echo $d['fee_code'];?></td> 
   <td align="center"><a href="fee_details.php?id=<?php echo $d['id'];?>" target="_blank">View</a> |  <a href="#">Edit</a> | <a href="#" style="color:#FF0000">Delete</a></td>
   </tr>
   <?php
   $c++;
   }
   }
   else
   {
   ?>
   <tr>
   <td colspan="7" align="center" style="color:#FF0000"> No Record Added Yet</td>
   </tr>
   <?php
   }
   ?>
</table>







</td>
</tr>
</table>
</body>
</html>
