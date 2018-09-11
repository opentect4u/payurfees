<?php
session_start();
include("includes/connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PayUrFees</title>
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
            <div class="span12"><span style="color: #fff; font-weight: bold;">Email :</span><a href="mailto:abcd@payurfees.com" style="color: #fff">abcd@payurfees.com</a><span  class="pull-right">&nbsp;&nbsp; Helpline : +91 0000000000 (10am to 6.30pm) </span></div>
            </div>
            </div>
            </div>

</div>


	<div class="navbar navbar-fixed-top" >
		<div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php"><img src="images/logo.png" alt="" /></a><br>
                        <br><span style="font-size: 11px; color: #000; font-weight: bold">The quick & smart way to pay fees</span>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                        
                        
                       
                        
                            <!--<li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>-->
                        </ul>
                       <!-- <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>-->
                        
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div><!-- /navbar-inner -->
	</div><!-- /navbar -->







<div >
<div class="wrapper" style="padding-top: 8px; padding-bottom: 8px">
		<div class="container">
			<div class="row" >
           <div class="span12">
          <a href="ins_reg.php" style="color:#042139; font-weight:bold; font-size:16px;">Register your Institute</a>&nbsp;|&nbsp;<a href="ins_log.php" style="color:#042139; font-weight:bold; font-size:16px;">Login as Institute</a>&nbsp;|&nbsp;<a href="reg_parent.php" style="color:#042139; font-weight:bold; font-size:16px;">Register to Pay Fees</a>&nbsp;|&nbsp;<a href="log_parent.php" style="color:#042139; font-weight:bold; font-size:16px;">Pay Fees</a><?php if($_SESSION['ins_id']!=''){?> &nbsp;|&nbsp;<a href="dashboard.php" style="color:#042139; font-weight:bold; font-size:16px;">My Dashboard</a>&nbsp;|&nbsp;<a href="logout.php" style="color:#042139; font-weight:bold; font-size:16px;">Logout</a><?php }?>
          </div> 
           </div>
            </div>
            </div>
            </div>

</div>
