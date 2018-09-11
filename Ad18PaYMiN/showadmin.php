<?php
include("_head.php");
$total=10;
if($_GET['page']!="")
{
	$start=$_GET['page'];
}
else
{
	$start=0;
}
$qr= new Query;
$table_name="admin_user";
$selected_field="*";
$row=$qr->select_row($table_name,$selected_field,'','','');
$results = array();
if(isset($_GET['del']))
{
	$qr->delete($table_name,"id",$_GET['id']);
	?>
	<meta http-equiv="refresh" content="0; url=showadmin.php" />
	<?php 
} 
?>
<SCRIPT language="JavaScript">
function go_there(id)
{
	var where_to= confirm("Do you really want to delete this admin??");
	if (where_to== true)
	{
		window.location="showadmin.php?id="+id+"&del";
	}
}
</SCRIPT>
<table width="0%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" valign="middle" class="brown_text_big">Admin Management </td>
	<td align="left" valign="middle"><img src="images/icon.gif" alt="TMC" /></td>
    <td align="left" valign="middle" class="select_txt">Admin Profile</td>
  </tr>
</table></div>
<!--<p>&nbsp;</p>-->
	<center>
	
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" bgcolor="#77CAFC"><table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td  height="27" align="left" valign="middle" class="menubg"><span class="showtxt"><strong>All Admin List</strong></span> </td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td width="4%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Sl. no. </td>
    <td width="29%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Name </td>
      <td width="10%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Mobile No. </td>
    <td width="21%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">User Name </td>
    <td width="14%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Password </td>
	<td width="15%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Email</td>
    <td width="7%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Edit </td>
    
  </tr>
  
  <?php
$i=1;
for($m=0;$m<count($row);$m++)
{  	
  if(count($row)>0)
  {
	  if($i%2==0)
	  {
	  	$alt='tr_bg';
	  }
	  else
	  {
	  	$alt='tr_bg2';
	  }
	  ?>
  <tr class="<?php echo $alt;?>">
    <td align="center" valign="middle"><?php echo $i; ?></td>
    <td align="center" valign="middle"><?php echo ucwords($row[$m]['name']); ?></td>
     <td align="center" valign="middle"><?php echo ucwords($row[$m]['mobile']); ?></td>
    <td align="center" valign="middle"><?php echo ($row[$m]['user_name']); ?></td>
    <td align="center" valign="middle"><?php echo ($row[$m]['password']); ?></td>
	 <td align="center" valign="middle"><?php echo ($row[$m]['email']); ?></td>
    <td align="center" valign="middle"><a href="editadmin.php?id=<?php echo $row[$m]['id']; ?>&edit"><img src="images/b_edit.png" alt="edit" border="0"></a></td>
    
  </tr>
   <?php
  }
  $i++;
}
?>
  
 
</table>
</td>
  </tr>

</table>
</td>
  </tr>
</table>

	  </center>


	<?php 

include("_foot.php"); 
?>