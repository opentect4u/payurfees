<?php
session_start();
if($_SESSION['ins_id']=='')
{
?>
<script type="text/javascript">
location.href="ins_log.php";
</script>
<?php
}

include("includes/connect.php");


//Start our session.

 
//Expire the session if user is inactive for 30
//minutes or more.
$expireAfter = 2;
 
//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
		//$_SESSION['ins_id']='';
	//$_SESSION['ins_name']='';
       // session_unset();
       // session_destroy();
    }
    
}
 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();

/*
 st_month='".addslashes($_REQUEST['st_month'])."',
 st_year='".addslashes($_REQUEST['st_year'])."',
 en_month='".addslashes($_REQUEST['en_month'])."',
 en_year='".addslashes($_REQUEST['en_year'])."',
 */
$mem_data=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and id='".$_SESSION['ins_id']."'"));
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

        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'

            rel='stylesheet'>

    </head>

    <body>
<div>
<div class="wrapper" style="background:#042139; color:#FFFFFF;padding-top: 5px; padding-bottom: 5px">
<div class="container">
<div class="row">
<div class="span12">Helpline : +91 0000000000(10am to 6.30pm) <span class="pull-right">&nbsp;&nbsp;<span style="color: #fff; font-weight: bold;">Email :</span> <span><a href="mailto:abcd@payurfees.com" style="color:#fff">abcd@payurfees.com</a></span></div>
</div>
</div>
</div>
</div>
        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                 <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php"><img src="images/logo.png" alt="" /></a>
                        <span style="font-size: 11px; color: #000; font-weight: bold; position: absolute; margin-top: 40px; margin-left: -10px;">The quick & smart way to pay fees</span>

                    <div class="nav-collapse collapse navbar-inverse-collapse">

                       <!-- <ul class="nav nav-icons">

                           

                            <li><a href="#"><i class="icon-eye-open"></i></a></li>

                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>

                        </ul>-->

                  

                        <ul class="nav pull-right">

                    

                            <li><a href="#"><span style="color:#8cc63e"><?php echo $mem_data['ins_name'];?></span>  </a></li>

                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <img src="images/user.png" class="nav-avatar" />

                                <b class="caret"></b></a>

                                <ul class="dropdown-menu">

                                    <li><a href="dashboard.php">Dashboard</a></li>

                                    <li><a href="my_profile.php">Edit Profile</a></li>

                                   
                                    <li class="divider"></li>

                                    <li><a href="logout.php">Logout</a></li>

                                </ul>

                            </li>

                        </ul>

                    </div>

                    <!-- /.nav-collapse -->

                </div>

            </div>

            <!-- /navbar-inner -->

        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

<div class="wrapper" style="padding-top: 8px; padding-bottom: 8px">
		<div class="container">
			<div class="row" >
           <div class="span12">
           <!--<a href="index.php" style="color:#0060b3; font-weight:bold; font-size:16px;">Home</a>&nbsp;|&nbsp;<a href="#" style="color:#042139; font-weight:bold; font-size:16px;">About Us</a>&nbsp;|&nbsp;<a href="#" style="color:#042139; font-weight:bold; font-size:16px;">Contact Us</a> &nbsp;|&nbsp;--><a href="ins_reg.php" style="color:#042139; font-weight:bold; font-size:16px;">Register your Institute</a>&nbsp;|&nbsp;<a href="ins_log.php" style="color:#042139; font-weight:bold; font-size:16px;">Login as Institute</a>&nbsp;|&nbsp;<a href="reg_parent.php" style="color:#042139; font-weight:bold; font-size:16px;">Register to Pay Fees</a>&nbsp;|&nbsp;<a href="log_parent.php" style="color:#042139; font-weight:bold; font-size:16px;">Pay Fees</a>
          </div> 
           </div>
            </div>
            </div>


