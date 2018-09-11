<?php 

session_start();

if($_SESSION['admin_id']=="")

{

?>

<script type="text/javascript">

//location.href="index.php";

</script>

<?php

}

include("includes/connect.php");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title>Montessori School - Add New Training   Form</title>

<meta name="description" content="" />

<meta name="keywords" content="" />

<meta name="robots" content="index, follow" />

<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/jscript" src="js/modernizr.js"></script>

<script type="text/jscript" src="js/responsee.js"></script>

<!--[if lt IE 9]>

<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

<![endif]-->

<!-- Menu -->

<script src="js/jquery-latest.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/script.js"></script>

<!-- Menu End -->

<script>

function goToByScroll(id){

$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');

}

</script>

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

var url="get_batch_time.php";

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

function test1(str) 

{

if (str=='1') 

{

document.getElementById('ifYes').style.display = 'block';

} 

else

{

document.getElementById('ifYes').style.display = 'none';

}

return true;

}

</script>

<script type="text/javascript">

function test2(str) 

{

if (str=='1') 

{

document.getElementById('ifYes2').style.display = 'block';

} 

else

{

document.getElementById('ifYes2').style.display = 'none';

}

return true;

}

</script>

<script type="text/javascript">

function test3(str) 

{

if (str=='1') 

{

document.getElementById('ifYes3').style.display = 'block';

} 

else

{

document.getElementById('ifYes3').style.display = 'none';

}

return true;

}

</script>

</head>

<body>

<!-- Header Area Start -->

<?php include("include/header-container.html"); ?>

<!-- Header Area End -->

<!-- Banner Area -->

<div class="inner-banner-area">

<div class="wrap">

<h1>Admin</h1>

</div>

</div>

<!-- Banner Area End-->

<!-- inner Content Area Start -->

<div class="wrap inner-content-area">

<!-- Footer Area Start -->

<?php

if($_SESSION['admin_id']=="1")

{

include("include/left-menu.html");

}

else

{

include("include/left-menu-sub.html");

} ?>

<!-- Footer Area End -->

<div> 

<h1>Add New Training Form </h1>

<?php   

if(!empty($_REQUEST['name']))

{

if ($_FILES['file1']['name'])

{

$file_name=(date("Y.m.d_H-i-s") .$_FILES['file1']['name']);

$file_name = str_replace(' ', '_', $file_name);

copy($_FILES['file1']['tmp_name'], "../training_image/$file_name"); 

}	 

else

{

$file_name="";

}



if(!empty($_REQUEST['class_name']))
{
$class_name=addslashes($_REQUEST['class_name']);
}
else
{
$class_name='';
}

if(!empty($_REQUEST['name']))
{
$name=addslashes($_REQUEST['name']);
}
else
{
$name='';
}
if(!empty($_REQUEST['med1']))
{
$med1=addslashes($_REQUEST['med1']);
}
else
{
$med1='';
}

if(!empty($_REQUEST['med1_details']))
{
$med1_details=addslashes($_REQUEST['med1_details']);
}
else
{
$med1_details='';
}


if(!empty($_REQUEST['med2']))
{
$med2=addslashes($_REQUEST['med2']);
}
else
{
$med2='';
}

if(!empty($_REQUEST['med2_details']))
{
$med2_details=addslashes($_REQUEST['med2_details']);
}
else
{
$med2_details='';
}

if(!empty($_REQUEST['med3']))
{
$med3=addslashes($_REQUEST['med3']);
}
else
{
$med3='';
}

if(!empty($_REQUEST['med3_details']))
{
$med3_details=addslashes($_REQUEST['med3_details']);
}
else
{
$med3_details='';
}

if(!empty($_REQUEST['more_details']))
{
$more_details=addslashes($_REQUEST['more_details']);
}
else
{
$more_details='';
}


if(!empty($_REQUEST['perm_place']))
{
$perm_place=addslashes($_REQUEST['perm_place']);
}
else
{
$perm_place='';
}


if(!empty($_REQUEST['perm_date']))
{
$perm_date=addslashes($_REQUEST['perm_date']);
}
else
{
$perm_date='';
}


if(!empty($_REQUEST['perm_signature']))
{
$perm_signature=addslashes($_REQUEST['perm_signature']);
}
else
{
$perm_signature='';
}

if(!empty($_REQUEST['added_by']))
{
$added_by=addslashes($_REQUEST['added_by']);
}
else
{
$added_by='';
}

if(!empty($_REQUEST['mother_tounge']))
{
$mother_tounge=addslashes($_REQUEST['mother_tounge']);
}
else
{
$mother_tounge='';
}

if(!empty($_REQUEST['sex']))
{
$sex=addslashes($_REQUEST['sex']);
}
else
{
$sex='';
}

if(!empty($_REQUEST['blood_group']))
{
$blood_group=addslashes($_REQUEST['blood_group']);
}
else
{
$blood_group='';
}

if(!empty($_REQUEST['batch_name']))
{
$batch_name=addslashes($_REQUEST['batch_name']);
}
else
{
$batch_name='';
}


if(!empty($_REQUEST['school_timing']))
{
$school_timing=addslashes($_REQUEST['school_timing']);
}
else
{
$school_timing='';
}

if(!empty($_REQUEST['year']))
{
$dob=$_REQUEST['year']."-".$_REQUEST['month']."-".$_REQUEST['day'];
}
else
{
$dob='0000-00-00';
}



if(!empty($_REQUEST['father_name']))
{
$father_name=addslashes($_REQUEST['father_name']);
}
else
{
$father_name='';
}

if(!empty($_REQUEST['father_contact_no']))
{
$father_contact_no=addslashes($_REQUEST['father_contact_no']);
}
else
{
$father_contact_no='';
}


if(!empty($_REQUEST['father_email']))
{
$father_email=addslashes($_REQUEST['father_email']);
}
else
{
$father_email='';
}

if(!empty($_REQUEST['father_occupation']))
{
$father_occupation=addslashes($_REQUEST['father_occupation']);
}
else
{
$father_occupation='';
}

if(!empty($_REQUEST['mother_name']))
{
$mother_name=addslashes($_REQUEST['mother_name']);
}
else
{
$mother_name='';
}


if(!empty($_REQUEST['mother_contact_no']))
{
$mother_contact_no=addslashes($_REQUEST['mother_contact_no']);
}
else
{
$mother_contact_no='';
}

if(!empty($_REQUEST['mother_email']))
{
$mother_email=addslashes($_REQUEST['mother_email']);
}
else
{
$mother_email='';
}

if(!empty($_REQUEST['mother_occupation']))
{
$mother_occupation=addslashes($_REQUEST['mother_occupation']);
}
else
{
$mother_occupation='';
}

if(!empty($_REQUEST['mother_address']))
{
$mother_address=addslashes($_REQUEST['mother_address']);
}
else
{
$mother_address='';
}

if(!empty($_REQUEST['guardian1_name']))
{
$guardian1_name=addslashes($_REQUEST['guardian1_name']);
}
else
{
$guardian1_name='';
}

if(!empty($_REQUEST['guardian1_address']))
{
$guardian1_address=addslashes($_REQUEST['guardian1_address']);
}
else
{
$guardian1_address='';
}

if(!empty($_REQUEST['guardian1_contact']))
{
$guardian1_contact=addslashes($_REQUEST['guardian1_contact']);
}
else
{
$guardian1_contact='';
}

if(!empty($_REQUEST['guardian1_email']))
{
$guardian1_email=addslashes($_REQUEST['guardian1_email']);
}
else
{
$guardian1_email='';
}

if(!empty($_REQUEST['guardian1_relationship']))
{
$guardian1_relationship=addslashes($_REQUEST['guardian1_relationship']);
}
else
{
$guardian1_relationship='';
}








if(!empty($_REQUEST['guardian2_name']))
{
$guardian2_name=addslashes($_REQUEST['guardian2_name']);
}
else
{
$guardian2_name='';
}

if(!empty($_REQUEST['guardian2_address']))
{
$guardian2_address=addslashes($_REQUEST['guardian2_address']);
}
else
{
$guardian2_address='';
}

if(!empty($_REQUEST['guardian2_contact']))
{
$guardian2_contact=addslashes($_REQUEST['guardian2_contact']);
}
else
{
$guardian2_contact='';
}

if(!empty($_REQUEST['guardian2_email']))
{
$guardian2_email=addslashes($_REQUEST['guardian2_email']);
}
else
{
$guardian2_email='';
}

if(!empty($_REQUEST['guardian2_relationship']))
{
$guardian2_relationship=addslashes($_REQUEST['guardian2_relationship']);
}
else
{
$guardian2_relationship='';
}












if(!empty($_REQUEST['doctor_name']))
{
$doctor_name=addslashes($_REQUEST['doctor_name']);
}
else
{
$doctor_name='';
}

if(!empty($_REQUEST['doctor_contact']))
{
$doctor_contact=addslashes($_REQUEST['doctor_contact']);
}
else
{
$doctor_contact='';
}

if(!empty($_REQUEST['doctor_address']))
{
$doctor_address=addslashes($_REQUEST['doctor_address']);
}
else
{
$doctor_address='';
}


if(!empty($_REQUEST['name1']))
{
$name1=addslashes($_REQUEST['name1']);
}
else
{
$name1='';
}

if(!empty($_REQUEST['age1']))
{
$age1=addslashes($_REQUEST['age1']);
}
else
{
$age1='';
}


if(!empty($_REQUEST['gender1']))
{
$gender1=addslashes($_REQUEST['gender1']);
}
else
{
$gender1='';
}

if(!empty($_REQUEST['relationship1']))
{
$relationship1=addslashes($_REQUEST['relationship1']);
}
else
{
$relationship1='';
}

if(!empty($_REQUEST['contact1']))
{
$contact1=addslashes($_REQUEST['contact1']);
}
else
{
$contact1='';
}





if(!empty($_REQUEST['name2']))
{
$name2=addslashes($_REQUEST['name2']);
}
else
{
$name2='';
}

if(!empty($_REQUEST['age2']))
{
$age2=addslashes($_REQUEST['age2']);
}
else
{
$age2='';
}


if(!empty($_REQUEST['gender2']))
{
$gender2=addslashes($_REQUEST['gender2']);
}
else
{
$gender2='';
}

if(!empty($_REQUEST['relationship2']))
{
$relationship2=addslashes($_REQUEST['relationship2']);
}
else
{
$relationship2='';
}

if(!empty($_REQUEST['contact2']))
{
$contact2=addslashes($_REQUEST['contact2']);
}
else
{
$contact2='';
}



if ($_FILES['file1']['name'])

{

$file_name=(date("Y.m.d_H-i-s") .$_FILES['file1']['name']);

$file_name = str_replace(' ', '_', $file_name);

copy($_FILES['file1']['tmp_name'], "../student_image/$file_name"); 

}	 

else

{

$file_name="";

}


$file_name2='';
$file_name3='';
$file_name4='';
$file_name5='';
$file_name6='';

if(!empty($_REQUEST['name3']))
{
$name3=addslashes($_REQUEST['name3']);
}
else
{
$name3='';
}

if(!empty($_REQUEST['age3']))
{
$age3=addslashes($_REQUEST['age3']);
}
else
{
$age3='';
}


if(!empty($_REQUEST['gender3']))
{
$gender3=addslashes($_REQUEST['gender3']);
}
else
{
$gender3='';
}

if(!empty($_REQUEST['relationship3']))
{
$relationship3=addslashes($_REQUEST['relationship3']);
}
else
{
$relationship3='';
}

if(!empty($_REQUEST['contact3']))
{
$contact3=addslashes($_REQUEST['contact3']);
}
else
{
$contact3='';
}


if(!empty($_REQUEST['name4']))
{
$name4=addslashes($_REQUEST['name4']);
}
else
{
$name4='';
}

if(!empty($_REQUEST['age4']))
{
$age4=addslashes($_REQUEST['age4']);
}
else
{
$age4='';
}


if(!empty($_REQUEST['gender4']))
{
$gender4=addslashes($_REQUEST['gender4']);
}
else
{
$gender4='';
}

if(!empty($_REQUEST['relationship4']))
{
$relationship4=addslashes($_REQUEST['relationship4']);
}
else
{
$relationship4='';
}

if(!empty($_REQUEST['contact4']))
{
$contact4=addslashes($_REQUEST['contact4']);
}
else
{
$contact4='';
}



if(!empty($_REQUEST['name5']))
{
$name5=addslashes($_REQUEST['name5']);
}
else
{
$name5='';
}

if(!empty($_REQUEST['age5']))
{
$age5=addslashes($_REQUEST['age5']);
}
else
{
$age5='';
}


if(!empty($_REQUEST['gender5']))
{
$gender5=addslashes($_REQUEST['gender5']);
}
else
{
$gender5='';
}

if(!empty($_REQUEST['relationship5']))
{
$relationship5=addslashes($_REQUEST['relationship5']);
}
else
{
$relationship5='';
}

if(!empty($_REQUEST['contact5']))
{
$contact5=addslashes($_REQUEST['contact5']);
}
else
{
$contact5='';
}


echo $s="insert into tbl_training

set

added_by='".$added_by."',

med1='".$med1."',

med1_details='".$med1_details."',

med2='".$med2."',

med2_details='".$med2_details."',

med3='".$med3."',

med3_details='".$med3_details."',

more_details='".$more_details."',

perm_place='".$perm_place."',

perm_date='".$perm_date."',

perm_signature='".$perm_signature."',

name1='".$name1."',

age1='".$age1."',

gender1='".$gender1."',

relationship1='".$relationship1."',

contact1='".$contact1."',

name2='".$name2."',

age2='".$age2."',

gender2='".$gender2."',

relationship2='".$relationship2."',

contact2='".$contact2."',

name3='".$name3."',

age3='".$age3."',

gender3='".$gender3."',

relationship3='".$relationship3."',

contact3='".$contact3."',

name4='".$name4."',

age4='".$age4."',

gender4='".$gender4."',

relationship4='".$relationship4."',

contact4='".$contact4."',

name5='".$name5."',

age5='".$age5."',

gender5='".$gender5."',

relationship5='".$relationship5."',

contact5='".$contact5."',

name='".$name."',

mother_tounge='".$mother_tounge."',

sex='".$sex."',

dob='".$dob."',

blood_group='".$blood_group."',

class_name='".$class_name."',

batch_name='".$batch_name."',

school_timing='".$school_timing."',

father_name='".$father_name."',

father_contact_no='".$father_contact_no."',

father_email='".$father_email."',

father_occupation='".$father_occupation."',

mother_name='".$mother_name."',

mother_contact_no='".$mother_contact_no."',

mother_email='".$mother_email."',

mother_occupation='".$mother_occupation."',

mother_address='".$mother_address."',

guardian1_name='".$guardian1_name."',

guardian1_address='".$guardian1_address."',

guardian1_contact='".$guardian1_contact."',

guardian1_email='".$guardian1_email."',

guardian1_relationship='".$guardian1_relationship."',

guardian2_name='".$guardian2_name."',

guardian2_address='".$guardian2_address."',

guardian2_contact='".$guardian2_contact."',

guardian2_email='".$guardian2_email."',

guardian2_relationship='".$guardian2_relationship."',

doctor_name='".$doctor_name."',

doctor_contact='".$doctor_contact."',

doctor_address='".$doctor_address."',

image='".$file_name."',

father_image='".$file_name2."',

mother_image='".$file_name3."',

g1_image='".$file_name4."',

g2_image='".$file_name5."',

escort_image='".$file_name6."',

doj='".date("Y-m-d")."'

";

mysqli_query($connection,$s);

$api_key = '#258591E96F26E1';

$contacts = $father_contact_no;

$from = 'KIDSFO';

$sms_text = urlencode('Welcome to Montessori School');

//Submit to server

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL, "http://sms.smsroot.com/app/smsapi/index.php");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=5&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);

$response = curl_exec($ch);

curl_close($ch);

$msg=1;

?>

<script type="text/javascript">

//location.href="manage-training.php";

</script>

<?php

}

?>

<script language="javascript">

function ValidateForm()

{

//alert("abhijit"+document.getElementById('fname').value);

if (document.getElementById('added_by').value =="")

{

alert("Please select the    Sub Admin Name ."); 

document.getElementById('added_by').focus();

return false;

}

if (document.getElementById('title').value =="")

{

alert("Please enter the     Name ."); 

document.getElementById('title').focus();

return false;

}

if (document.getElementById('mother_tounge').value =="")

{

alert("Please enter  the Mother Tounge."); 

document.getElementById('mother_tounge').focus();

return false;

}

if (document.getElementById('sex').value =="")

{

alert("Please select  the Gender."); 

document.getElementById('sex').focus();

return false;

}

if (document.getElementById('day').value =="")

{

alert("Please select  the day of DOB."); 

document.getElementById('day').focus();

return false;

}

if (document.getElementById('month').value =="")

{

alert("Please select  the Month of DOB."); 

document.getElementById('month').focus();

return false;

}

if (document.getElementById('year').value =="")

{

alert("Please select  the Year of DOB."); 

document.getElementById('year').focus();

return false;

}

if (document.getElementById('blood_group').value =="")

{

alert("Please enter  the Blood Group."); 

document.getElementById('blood_group').focus();

return false;

}

if (document.getElementById('batch_name').value =="")

{

alert("Please enter  the Batch Name."); 

document.getElementById('batch_name').focus();

return false;

}

if (document.getElementById('father_name').value =="")

{

alert("Please enter the   Father  Name ."); 

document.getElementById('father_name').focus();

return false;

}

if (document.getElementById('father_contact_no').value =="")

{

alert("Please enter the   Father  Mobile No. ."); 

document.getElementById('father_contact_no').focus();

return false;

}

var mobexp1 =/^[0-9]+$/;

if (! document.getElementById('father_contact_no').value.match(mobexp1))

{

alert("Please enter digit only for father Mobile No. feild");

document.getElementById('father_contact_no').value='';

document.getElementById('father_contact_no').focus();

return false ;

}

if (document.getElementById('father_contact_no').value.length!=10)

{

alert("Father Mobile No. should be 10 digits");

document.getElementById('father_contact_no').focus();

return false ;

}

return true;

}

</script> 

<!--------------------- contact-form Start --------------------->

<form action="#" class="contact-form" method="post" enctype="multipart/form-data">

<?php if(!isset($msg)=="2")

{

?>

<div><b style="color:#ff0000;">Student Name Already Exists... Input New Student Name</b></div>

<?php

}

?>

<h3>Student Details</h3>

<div>

<label>Added By</label>

<div>

<select name="added_by" id="added_by"  class="tao-width-area-big">

<option value="">----------------------------------select----------------------------------</option>

<?php

if($_SESSION['admin_id']!='1')

{

$s2="select * from tbl_admin_user where 1  and id='".$_SESSION['admin_id']."' order by id asc";

}

else

{

$s2="select * from tbl_admin_user where 1  and id!='1' order by id asc";

}

$r2=mysqli_query($connection,$s2);

while($d2=mysqli_fetch_array($r2,MYSQLI_ASSOC))

{

$brnc=mysqli_fetch_array(mysqli_query("select * from tbl_branch where 1  and id='".$d2['branch_id']."'"),MYSQLI_ASSOC);

?>

<option value="<?php echo $d2['id'];?>" <?php if($_SESSION['admin_id']==$d2['id']) {?> selected <?php }?>><?php echo $d2['name'];?> - <?php echo $brnc['branch_name'];?></option>

<?php

}

?>

</select>

</div>

</div>

<div>

<label>Student Name</label>

<div>

<input type="text" name="name" id="title"  />

</div>

</div>

<div>

<label>Mother Tounge</label>

<div>

<input type="text" name="mother_tounge" id="mother_tounge" />

</div>

</div>

<div>

<label>Gender</label>

<div>

<select name="sex" id="sex" class="tao-width-area">

<option value="">-----------select-----------</option>

<option value="Male">Male</option>

<option value="Female">Female</option>

</select>

</div>

</div>

<div>

<label>DOB</label>

<div>

<select name="day" id="day">

<option value="">Day</option>

<?php

for($n3=1;$n3<32;$n3++)

{

?>

<option value="<?php echo sprintf("%02d",$n3);?>" ><?php echo sprintf("%02d",$n3);?></option>

<?php

}

?>

</select>

<select name="month" id="month">

<option value="">Month</option>

<option value="01">Jan</option>

<option value="02">Feb</option>

<option value="03">Mar</option>

<option value="04">Apr</option>

<option value="05">May</option>

<option value="06">Jun</option>

<option value="07">Jul</option>

<option value="08">Aug</option>

<option value="09">Sep</option>

<option value="10">Oct</option>

<option value="11">Nov</option>

<option value="12">Dec</option>

</select>

<select name="year" id="year">

<option value="">Year</option>

<?php

for($n4=1960;$n4<=date("Y");$n4++)

{

?>

<option value="<?php echo sprintf("%02d",$n4);?>"><?php echo sprintf("%02d",$n4);?></option>

<?php

}

?>

</select>

</div>

</div>

<div>

<label>Blood Group</label>

<div>

<select name="blood_group" id="blood_group"   class="tao-width-area">

<option value="">-----------select-----------</option>

<option value="A+">A+</option>

<option value="A-">A-</option>

<option value="B+">B+</option>

<option value="B-">B-</option>

<option value="AB+">AB+</option>

<option value="AB-">AB-</option>

<option value="0+">0+</option>

<option value="0-">0-</option>

</select>

</div>

</div>

<div>

<label>Batch</label>

<div>

<select name="batch_name" id="batch_name" onChange="showUser(this.value)" class="tao-width-area">

<option value="" >-----------select-----------</option>

<?php

$s="select * from tbl_batch where 1 order by id asc";

$r=mysqli_query($connection,$s);

while($d=mysqli_fetch_array($r,MYSQLI_ASSOC))

{

?>

<option value="<?php echo $d['batch_name'];?>"><?php echo $d['batch_name'];?></option>

<?php

}

?>

</select>

</div>

</div>

<div>

<label>School Timing</label>

<div id="txtHint">

<input type="text" name="school_timing" id="school_timing"  readonly=""/>

</div>

</div>

<h3>Parent's Details</h3>

<div>

<label>Father Name</label>

<div>

<input type="text" name="father_name" id="father_name"  />

</div>

</div>

<div>

<label>Mobile No. </label>

<div>

<input type="text" name="father_contact_no" id="father_contact_no"  /><br/> (Only mobile number no prefix)

</div>

</div>

<div>

<label>Email</label>

<div>

<input type="text" name="father_email" id="father_email"  />

</div>

</div>

<div>

<label>Occupation</label>

<div>

<input type="text" name="father_occupation" id="father_occupation"  />

</div>

</div>

<h3>Emergency Contact Details</h3>

<div>

<label>Guardian Name1</label>

<div>

<input type="text" name="guardian1_name" id="guardian1_name"  />

</div>

</div>

<div>

<label>Address</label>

<div>

<input type="text" name="guardian1_address" id="guardian1_address"  />

</div>

</div>

<div>

<label>Contact No.</label>

<div>

<input type="text" name="guardian1_contact" id="guardian1_contact"  />

</div>

</div>

<div>

<label>Email</label>

<div>

<input type="text" name="guardian1_email" id="guardian1_email"  />

</div>

</div>

<div>

<label>Relationship with Child</label>

<div>

<input type="text" name="guardian1_relationship" id="guardian1_relationship"  />

</div>

</div>

<div>

<label>Guardian Name2</label>

<div>

<input type="text" name="guardian2_name" id="guardian2_name"  />

</div>

</div>

<div>

<label>Address</label>

<div>

<input type="text" name="guardian2_address" id="guardian2_address"  />

</div>

</div>

<div>

<label>Contact No.</label>

<div>

<input type="text" name="guardian2_contact" id="guardian2_contact"  />

</div>

</div>

<div>

<label>Email</label>

<div>

<input type="text" name="guardian2_email" id="guardian2_email"  />

</div>

</div>

<div>

<label>Relationship with Child</label>

<div>

<input type="text" name="guardian2_relationship" id="guardian2_relationship"  />

</div>

</div>

<h3>Additional Member's In the Family</h3>

<div>

<table>

<th>Sl No.</th>

<th>Name</th>

<th>Age</th>

<th>Gender</th>

<th>Relationship</th>

<th>Contact No.</th>

</tr>

<tr>

<td align="center"> 1</td>

<td><input type="text" name="name1" value="" style="width:130px;"/></td>

<td><input type="text" name="age1" value=""  style="width:130px;"  /></td>

<td><select name="gender1" style="width:130px;">

<option value="">---------select-------</option>

<option value="Male">Male</option>

<option value="Female">Female</option>

</select></td>

<td><input type="text" name="relationship1" value="" style="width:130px;"/></td>

<td><input type="text" name="contact1" value="" style="width:130px;"/></td>

</tr>

<tr>

<td align="center"> 2</td>

<td><input type="text" name="name2" value="" style="width:130px;"/></td>

<td><input type="text" name="age2" value=""  style="width:130px;"  /></td>

<td><select name="gender2"  style="width:130px;">

<option value="">---------select-------</option>

<option value="Male">Male</option>

<option value="Female">Female</option>

</select></td>

<td><input type="text" name="relationship2" value="" style="width:130px;"/></td>

<td><input type="text" name="contact2" value="" style="width:130px;"/></td>

</tr>

<tr>

<td align="center"> 3</td>

<td><input type="text" name="name3" value="" style="width:130px;"/></td>

<td><input type="text" name="age3" value=""  style="width:130px;"  /></td>

<td><select name="gender3"  style="width:130px;">

<option value="">---------select-------</option>

<option value="Male">Male</option>

<option value="Female">Female</option>

</select></td>

<td><input type="text" name="relationship3" value="" style="width:130px;"/></td>

<td><input type="text" name="contact3" value="" style="width:130px;"/></td>

</tr>

<tr>

<td align="center"> 4</td>

<td><input type="text" name="name4" value="" style="width:130px;"/></td>

<td><input type="text" name="age4" value=""  style="width:130px;"  /></td>

<td><select name="gender4"  style="width:130px;">

<option value="">---------select-------</option>

<option value="Male">Male</option>

<option value="Female">Female</option>

</select></td>

<td><input type="text" name="relationship4" value="" style="width:130px;"/></td>

<td><input type="text" name="contact4" value="" style="width:130px;"/></td>

</tr>

<tr>

<td align="center"> 5</td>

<td><input type="text" name="name5" value="" style="width:130px;"/></td>

<td><input type="text" name="age5" value=""  style="width:130px;" /></td>

<td><select name="gender5"  style="width:130px;">

<option value="">---------select-------</option>

<option value="Male">Male</option>

<option value="Female">Female</option>

</select></td>

<td><input type="text" name="relationship5" value="" style="width:130px;"/></td>

<td><input type="text" name="contact5" value="" style="width:130px;"/></td>

</tr>

</table>

</div>

<h3>Family Doctor's Details</h3>

<div>

<label>Doctor Name</label>

<div>

<input type="text" name="doctor_name" id="doctor_name" />

</div>

</div>

<div>

<label>Contact No.</label>

<div>

<input type="text" name="doctor_contact" id="doctor_contact" />

</div>

</div>

<div>

<label>Address</label>

<div>

<input type="text" name="doctor_address" id="doctor_address" />

</div>

</div>

<!--

<h3>Medical History</h3>

<div>

<label>Does your Child have any allergies </label>

<div>

<input type="radio" name="med1" id="med11"   value="Yes"  onclick="return test1(1);"/>Yes <input type="radio" name="med1" id="med11"   value="No" onClick="return test1('2');" checked />No

</div>

</div>

<div id="ifYes" style="display:none;">

<label>If yes, put details</label>

<div>

<textarea name="med1_details" id="med1_details"  /></textarea>

</div>

</div>

<div>

<label>Does your Child have any Physical, emotional or behavioral issues</label>

<div>

<input type="radio" name="med2" id="med21"   value="Yes"  onclick="return test2(1);"/>Yes <input type="radio" name="med2" id="med22"   value="No" onClick="return test2(2);" checked/>No

</div>

</div>

<div id="ifYes2" style="display:none;">

<label>If yes, put details</label>

<div>

<textarea name="med2_details" id="med2_details"  /></textarea>

</div>

</div>

<div>

<label>Child take any daily medication</label>

<div>

<input type="radio" name="med3" id="med31"   value="Yes" onClick="return test3(1);"/>Yes <input type="radio" name="med3" id="med32"   value="No" onClick="return test3(2);" checked/>No

</div>

</div>

<div id="ifYes3" style="display:none;">

<label>If yes, put details</label>

<div>

<textarea name="med3_details" id="med3_details"  /></textarea>

</div>

</div>

<div>

<label>Is there any further information</label>

<div>

<textarea name="more_details" id="more_details"  /></textarea>

</div>

</div>

-->

<h3>Emergency Permission</h3>

<p>I give my consent for emergency measures to be taken in case of an emergency situation arising due to an accident/violent

injury / medical or surgical emergency as soon as possible. The school will accept no responsibility for any unforeseen

incident that may occur due to the administration of medicine / treatment in both emergency and non-emergency

situations, tough necessary precautions are taken.</p>

<div>

<label>Place</label>

<div>

<input type="text" name="perm_place" id="perm_place"  />

</div>

</div>

<div>

<label>Date</label>

<div>

<input type="text" name="perm_date" id="perm_date"  />

</div>

</div>

<div>

<label>Signature</label>

<div>

<input type="text" name="perm_signature" id="perm_signature"  />

</div>

</div>

<h3>Photo Upload</h3>

<div>

<label>Student Photo</label>

<div>

<input type="file" name="file1" id="file1" />

</div>

</div>

<label><input type="submit" name="submit" value="Submit"  onclick="return ValidateForm();" /> <!--<input type="submit" value="Reset" />--></label>

</div>

</div>

</form>

<!--------------------- contact-form End --------------------->   

</div>

</div>

<!-- inner Content Area End -->

<!-- Footer Area Start -->

<?php include("include/footer.html"); ?>

<!-- Footer Area End -->

</body>

</html>







