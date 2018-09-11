<?php
include("includes/connect.php");
$q=$_REQUEST['q'];
$data=mysql_fetch_array(mysql_query("select * from tbl_fee_type where 1 and id='".$q."'"));
?>
<b>Payment Mode: </b>
<?php if($data['payment_mode']=='1') { echo "Exact Amount"; }?>
 <?php if($data['payment_mode']=='2') { echo "Advanced Amount"; }?>
 <?php if($data['payment_mode']=='3') { echo "Any Amount"; }?>
<br/>
<b>Payment Frequnency: </b> 
<?php if($data['payment_frequency']=='1') { echo "Monthly"; }?>
 <?php if($data['payment_frequency']=='2') { echo "Quarterly"; }?>
 <?php if($data['payment_frequency']=='3') { echo "Half Yearly"; }?>
 <?php if($data['payment_frequency']=='4') { echo "Yearly"; }?>

