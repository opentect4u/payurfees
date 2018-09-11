<?php
include("_head.php"); 
if($_REQUEST['name'])
{

$sn=mysql_num_rows(mysql_query("select * from page where name='".$_REQUEST['name']."' and id!='".$_REQUEST['id']."'"));
	if($sn=="0")
	{
	$sql="update page set
	pid='".$_REQUEST['pid']."',
meta_title='".addslashes($_REQUEST['meta_title'])."',
meta_keyword='".addslashes($_REQUEST['meta_keyword'])."',
meta_desc='".addslashes($_REQUEST['meta_desc'])."',
	details='".addslashes($_REQUEST['details'])."',
	name='".addslashes($_REQUEST['name'])."'
	 where id='".$_REQUEST['id']."' ";
	mysql_query($sql);
	
	$msg=1;
	?>
	 <script type="text/javascript">
		location.href="edit_page.php?opt=1&id=<?php echo $_GET['id'];?>";
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
var category_name=document.getElementById('name').value;
if(category_name=='')
{
alert("Please enter the  page name");
document.getElementById('name').focus();
return false;
}

return true;
}
</script>
<?php
$sql="select * from page where 1 and id='".$_REQUEST['id']."'";
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
?>

<?php

include("../../cgws/fckeditor/fckeditor.php");
	$oFCKeditor = new FCKeditor('details');
	$oFCKeditor->BasePath = '../../cgws/fckeditor/' ;
	$oFCKeditor->Width  = '100%' ;
$oFCKeditor->Height = '400' ;
?>
<table width="0%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" valign="middle" class="brown_text_big">Page Management </td>
	<td align="left" valign="middle"><img src="images/icon.gif" alt="TMC" /></td>
    <td align="left" valign="middle" class="select_txt">Edit Page Content</td>
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
			<td align="left" valign="top" class="admin_fildbox" ><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
			
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
			<td colspan="2"><b><font color="#FF0000" size="2">Same Page Name Already added !!!</font></b></td>
			<?php
			}
			?>
			 <tr>
				<td align="left" valign="middle"><strong>Parent Page</strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <select name="pid"><option value="0" <?php if($data['pid']=="0") { echo "selected"; }?>>--None--</option>
				<?php
				$s="select * from page where 1 and pid='0'  order by id asc";
				$r=mysql_query($s);
				while($d=mysql_fetch_array($r))
				{
				?>
				<option value="<?php echo $d['id'];?>" <?php if($data['pid']==$d['id']) { echo "selected"; }?>><?php echo $d['name'];?></option>
				<?php
				}
				?></select> </label></td>
			  </tr> 
			  <tr>
				<td align="left" valign="middle"><strong>Page Name </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" name="name" id="name"  class="finput"  value="<?php echo $data['name'];?>"/> </label></td>
			  </tr>
			  
			<!-- <tr>
				<td align="left" valign="middle"><strong>Meta Title </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" name="meta_title" id="meta_title"  class="finput"  value="<?php echo stripslashes($data['meta_title']);?>"/> </label></td>
			  </tr>
			  
			  	  <tr>
				<td align="left" valign="middle"><strong>Meta Keyword </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" name="meta_keyword" id="meta_keyword"  class="finput"  value="<?php echo stripslashes($data['meta_keyword']);?>"/> </label></td>
			  </tr>
			  
			  	  <tr>
				<td align="left" valign="top"><strong>Meta Description</strong></td>
				<td width="10" height="35" align="center" valign="top">:</td>
				<td align="left" valign="middle"><label><textarea  name="meta_desc" id="meta_desc"  class="finput" style="width:200px; height:90px;" /><?php echo $data['meta_desc'];?></textarea>  </label></td>
			  </tr>
			-->
			  
			   <tr>
				<td align="left" valign="middle" colspan="3"><?php

	$oFCKeditor->Value=stripslashes($data['details']);

			$oFCKeditor->Create() ;

		   ?></td>
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