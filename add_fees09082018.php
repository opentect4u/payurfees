<?php
include("ins_header.php");
if($_REQUEST['fee_type'])
{
$maxid=mysql_fetch_array(mysql_query("select max(id) as max_id from tbl_fees where 1 "));
if($maxid['max_id'])
{
$a=1001+$maxid['max_id'];
}
else
{
$a=1001;
}
   $sql="insert into tbl_fees set
  fee_code='".addslashes($a)."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
 course_id='".addslashes($_REQUEST['course_id'])."',
 sub_course_id='".addslashes($_REQUEST['sub_course_name'])."',
remarks='".addslashes($_REQUEST['remarks'])."',
due_date='".$_REQUEST['day']."',
late_amount='".addslashes($_REQUEST['late_amount'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
$myid=mysql_insert_id();

if($_REQUEST['amount'])
{
$sql="insert into tbl_fees_data set
fee_id='".$myid."',
fee_code='".addslashes($a)."',
fee_type='".addslashes($_REQUEST['fee_type'])."',
amount='".addslashes($_REQUEST['amount'])."',
due_date='".$_REQUEST['day']."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
}


if($_REQUEST['amount1'])
{
$sql1="insert into tbl_fees_data set
fee_id='".$myid."',
fee_code='".addslashes($a)."',
fee_type='".addslashes($_REQUEST['fee_type1'])."',
amount='".addslashes($_REQUEST['amount1'])."',
due_date='".$_REQUEST['day1']."',
doj='".date("Y-m-d")."'";
mysql_query($sql1);
}

if($_REQUEST['amount2'])
{
$sq2l="insert into tbl_fees_data set
fee_id='".$myid."',
fee_code='".addslashes($a)."',
fee_type='".addslashes($_REQUEST['fee_type2'])."',
amount='".addslashes($_REQUEST['amount2'])."',

due_date='".$_REQUEST['day2']."',
doj='".date("Y-m-d")."'";
mysql_query($sql2);
}

?>
<script type="text/javascript">
alert("Fees Added successfully..");
location.href="manage_fees.php";
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



<script type="text/javascript">
var xmlhttp;

function showUser1(str)
{
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="get_fee_data1.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged1;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged1()
{
if (xmlhttp.readyState==4)
{
document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
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

function showUser2(str)
{
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="get_fee_data2.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged2;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged2()
{
if (xmlhttp.readyState==4)
{
document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
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

function showUser4(str)
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
xmlhttp.onreadystatechange=stateChanged4;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged4()
{
if (xmlhttp.readyState==4)
{
document.getElementById("txtHint4").innerHTML=xmlhttp.responseText;
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

								<h2 style="color:#ffffff">Add Fee Structure</h2>

							</div>
<div class="module-body">


<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<table border="0" cellpadding="4" cellspacing="4" align="center" width="100%">










<tr>
<td><b>Name of the Institution:</b></td>
<td><?php echo $_SESSION['ins_name'];?></td>
</tr>
<tr>
<td><b>Course:</b> <font color="red" size="2">*</font></td>
<td><select name="course_id" id="course_id"  onChange="showUser4(this.value)"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><b><?php echo $d['course_name'];?></b></option>




<?php
}
?>
</select>
<br/><div id="txtHint4"></div></td>
</tr>


<tr>
<td><b>Late Fee Per Day:</b> </td>
<td><input type="text" name="late_amount" id="late_amount"/></td>
</tr>


<tr>
<td><b>Remarks:</b></td>
<td><textarea type="text" name="remarks" id="remarks"/></textarea></td>
</tr>


<tr><td colspan="2"><h4 style="color:#8cc63f">Fee Details</h4></td></tr>
<tr>
<td valign="top"><b>Type of Fee:</b> <font color="red" size="2">*</font></td>
<td valign="top"><select  name="fee_type" id="fee_type" onChange="showUser(this.value)"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['fee_type'];?></option>
<?php
}
?> 
</select>
<br />
<div id="txtHint"></div>
</td>
</tr>

<tr>
<td><b>Fee Amount:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="amount" id="amt"/></td>
</tr>





<!--
<tr>
<td><b>Description:</b> </td>
<td><textarea type="text" name="details" id="details"/></textarea></td>
</tr>

<tr>
<td><b>Start Date:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="start_date" id="start_date"/></td>
</tr>

<tr>
<td><b>End Date:</b> <font color="red" size="2">*</font></td>
<td><input type="text" name="end_date" id="end_date"/></td>
</tr>-->

<tr>
<td><b>Due day of Date:</b> </td>
<td>
      <label>
      <select name="day" id="day">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<=31;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
      </label> 
      <label><input type="hidden" name="month" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year" value="<?php echo date("Y");?>"/></label>     </td>

</tr>








<tr>
<td colspan="2"><h4 style="color:#8cc63f">Additional Option 1 </h4></td>
</tr>

<tr>
<td valign="top"><b>Type of Fee :</b> </td>
<td valign="top"><select  name="fee_type1" id="fee_type1" onChange="showUser1(this.value)"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['fee_type'];?></option>
<?php
}
?> 
</select><br/>
<div id="txtHint1"></div>
</td>
</tr>
<tr>
<td><b>Fee Amount :</b> </td>
<td><input type="text" name="amount1" id="amt1"/></td>
</tr>



<tr>
<td><b>Due day of  Date:</b> </td>
<td> <label>
      <select name="day1" id="day1">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<=31;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
      </label> 
      <label><input type="hidden" name="month1" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year1" value="<?php echo date("Y");?>"/></label></td>
</tr>



<tr>
<td colspan="2"><h4 style="color:#8cc63f">Additional Option 2 </h4></td>
</tr>

<tr>
<td valign="top"><b>Type of Fee :</b> </td>
<td valign="top"><select  name="fee_type2" id="fee_type2" onChange="showUser2(this.value)"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>"><?php echo $d['fee_type'];?></option>
<?php
}
?> 
</select>
<br/>
<div id="txtHint2"></div>
</td>
</tr>
<tr>
<td><b>Fee Amount :</b> </td>
<td><input type="text" name="amount2" id="amt2"/></td>
</tr>


<tr>
<td><b>Due day of Date:</b> </td>
<td> <label>
      <select name="day2" id="day2">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<=31;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
      </label> 
      <label><input type="hidden" name="month2" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year2" value="<?php echo date("Y");?>"/></label></td>
</tr>















<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Submit" onClick="return test1();" class="btn btn-primary btn-large"/></td>
</tr>

</table>
</form>

<script type="text/javascript" >
function test1()
{


if(document.getElementById('course_id').value=='')
{
alert("Please enter the  Course Name ");
document.getElementById('course_id').focus();
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







if(document.getElementById('fee_type').value=='')
{
alert("Please enter the Fee Type");
document.getElementById('fee_type').focus();
return false;
}

if(document.getElementById('amt').value=='')
{
alert("Please enter the Amount");
document.getElementById('amt').focus();
return false;
}




if(document.getElementById('pmode').value=='')
{
alert("Please enter the payment Mode");
document.getElementById('pmode').focus();
return false;
}

if(document.getElementById('pfre').value=='')
{
alert("Please enter the payment Frequency");
document.getElementById('pfre').focus();
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