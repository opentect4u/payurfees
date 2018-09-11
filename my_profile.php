<?php include("ins_header.php");


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

								<h2 style="color:#ffffff">Edit My Profile</h2>

							</div>

							<div class="module-body">



									<!--<div class="alert">

										<button type="button" class="close" data-dismiss="alert">×</button>

										<strong>Warning!</strong> Something fishy here!

									</div>

									<div class="alert alert-error">

										<button type="button" class="close" data-dismiss="alert">×</button>

										<strong>Oh snap!</strong> Whats wrong with you? 

									</div>

									<div class="alert alert-success">

										<button type="button" class="close" data-dismiss="alert">×</button>

										<strong>Well done!</strong> Now you are listening me :) 

									</div>



									<br />-->



									<form class="form-horizontal row-fluid" name="aa" action="" method="post" enctype="multipart/form-data">

									

									

									

									

									

									

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Name of the Institution :</strong></label>

											<div class="controls">

												<?php echo $mem_data['ins_name'];?>

											</div>

										</div>



										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Session Start :</strong></label>

											<div class="controls">

												<select name="st_month" id="st_month" disabled="disabled">
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
        </select>

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Session End :</strong></label>

											<div class="controls">

												<select name="en_month" id="en_month" disabled="disabled">
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
        </select>

											</div>

										</div>



										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Address :</strong></label>

											<div class="controls">

												<input  type="text" name="address" id="address" value="<?php echo $mem_data['address'];?>" class="span8 tip">

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Pin Code :</strong></label>

											<div class="controls">

												<input type="text" name="zip" id="zip" value="<?php echo $mem_data['zip'];?>" class="span8 tip">

											</div>

										</div>

										

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Type of Institution :</strong></label>

											<div class="controls"><?php echo $mem_data['ins_type'];?>

											</div>

										</div>









										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Office Phone :</strong></label>

											<div class="controls">

												<input  type="text" name="office_phone" id="office_phone" value="<?php echo $mem_data['office_phone'];?>" class="span8 tip">

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Office Email Id :</strong></label>

											<div class="controls">

												<input type="text" name="office_email" id="office_email" value="<?php echo $mem_data['office_email'];?>"class="span8 tip">

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Institute's Website :</strong></label>

											<div class="controls">

												<input type="text" name="ins_website" id="ins_website" value="<?php echo $mem_data['ins_website'];?>" class="span8 tip">

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Name of the Authorised Person :</strong></label>

											<div class="controls">

												<input type="text" name="name" id="name" value="<?php echo $mem_data['name'];?>" class="span8 tip">

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Designation :</strong></label>

											<div class="controls">

												<input type="text" name="designation" id="designation" value="<?php echo $mem_data['designation'];?>" class="span8 tip">

											</div>

										</div>

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Mobile No. :</strong></label>

											<div class="controls">

											<?php echo $mem_data['mobile'];?>

											</div>

										</div>

										

										

										<div class="control-group">

											<label class="control-label" for="basicinput"><strong>Email Id :</strong></label>

											<div class="controls">

												<input type="text" name="email" id="email" value="<?php echo $mem_data['email'];?>" class="span8 tip">

											</div>

										</div>

										

										

										<div class="control-group">

											<div class="controls">

												<input type="submit" class="btn btn-primary btn-large" name="submit" value="Save" onClick="return test1();"/>

											</div>

										</div>

										

								
									</form>

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