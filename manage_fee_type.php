<?php
include("ins_header.php");
if($_REQUEST['mode']=='del')
{
	$del_sql="delete from tbl_fee_type where 1 and ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_GET['id']."' ";
		mysql_query($del_sql);
		
		$sp_del="delete from tbl_fee_type_data where 1 and fee_id='".$_GET['id']."' ";
		mysql_query($sp_del);
	?>
	<meta http-equiv="refresh" content="0; url=manage_fee_type.php" />
	<?php
} 
?>
<SCRIPT language="JavaScript">
function go_there(id)
{
	var where_to= confirm("Do you really want to delete this Fee Type?");
	if (where_to== true)
	{
		window.location="manage_fee_type.php?id="+id+"&mode=del";
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

								<h2 style="color:#FFFFFF">Manage Fee Type</h2>

							</div>

							<div class="module-body">

							<div class="module-body table">


<table border="1" cellpadding="2" cellspacing="2" align="center" width="100%" class="table table-bordered table-striped	 display">
<thead style="background:#2e88c6; color:#FFFFFF">
<tr>
<th>Sl No.</th>
<th>Fee Type</th>
<th>Mode</th>
<th>Freequency</th>
<th> Period</th>

<th>Action</th>
</tr>
</thead>
<?php
$s="select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' order by id desc";
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
   <td align="center"> <?php echo $d['fee_type'];?></td> 
 <td align="center"> <?php if($d['payment_mode']=='1') { echo "Exact Amount"; }?>
 <?php if($d['payment_mode']=='2') { echo "Advanced Amount"; }?>
 <?php if($d['payment_mode']=='3') { echo "Any Amount"; }?>
</td>
  <td align="center">
  <?php if($d['payment_frequency']=='1') { echo "Monthly"; }?>
 <?php if($d['payment_frequency']=='2') { echo "Quarterly"; }?>
 <?php if($d['payment_frequency']=='3') { echo "Half Yearly"; }?>
 <?php if($d['payment_frequency']=='4') { echo "Yearly"; }?>
 <?php if($d['payment_frequency']=='5') { echo "Onetime"; }?>
  </td>
   <td align="center" valign="top"><?php 
   
   $sp="select * from tbl_fee_type_data where 1 and fee_id='".$d['id']."' order by id asc";
   $rp=mysql_query($sp);
   while($dp=mysql_fetch_array($rp))
   {
   $dt1=explode("-",$dp['from_date']); 
   if($dt1[1]=='01')
   {
   $mon1="Jan";
   }
   if($dt1[1]=='02')
   {
   $mon1="Feb";
   }
   if($dt1[1]=='03')
   {
   $mon1="Mar";
   }
   if($dt1[1]=='04')
   {
   $mon1="Apr";
   }
   if($dt1[1]=='05')
   {
   $mon1="May";
   }
   
   if($dt1[1]=='06')
   {
   $mon1="Jun";
   }
   
   if($dt1[1]=='07')
   {
   $mon1="Jul";
   }
   
   if($dt1[1]=='08')
   {
   $mon1="Aug";
   }
   
   if($dt1[1]=='09')
   {
   $mon1="Sep";
   }
   
   if($dt1[1]=='10')
   {
   $mon1="Oct";
   }
   
   if($dt1[1]=='11')
   {
   $mon1="Nov";
   }
   
   if($dt1[1]=='12')
   {
   $mon1="Dec";
   }
   echo $mon1."/".$dt1[0];
  /* echo "  To  ";
    $dt2=explode("-",$dp['end_date']);
	
	
	 if($dt2[1]=='01')
   {
   $mon2="Jan";
   }
   if($dt2[1]=='02')
   {
   $mon2="Feb";
   }
   if($dt2[1]=='03')
   {
   $mon2="Mar";
   }
   if($dt2[1]=='04')
   {
   $mon2="Apr";
   }
   if($dt2[1]=='05')
   {
   $mon2="May";
   }
   
   if($dt2[1]=='06')
   {
   $mon2="Jun";
   }
   
   if($dt2[1]=='07')
   {
   $mon2="Jul";
   }
   
   if($dt2[1]=='08')
   {
   $mon2="Aug";
   }
   
   if($dt2[1]=='09')
   {
   $mon2="Sep";
   }
   
   if($dt2[1]=='10')
   {
   $mon2="Oct";
   }
   
   if($dt2[1]=='11')
   {
   $mon2="Nov";
   }
   
   if($dt2[1]=='12')
   {
   $mon2="Dec";
   }
   
    echo $mon2."/".$dt2[0];
	*/
   echo "<br/>";
   }
   
   ?></td>
   <td align="center"><a href="edit_fee_type.php?id=<?php echo $d['id'];?>"><i class="menu-icon icon-pencil"></i></a> | <a href="#" onClick="go_there(<?php echo $d['id']; ?>)"; style="color:#FF0000"><i class="menu-icon icon-remove"></i></a></td>
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
