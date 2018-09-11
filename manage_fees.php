<?php
include("ins_header.php");

if($_REQUEST['mode']=='del')
{
	$del_sql="delete from tbl_fees where 1 and ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_GET['id']."' ";
		mysql_query($del_sql);
	?>
	<meta http-equiv="refresh" content="0; url=manage_fees.php" />
	<?php
} 
?>
<SCRIPT language="JavaScript">
function go_there(id)
{
	var where_to= confirm("Do you really want to delete this Fees?");
	if (where_to== true)
	{
		window.location="manage_fees.php?id="+id+"&mode=del";
	}
}
</SCRIPT>



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

								<h2 style="color:#FFFFFF">Manage Fees</h2>

							</div>

							<div class="module-body">

							<div class="module-body table">



<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">
<thead style="background:#2e88c6; color:#FFFFFF">
<tr>
<th>Sl No.</th>
<th>Fee Code</th>
<th>Fee Type</th>
<th>Class/Course</th>
<th>Total Amount</th>
<th>Late Fee</th>
<th>Action</th>
</tr>
</thead>
<?php
$s="select * from tbl_fees where 1 and ins_id='".$_SESSION['ins_id']."' order by id desc";
   $r=mysql_query($s);
   $n=mysql_num_rows($r);
   if($n>0)
   {
   $c=1;
   while($d=mysql_fetch_array($r))
   {
   ?>
   <tr>
   <td align="center"><?php echo $c;?></td>
  
<td align="center"> <?php echo $d['fee_code'];?></td>
  <td align="center">
  
<?php
$data5=mysql_fetch_array(mysql_query("select * from tbl_fee_type where 1 and id='".$d['fee_type']."'"));
?><?php echo $data5['fee_type'];?>

[<?php if($data5['payment_frequency']=='1') { echo "Monthly"; }?>
 <?php if($data5['payment_frequency']=='2') { echo "Quarterly"; }?>
 <?php if($data5['payment_frequency']=='3') { echo "Half Yearly"; }?>
 <?php if($data5['payment_frequency']=='4') { echo "Yearly"; }?>
 <?php if($data5['payment_frequency']=='5') { echo "Onetime"; }?>]</td> 
  <td align="center"> <?php $rcse=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$d['course_id']."' ")); echo $rcse['course_name']?>
  
  <?php if($d['sub_course_id']>0) { echo "-"; $rcse2=mysql_fetch_array(mysql_query("select * from tbl_course where 1 and id='".$d['sub_course_id']."' ")); echo $rcse2['course_name']; }?>
  
  </td> 
 
   <td align="center">Rs.  <?php echo $d['amount'];?></td>
   <td align="center">Rs.  <?php echo $d['late_amount'];?> [<?php echo $d['select_one'];?>]</td>
   <td align="center"> <a href="edit_fees.php?id=<?php echo $d['id'];?>"><i class="menu-icon icon-pencil"></i></a> | <a href="#" onClick="go_there(<?php echo $d['id']; ?>)"; style="color:#FF0000"><i class="menu-icon icon-remove"></i></a></td>
   </tr>
   <?php
   $c++;
   }
   }
   else
   {
   ?>
   <tr>
   <td colspan="7" align="center" style="color:#FF0000"> No Record Added Yet</td>
   </tr>
   <?php
   }
   ?>
</table>


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