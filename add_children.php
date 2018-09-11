<?php
 include("insp_header.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_parent where 1 and id='".$_SESSION['parent_id']."'"));
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
var url="get_course2.php";
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


<script type="text/javascript">
var xmlhttp;

function showUser8(str)
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
xmlhttp.onreadystatechange=stateChanged8;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged8()
{
if (xmlhttp.readyState==4)
{
document.getElementById("txtHint8").innerHTML=xmlhttp.responseText;
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

<form name="aa" action="assign_children.php" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Institute Name <font color=red>*</font>:<strong></label>

											<div class="controls"><select name="ins_id" id="ins_id" onChange="showUser(this.value)"/>
<option value="">--select--</option>
<?php
$s6="select * from tbl_institute where 1 and status='1' order by ins_name asc ";
$r6=mysql_query($s6);
while($d6=mysql_fetch_array($r6))
{
?>
<option value="<?php echo $d6['id'];?>"><?php echo $d6['ins_name'];?><!-- - <?php echo $d6['mobile'];?>--></option>


<?php
}
?>
</select></div>
</div>
<div>&nbsp;</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Class/ Course Name <font color=red>*</font>:<strong></label>

											<div class="controls">
                                            
                                            <div id="txtHint"></div>
                                            
                                            </div>
</div>



<div>&nbsp;</div>

<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Section Name :<font color=red>*</font><strong></label>

											<div class="controls"><select  name="section_name" id="section_name" class="span8 tip">
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
                                                </select></div>
</div>



<div>&nbsp;</div>
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Roll No. <font color=red>*</font>:<strong></label>

											<div class="controls"><input type="text" name="roll_no" id="roll_no"/></div>
</div>

<div>&nbsp;</div>

<div class="control-group">

											<div class="controls">

												<input  class="btn btn-primary btn-large" type="submit" name="submit" value="Procced" onClick="return test1();"/>

									</div>		</div>

</form>
<script type="text/javascript" >
function test1()
{


if(document.getElementById('ins_id').value=='')
{
alert("Please select the  Institute Name");
document.getElementById('ins_id').focus();
return false;
}



if(document.getElementById('course_name').value=='')
{
alert("Please select the Course Name");
document.getElementById('course_name').focus();
return false;
}
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
/*
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

if(document.getElementById('class_name').value=='')
{
alert("Please enter the  Class Name.");
document.getElementById('class_name').focus();
return false;
}

*/
if(document.getElementById('section_name').value=='')
{
alert("Please enter the  Section Name.");
document.getElementById('section_name').focus();
return false;
}


if(document.getElementById('roll_no').value=='')
{
alert("Please enter the  Roll No..");
document.getElementById('roll_no').focus();
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