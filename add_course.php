<?php
include("ins_header.php");
if($_REQUEST['name'])
{

 $sql="insert into tbl_course set
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_name='".addslashes($_REQUEST['name'])."',

doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Course Added successfully..");
location.href="manage_course.php";
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

								<h2 style="color:#FFFFFF">Add Course</h2>

							</div>
<div class="module-body">


<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Course Name <font color=red>*</font>:<strong></label>

											<div class="controls"><input type="text" name="name" id="name"/></div>
</div>

<div>&nbsp;</div>
<div class="control-group">

											<div class="controls">

												<input  class="btn btn-primary btn-large" type="submit" name="submit" value="Submit" onClick="return test1();"/>

											</div>

										</div>



</form>

<script type="text/javascript" >
function test1()
{


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

                        <!--/.content-->

                    </div>

                    <!--/.span9-->

                </div>

            </div>

            <!--/.container-->

        </div>

        <!--/.wrapper-->
<?php include("ins_footer.php");?>