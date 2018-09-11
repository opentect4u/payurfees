<?php
include("_head.php"); 
if($_REQUEST['cat_name'])
{


	$sql="update tbl_course set
	
	course_name='".addslashes($_REQUEST['cat_name'])."',
	
	institute_type_id='".$_REQUEST['institute_type_id']."'
	 where id='".$_REQUEST['id']."' ";
	mysql_query($sql);
	
	$msg=1;
	?>
	 <script type="text/javascript">
		location.href="edit_course.php?opt=1&id=<?php echo $_GET['id'];?>";
		</script>
	<?php
	
		
	    
}
?>

<script type="text/javascript" >
function validate()
{
var category_name=document.getElementById('cat_name').value;
if(category_name=='')
{
alert("Please enter the  Course name");
document.getElementById('cat_name').focus();
return false;
}

return true;
}
</script>
<?php
$sql="select * from tbl_course where 1 and id='".$_REQUEST['id']."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
?>
<table width="0%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" valign="middle" class="brown_text_big">Course Management </td>
	<td align="left" valign="middle"><img src="images/icon.gif" alt="TMC" /></td>
    <td align="left" valign="middle" class="select_txt">Edit Course Name</td>
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
			if($_REQUEST['opt']=="1")
			{
			?>
			<tr>
			<td>&nbsp;</td>
			<td colspan="2"><b><font color="#009966" size="2">Data Edited Successfully !!!</font></b></td>
			<?php
			}
			?>
			
			<?php
			if($msg=="2")
			{
			?>
			<tr>
			<td>&nbsp;</td>
			<td colspan="2"><b><font color="#FF0000" size="2">Same Categoiry Name Already added !!!</font></b></td>
			<?php
			}
			?>
			    <tr>
				<td align="left" valign="middle"><strong>Institute Type</strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <select name="institute_type_id" id="institute_type_id"><option value="" <?php if($data['institute_type_id']=="") { echo "selected"; }?>>--None--</option>
				<?php
				$s="select * from tbl_institute_type where 1  order by id asc";
				$r=mysql_query($s);
				while($d=mysql_fetch_array($r))
				{
				?>
				<option value="<?php echo $d['id'];?>" <?php if($data['institute_type_id']==$d['id']) { echo "selected"; }?>><?php echo $d['institute_type'];?></option>
				<?php
				}
				?></select> </label></td>
			  </tr>
			  
			  <tr>
				<td align="left" valign="middle"><strong>Course/Class Name </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" name="cat_name" id="cat_name"  class="finput"  value="<?php echo stripslashes($data['course_name']);?>"/> </label></td>
			  </tr>
			  
				  
			  <tr>
				<td align="left" valign="middle">&nbsp;</td>
				<td height="45" align="center" valign="middle">&nbsp;</td>
				<td align="right" valign="bottom">	<input type="image" src="images/modify.png" alt="Submit" name="Submit" />	 </td>
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