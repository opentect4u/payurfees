﻿<?php include("ins_header.php");?>
<?php

if($_REQUEST['name'])
{
 if ($_FILES['file1']['name'])
               {
		               $file_name=(date("Y.m.d_H-i-s") .$_FILES['file1']['name']);
	      $file_name = str_replace(' ', '_', $file_name);
	      copy($_FILES['file1']['tmp_name'], "product_image/$file_name"); 
	        }	 
	     else
	       {
	     $file_name="";
	      }
 $sql="insert into tbl_student set
 section_name='".$_REQUEST['section_name']."',
 pid='0',
  year_reg='".addslashes($_REQUEST['year_reg'])."',
   reg_no='".addslashes($_REQUEST['reg_no'])."',
    roll_no='".addslashes($_REQUEST['roll_no'])."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_name='".addslashes($_REQUEST['course_name'])."',
 sub_course_name='".addslashes($_REQUEST['sub_course_name'])."',
student_name='".addslashes($_REQUEST['name'])."',
date_of_birth='".$_REQUEST['day']."-".$_REQUEST['month']."-".$_REQUEST['year']."',
dob='".$_REQUEST['year']."-".$_REQUEST['month']."-".$_REQUEST['day']."',
class_name='".addslashes($_REQUEST['class_name'])."',

email='".addslashes($_REQUEST['email'])."',
mobile='".addslashes($_REQUEST['mobile'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Student Added successfully..");
location.href="manage_student.php";
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
var url="get_sub_course.php";
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

								<h2 style="color:#FFFFFF">Add Student</h2>

							</div>

							<div class="module-body">



									


									<form class="form-horizontal row-fluid" name="aa" action="" method="post" enctype="multipart/form-data">

									

									

									

									

									

									

										<div class="control-group">

											<label class="control-label" for="basicinput"><b>Name of the Student</b><font color=red>*</font> :</label>

											<div class="controls">

												<input type="text" name="name" id="name" class="span8">

												

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Academic Year</strong><font color=red>*</font> :</label>

											<div class="controls">
<select  name="year_reg" id="year_reg" class="span8"/>
<option value="">--select--</option>

<?php
for($yy=2017;$yy<2030;$yy++)
{
?>
<option value="<?php echo $yy;?>-<?php echo substr(($yy+1),2);?>"><?php echo $yy;?>-<?php echo substr(($yy+1),2);?></option>
<?php
}
?>
</select>
											</div>

										</div>



										



										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Registration No. :</strong></label>

											<div class="controls">

												<input data-title="Registration No." type="text" name="reg_no" id="reg_no" class="span8 tip">

											</div>

										</div>
                                        
                                      <div class="control-group">

											<label class="control-label" for="basicinput"><strong>Class/ Course</strong><font color=red>*</font> :</label>

											<div class="controls">

												<select name="course_name" id="course_name" onChange="showUser11111(this.value)" class="span8"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['course_name'];?></option>


<?php
}
?>

</select><br/><div id="txtHint"></div>
											</div>

										</div>

										  
                                        
                                        <!--	<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Class<font color=red>*</font> :</strong></label>

											<div class="controls">

												<select  name="class_name" id="class_name" class="span8 tip">
                                                <option value="">--select--</option>
                                                <option value="Nursery 1">Nursery 1</option>
                                                <option value="Nursery 2">Nursery 2</option>
                                                <option value="KG 1">KG 1</option>
                                                <option value="KG 2">KG 2</option>
                                                
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                                <option value="VII">VII</option>
                                                <option value="VIII">VIII</option>
                                                <option value="IX">IX</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                                <option value="1st year">1st year</option>
                                                <option value="2nd year">2nd year</option>
                                                <option value="3rd year">3rd year</option>
                                                <option value="4th year">4th year</option>
                                                <option value="5th year">5th year</option>
                                                </select>

											</div>

										</div>-->
                                        
                                        
                                        			<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Section :<font color=red>*</font></strong></label>

											<div class="controls">

												<select  name="section_name" id="section_name" class="span8 tip">
                                                <option value="">--select--</option>
                                                <option value="N/A">N/A</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="J">J</option>
                                                  <option value="K">K</option>
                                                <option value="L">L</option>
                                                  <option value="M">M</option>
                                                <option value="N">N</option>
                                                  <option value="O">O</option>
                                                <option value="P">P</option>
                                                  <option value="Q">Q</option>
                                                <option value="R">R</option>
                                                  <option value="S">S</option>
                                                <option value="T">T</option>
                                                  <option value="U">U</option>
                                                <option value="V">V</option>
                                                  <option value="W">W</option>
                                                <option value="X">X</option>
                                                  <option value="Y">Y</option>
                                                <option value="Z">Z</option>
                                                </select>

											</div>

										</div>	

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Roll Number<font color=red>*</font> :</strong></label>

											<div class="controls">

												<input  type="text" name="roll_no" id="roll_no" class="span8 tip">

											</div>

										</div>



									

							
										

										

										









										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Mobile Number :</strong></label>

											<div class="controls">

												<input data-title="A tooltip for the input" type="text" name="mobile" id="mobile" class="span8 tip">

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Name of the Institute :</strong></label>

											<div class="controls">

												<?php echo $_SESSION['ins_name'];?>

											</div>

										</div>

										

										

										

										

										

									

										

										

										<div class="control-group">

											<div class="controls">

												<input type="submit" class="btn btn-primary btn-large" value="Submit" name="submit" onClick="return test1();"/>

											</div>

										</div>


									</form>
                                    
                                    <script type="text/javascript" >
function test1()
{



if(document.getElementById('name').value=='')
{
alert("Please enter the  Student Name");
document.getElementById('name').focus();
return false;
}

if(document.getElementById('year_reg').value=='')
{
alert("Please select the  Academic Year");
document.getElementById('year_reg').focus();
return false;
}




if(document.getElementById('roll_no').value=='')
{
alert("Please enter the  Roll No.");
document.getElementById('roll_no').focus();
return false;
}
var str=document.getElementById('name').value;
        for (var i = 0; i < str.length; i++)
{
var ch = str.substring(i, i + 1);
    if (((ch < "a" || "z" < ch) && (ch < "A" || "Z" < ch)) && ch != ' ')
    {
    alert("The Student Name field only accepts letters & spaces.");
    document.getElementById('name').focus();
    return false;
    }
}

/*
if(document.getElementById('class_name').value=='')
{
alert("Please enter the  Class Name.");
document.getElementById('class_name').focus();
return false;
}
*/

if(document.getElementById('course_name').value=='')
{
alert("Please select the Class/Course Name");
document.getElementById('course_name').focus();
return false;
}

if(document.getElementById('section_name').value=='')
{
alert("Please enter the  Section Name.");
document.getElementById('section_name').focus();
return false;
}



/*
if(document.getElementById('email').value=='')
{
alert("Please enter the  Email Address");
document.getElementById('email').focus();
return false;
}
var oldemail=document.getElementById('email').value ;
	if(oldemail.split("@")==oldemail || oldemail.split(".")==oldemail)
	{
	alert("Please enter the correct email address");
	document.getElementById('email').focus();
	return false;
	}

if(document.getElementById('mobile').value=='')
{
alert("Please enter the  Mobile No.");
document.getElementById('mobile').focus();
return false;
}

if(document.getElementById('mobile').value.length!='10')
{
alert("Please enter the  Mobile No 10 Digit No.");
document.getElementById('mobile').focus();
return false;
}	
	var mobexp1 =/^[0-9]+$/;
if (! document.getElementById('mobile').value.match(mobexp1))
{
alert("please enter number only for mobile feild");
 //document.getElementById('mobile').value='';
document.getElementById('mobile').focus();
return false ;
}
*/


/*
if(document.getElementById('pid_num').value!='0')
{
	if(document.getElementById('sub_course_name').value=='')
	{
	alert("Please select the Sub Course Name");
	document.getElementById('sub_course_name').focus();
	return false;
	}
}
*/
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