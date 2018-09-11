<?php
include("ins_header.php");
?>

   <div class="wrapper">

            <div class="container">

                <div class="row">

                    <div class="span3">

                        <div class="sidebar">

                            

                            
                             <?php include("left_menu.php");?>

                        </div>

                        <!--/.sidebar-->

                    </div>

                    <!--/.span3-->

                    <div class="span9">

                        <div class="content">

                            

                          

						<div class="module">

							<div class="module-head" style="background:#042139">

								<h2 style="color:#FFFFFF">Details of  Fee Structure</h2>

							</div>

							<div class="module-body">

							<div class="module-body table">
                            
                           
<?php
$data=mysql_fetch_array(mysql_query("select * from tbl_fees where 1 and id='".$_REQUEST['id']."'"));
?>
<form name="aa" action="" method="post" enctype="multipart/form-data">
<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">



<tr>
<td><b>Course</b></td>
<td><?php $rcse=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$data['course_id']."' "));
$rcse_sub=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$rcse['sub_course_id']."' "));
?>
<?php echo $rcse['course_name']?> 
<?php if($rcse_sub['course_name']) { echo "-";  echo $rcse_sub['course_name']; }?></td>
</tr>


<tr>

<td><b>Remarks:</b> <font color="red" size="2">*</font></td>
<td><?php echo $data['remarks'];?></td>
</tr>


<!--<tr>

<td><b>Session:</b> <font color="red" size="2">*</font></td>
<td><?php echo $data['ses_year'];?></td>
</tr>

-->

<tr>

<td><b>Total Amount:</b> <font color="red" size="2">*</font></td>
<td><?php
   
   $tot=mysql_fetch_array(mysql_query("select sum(amount) as amount from tbl_fees_data where 1 and fee_id='".$data['id']."'"));
   
    echo $tot['amount'];?></td>
</tr>

<?php if($data['late_amount'])
{
?>
<tr>
<td><b>Late Fee Amount:</b> </td>
<td><?php echo $data['late_amount'];?></td>
</tr>
<?php
}
?>
<?php if($data['reamrks'])
{
?>
<tr>
<td><b>Remarks:</b></td>
<td><?php echo $data['remarks'];?></td>
</tr>
<?php
}
?>

<tr><td colspan="2"><h4 style="color:#3300CC">Fee Payable</h4></td></tr>



<tr><td colspan="2">

<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">
<tr>
<th>#</th>
<th>Fee Type</th>
<th>Amount</th>
<th>Frequency</th>
<th>Mode</th>

<th>Due Date</th>
</tr>
<?php
$s="select * from tbl_fees_data where 1 and fee_id='".$_REQUEST['id']."' order by id asc";
$r=mysql_query($s);
$c=1;
while($d=mysql_fetch_array($r))
{
?>
<tr>
<td><?php echo $c;?></th>
<td> <?php
$data5=mysql_fetch_array(mysql_query("select * from tbl_fee_type where 1 and id='".$d['fee_type']."'"));
?><?php echo $data5['fee_type'];?></th>
<td><?php echo $d['amount'];?></th>
<td><?php if($data5['payment_frequency']=='1') {?>Monthly <?php }?>
<?php if($data5['payment_frequency']=='2') {?>Quatarly<?php }?>
<?php if($data5['payment_frequency']=='3') {?>Half Yearly <?php }?>
<?php if($data5['payment_frequency']=='4') {?>Yearly <?php }?>
<?php if($data5['payment_frequency']=='5') {?>Onetime<?php }?>
</td>
<td><?php if($data5['payment_mode']=='1') {?>Exact Amount <?php }?>
<?php if($data5['payment_mode']=='2') {?> Advanced Amount<?php }?>
<?php if($data5['payment_mode']=='3') {?> Any Amount<?php }?>

</td>

<td><?php $dt=explode("-",$d['due_date']); echo $dt[0];?></td>
</tr>
<?php
$c++;
}
?>
<tr>
<td>&nbsp;</td>
<td><b>Total</b></td>
<td colspan="6"><?php
   
   $tot=mysql_fetch_array(mysql_query("select sum(amount) as amount from tbl_fees_data where 1 and fee_id='".$data['id']."'"));
   
    echo $tot['amount'];?></td>
</tr>
</table>


</td>
</tr>
</table>

</form>

	</div>

							</div>

						</div>



                      

                                                 

                        </div>

                        <!--/.content-->

                    </div>

                    <!--/.span9-->

                </div>

            </div>

            <!--/.container-->

        </div>

        <!--/.wrapper-->

 <?php include("ins_footer.php");?>