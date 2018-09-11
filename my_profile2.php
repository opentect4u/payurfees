<?php
session_start();
if($_SESSION['ins_id']=='')
{
?>
<script type="text/javascript">
location.href="ins_log.php";
</script>
<?php
}

include("includes/connect.php");


//Start our session.

 
//Expire the session if user is inactive for 30
//minutes or more.
$expireAfter = 2;
 
//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
		//$_SESSION['ins_id']='';
	//$_SESSION['ins_name']='';
       // session_unset();
       // session_destroy();
    }
    
}
 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();

/*
 st_month='".addslashes($_REQUEST['st_month'])."',
 st_year='".addslashes($_REQUEST['st_year'])."',
 en_month='".addslashes($_REQUEST['en_month'])."',
 en_year='".addslashes($_REQUEST['en_year'])."',
 */
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$_SESSION['ins_id']."'"));
if($_REQUEST['name'])
{
 $sql2="update  tbl_institute set
 

 ins_website='".addslashes($_REQUEST['ins_website'])."',
 designation='".addslashes($_REQUEST['designation'])."',
 address='".addslashes($_REQUEST['address'])."',
  zip='".addslashes($_REQUEST['zip'])."',
  ins_website='".addslashes($_REQUEST['ins_website'])."',
  office_phone='".addslashes($_REQUEST['office_phone'])."',
  office_email='".addslashes($_REQUEST['office_email'])."',
   name='".addslashes($_REQUEST['name'])."'
  
	 
  
  where
   id='".$_SESSION['ins_id']."'";
   mysql_query($sql2);
?>
<script type="text/javascript">
alert("Data Saved successfully..");
location.href="my_profile.php";
</script>
<?php
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
</head>

<body>
<h3><b style="color:#990000"><?php echo $mem_data['ins_name'];?></b> logged in as Institute</h3>

<table border="1" cellpadding="1" cellspacing="2" align="center" width="80%">
<tr>
<td width="30%" align="center" valign="top">
<?php include("dmenu.php");?>


</td>
<td  width="70%" align="center" valign="top"><h3>My Profile</h3>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="1" cellspacing="2" align="center" width="80%">


<tr>
<td><b>Name of the Institution:</b></td>
<td bgcolor="#CCCCCC"><?php echo $mem_data['ins_name'];?></td>
</tr>


 <tr>
  <td ><b>Session Start</b> </td>
  <td ><select name="st_month" id="st_month" disabled="disabled">
          <option value="">Month</option>
          <option value="01" <?php if($mem_data['st_month']=='01') {?> selected="selected" <?php }?>>Jan</option>
  <option value="02" <?php if($mem_data['st_month']=='02') {?> selected="selected" <?php }?>>Feb</option>
  <option value="03" <?php if($mem_data['st_month']=='03') {?> selected="selected" <?php }?>>Mar</option>
  <option value="04" <?php if($mem_data['st_month']=='04') {?> selected="selected" <?php }?>>Apr</option>
  <option value="05" <?php if($mem_data['st_month']=='05') {?> selected="selected" <?php }?>>May</option>
  <option value="06" <?php if($mem_data['st_month']=='06') {?> selected="selected" <?php }?>>Jun</option>
  <option value="07" <?php if($mem_data['st_month']=='07') {?> selected="selected" <?php }?>>Jul</option>
  <option value="08" <?php if($mem_data['st_month']=='08') {?> selected="selected" <?php }?>>Aug</option>
  <option value="09" <?php if($mem_data['st_month']=='09') {?> selected="selected" <?php }?>>Sep</option>
  <option value="10" <?php if($mem_data['st_month']=='10') {?> selected="selected" <?php }?>>Oct</option>
  <option value="11" <?php if($mem_data['st_month']=='11') {?> selected="selected" <?php }?>>Nov</option>
  <option value="12" <?php if($mem_data['st_month']=='12') {?> selected="selected" <?php }?>>Dec</option>
        </select>-<select name="st_year" id="st_year" disabled="disabled"/>
        <?php
		for($i3=2018;$i3<=2030;$i3++)
		{
		?> <option value="<?php echo $i3;?>" <?php if($mem_data['st_year']==$i3) {?> selected="selected" <?php }?>><?php echo $i3;?></option>
        <?php
		}
		?>
        </select></td>
  </tr>
  
  
    <tr>
  <td ><b>Session End </b> </td>
  <td ><select name="en_month" id="en_month" disabled="disabled">
          <option value="">Month</option>
    <option value="01" <?php if($mem_data['en_month']=='01') {?> selected="selected" <?php }?>>Jan</option>
  <option value="02" <?php if($mem_data['en_month']=='02') {?> selected="selected" <?php }?>>Feb</option>
  <option value="03" <?php if($mem_data['en_month']=='03') {?> selected="selected" <?php }?>>Mar</option>
  <option value="04" <?php if($mem_data['en_month']=='04') {?> selected="selected" <?php }?>>Apr</option>
  <option value="05" <?php if($mem_data['en_month']=='05') {?> selected="selected" <?php }?>>May</option>
  <option value="06" <?php if($mem_data['en_month']=='06') {?> selected="selected" <?php }?>>Jun</option>
  <option value="07" <?php if($mem_data['en_month']=='07') {?> selected="selected" <?php }?>>Jul</option>
  <option value="08" <?php if($mem_data['en_month']=='08') {?> selected="selected" <?php }?>>Aug</option>
  <option value="09" <?php if($mem_data['en_month']=='09') {?> selected="selected" <?php }?>>Sep</option>
  <option value="10" <?php if($mem_data['en_month']=='10') {?> selected="selected" <?php }?>>Oct</option>
  <option value="11" <?php if($mem_data['en_month']=='11') {?> selected="selected" <?php }?>>Nov</option>
  <option value="12" <?php if($mem_data['en_month']=='12') {?> selected="selected" <?php }?>>Dec</option>
        </select>-<select name="en_year" id="en_year" disabled="disabled"/>
        <?php
		for($i3=2018;$i3<=2030;$i3++)
		{
		?> <option value="<?php echo $i3;?>" <?php if($mem_data['en_year']==$i3) {?> selected="selected" <?php }?>><?php echo $i3;?></option>
        <?php
		}
		?>
        </select></td>
  </tr>
  
  
  
<tr>
<td><b>Address:</b></td>
<td><input type="text" name="address" id="address" value="<?php echo $mem_data['address'];?>"/></td>
</tr>

<tr>
<td><b>Pin Code:</b></td>
<td><input type="text" name="zip" id="zip" value="<?php echo $mem_data['zip'];?>"/></td>
</tr>

<tr>
<td><b>Type of Institution:</b></td>
<td bgcolor="#CCCCCC"><?php echo $mem_data['ins_type'];?></td>
</tr>


<tr>
<td><b>Office Phone:</b></td>
<td><input type="text" name="office_phone" id="office_phone" value="<?php echo $mem_data['office_phone'];?>"/></td>
</tr>

<tr>
<td><b>Office Email Id:</b></td>
<td><input type="text" name="office_email" id="office_email" value="<?php echo $mem_data['office_email'];?>"/></td>
</tr>


<tr>
<td><b> Institute's Website:</b></td>
<td><input type="text" name="ins_website" id="ins_website" value="<?php echo $mem_data['ins_website'];?>"/></td>
</tr>





<tr>
<td><b>Name of the Authorised Person:</b></td>
<td><input type="text" name="name" id="name" value="<?php echo $mem_data['name'];?>"/></td>
</tr>

<tr>
<td><b>Designation:</b></td>
<td><input type="text" name="designation" id="designation" value="<?php echo $mem_data['designation'];?>"/></td>
</tr>

<tr>
<td><b>Mobile:</b></td>
<td bgcolor="#CCCCCC"><?php echo $mem_data['mobile'];?></td>
</tr>

<tr>
<td><b>Email:</b></td>
<td><input type="text" name="email" id="email" value="<?php echo $mem_data['email'];?>"/></td>
</tr>





<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Save" onClick="return test1();"/></td>
</tr>
</table>
</form>

</td>
</tr>
</table>
</body>
</html>
