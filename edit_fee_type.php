<?php
include("ins_header.php");
if($_REQUEST['name'])
{

 $sql="update tbl_fee_type set
payment_frequency='".$_REQUEST['pfre']."',
 fee_type='".addslashes($_REQUEST['name'])."'

where  ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_REQUEST['id']."'";
mysql_query($sql);
?>
<script type="text/javascript">
alert("Fee Type Edited successfully..");
location.href="manage_fee_type.php";
</script>
<?php
}
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

                            

                    <?php $data=mysql_fetch_array(mysql_query("select * from tbl_fee_type where  ins_id='".addslashes($_SESSION['ins_id'])."' and id='".$_REQUEST['id']."'"));?>      

						<div class="module">

							<div class="module-head" style="background:#042139">

								<h2 style="color:#FFFFFF">Edit Fee Type</h2>

							</div>
<div class="module-body">


<form name="aa" action="" method="post" enctype="multipart/form-data" class="form-horizontal row-fluid">
<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Fee Type Name <font color=red>*</font>:<strong></label>

											<div class="controls"><input type="text" name="name" id="name" value="<?php echo $data['fee_type'];?>"/></div>
</div>


<div class="control-group">

											<label class="control-label" for="basicinput"><b>Payment Frequency</b> <font color=red>*</font>:</label>

											<div class="controls"><select  name="pfre" id="pfre" class="span8"/>
<option value="">--select--</option>
<option value="1" <?php if($data['payment_frequency']=='1') { echo  'selected'; }?>>Monthly</option>  
<option value="2" <?php if($data['payment_frequency']=='2') { echo  'selected'; }?>>Quarterly</option>
<option value="3" <?php if($data['payment_frequency']=='3') { echo  'selected'; }?>>Half Yearly</option>
<option value="4" <?php if($data['payment_frequency']=='4') { echo  'selected'; }?>>Yearly</option>
<option value="5" <?php if($data['payment_frequency']=='5') { echo  'selected'; }?>>Onetime</option>
</select>
</div>
</div>


<div>&nbsp;</div>
<div class="control-group">

											<div class="controls">

												<input  class="btn btn-primary btn-large" type="submit" name="submit" value="Update" onClick="return test1();"/>

											</div>

										</div>



</form>

<script type="text/javascript" >
function test1()
{


if(document.getElementById('name').value=='')
{
alert("Please enter the  Course Name");
document.getElementById('name').focus();
return false;
}

return true;
}
</script>
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