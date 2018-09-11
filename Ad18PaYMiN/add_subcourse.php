<?php
include("_head.php"); 

if($_REQUEST['cat_name'])
{

	$sn=mysql_num_rows(mysql_query("select * from tbl_course where 1 and pid='".$_REQUEST['pid']."' and course_name='".addslashes($_REQUEST['cat_name'])."' "));
	if($sn=="0")
	{
	 $sql="insert into tbl_course set
	pid='".$_REQUEST['pid']."',
	institute_type_id='".$_REQUEST['institute_type_id']."',
	course_name='".addslashes($_REQUEST['cat_name'])."'";
	
	mysql_query($sql);
	
	$msg=1;
	?>
	  <script type="text/javascript">
		location.href="show_subcourse.php";
		</script>
	<?php
	}
	else
	{
	$msg=2;
	}

	       
}
?>

<script type="text/javascript" >
function validate()
{

var category_name3=document.getElementById('institute_type_id').value;
if(category_name3=='')
{
alert("Please select the Institute Type");
document.getElementById('institute_type_id').focus();
return false;
}

var category_name3=document.getElementById('pid').value;
if(category_name3=='')
{
alert("Please select the Course name");
document.getElementById('pid').focus();
return false;
}
var category_name=document.getElementById('cat_name').value;
if(category_name=='')
{
alert("Please enter the Sub Course name");
document.getElementById('cat_name').focus();
return false;
}


return true;
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
var url="get_my_course.php";
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
<table width="0%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" valign="middle" class="brown_text_big">Sub-Course Management </td>
	<td align="left" valign="middle"><img src="images/icon.gif" alt="TMC" /></td>
    <td align="left" valign="middle" class="select_txt">Add Sub-Course</td>
  </tr>
</table></div>
<!--<p>&nbsp;</p>-->
	<center>
	<div class="admin_mid_box">
	<!--<p>
	<h1>:: Add Consigner:: </h1>
	</p>-->
      <p align="center">
	  <form name="inform" method="post" action="" enctype="multipart/form-data" onSubmit="return validate();">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left" valign="top" class="admin_fildbox" ><table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
			<?php
			if($msg=="2")
			{
			?>
			<tr>
			<td>&nbsp;</td>
			<td colspan="2"><b><font color="#FF0000" size="2">Same Sub-Course  Already added !!!</font></b></td>
			<?php
			}
			?>
				 
              <tr>
				<td align="left" valign="middle"><strong>Institute Type</strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <select name="institute_type_id" id="institute_type_id" onchange="showUser(this.value)"><option value="">--select--</option>
				<?php
				$s="select * from tbl_institute_type where 1 and status='2' order by id asc";
				$r=mysql_query($s);
				while($d=mysql_fetch_array($r))
				{
				?>
				<option value="<?php echo $d['id'];?>"><?php echo $d['institute_type'];?></option>
				<?php
				}
				?></select> </label></td>
			  </tr>
              
              
              <tr>
				<td align="left" valign="middle"><strong>Course Name</strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><div id='txtHint'> 
                <select name="pid" id="pid">
                <option value="">--select--</option>
				</select> </div></td>
			  </tr>
              
              
			  <tr>
				<td align="left" valign="middle"><strong>Sub-Course Name</strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" name="cat_name" id="cat_name"  class="finput" /> </label></td>
			  </tr>
	
			  <tr>
				<td align="left" valign="middle">&nbsp;</td>
				<td height="45" align="center" valign="middle">&nbsp;</td>
				<td align="right" valign="bottom">	<input type="image" src="images/submit.png" alt="Submit" name="Submit" />	 </td>
			  </tr>
		
			</table>
			
			</td>
		  </tr>
		 
		</table>
	</form>
</p>
	  </div>
	  </center>
	  <? 
include("_foot.php"); 
?>