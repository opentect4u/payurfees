<?php 
session_start();
include("includes/connect.php");
$pid=$_REQUEST['pid'];
$sid=session_id();
//$no_of_cart_item=mysql_num_rows(mysql_query("select * from cart where 1 and transac_id='".$sid."' and payment_status='0' "));


$sql = "select * from tbl_parent where (mobile='".$_REQUEST['email3']."' or email = '".$_REQUEST['email3']."') and password= '".$_REQUEST['password3']."' and otp_status='1'";

 $res = mysql_query($sql);

  $num = mysql_num_rows($res);

	  if($num != '0')

		      {

			   $row = mysql_fetch_array($res);

			   $_SESSION['parent_id'] = $row['id'];

			   $_SESSION['parent_name'] = $row['name'];

			 

			   
             header("location:my_dashboard.php");
			 }
			 else
			{
		

		     header("location: log_parent.php?opt=2");

			 }

		

?>