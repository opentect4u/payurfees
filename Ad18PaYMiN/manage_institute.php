<?php
include("_head.php");
$qr= new Query;
$table_name="tbl_institute";
$total=20;
if($_GET['page']!="")
{
	$start=$_GET['page'];
}
else
{
	$start=0;
}
$selected_field="*";
if($_REQUEST['ins_name'])
{
$m22='%'.$_REQUEST['ins_name'].'%';
$name=" and ins_name like '".$m22."' ";
}
else
{
$name="";
}


if($_REQUEST['mobile'])
{
$m2='%'.$_REQUEST['mobile'].'%';
$mobile=" and mobile like '".$m2."' ";
}
else
{
$mobile="";
}

$mode="  and status='1' $name $mobile order by id desc";
$row=$qr->select_row($table_name,$selected_field,$mode,$start,$total);

if($_REQUEST['mode']=='del')
{
	$del=mysql_query("delete from tbl_institute where id='".$_GET['id']."' ");
		
	?>
	<meta http-equiv="refresh" content="0; url=manage_institute.php" />
	<?php
} 
?>
<SCRIPT language="JavaScript">
function go_there(id)
{
	var where_to= confirm("Do you really want to delete this Institute?");
	if (where_to== true)
	{
		window.location="manage_institute.php?id="+id+"&mode=del";
	}
}
</SCRIPT>

<SCRIPT language="JavaScript">
function page_cat()
{
//alert("aaa");
	var str=document.getElementById('pid').value;
	if(str>0)
	{
		window.location="manage_institute.php?cid="+str;
		}
		else
		{
		window.location="manage_institute.php";
		}
	
}
</SCRIPT>

<table width="0%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="left" valign="middle" class="brown_text_big">Institute Management </td>
	<td align="left" valign="middle"><img src="images/icon.gif" alt="TMC" /></td>
    <td align="left" valign="middle" class="select_txt">List of Active  Institute(s)</td>
  </tr>
</table></div>
<!--<p>&nbsp;</p>-->
	<center>
	
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" bgcolor="#77CAFC"><table width="100%" border="0" cellspacing="1" cellpadding="0">
  
    <tr>
    <td  height="27" align="left" valign="middle" class="menubg"><form name="" action="manage_institute.php" method="post">
    <b>Search By:</b> Name:<input type="text" name="ins_name" /> Mobile No.<input type="text" name="mobile" />  <input type="submit" name="submit" value="Go" /></form></td>
  </tr>
  
  
  
  <tr>
    <td  height="27" align="left" valign="middle" class="menubg"><span class="showtxt"><strong>Active Institute List</strong></span> </td>
  </tr>
  
   <tr>
    <td  height="27" align="right" valign="middle" class="menubg" style="padding-right:10px;">
	<!--<select name="pid" id="pid" onchange="return page_cat();"><option value="0" <?php if($data['pid']=="0") { echo "selected"; }?>>--All Page--</option>
				<?php
				//$s="select * from page where 1 and pid='0'  order by id asc";
				$s="select * from page where 1 and pid='0' and id in('2','7')  order by id asc";
				$r=mysql_query($s);
				while($d=mysql_fetch_array($r))
				{
				?>
				<option value="<?php echo $d['id'];?>" <?php if($_REQUEST['cid']==$d['id']) { echo "selected"; }?>><?php echo $d['name'];?></option>
				<?php
				}
				?></select>-->
	 </td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td width="6%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">SL No. </td>
    <td width="30%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Institute Name </td>
     <td width="15%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Authorized Person </td>
      <td width="10%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Mobile No. </td>
       <td width="10%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Status</td>
       <td width="10%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Joined</td>
    <td width="7%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Edit </td>
    <td width="5%" align="center" valign="middle" bgcolor="#20789C" class="white_txt">Delete</td>
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
    <td align="center" valign="middle"><?php echo $start+$i; ?></td>
    <td align="center" valign="middle"><b><?php echo ucwords($row[$m]['ins_name']); ?></b><br/><?php echo ucwords($row[$m]['ins_type']); ?><br/> <?php if($row[$m]['st_month']) {echo ($row[$m]['st_month'])."-".$row[$m]['st_year']; ?> to <?php echo ($row[$m]['en_month'])."-".$row[$m]['en_year']; }?><br/>
    <b style="color:#FF3333">Con. Fees:</b> Rs.<?php echo $row[$m]['convenience_fees'];?></td>
  <td align="center" valign="middle"><?php echo ucwords($row[$m]['name']); ?></td>
  <td align="center" valign="middle"><?php echo ucwords($row[$m]['mobile']); ?></td>
  <td align="center" valign="middle"><?php if($row[$m]['status']=='1') {?><b style="color:#009900">Active</b> <?php } else {?><b style="color:#FF0000">In-Active</b> <?php }?></td>
  <td align="center" valign="middle"><?php $dt=explode("-",$row[$m]['doj']); echo $dt[2]."/".$dt[1]."/".$dt[0]; ?></td>
    <td align="center" valign="middle"><a href="edit_institute.php?id=<?php echo $row[$m]['id']; ?>&edit"><img src="images/b_edit.png" alt="edit" border="0"></a></td>
    <td align="center" valign="middle"><a href="#" onClick="go_there(<?php echo $row[$m]['id']; ?>)";><img src="images/b_drop.png" alt="Delete" border="0"></a></td>

  </tr>
   <?php
  }
  $i++;
}
if(count($row)==0)
{
	?>
	<tr>

		<td colspan="6" align="center" class="showheading">No Record Found</td>

	  </tr>
	<?php
	}
	?>
  
 
</table>
</td>
  </tr>
  <tr>
    <td height="20" align="right" valign="middle" class="menubg" style="font-size:12px;"><?php
if(count($row)>0)
  {
  ?>Page: <?php 
	  if($_REQUEST['page']=="") $page=0; else $page=$_REQUEST['page']; 
	  if($_REQUEST['limit']=="") $limit=30; else $limit=$_REQUEST['limit'];
	  $file_name="show_page.php";
	  $ob=new Paginate2;
	  $page= $ob->paginate1($table_name,$selected_field,$file_name,$page,$limit,"  and status='1' $name $mobile order by id asc");
	  echo $page;
	}
	?></td>
  </tr>
</table>
</td>
  </tr>
</table>

	  </center>




<?php 
include("_foot.php"); 
?>