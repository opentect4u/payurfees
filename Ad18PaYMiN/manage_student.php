<?php include("ins_header.php");

if($_REQUEST['mode']=='del')
{
	$del_sql="delete from tbl_student where 1 and ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_GET['id']."' ";
		mysql_query($del_sql);
	?>
	<meta http-equiv="refresh" content="0; url=manage_student.php" />
	<?php
} 
?>
<SCRIPT language="JavaScript">
function go_there(id)
{
	var where_to= confirm("Do you really want to delete this Student?");
	if (where_to== true)
	{
		window.location="manage_student.php.php?id="+id+"&mode=del";
	}
}
</SCRIPT>

        <div class="wrapper">

            <div class="container">

                <div class="row">

                    <div class="span3">

                        <div class="sidebar">

                            

                            
                             <?php include("left_menu.php");?>

                        </div>

                        <!--/.sidebar-->

                    </div>

                    <!--/.span3-->

                    <div class="span9">

                        <div class="content">

                            

                          

						<div class="module">

							<div class="module-head" style="background:#042139">

								<h2 style="color:#ffffff">Manage Student</h2>

							</div>

							<div class="module-body">

							<div class="module-body table">

							

							

<table border="0" cellpadding="2" cellspacing="2" align="center" width="100%">

<form name="aa" action="manage_student.php" method="post">



<tr style="">

<td><input type="text" name="name" placeholder="Name" /></td>

<td><input type="text" name="roll_no" placeholder="Roll No." /></td>

<td><input type="text" name="reg_no" placeholder="Registration No." /></td>

<td><input type="submit" class="btn" value="Submit Form"/></td>

</tr>

</form>

</table>













<hr>

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">

<thead style="background:#2e88c6; color:#FFFFFF">

<tr>

<th>Sl No.</th>

<th>Name</th>

<th>Roll No.</th>

<th>Class/ Course</th>
<th>Section</th>
<th>Reg No.</th>

<!--<th>Course </th>

<th>Sub-Course </th>

<th>Fee Code</th>-->

<th>Action</th>

</tr>

</thead>



<tbody>
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
<tr class="odd gradeX">

<td align="center"><?php if($_REQUEST['page']) { echo ((($_REQUEST['page']-1)*$limit)+$c); } else { echo $c; }?></td>

<td align="center"><?php echo $d['student_name'];?></td>

 <td align="center"><?php echo $d['roll_no'];?></td>
   
    <td align="center"><?php $cou=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$d['course_name']."'")); echo $cou['course_name'];?><?php //echo $d['class_name'];?> </td>
    <td align="center"><?php echo $d['section_name'];?></td>
   <td align="center"><?php echo $d['reg_no'];?></td>
  <!-- <td align="center"><?php $cou=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$d['course_name']."'")); echo $cou['course_name'];?></td>
   
    <td align="center"><?php $cou=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$d['sub_course_name']."'")); echo $cou['course_name'];?></td>
    <td align="center"><?php $cou3=mysql_fetch_array(mysql_query("select * from tbl_fees where 1 and   course_id='".$d['course_name']."'"));  echo $cou3['fee_code'];?>
   
   <?php //$dt=explode("-",$d['dob']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>-->

<td align="center"><a href="edit_student.php?id=<?php echo $d['id'];?>"><i class="menu-icon icon-pencil"></i></a> | <a href="#" onClick="go_there(<?php echo $d['id']; ?>)"; style="color:#FF0000"><i class="menu-icon icon-remove"></i></a></td>

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


</tbody>

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

									

									</div>

							</div>

						</div>



                      

                                                 

                        </div>

                        <!--/.content-->

                    </div>

                    <!--/.span9-->

                </div>

            </div>

            <!--/.container-->

        </div>

        <!--/.wrapper-->

        <?php include("ins_footer.php");?>