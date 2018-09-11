<?php
session_start();
include("includes/connect.php");
if($_SESSION['parent_id'])
 {
$mem_data2=mysql_fetch_array(mysql_query("select * from tbl_parent where 1 and id='".$_SESSION['parent_id']."'"));
}
if($_SESSION['ins_id'])
 {
$mem_data2=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$_SESSION['ins_id']."'"));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PayUrFees-easy Digital Payment Solution</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<div >
<div class="wrapper" style="background:#042139; color:#FFFFFF;padding-top: 5px; padding-bottom: 5px">
		<div class="container">
			<div class="row">
            <div class="span12"><span style="color: #fff; font-weight: bold;">Email :</span><a href="mailto:info@payurfees.com" style="color: #fff">info@payurfees.com</a><span  class="pull-right">&nbsp;&nbsp; Helpline : +91 33 46024723 (10am to 6.30pm) </span></div>
            </div>
            </div>
            </div>

</div>


	<div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                 <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php"><img src="images/logo.png" alt="" /></a>
                     

                    <div class="nav-collapse collapse navbar-inverse-collapse">


                  <?php if($_SESSION['ins_id']!='' || $_SESSION['parent_id']!=''){?>

                        <ul class="nav pull-right">

                    

                            <li><a href="#"><span style="color:#042139; font-size:150%"><?php if($mem_data2['ins_name'])
							{
							echo $mem_data2['ins_name'];
							}
							else
							{
							echo $mem_data2['name'];
							}
							?></span>  </a></li>

                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <img src="images/user.png" class="nav-avatar" />

                                <!--<b class="caret"></b>--></a>

                               <!-- <ul class="dropdown-menu">

                                    <li><a href="dashboard.php">Dashboard</a></li>

                                    <li><a href="dashboard.php">Edit Profile</a></li>

                                   
                                    <li class="divider"></li>

                                    <li><a href="plogout.php">Logout</a></li>

                                </ul>-->

                            </li>

                        </ul>
                        <?php
						}
						?>

                    </div>

                    <!-- /.nav-collapse -->

                </div>

            </div>

            <!-- /navbar-inner -->

        </div><!-- /navbar -->







<div >
<div class="wrapper" style="padding-top: 8px; padding-bottom: 8px">
		<div class="container">
			<div class="row" >
           <div class="span12">
         <?php if($_SESSION['ins_id']=='' && $_SESSION['parent_id']==''){?>
          <a href="ins_reg.php" style="color:#042139; font-weight:bold; font-size:14px;">Register your Institute</a>&nbsp;|&nbsp;<a href="ins_log.php" style="color:#042139; font-weight:bold; font-size:14px;">Login as Institute</a>&nbsp;|&nbsp;<a href="reg_parent.php" style="color:#042139; font-weight:bold; font-size:14px;">Register to Pay Fees</a>&nbsp;|&nbsp;<!--<a href="log_parent.php" style="color:#042139; font-weight:bold; font-size:16px;">Pay Fees</a>-->
          
          
          &nbsp;<a href="log_parent.php" style="color: #fff"><button class="btn btn-primary" style="font-size: 14px; padding: 5px 20px; color:#003b64; background: #8cc63e">Pay Your Fees</button></a> &nbsp; <a href="log_parent.php" style="color: #fff"><button class="btn btn-primary" style="font-size: 14px; padding: 5px 20px;background: #0871bb">View Demo</button></a>
          
          
		  <?php
		 }
		 ?>
		  <?php if($_SESSION['ins_id']!=''){?><a href="index.php" style="color:#042139; font-weight:bold; font-size:16px;">Home</a>&nbsp;|&nbsp;<a href="dashboard.php" style="color:#042139; font-weight:bold; font-size:16px;">My Profile</a>&nbsp;|&nbsp;<a href="#" style="color:#042139; font-weight:bold; font-size:16px;">Demo</a>&nbsp;|&nbsp;<a href="logout.php" style="color:#042139; font-weight:bold; font-size:16px;">Logout</a>
		  
		  <?php }?>
          
          <?php if($_SESSION['parent_id']!=''){?><a href="index.php" style="color:#042139; font-weight:bold; font-size:16px;">Home</a>&nbsp;|&nbsp;<a href="my_dashboard.php" style="color:#042139; font-weight:bold; font-size:16px;">My Profile</a>&nbsp;|&nbsp;<a href="#" style="color:#042139; font-weight:bold; font-size:16px;">Demo</a>&nbsp;|&nbsp;<a href="plogout.php" style="color:#042139; font-weight:bold; font-size:16px;">Logout</a>
          <?php
		  }
		  ?>
          </div> 
           </div>
            </div>
            </div>
            </div>

</div>
