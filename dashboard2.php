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
location.href="dashboard.php";
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
<td  width="70%" align="center" valign="top"><h3>My Dashboard</h3>

<b>Total No. Of Student</b> : <?php echo $no_student=mysql_num_rows(mysql_query("select * from tbl_student where 1 and ins_id='".$_SESSION['ins_id']."'"));?>
</td>
</tr>
</table>
</body>
</html>
