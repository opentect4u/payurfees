<?php
	include("_head.php");
	if($_POST['submit'])
		  {
	  
	  $s="select * from tbl_institute_type where  1 and institute_type='".$_REQUEST['institute_type']."' and id!='".$_REQUEST['id']."' ";
		$r=mysql_query($s);
		$n=mysql_num_rows($r);
		   if($n==0)
		   {
				  
				   $sql="update tbl_institute_type set
				  
			
institute_type='".addslashes($_REQUEST['institute_type'])."',
status='".addslashes($_REQUEST['status'])."',
doj='".date("Y-m-d")."'
				   where id='".$_REQUEST['id']."'";
				  //echo  $sql;
				  mysql_query($sql);
				   ?>
				   
				   
			   
				   
				   
				   
				  <?php 
				   $msg=1;
		   }
		   
		   if($n>0)
		   {
		   $msg=2;
		   }
	  
	  
	 }
	
	?>
	<?php 
	$show="select * from tbl_institute_type where id='".$_GET['id']."' ";
	$qry=mysql_query($show);
	$result=mysql_fetch_array($qry);
	
	?>
<script type="text/javascript" src="js/edituserval.js"></script>
<script type="text/javascript">
function ValidateForm()
{
if(document.getElementById('institute_type').value=='')
{
alert("Pleae enter the  Intitute Type ");
document.getElementById('institute_type').focus();
return false;
}


return true;
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="infoBoxContents1">
<tr><td>




<form name="f1" action="" method="post">
<table border="0" cellpadding="3" cellspacing="3" align="center"  width="700">
<?php
if($msg==1)
{
?>
<tr>
<td></td>
<td><font color="green">Intitutions's Type Data Edited Successfuuly</font></td>
</tr>
<?php
}
if($msg==2)
{
?>
<tr>
<td></td>
<td><font color="red">This Email address alredy used in our database..</font></td>
</tr>
<?php
}
?>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td align="right"><font color="red">*</font>Type of the Institution:</td>
<td><input type="text" name="institute_type" id="institute_type" size="30" value="<?php echo $result['institute_type'];?>"/></td>
</tr>





<tr>
<td align="right"><font color="red">*</font> Sub-Course Accessibility :</td>
<td><input type="radio" name="status" id="st1"   value="2" <?php if($result['status']=='2') { echo "checked"; }?>/><b style="color:#009900">Yes</b>
<input type="radio" name="status" id="st1"   value="1" <?php if($result['status']=='1') { echo "checked"; }?>/><b style="color:#FF0000">No</b>

</td>
</tr>


<tr>
<td colspan="2">&nbsp;</td>
</tr>

<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Save" onclick="return ValidateForm();" class="formbutton"/></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</table>
</form>
</td></tr></table>
<?php include("_foot.php");  ?>