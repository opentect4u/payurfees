<?php
 include("ins_header.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$_SESSION['ins_id']."'"));

 $ds="select * from tbl_student where 1 and roll_no='".$_REQUEST['roll_no']."' and class_name='".$_REQUEST['class_name']."' and section_name='".$_REQUEST['section_name']."' and ins_id='".$_REQUEST['ins_id']."'";
$rs=mysql_query($ds);
$ds=mysql_fetch_array($rs);

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
var url="get_fee_data.php";
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

                            

                            

                             <?php include("left_menu.php");?>

                        </div>

                        <!--/.sidebar-->

                    </div>

                    <!--/.span3-->

                    <div class="span9">

                        <div class="content">

                            

                          

						<div class="module">

							<div class="module-head" style="background:#042139">

								<h2 style="color:#ffffff">Info about Student</h2>

							</div>

							<div class="module-body">

<form name="aa" action="pay_insfees_step2.php" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Institute Name <font color=red>*</font>:</strong></label>

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

											<label class="control-label" for="basicinput"><strong>Class/Course Name <font color=red>*</font>:</strong></label>

											<div class="controls">
                                            
                                            <?php 
											$n1=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$_REQUEST['course_name']."'"));
											
											echo $n1['course_name'];?>
                                            
                                            <?php 
											$n2=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and   id='".$_REQUEST['sub_course_name']."'"));
											
											if($n2['course_name']) { echo "- "; echo $n2['course_name']; }?>  <input type="hidden" name="course_name" value="<?php echo $_REQUEST['course_name'];?>"/>
                                            <input type="hidden" name="sub_course_name" value="<?php echo $_REQUEST['sub_course_name'];?>"/></div>
                                            
                                          
</div>



<div>&nbsp;</div>
<!--<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Class <font color=red>*</font>:<strong></label>

											<div class="controls"><?php echo $_REQUEST['class_name'];?><input type="hidden" name="class_name" value="<?php echo $_REQUEST['class_name'];?>"/></div>
</div>
<div>&nbsp;</div>-->
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Section Name :</strong></label>

											<div class="controls"><?php echo $_REQUEST['section_name'];?><input type="hidden" name="section_name" value="<?php echo $_REQUEST['section_name'];?>"/></div>
</div>



<div>&nbsp;</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Roll No. <font color=red>*</font>:</strong></label>

											<div class="controls"><?php echo $_REQUEST['roll_no'];?><input type="hidden" name="roll_no" value="<?php echo $_REQUEST['roll_no'];?>"/></div>
</div>

<div>&nbsp;</div>



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
											?><input type="hidden" name="student_id" id="student_id"  value="<?php echo $ds['id'];?>"/></div>
</div>
<div>&nbsp;</div>

<div class="control-group">

											<div class="controls">

												<?php if($ds['student_name']) {?><input  class="btn btn-primary btn-large" type="submit" name="submit" value="Submit" onClick="return test1();"/><?php } else {?> <b style="color:#FF0000">No such student in our database</b><?php }?>
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