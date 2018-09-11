<?php
include("insp_header.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_parent where 1 and id='".$_SESSION['parent_id']."'"));
if($_REQUEST['mode']=='del')
{
	$del_sql="delete from tbl_student where 1 and pid='".addslashes($_SESSION['parent_id'])."' and id='".$_GET['id']."' ";
		mysql_query($del_sql);
	?>
	<meta http-equiv="refresh" content="0; url=manage_children.php" />
	<?php
} 
?>
<SCRIPT language="JavaScript">
function go_there(id)
{
	var where_to= confirm("Do you really want to delete this Student?");
	if (where_to== true)
	{
		window.location="manage_children.php?id="+id+"&mode=del";
	}
}
</SCRIPT>


  <div class="wrapper">

            <div class="container">

                <div class="row">

                    <div class="span3">

                        <div class="sidebar">

                            

                            

                             <?php include("left_pmenu.php");?>

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


<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">

<thead style="background:#2e88c6; color:#FFFFFF">
<tr>
<th>Sl No.</th>

<th>Child Name</th>
<th>Institute Name</th>
<th>Roll No.</th>
<th>Class/ Course</th>

<th>Fee Code</th>
<th>Action</th>
</tr>
</thead>



<tbody>
<?php
$s="select * from tbl_student where 1 and pid='".$_SESSION['parent_id']."' order by id desc";
   $r=mysql_query($s);
   $n=mysql_num_rows($r);
   if($n>0)
   {
   $c=1;
   while($d=mysql_fetch_array($r))
   {
   ?>
   <tr class="odd gradeX">
   <td align="center"><?php echo $c;?></td>
    <td align="center"><?php echo $d['student_name'];?></td>
    <td align="center"><?php $insnm=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$d['ins_id']."'"));echo $insnm['ins_name'];?></td>
    
  
   <td align="center"><?php echo $d['roll_no'];?>
   </td>
 
   <td align="center"><?php $cou=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$d['course_name']."'")); 
   
   $cou_pid=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$cou['pid']."'")); 
   if($cou_pid['course_name'])
   {
   echo $cou_pid['course_name'];
   echo " - ";
   }
   
   echo $cou['course_name'];?></td>
   <td align="center"><?php $sql3="select * from tbl_fees where 1 and   course_id='".$d['course_name']."'"; 
   $res3=mysql_query($sql3);
   //$pp='';
   while($cou3=mysql_fetch_array($res3))
   {
   
 

    echo  $pp="<b>".$cou3['fee_code']."</b>";
	$data5=mysql_fetch_array(mysql_query("select * from tbl_fee_type where 1 and id='".$cou3['fee_type']."'"));
 echo "[".$data5['fee_type']."]";
 echo "- Rs "."<font color='green'>".$cou3['amount']."</font>";?>
 
 
 [<?php if($data5['payment_frequency']=='1') { echo "Monthly"; }?>
 <?php if($data5['payment_frequency']=='2') { echo "Quarterly"; }?>
 <?php if($data5['payment_frequency']=='3') { echo "Half Yearly"; }?>
 <?php if($data5['payment_frequency']=='4') { echo "Yearly"; }?>
 <?php if($data5['payment_frequency']=='5') { echo "Onetime"; }?>]
 
 <?php echo "<br/>";
	}
	//echo substr($pp,0,-1);
	?>
   
   <?php //$dt=explode("-",$d['dob']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>
   <td align="center"><a href="edit_children.php?id=<?php echo $d['id'];?>"><i class="menu-icon icon-pencil"></i></a> | <a href="#" onClick="go_there(<?php echo $d['id']; ?>)"; style="color:#FF0000"><i class="menu-icon icon-remove"></i></a></td>

   </tr>
   <?php
   $c++;
   }
   }
   else
   {
   ?>
   <tr>
   <td colspan="7" align="center" style="color:#FF0000; text-align:center"> No Student Added Yet</td>
   </tr>
   <?php
   }
   ?>
</table>





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