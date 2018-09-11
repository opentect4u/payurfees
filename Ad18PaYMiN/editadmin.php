<?php
include("_head.php");
$qr= new Query;
$table_name="admin_user";
if($_REQUEST['name'])
{
	if($qr->update($table_name,"id",$_REQUEST['id']))
	{
	 	?>
<script type="text/javascript">
location.href="editadmin.php?opt=1&id=<?php echo $_REQUEST['id'];?>";
</script>
<?php
//header("location:editadmin.php?opt=1&id=" .$_REQUEST['id']);
	}
}
$selected_fields="*";
$mode=" and id='".$_REQUEST['id']."'";
$row=$qr->select_row($table_name,$selected_fields,$mode,'','');
?>
<script type="text/javascript" src="js/editadminval.js"></script>

<table width="0%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" valign="middle" class="brown_text_big">Admin Management </td>
	<td align="left" valign="middle"><img src="images/icon.gif" alt="TMC" /></td>
    <td align="left" valign="middle" class="select_txt">Admin Profile</td>
  </tr>
</table></div>
<!--<p>&nbsp;</p>-->
	<center>
	<div class="admin_mid_box">
	<!--<p>
	<h1>:: Add Consigner:: </h1>
	</p>-->
      <p align="center">
	   <form name="inform" method="post" action="" onSubmit="return validate();">
 <?php 	
 	for($j=0;$j<count($row);$j++)
	{
?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td align="left" valign="top" class="admin_fildbox" ><table width="0%" border="0" align="center" cellpadding="0" cellspacing="0">
			  
			  <tr>
				<td align="left" valign="middle"><strong>  Name </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text"  id="name" name="name" value="<?php echo $row[$j]['name'] ;?>" class="finput" /> </label></td>
			  </tr>
			    <tr>
				<td align="left" valign="middle"><strong>Email </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" name="email" id="email" value="<?php echo $row[$j]['email'] ;?>"  class="finput" /> </label></td>
			  </tr>
			  <tr>
				<td align="left" valign="middle"><strong>User Name </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" id="username" name="user_name" value="<?php echo $row[$j]['user_name'] ;?>"  class="finput"  readonly="readonly"/> </label></td>
			  </tr>
              
              
              <tr>
				<td align="left" valign="middle"><strong>Mobile No. </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="text" name="mobile" id="mobile" value="<?php echo $row[$j]['mobile'] ;?>"  class="finput" /> </label></td>
			  </tr>
              
              
		  <tr>
				<td align="left" valign="middle"><strong>Password </strong></td>
				<td width="10" height="35" align="center" valign="middle">:</td>
				<td align="left" valign="middle"><label> <input type="password" id="password" name="password" value="<?php echo $row[$j]['password'] ;?>" class="finput" /> </label></td>
			  </tr>
			  <?php
	}
	?>
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
<?php include("_foot.php");  ?>