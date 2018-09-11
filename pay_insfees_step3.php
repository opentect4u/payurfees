<?php
 include("ins_header.php");
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$_REQUEST['ins_id']."'"));

 $q=$_REQUEST['student_id'];
$student_data=mysql_fetch_array(mysql_query("select * from tbl_student where 1 and id='".$q."'"));
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

                            

                            

                             <?php include("left_menu.php");?>

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

<form name="aa" action="pay_insfees_step4.php" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">



<div>&nbsp;</div>
<div><b>Student Name : </b>
<?php echo $student_data['student_name'];?></div>

<div><b>Institute : </b> <?php 
$student_data2=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$student_data['ins_id']."'"));

echo $student_data2['ins_name'];?></div>

<div><b>Roll : </b> <?php echo $student_data['roll_no'];?></div>
<div><b>Section : </b> <?php echo $student_data['section_name'];?></div>
<div><b>Class/Course : </b> <?php //echo $student_data['course_name'];


$student_data22=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$student_data['course_name']."'"));

echo $student_data22['course_name'];?>

</div>
<div><b>Academic Year : </b> <?php echo $student_data['year_reg'];?></div>
<div>&nbsp;</div>
<div><b>Fee Details for payment : </b></div>
<?php
if($_REQUEST['chk'])
{
?>
<table border="1" cellpadding="2" cellspacing="2" align="center" width="50%"/>
<tr>
<th>Time Period</th>
<th>Fee Name</th>
<th align="right">Fee Amount(Rs.)</th>
</tr>
<?php
$ab="";
$cn=0;
foreach($_REQUEST['chk'] as $reg)
	{
		
		 $dt=explode("-",$reg);
		 
		?>
        
        <tr>
        <td>
		
		
		<?php echo $dt[1];?></td>
        <td><?php 
		$dtt=explode("/",$dt[1]);
		
		if($dtt[0]=='Jan')
   {
   $mon1="1";
   }
   if($dtt[0]=='Feb')
   {
   $mon1="2";
   }
   if($dtt[0]=='Mar')
   {
   $mon1="3";
   }
   if($dtt[0]=='Apr')
   {
   $mon1="4";
   }
   if($dtt[0]=='May')
   {
   $mon1="5";
   }
   
   if($dtt[0]=='Jun')
   {
   $mon1="6";
   }
   
   if($dtt[0]=='Jul')
   {
   $mon1="7";
   }
   
   if($dtt[0]=='Aug')
   {
   $mon1="8";
   }
   
   if($dtt[0]=='Sep')
   {
   $mon1="9";
   }
   
   if($dtt[0]=='Oct')
   {
   $mon1="10";
   }
   
   if($dtt[0]=='Nov')
   {
   $mon1="11";
   }
   
   if($dtt[0]=='Dec')
   {
   $mon1="12";
   }
   
		
		$cou3=mysql_fetch_array(mysql_query("select * from tbl_fees where fee_code='".$dt[3]."'"));
		 $lateam=$cou3[late_amount];
		if(date("n")>=$mon1 && date("Y")>=$dtt[1])
		{
		if(date(d)>$cou3[due_date])
		{
		 $lateday=(date(d)-$cou3[due_date]);
		 if($cou3['select_one']=='Fixed Amount')
		 {
		 $latefe=1*$lateam;
		 }
		 else
		 {
		 $latefe=$lateday*$lateam;
		 }
		 
		}
		else
		{
		 $lateday=0;
		 $latefe=0;
		}
		}
		else
		{
		$latefe=0;
		}
		
		echo $dt[4]; 
		if($latefe>0) {
		echo "+ Late Fee";
		}
		
		
		?></td>
        <td align="right"><?php  $ab+=$dt[2]+$latefe;  if($latefe>0) { echo $dt[2];?>+<?php echo $latefe; echo "="; echo $dt[2]+$latefe; } else { echo $dt[2]; }?>
        <input type="hidden" name='latefe2[]' value="<?php echo $latefe;?>" /></td>
		</tr>
		<?php
		$cn++;
	}	
	?>
    
     <tr>
    <td colspan="2" align="right"><b>Convenience Fees : </b></td>
    <td align="right"><?php  $ab2=$student_data2['convenience_fees'];  echo $ab3=$cn*$ab2;?></td>
    </tr>
    <tr>
    <td colspan="2" align="right"><b>Total Fee Amount : </b></td>
    <td align="right"><?php echo $ot=$ab+$ab3;?></td>
    </tr>
    </table>
    <?php
	
}
else
{
$reg2="";
}
?>
 <p>&nbsp;</p>
 


<div class="control-group">

											<div class="controls">
                                            
                                          <?php  foreach($_REQUEST['chk'] as $reg)
	{
		
		 $dt=explode("-",$reg);
		 
		 $reg1.=$dt[0]."/".$dt[1]."/".$dt[3]."_";
		 $reg11.=$dt[0]."|".$dt[1]."|".$dt[3]."_";
	}	
	$reg2=substr($reg1,0,-1);
	$reg22=substr($reg11,0,-1);
		 ?><input type="hidden" name="info_period" value="<?php echo $reg2;?>"/>
         <input type="hidden" name="info_period2" value="<?php echo $reg22;?>"/>
                                            <input type="hidden" name="student_id" value="<?php echo $q;?>"/>
                                             <input type="hidden" name="ins_id" value="<?php echo $_REQUEST['ins_id'];?>"/>
                                             
<input type="hidden" name="tot_amt" value="<?php echo $ab+$ab3;?>"/>
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