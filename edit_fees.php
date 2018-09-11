<?php
include("ins_header.php");
if($_REQUEST['fee_type'])
{

   $sql="update  tbl_fees set
 
 course_id='".addslashes($_REQUEST['course_id'])."',
 sub_course_id='".addslashes($_REQUEST['sub_course_name'])."',
remarks='".addslashes($_REQUEST['remarks'])."',
due_date='".$_REQUEST['day']."',
select_one='".addslashes($_REQUEST['select_one'])."',
late_amount='".addslashes($_REQUEST['late_amount'])."',

fee_type='".addslashes($_REQUEST['fee_type'])."',
amount='".addslashes($_REQUEST['amount'])."' where ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_REQUEST['id']."'";
mysql_query($sql);
//$myid=mysql_insert_id();


?>
<script type="text/javascript">
alert("Fees Edited successfully..");
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

                    <?php $data=mysql_fetch_array(mysql_query("select * from tbl_fees where  ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_REQUEST['id']."'"));?>      


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

								<h2 style="color:#ffffff">Edit Fee Structure</h2>

							</div>
<div class="module-body">


<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">


<div class="control-group">

											<label class="control-label" for="basicinput"><b>Name of the Institution:</b></label>

											<div class="controls"><?php echo $_SESSION['ins_name'];?></div>
</div>


<div class="control-group">

											<label class="control-label" for="basicinput"><b>Course:</b> <font color="red" size="2">*</font></label>

											<div class="controls"><select name="course_id" id="course_id"  onChange="showUser41111(this.value)"  class="span8"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_course where 1 and ins_id='".$_SESSION['ins_id']."' and pid='0'";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>" <?php if($d['id']==$data['course_id']) { echo 'selected'; } ?>><b><?php echo $d['course_name'];?></b></option>




<?php
}
?>
</select>
<br/><div id="txtHint4"></div>

</div>
</div>

<div class="control-group">

											<label class="control-label" for="basicinput"><b>Late Fee :</b></label>

							<div class="controls"><input type="text" name="late_amount" id="late_amount"  class="span8" value="<?php echo $data['late_amount'];?>"/></div>
</div>

<div class="control-group">

											<label class="control-label" for="basicinput"><b>Select One:</b></label>

											<div class="controls"><input type="radio" name="select_one" id="select_one"   value="Perday" <?php if($data['select_one']=='Perday') { echo 'checked'; } ?> /> Perday
                                            
                                            <input type="radio" name="select_one" id="select_one2"   value="Fixed Amount" <?php if($data['select_one']=='Fixed Amount') { echo 'checked'; } ?>/> Fixed Amount
                                            </div>
</div>






<div class="control-group">

											<label class="control-label" for="basicinput"><b>Remarks:</b></label>

											<div class="controls"><textarea type="text" name="remarks" id="remarks"  class="span8"/><?php echo $data['remarks'];?></textarea></div>
</div>


<div class="control-group">

											<h4 style="color:#8cc63f">Fee Details</h4>
                                            </div>

											
<div class="control-group">

											<label class="control-label" for="basicinput"><b>Type of Fee:</b> <font color="red" size="2">*</font></label>

											<div class="controls"><select  name="fee_type" id="fee_type" onChange="showUser(this.value)"  class="span8"/>
<option value="">--select--</option>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' ";
$r=mysql_query($s);
while($d=mysql_fetch_array($r))
{
?>
<option value="<?php echo $d['id'];?>" <?php if($d['id']==$data['fee_type']) { echo 'selected'; } ?>><?php echo $d['fee_type'];?></option>
<?php
}
?> 
</select>
<br />
<div id="txtHint"></div>
</div>
</div>

<div class="control-group">

											<label class="control-label" for="basicinput"><b>Fee Amount:</b> <font color="red" size="2">*</font></label>

											<div class="controls"><input type="text" name="amount" id="amt"  class="span8" value="<?php echo $data['amount'];?>"/></div>
</div>



<div class="control-group">

											<label class="control-label" for="basicinput"><b>Due day of Date:</b></label>

											<div class="controls">

      <select name="day" id="day"  class="span8">
        <option value="">Day</option>
        <?php
for($n3=1;$n3<=31;$n3++)
{
    ?>
    <option value="<?php echo sprintf("%02d",$n3);?>" <?php if(sprintf("%02d",$n3)==$data['due_date']) { echo 'selected'; } ?>><?php echo sprintf("%02d",$n3);?></option>
    <?php
}
?>
      </select>
     
      </div>
</div>
      <label><input type="hidden" name="month" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year" value="<?php echo date("Y");?>"/></label>    












      <label><input type="hidden" name="month2" value="<?php echo date("m");?>"/></label>
      <label><input type="hidden" name="year2" value="<?php echo date("Y");?>"/></label>















<div class="control-group">

											<div class="controls" >
<input type="submit" name="submit" value="Submit" onClick="return test1();" class="btn btn-primary btn-large"/></div>
</div>
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