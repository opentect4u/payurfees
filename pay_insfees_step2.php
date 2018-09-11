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

<form name="aa" action="pay_insfees_step3.php" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">



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
<div><b>Fee Code : </b></div>


 <?php $sql3="select * from tbl_fees where 1 and   course_id='".$student_data['course_name']."'"; 
   $res3=mysql_query($sql3);
   $pp='';
   while($cou3=mysql_fetch_array($res3))
   {
       $pp=$cou3['fee_code'];
	 
      
      
	  $data5=mysql_fetch_array(mysql_query("select * from tbl_fee_type where 1 and id='".$cou3['fee_type']."'"));
 
  ?>
  <div style="background:#ccc"><h3><?php echo $cou3['fee_code'];?> <?php echo "[".$data5['fee_type']."]";?> -  [<?php if($data5['payment_frequency']=='1') { echo "Monthly"; }?>
 <?php if($data5['payment_frequency']=='2') { echo "Quarterly"; }?>
 <?php if($data5['payment_frequency']=='3') { echo "Half Yearly"; }?>
 <?php if($data5['payment_frequency']=='4') { echo "Yearly"; }?>
 <?php if($data5['payment_frequency']=='5') { echo "Onetime"; }?>] - <?php echo " Rs "."<font color='green'>".$cou3['amount']."</font>";?> <?php if($cou3['late_amount']) {?> Late Fee: <?php echo $cou3['late_amount'];?> / <?php echo $cou3['select_one'];?> [Due Date: <?php echo $cou3['due_date'];?>] <?php }?></h3> </div>
  
  
  <?php 
   
   $sp="select * from tbl_fee_type_data where 1 and fee_id='".$data5['id']."' order by id asc";
   $rp=mysql_query($sp);
   while($dp=mysql_fetch_array($rp))
   {
   $dt1=explode("-",$dp['from_date']); 
   if($dt1[1]=='01')
   {
   $mon1="Jan";
   }
   if($dt1[1]=='02')
   {
   $mon1="Feb";
   }
   if($dt1[1]=='03')
   {
   $mon1="Mar";
   }
   if($dt1[1]=='04')
   {
   $mon1="Apr";
   }
   if($dt1[1]=='05')
   {
   $mon1="May";
   }
   
   if($dt1[1]=='06')
   {
   $mon1="Jun";
   }
   
   if($dt1[1]=='07')
   {
   $mon1="Jul";
   }
   
   if($dt1[1]=='08')
   {
   $mon1="Aug";
   }
   
   if($dt1[1]=='09')
   {
   $mon1="Sep";
   }
   
   if($dt1[1]=='10')
   {
   $mon1="Oct";
   }
   
   if($dt1[1]=='11')
   {
   $mon1="Nov";
   }
   
   if($dt1[1]=='12')
   {
   $mon1="Dec";
   }
   
   ?>
   
  <?php   $chk_payment=mysql_num_rows(mysql_query("select * from tbl_collect_fees where 1 and student_id='".$student_data['id']."' and fee_code='".$cou3['fee_code']."' and fee_period='".$dp['id']."' and ins_id='".$student_data['ins_id']."'"));
   
   ?>
   <?php if($chk_payment=='0') {?><input type="checkbox" name="chk[]"  value="<?php echo $dp['id']."-".$mon1."/".$dt1[0]."-".$cou3['amount']."-".$cou3['fee_code']."-".$data5['fee_type'];?>"/><?php } else {?> Paid <?php }?>
   &nbsp;&nbsp;
   <?php if($chk_payment=='0') {?> <span style="color:#000" > <?php } else {?> <span style="color:#006633" ><?php }?><?php 
   echo $mon1."/".$dt1[0];
  /* echo "  To  ";
    $dt2=explode("-",$dp['end_date']);
	
	
	 if($dt2[1]=='01')
   {
   $mon2="Jan";
   }
   if($dt2[1]=='02')
   {
   $mon2="Feb";
   }
   if($dt2[1]=='03')
   {
   $mon2="Mar";
   }
   if($dt2[1]=='04')
   {
   $mon2="Apr";
   }
   if($dt2[1]=='05')
   {
   $mon2="May";
   }
   
   if($dt2[1]=='06')
   {
   $mon2="Jun";
   }
   
   if($dt2[1]=='07')
   {
   $mon2="Jul";
   }
   
   if($dt2[1]=='08')
   {
   $mon2="Aug";
   }
   
   if($dt2[1]=='09')
   {
   $mon2="Sep";
   }
   
   if($dt2[1]=='10')
   {
   $mon2="Oct";
   }
   
   if($dt2[1]=='11')
   {
   $mon2="Nov";
   }
   
   if($dt2[1]=='12')
   {
   $mon2="Dec";
   }
   
    echo $mon2."/".$dt2[0];
	*/
   echo "<span><br/>";
   }
   
   ?>
  <p>&nbsp;</p>
  <?php
	}
	//echo substr($pp,0,-1);
	?></div>


<div class="control-group">

											<div class="controls">
<input type="hidden" name="student_id" value="<?php echo $_REQUEST['student_id'];?>"/>
<input type="hidden" name="ins_id" value="<?php echo $_REQUEST['ins_id'];?>"/>
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