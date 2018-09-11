<?php
include("includes/connect.php");
$q=$_REQUEST['q'];
?>
<select name="course_name" id="course_name" onChange="showUser811(this.value)"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1  and pid='0' and ins_id='".$q."'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
$n2=mysql_num_rows(mysql_query("select * from tbl_course where 1 and   pid='".$d['id']."'"));
?>
<option value="<?php echo $d['id'];?>" ><?php echo $d['course_name'];?></option>

<?php
}
?>
</select><br/><div id="txtHint8"></div