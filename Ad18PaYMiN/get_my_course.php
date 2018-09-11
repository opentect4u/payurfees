<?php
include("../includes/connect.php");
$q=$_REQUEST['q'];
//echo "select * from tbl_course where 1  and pid='0' and institute_type_id='".$q."' order by id asc";
?>
<select name="pid" id="pid"><option value="">--select--</option>
				<?php
				$s="select * from tbl_course where 1  and pid='0' and institute_type_id='".$q."' order by id asc";
				$r=mysql_query($s);
				while($d=mysql_fetch_array($r))
				{
				?>
				<option value="<?php echo $d['id'];?>"><?php echo $d['course_name'];?></option>
				<?php
				}
				?></select>