<?php 
session_start();
include("includes/connect.php");
$pid=$_REQUEST['pid'];
$sid=session_id();
//$no_of_cart_item=mysql_num_rows(mysql_query("select * from cart where 1 and transac_id='".$sid."' and payment_status='0' "));


$sql = "select * from tbl_institute where mobile='".($_REQUEST['email3'])."'  and password= '".($_REQUEST['password3'])."'  ";

 $res = mysql_query($sql);

  $num = mysql_num_rows($res);
 $row2 = mysql_fetch_array($res);
			   $pass=md5($row2['password']);
	  if($num != '0' && md5($_REQUEST['password3'])==$pass )

		      {

			   $row = mysql_fetch_array($res);
			   //$pass=md5($row['password']);
if($row2['status']!='0')
{
			   $_SESSION['ins_id'] = $row2['id'];

			   $_SESSION['ins_name'] = $row2['ins_name'];
}
else
{
}
			 
if($row2['status']=='0')
{
header("location: ins_log.php?opt=3");
}
else
{
 header("location:dashboard.php");
 }
 
			 }
			 else
			{
		

		     header("location: ins_log.php?opt=2");

			 }

		

?>