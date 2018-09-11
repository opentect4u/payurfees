<?php include("includes/connect.php");
$q=$_REQUEST['q'];
?>
<?php $numrow=mysql_num_rows(mysql_query("select * from tbl_course where 1 and   pid='".$q."'")); ?>
<input type="hidden" name="pid_num" id="pid_num" value="<?php echo $numrow;?>"/>
<br/>
<select name="sub_course_name" id="sub_course_name" >
<option value="">--select--</option>
<?php
$s2="select * from tbl_course where 1 and   pid='".$q."'";
$r2=mysql_query($s2);
while($d2=mysql_fetch_array($r2))
{
?>
<option value="<?php echo $d2['id'];?>">---<?php echo $d2['course_name'];?></option>
<?php
}
?> 

</select>