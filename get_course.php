<?php
include("includes/connect.php");
$q=$_REQUEST['q'];
?>
<select name="course_name" id="course_name" onChange="showUser8(this.value)"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1  and pid='0' and ins_id='".$q."'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
$n2=mysql_num_rows(mysql_query("select * from tbl_course where 1 and   pid='".$d['id']."'"));
?>
<option value="<?php echo $d['id'];?>" <?php if($n2>0) {?> disabled="disabled" <?php }?>><?php echo $d['course_name'];?></option>



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
</select><br/><div id="txtHint8"></div