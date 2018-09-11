<?php
 include("insp_header.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_parent where 1 and id='".$_SESSION['parent_id']."'"));

 $ds="select * from tbl_student where 1 and roll_no='".$_REQUEST['roll_no']."' and class_name='".$_REQUEST['class_name']."' and section_name='".$_REQUEST['section_name']."' and ins_id='".$_REQUEST['ins_id']."'";
$rs=mysql_query($ds);
$ds=mysql_fetch_array($rs);

if($_REQUEST['name2'])
{
  $sql6="update tbl_student set
 pid='".$_SESSION['parent_id']."' where id='".$ds['id']."' ";
mysql_query($sql6);
}


if($_REQUEST['name'])
{

  $sql="insert into tbl_student set
 pid='".$_SESSION['parent_id']."',
  year_reg='".addslashes($_REQUEST['year_reg'])."',
   reg_no='".addslashes($_REQUEST['reg_no'])."',
    roll_no='".addslashes($_REQUEST['roll_no'])."',
 ins_id='".addslashes($_REQUEST['ins_id'])."',
 course_name='".addslashes($_REQUEST['course_name'])."',
 sub_course_name='".addslashes($_REQUEST['sub_course_name'])."',
student_name='".addslashes($_REQUEST['name'])."',
date_of_birth='".$_REQUEST['day']."-".$_REQUEST['month']."-".$_REQUEST['year']."',
dob='".$_REQUEST['year']."-".$_REQUEST['month']."-".$_REQUEST['day']."',
class_name='".addslashes($_REQUEST['class_name'])."',
email='".addslashes($_REQUEST['email'])."',
section_name='".addslashes($_REQUEST['section_name'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Children Added successfully..");
location.href="manage_children.php";
</script>
<?php
}
?>



<script type="text/javascript">
var xmlhttp;

function showUser(str)
{
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="get_course.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
{
document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}
</script>
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

								<h2 style="color:#ffffff">Add Student</h2>

							</div>

							<div class="module-body">

<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Institute Name <font color=red>*</font>:<strong></label>

											<div class="controls">

<?php
$s6="select * from tbl_institute where 1 and status='1'  and id='".$_REQUEST['ins_id']."' order by ins_name asc ";
$r6=mysql_query($s6);
$d6=mysql_fetch_array($r6);
echo $d6['ins_name'];

?>
<input type="hidden" name="ins_id" value="<?php echo $_REQUEST['ins_id'];?>"/>
</div>
</div>
<div>&nbsp;</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Class/Course Name <font color=red>*</font>:<strong></label>

											<div class="controls">
                                            
                                            <div id="txtHint"><?php 
											$n1=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$_REQUEST['course_name']."'"));
											
											echo $n1['course_name'];?>
                                            
                                            <?php 
											$n2=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$_REQUEST['sub_course_name']."'"));
											
											if($n2['course_name']) { echo "- "; echo $n2['course_name']; }?>  <input type="hidden" name="course_name" value="<?php echo $_REQUEST['course_name'];?>"/>
                                            <input type="hidden" name="sub_course_name" value="<?php echo $_REQUEST['sub_course_name'];?>"/></div>
                                            
                                            </div>
</div>



<div>&nbsp;</div>
<!--
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Class <font color=red>*</font>:<strong></label>

											<div class="controls"><?php echo $_REQUEST['class_name'];?><input type="hidden" name="class_name" value="<?php echo $_REQUEST['class_name'];?>"/></div>
</div><div>&nbsp;</div>
-->

<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Section Name :<strong></label>

											<div class="controls"><?php echo $_REQUEST['section_name'];?><input type="hidden" name="section_name" value="<?php echo $_REQUEST['section_name'];?>"/></div>
</div>



<div>&nbsp;</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Roll No. <font color=red>*</font>:<strong></label>

											<div class="controls"><?php echo $_REQUEST['roll_no'];?><input type="hidden" name="roll_no" value="<?php echo $_REQUEST['roll_no'];?>"/></div>
</div>

<div>&nbsp;</div>



<div>&nbsp;</div>





<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Academic Year <font color=red>*</font>:</strong></label>

											<div class="controls"><?php if($ds['year_reg']) {?><input type="text" name="year_reg" id="year_reg" value="<?php if($ds['year_reg']) { echo $ds['year_reg']; }?>" <?php if($ds['year_reg']) {?> readonly="readonly" <?php }?>/> <?php } else {?><select  name="year_reg" id="year_reg"/>
<option value="">--select--</option>
<option value="2017-18">2017-18</option>
<option value="2018-19">2018-19</option>
<option value="2019-20">2019-20</option>
<option value="2020-21">2020-21</option>
<option value="2021-22">2021-22</option>
<option value="2022-23">2022-23</option>
<option value="2023-24">2023-24</option>
<option value="2024-25">2024-25</option>
<option value="2025-26">2025-26</option>
<option value="2026-27">2026-27</option>
<option value="2027-28">2027-28</option>
<option value="2028-29">2028-29</option>
<option value="2029-30">2029-30</option>
</select>
<?php 
}
?>
</div>
</div>



<div>&nbsp;</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Registration No. <font color=red></font>:<strong></label>

											<div class="controls"><input type="text" name="reg_no" id="reg_no" value="<?php if($ds['reg_no']) { echo $ds['reg_no']; }?>" <?php if($ds['reg_no']) {?> readonly="readonly" <?php }?>/></div>
</div>
<div>&nbsp;</div>



<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Name of the Student <font color=red>*</font>:</strong></label>

											<div class="controls">
                                            
                                            <?php if($ds['student_name']) {
											?><input type="text" name="name2" id="name2"  value="<?php echo $ds['student_name'];?>" readonly="readonly"/>
                                            <?php
                                            }
											else
											{
											?><input type="text" name="name" id="name" />
                                            <?php
                                            }
											?></div>
</div>
<div>&nbsp;</div>



<div class="control-group">

											<div class="controls">

												<input  class="btn btn-primary btn-large" type="submit" name="submit" value="Submit" onClick="return test1();"/>
<a href="javascript:history.go(-1);">Back</a>
											</div>

</form>

<script type="text/javascript" >
function test1()
{


if(document.getElementById('year_reg').value=='')
{
alert("Please select the  Academic year");
document.getElementById('year_reg').focus();
return false;
}
/*


if(document.getElementById('reg_no').value=='')
{
alert("Please enter the Registration No.");
document.getElementById('reg_no').focus();
return false;
}
*/

<?php if($ds['student_name']=='') { ?>
if(document.getElementById('name').value=='')
{
alert("Please enter the  Student Name");
document.getElementById('name').focus();
return false;
}
<?php
}
?>

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