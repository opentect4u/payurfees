<?php
 include("insp_header.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$_SESSION['ins_id']."'"));

 $q=$_REQUEST['student_id'];
$student_data=mysql_fetch_array(mysql_query("select * from tbl_student where 1 and id='".$q."'"));
$student_data2=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$student_data['ins_id']."'"));
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
var url="get_student2.php";
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

								<h2 style="color:#ffffff">Pay Fees</h2>

							</div>

							<div class="module-body">

<form name="aa" action="simple.php" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">





<div class="control-group">

											<div class="controls">

<h3>Pay Now: Rs.<?php echo $_REQUEST['tot_amt'];?></h3>
<input type="hidden" name="info_period" value="<?php echo $_REQUEST['info_period'];?>"/>
<input type="hidden" name="roll_no" value="<?php echo $student_data['roll_no'];?>"/>
<input type="hidden" name="section_name" value="<?php echo $student_data['section_name'];?>"/>
<?php $student_data22=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$student_data['course_name']."'"));?>	
<input type="hidden" name="class_name" value="<?php echo $student_data22['course_name'];?>"/>	
			<input type="hidden" name="ins_name" value="<?php echo $student_data2['ins_name'];?>"/>									
 <input type="text" name="amt" value="<?php echo $_REQUEST['tot_amt'];?>"   readonly="readonly"/>  
<input  class="btn btn-primary btn-large" type="submit" name="submit" value="Procced" onClick="return test1();"/>

									</div>		</div>

</form>
<script type="text/javascript" >
function test1()
{


if(document.getElementById('student_id').value=='')
{
alert("Please select the  Student Name");
document.getElementById('student_id').focus();
return false;
}

/*

if(document.getElementById('course_name').value=='')
{
alert("Please select the Course Name");
document.getElementById('course_name').focus();
return false;
}

if(document.getElementById('pid_num').value!='0')
{
	if(document.getElementById('sub_course_name').value=='')
	{
	alert("Please select the Sub Course Name");
	document.getElementById('sub_course_name').focus();
	return false;
	}
}

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