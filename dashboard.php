<?php include("ins_header.php");?>
<?php
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



        <!-- /navbar end header -->
        
        
        
        

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

                            <div class="btn-controls">

                                <div class="btn-box-row row-fluid">

                                    <a href="#" class="btn-box big span4"><i class=" icon-chevron-left"></i><b><?php echo $no_student=mysql_num_rows(mysql_query("select * from tbl_student where 1 and ins_id='".$_SESSION['ins_id']."' and pid!='0'"));?></b>

                                        <p class="text-muted">

                                            Total no. of student registered</p>

                                    </a><a href="add_course.php" class="btn-box big span4"><i class="icon-user"></i><b>Add</b>

                                        <p class="text-muted">

                                            Course</p>

                                    </a><a href="add_fees.php" class="btn-box big span4"><i class=" icon-pencil"></i><b>Add</b>

                                        <p class="text-muted">

                                           Student Fees</p>  </a>

                                    </a>

                                </div>

                                

                                <div class="btn-box-row row-fluid">

                                    <a href="add_student.php" class="btn-box big span4"><i class=" icon-user"></i><b>Add</b>

                                        <p class="text-muted">

                                           Student</p>

                                    </a><a href="upload_student.php" class="btn-box big span4"><i class="icon-upload-alt"></i><b>Upload </b>

                                        <p class="text-muted">

                                            CSV Student</p>

                                    </a><a href="add_fee_type.php" class="btn-box big span4"><i class="icon-plus-sign-alt"></i><b>Add</b>

                                        <p class="text-muted">

                                              Fee Type</p>

                                    </a>

                                </div>

                                

                                  <div class="btn-box-row row-fluid">

                                    <a href="#" class="btn-box big span4"><i class="icon-suitcase"></i><b>Collect </b>

                                        <p class="text-muted">

                                            Student Fees</p>

                                   </a>
                                   
                                   
                                     </a><a href="logout.php" class="btn-box big span4"><i class="icon-off"></i><b>Logout </b>

                                        <p class="text-muted">

                                            Exit</p>

                                   </a>


                                </div>

                                

                            </div>

                            <!--/#btn-controls-->

                      

                                                 

                        </div>

                        <!--/.content-->

                    </div>

                    <!--/.span9-->

                </div>

            </div>

            <!--/.container-->

        </div>

        <!--/.wrapper start footer-->
<?php include("ins_footer.php");?>