<?php
include("ins_header.php");
if($_REQUEST['mode']=='del')
{
	$del_sql="delete from tbl_course where 1 and ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_GET['id']."' ";
		mysql_query($del_sql);
		
		
	?>
	<meta http-equiv="refresh" content="0; url=manage_course.php" />
	<?php
} 
?>
<SCRIPT language="JavaScript">
function go_there(id)
{
	var where_to= confirm("Do you really want to delete this Course?");
	if (where_to== true)
	{
		window.location="manage_course.php?id="+id+"&mode=del";
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

								<h2 style="color:#ffffff">Manage Course</h2>

							</div>

							<div class="module-body">

							<div class="module-body table">



<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">
<thead style="background:#2e88c6; color:#FFFFFF">
<tr>
<th>Sl No.</th>
<th>Class/Course Name</th>
<th>Course Added</th>

<th>Action</th>
</tr>
</thead>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0' order by id asc";
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
   <td align="center"> <?php echo $d['course_name'];?></td> 

   <td align="center"><?php $dt=explode("-",$d['doj']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>
   <td align="center"><a href="edit_course.php?id=<?php echo $d['id'];?>" title="Edit"><i class="menu-icon icon-pencil"></i></a> | <a href="#" onClick="go_there(<?php echo $d['id']; ?>)"; style="color:#FF0000" title="Delete"><i class="menu-icon icon-remove"></i></a></td>
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