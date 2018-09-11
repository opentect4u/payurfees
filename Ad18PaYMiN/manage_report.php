<?php
include("_head.php"); 
?>
<div><script language="javascript" src="cal2.js">
/*
Xin's Popup calendar script-  Xin Yang (http://www.yxscripts.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/
</script>
<script language="javascript" src="cal_conf2.js"></script>

<form name="sampleform" action="" method="post">
<b>From Date: </b> <input type="text" name="firstinput" id='firstinput' size=20> <small><a href="javascript:showCal('Calendar1')">Select Date</a></small>
<b>To Date: </b> <input type="text" name="secondinput" id='secondinput' size=20> <small><a href="javascript:showCal('Calendar2')">Select Date</a></small>
<select name='ins_id'>
<option value="">-- select Institute---</option>
<?php
$spi="select * from tbl_institute where 1 order by ins_name";
$rpi=mysql_query($spi);
while($dpi=mysql_fetch_array($rpi))
{
?>
<option value="<?php echo $dpi['id'];?>"><?php echo $dpi['ins_name'];?></option>
<?php
}
?>
</select>
<input  type="submit" name="search" value="Search" onclick="return test1();"/>
</form>
</div>
<table width="0%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" valign="middle" class="brown_text_big">Report Management </td>
	<td align="left" valign="middle"><img src="images/icon.gif" alt="TMC" /></td>
    <td align="left" valign="middle" class="select_txt">Report generation</td>
  </tr>
</table></div>
<!--<p>&nbsp;</p>-->
<?php
if($_REQUEST['firstinput'] || $_REQUEST['secondinput'])
{
?>
<h4 style="color:#0033CC">Payment Report Between  
  <?php $dt1=explode("-",$_REQUEST['firstinput']); echo $dt1['2']."/".$dt1['1']."/".$dt1['0']; ?> to  <?php $dt2=explode("-",$_REQUEST['secondinput']); echo $dt2['2']."/".$dt2['1']."/".$dt2['0']; ?></h4>

<hr>

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">

<thead style="background:#2e88c6; color:#FFFFFF">
<tr>
<th>Sl No.</th>
<th>Institution</th>
<th>Payment Date</th>
<th>Payment Mode</th>
<th>Name</th>
<th>Class/ Course</th>
<th>Section</th>
<th>Roll No.</th>
<th>Registration No</th>
<th>Fee Type</th>
<th>Fee Period</th>
<th>Amount Paid</th>

</tr>
</thead>
<?php
if($_REQUEST['ins_id'])
{
$s="select * from tbl_collect_fees where 1 and ins_id='".$_REQUEST['ins_id']."' and payment_date>='".$_REQUEST['firstinput']."' and payment_date<='".$_REQUEST['secondinput']."'  order by id desc";
}
else
{
 $s="select * from tbl_collect_fees where 1 and payment_date>='".$_REQUEST['firstinput']."' and payment_date<='".$_REQUEST['secondinput']."'  order by id desc";
}

$r=mysql_query($s);
$n=mysql_num_rows($r);
if($n>0)
{
$cn=1;
$tot=0;
while($d=mysql_fetch_array($r))
{
if($cn%2=='0')
{
$bg='#fefefe';
}
else
{
$bg='#ececec';
}
?>
<tr bgcolor="<?php echo $bg;?>">
<td><?php echo $cn;?></td>
<td><?php  $intda=mysql_fetch_array(mysql_query("select * from tbl_institute where  id='".$d['ins_id']."'")); echo $intda['ins_name'];?></td>
<td><?php $dt=explode("-",$d['payment_date']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>
<td><?php
if($d['payment_mode']=='0')
{
?>Cash
<?php
}
else
{
?>
Online
<?php
}
?></td>
<td><?php $stda=mysql_fetch_array(mysql_query("select * from tbl_student where  id='".$d['student_id']."'")); echo $stda['student_name'];?>


</td>
<td><?php echo $d['course'];?></td>
<td><?php echo $d['section_name'];?></td>
<td><?php echo $d['roll_no'];?></td>
<td><?php echo $stda['reg_no'];?></td>
<td><?php $cou3=mysql_fetch_array(mysql_query("select * from tbl_fees where 1 and   fee_code='".$d['fee_code']."'")); 
$cou33=mysql_fetch_array(mysql_query("select * from tbl_fee_type where 1 and   id='".$cou3['fee_type']."'"));  echo $cou33['fee_type'];?></td>
<td><?php $cou343=mysql_fetch_array(mysql_query("select * from tbl_fee_type_data where 1 and   id='".$d['fee_period']."'")); // echo $cou343['from_date'];

$dt1=explode("-",$cou343['from_date']); 
   if($dt1[1]=='01')
   {
   $mon1="Jan";
   }
   if($dt1[1]=='02')
   {
   $mon1="Feb";
   }
   if($dt1[1]=='03')
   {
   $mon1="Mar";
   }
   if($dt1[1]=='04')
   {
   $mon1="Apr";
   }
   if($dt1[1]=='05')
   {
   $mon1="May";
   }
   
   if($dt1[1]=='06')
   {
   $mon1="Jun";
   }
   
   if($dt1[1]=='07')
   {
   $mon1="Jul";
   }
   
   if($dt1[1]=='08')
   {
   $mon1="Aug";
   }
   
   if($dt1[1]=='09')
   {
   $mon1="Sep";
   }
   
   if($dt1[1]=='10')
   {
   $mon1="Oct";
   }
   
   if($dt1[1]=='11')
   {
   $mon1="Nov";
   }
   
   if($dt1[1]=='12')
   {
   $mon1="Dec";
   }
   echo $mon1."/".$dt1[0];
   ?>
   </td>
<td align="right" style="padding-right:5px;"><?php $tot+=$d['total_amount'];
echo $d['total_amount'];?></td>

</tr>
<?php
$cn++;
}
?>
<tr><td colspan="11" align="right"><b>Total</b>&nbsp;&nbsp;</td>
<td align="right" style="padding-right:5px;"><?php echo $tot;?></td>
</tr>
<?php

}
else
{
?>
<tr><td colspan="12" align="center">No record found...</td></tr>
<?php
}
?>




<tbody>
</tbody>
</table>

<?php
}
?>


<script type="text/javascript" >
function test1()
{


if(document.getElementById('firstinput').value=='')
{
alert("Please select the  From Date");
document.getElementById('firstinput').focus();
return false;
}

if(document.getElementById('secondinput').value=='')
{
alert("Please select the  To Date");
document.getElementById('secondinput').focus();
return false;
}


return true;
}
</script>

	  <? 
include("_foot.php"); 
?>