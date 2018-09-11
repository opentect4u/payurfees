<?php
include("ins_header.php");
if($_REQUEST['name'])
{

 $sql="insert into tbl_course set
 pid='".$_REQUEST['pid']."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_name='".addslashes($_REQUEST['name'])."',

doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("SubCourse Added successfully..");
location.href="manage_subcourse.php";
</script>
<?php
}
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

								<h2 style="color:#FFFFFF">Add Sub-Course</h2>

							</div>
<div class="module-body">


<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Course Name <font color=red>*</font>:</strong></label>

											<div class="controls"><select name="pid" id="pid" class="span8"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and pid='0' and ins_id='".$_SESSION['ins_id']."'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['course_name'];?></option>
<?php
}
?>
</select></div>
</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Sub-Course Name <font color=red>*</font>:</strong></label>

											<div class="controls"><input type="text" name="name" id="name"/></div>
</div>

<div class="control-group">

											<div class="controls">

												<input  class="btn btn-primary btn-large" type="submit" name="submit" value="Submit" onClick="return test1();"/>

											</div>

										</div>



</form>
<script type="text/javascript" >
function test1()
{
if(document.getElementById('pid').value=='')
{
alert("Please enter the  Root Course Name");
document.getElementById('pid').focus();
return false;
}


if(document.getElementById('name').value=='')
{
alert("Please enter the  Course Name");
document.getElementById('name').focus();
return false;
}

return true;
}
</script>
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
