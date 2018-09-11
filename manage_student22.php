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
<td width="30%" align="center" valign="top">
<?php include("dmenu.php");?>

</td>
<td  width="70%" align="center" valign="top"><h2>Manage Student</h2>



<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">
<tr><td colspan="9">
<form name="aa" action="manage_student.php" method="post">
<b>Name:</b> <input type="text" name="name" /> <b>Roll No.:</b> <input type="text" name="roll_no" />  <b>Reg. No.:</b> <input type="text" name="reg_no" /> <input type="submit" value="Go"/>
</form>

</td></tr>

<tr><td colspan="9">
&nbsp;
</td></tr>
<tr>
<th>Sl No.</th>

<th>Student Name</th>
<th>Roll No.</th>
<th>Class</th>
<th>Reg No.</th>
<th>Course </th>
<th>Sub-Course </th>
<th>Fee Code</th>
<th>Action</th>
</tr>
<?php

if($_REQUEST['name'])
{
$nm='%'.$_REQUEST['name'].'%';
$name1=" and student_name like '".$nm."'";
}
else
{
$name1='';
}


if($_REQUEST['roll_no'])
{
$roll1=" and roll_no='".$_REQUEST['roll_no']."'";
}
else
{
$roll1='';
}

if($_REQUEST['reg_no'])
{
$reg1=" and reg_no='".$_REQUEST['reg_no']."'";
}
else
{
$reg1='';
}

$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit; 


 $s="select * from tbl_student where 1 and ins_id='".$_SESSION['ins_id']."' $name1 $roll1 $reg1 order by id desc LIMIT $start_from, $limit";
   $r=mysql_query($s);
   $n=mysql_num_rows($r);
   if($n>0)
   {
   $c=1;
   while($d=mysql_fetch_array($r))
   {
   ?>
   <tr>
   <td align="center"><?php if($_REQUEST['page']) { echo ((($_REQUEST['page']-1)*$limit)+$c); } else { echo $c; }?></td>
    <td align="center"><?php echo $d['student_name'];?></td>
    
  
   <td align="center"><?php echo $d['roll_no'];?></td>
   
    <td align="center"><?php echo $d['class_name'];?></td>
   <td align="center"><?php echo $d['reg_no'];?></td>
   <td align="center"><?php $cou=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$d['course_name']."'")); echo $cou['course_name'];?></td>
   
    <td align="center"><?php $cou=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$d['sub_course_name']."'")); echo $cou['course_name'];?></td>
    <td align="center"><?php $cou3=mysql_fetch_array(mysql_query("select * from tbl_fees where 1 and   course_id='".$d['course_name']."'"));  echo $cou3['fee_code'];?>
   
   <?php //$dt=explode("-",$d['dob']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>
   <td align="center"><a href="#">Edit</a> | <a href="#" style="color:#FF0000">Delete</a></td>
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



<?php  
$sql2 = "SELECT COUNT(id) FROM tbl_student where 1 and ins_id='".$_SESSION['ins_id']."' $name1 $roll1 $reg1 order by id desc";  
$rs_result2 = mysql_query($sql2);  
$row2 = mysql_fetch_row($rs_result2);  
$total_records = $row2[0]; 
if($total_records%$limit=='0' )
{
$total_pages = ($total_records / $limit);
}
else
{
$total_pages = floor($total_records/$limit)+1; 
} 
$pagLink = "<div class='pagination'>";?><b>Page: </b>
<?php  
for ($i=1; $i<=$total_pages; $i++) {  
             ?>
             <a href='manage_student.php?page=<?php echo $i;?>' <?php if($i==$_REQUEST['page']) {?> style="color:#FF6600; font-weight:bold;" <?php }?> ><?php echo $i;?></a>&nbsp;
             
<?php };  
  echo  "</div>";
?>



</td>
</tr>
</table>
</body>
</html>
