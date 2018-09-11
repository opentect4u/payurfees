<?php
include("ins_header.php");
?>


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

								<h2 style="color:#ffffff">Manage Sub-Course</h2>

							</div>

							<div class="module-body">

							<div class="module-body table">



<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">
<thead style="background:#2e88c6; color:#FFFFFF">
<tr>
<th>Sl No.</th>
<th>Course Name</th>
<th>Root Course Name</th>
<th>Course Added</th>

<th>Action</th>
</tr>
</thead>
<?php
$s="select * from tbl_course where 1 and pid!='0' and ins_id='".$_SESSION['ins_id']."' order by id desc";
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
 <td align="center"> <?php $rcse=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$d['pid']."' ")); echo $rcse['course_name']?></td> 
   <td align="center"><?php $dt=explode("-",$d['doj']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>
   <td align="center"><a href="#"><i class="menu-icon icon-pencil"></i></a> | <a href="#" style="color:#FF0000"><i class="menu-icon icon-remove"></i></a></td>
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