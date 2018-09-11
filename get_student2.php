<?php
include("includes/connect.php");
 $q=$_REQUEST['q'];
$student_data=mysql_fetch_array(mysql_query("select * from tbl_student where 1 and id='".$q."'"));
?>
<div><b>Institute : </b> <?php 
$student_data2=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$student_data['ins_id']."'"));

echo $student_data2['ins_name'];?></div>

<div><b>Roll : </b> <?php echo $student_data['roll_no'];?></div>
<div><b>Section : </b> <?php echo $student_data['section_name'];?></div>
<div><b>Class/Course : </b> <?php //echo $student_data['course_name'];


$student_data22=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$student_data['course_name']."'"));

echo $student_data22['course_name'];?>

</div>
<div><b>Academic Year : </b> <?php echo $student_data['year_reg'];?></div>
<div><b>Fee Code : </b> <?php $sql3="select * from tbl_fees where 1 and   course_id='".$student_data['course_name']."'"; 
   $res3=mysql_query($sql3);
   $pp='';
   while($cou3=mysql_fetch_array($res3))
   {
      echo $pp=$cou3['fee_code'];
	  
	  $data5=mysql_fetch_array(mysql_query("select * from tbl_fee_type where 1 and id='".$cou3['fee_type']."'"));
 echo "[".$data5['fee_type']."]";
 echo "- Rs "."<font color='green'>".$cou3['amount']."</font>";?>
 
 
 [<?php if($data5['payment_frequency']=='1') { echo "Monthly"; }?>
 <?php if($data5['payment_frequency']=='2') { echo "Quarterly"; }?>
 <?php if($data5['payment_frequency']=='3') { echo "Half Yearly"; }?>
 <?php if($data5['payment_frequency']=='4') { echo "Yearly"; }?>
 <?php if($data5['payment_frequency']=='5') { echo "Onetime"; }?>]
 <?php echo "<br/>";
	}
	//echo substr($pp,0,-1);
	?></div>
<div><b>Payable Amount : </b>
<?php $sql3="select * from tbl_fees where 1 and   course_id='".$student_data['course_name']."'"; 
   $res3=mysql_query($sql3);
 $payamt=0;
   while($cou3=mysql_fetch_array($res3))
   {
   
  // echo "select sum(amount) as amount from tbl_fees_data where 1 and fee_id='".$cou3['fee_code']."'";
   $tot=mysql_fetch_array(mysql_query("select sum(amount) as amount from tbl_fees where 1 and fee_code='".$cou3['fee_code']."'"));
   
    //echo $tot['amount'];
	
       $payamt+=$tot['amount'];
	}
	?>

Rs. <?php echo $payamt;?>/-</div>