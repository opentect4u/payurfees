<ul class="widget widget-menu unstyled">

                                <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard

                                </a></li>

                                <li><a href="my_profile.php"><i class="menu-icon icon-user"></i>My Profile</a></li>


 <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">

                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">

                                </i>Course </a>
<ul id="togglePages" class="collapse unstyled">
<li><a href="add_course.php"><i class="menu-icon icon-plus" style="color:#91c846"></i>Add Course<b class="label green pull-right"><?php echo $no_course=mysql_num_rows(mysql_query("select * from tbl_course where 1 and pid='0' and ins_id='".$_SESSION['ins_id']."'"));?></b> </a></li>

<li><a href="manage_course.php"><i class="menu-icon icon-refresh" style="color:#91c846"></i>Manage Course</a></li>
</ul>
</li>






  <li><a class="collapsed" data-toggle="collapse" href="#togglePages3"><i class="menu-icon icon-cog">

                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">

                                </i>Fee Type </a>
<ul id="togglePages3" class="collapse unstyled">                             

<li><a href="add_fee_type.php"><i class="menu-icon icon-plus" style="color:#91c846"></i>Add Fee Type<b class="label orange pull-right"><?php echo $no_fee_tye=mysql_num_rows(mysql_query("select * from tbl_fee_type where 1 and ins_id='".$_SESSION['ins_id']."' order by id desc"));?></b> </a></li>
<li><a href="manage_fee_type.php"><i class="menu-icon icon-refresh" style="color:#91c846"></i>Manage Fee Type</a></li>
</ul>
</li>


<li><a class="collapsed" data-toggle="collapse" href="#togglePages4"><i class="menu-icon icon-cog">

                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">

                                </i>Fees </a>
<ul id="togglePages4" class="collapse unstyled">

                                <li><a href="add_fees.php"><i class="menu-icon icon-plus" style="color:#91c846"></i>Add Fees<!--<b class="label orange pull-right">05</b> --></a></li>

<li><a href="manage_fees.php"><i class="menu-icon icon-refresh" style="color:#91c846"></i>Manage Fees</a></li>

              </ul>
              </li>                  

 <!-- <li><a href="add_subcourse.php"><i class="menu-icon icon-plus"></i>Add Sub Course </a></li>

<li><a href="manage_subcourse.php"><i class="menu-icon icon-refresh"></i>Manage Sub Course</a></li>-->

              <li><a class="collapsed" data-toggle="collapse" href="#togglePages2"><i class="menu-icon icon-cog">

                                </i><i class="icon-chevron-down pull-right" ></i><i class="icon-chevron-up pull-right">

                                </i>Student </a>
<ul id="togglePages2" class="collapse unstyled">                      


                                <li><a href="add_student.php"><i class="menu-icon icon-plus" style="color:#91c846"></i>Add Student<b class="label green pull-right"><?php echo $no_student=mysql_num_rows(mysql_query("select * from tbl_student where 1 and ins_id='".$_SESSION['ins_id']."'"));?></b> </a></li>
                                 <li><a href="manage_student.php"><i class="menu-icon icon-refresh" style="color:#91c846"></i>Manage Student<!-- <b class="label orange pull-right">19</b>--> </a></li>
</ul>
</li>
                                
                                    <li><a href="upload_student.php"><i class="menu-icon icon-plus"></i>Upload CSV Student </a></li>






<li><a href="collect_fees.php"><i class="menu-icon icon-refresh"></i>Collect Fees</a></li>

<li><a href="ins_report.php"><i class="menu-icon icon-refresh"></i>Report Generation</a></li>
<li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>

                            </ul>
                            
                            
                           <!--  <ul class="widget widget-menu unstyled">

                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">

                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">

                                </i>More Options </a>

                                    <ul id="togglePages" class="collapse unstyled">

                                  







                                    </ul>

                                </li>

                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>

                            </ul>
                            -->