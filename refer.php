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
<body onLoad="Captcha();">
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
           <!--<a href="index.php" style="color:#0060b3; font-weight:bold; font-size:16px;">Home</a>&nbsp;|&nbsp;<a href="#" style="color:#042139; font-weight:bold; font-size:16px;">About Us</a>&nbsp;|&nbsp;<a href="#" style="color:#042139; font-weight:bold; font-size:16px;">Contact Us</a> &nbsp;|&nbsp;--><a href="ins_reg.php" style="color:#042139; font-weight:bold; font-size:16px;">Register your Institute</a>&nbsp;|&nbsp;<a href="ins_log.php" style="color:#042139; font-weight:bold; font-size:16px;">Login as Institute</a>&nbsp;|&nbsp;<a href="reg_parent.php" style="color:#042139; font-weight:bold; font-size:16px;">Register to Pay Fees</a>&nbsp;|&nbsp;<a href="log_parent.php" style="color:#042139; font-weight:bold; font-size:16px;">Pay Fees</a>
          </div> 
           </div>
            </div>
            </div>
            </div>

</div>


<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span8 offset2">
					
					
					 <script type="text/javascript">
                 function Captcha(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * alpha.length)];
                       var b = alpha[Math.floor(Math.random() * alpha.length)];
                       var c = alpha[Math.floor(Math.random() * alpha.length)];
                       var d = alpha[Math.floor(Math.random() * alpha.length)];
                       var e = alpha[Math.floor(Math.random() * alpha.length)];
                       var f = alpha[Math.floor(Math.random() * alpha.length)];
                       var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
                    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
                    document.getElementById("mainCaptcha").value = code
                  }
				  </script>
									<form class="form-horizontal row-fluid" action="mail_insadd.php" method="post" enctype="multipart/form-data" >

<div class="module-head">
<h3 > Refer your Institute</h3>


						</div>
								
										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Name of the Institution:</b> <font color="red" size="2">*</font></label>
											<div class="controls"><input type="text" name="ins_name" id="ins_name" class="span8"/></div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Institution Type:</b>  <font color="red" size="2">*</font></label>
											<div class="controls"><select name="ins_type" id="ins_type" class="span8">
<option value="">--Select--</option>
<option value="School">School</option>
<option value="College">College</option>
<option value="University">University</option>
<option value="Coaching Centre">Coaching Centre</option>
</select></div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Contact Person:</b>  <font color="red" size="2">*</font></label>
											<div class="controls"><input type="text" name="contact_person" id="contact_person" class="span8"/></div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Mobile No.:</b> <font color="red" size="2">*</font> </label>
											<div class="controls"><input type="text" name="mobile" id="mobile" class="span8"/></div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Email:</b> <font color="red" size="2">*</font></label>
											<div class="controls"><input type="text" name="email" id="email" class="span8"/></div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput"><b>Address:</b> <font color="red" size="2">*</font></label>
											<div class="controls"><input type="text" name="address" id="address" class="span8"/></div>
										</div>
                                            
                                           <div class="control-group">
											<label class="control-label" for="basicinput"><b>Captcha:</b></label>
											<div class="controls" > 
                                            <input type="text" id="mainCaptcha" readonly style="background:#FFCC33; color:#000000"/>
              <input type="button" id="refresh" value="Refresh" onClick="Captcha();" /></div>
										</div>
              
              <div class="control-group">
											<label class="control-label" for="basicinput"><b>Enter Code:</b> <font color="red" size="2">*</font></label>
											<div class="controls"><input type="text" id="txtInput"/></div>
										</div>
                                        
                                        
                                            <div class="control-group">
											<div class="controls">
												<input type="submit" class="btn btn-primary btn-large" name="submit" id="submit" value="Submit" onClick="return test1();"/>
											</div>
										</div>
										
</form>

<script type="text/javascript" >

 function removeSpaces(string){
                    return string.split(' ').join('');
                  }
				  
				  
function test1()
{


if(document.getElementById('ins_name').value=='')
{
alert("Please enter the  Institute Name");
document.getElementById('ins_name').focus();
return false;
}

if(document.getElementById('ins_type').value=='')
{
alert("Please enter the  Institute Type");
document.getElementById('ins_type').focus();
return false;
}


if(document.getElementById('contact_person').value=='')
{
alert("Please enter the  Contact person Name");
document.getElementById('contact_person').focus();
return false;
}


if(document.getElementById('mobile').value=='')
{
alert("Please enter the Mobile No.");
document.getElementById('mobile').focus();
return false;
}
if(document.getElementById('mobile').value.length!='10')
{
alert("Please enter the  Mobile No 10 Digit No.");
document.getElementById('mobile').focus();
return false;
}	
	var mobexp1 =/^[0-9]+$/;
if (! document.getElementById('mobile').value.match(mobexp1))
{
alert("please enter number only for mobile feild");
 //document.getElementById('mobile').value='';
document.getElementById('mobile').focus();
return false ;
}

if(document.getElementById('email').value=='')
{
alert("Please enter the  Email Address");
document.getElementById('email').focus();
return false;
}
var oldemail=document.getElementById('email').value ;
	if(oldemail.split("@")==oldemail || oldemail.split(".")==oldemail)
	{
	alert("Please enter the correct email address");
	document.getElementById('email').focus();
	return false;
	}


if(document.getElementById('address').value=='')
{
alert("Please enter the  Institute Address");
document.getElementById('address').focus();
return false;
}

if(document.getElementById('txtInput').value=='')
{
  alert("Please enter the   capcha code");
document.getElementById('txtInput').focus();
                        return false;
}
  var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
                      var string2 = removeSpaces(document.getElementById('txtInput').value);
                      if (string1 != string2)
					  {
					  alert("Please enter the  Valid capcha code");
document.getElementById('txtInput').focus();
                        return false;
                      }
                  

return true;
}
</script>
	<p>&nbsp;</p>
					
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->
    
    
<div class="footer">
            <div class="container">
            <div class="row">
            
            
            <div class="span8">
            
                 <b class="copyright"><a href="index.php">Home</a>&nbsp;|&nbsp;<a href="#">About Us</a>&nbsp;|&nbsp;<a href="#">Blogs</a>&nbsp;|&nbsp;<a href="#">FAQ's</a>&nbsp;|&nbsp;<a href="#">Contact us</a> &nbsp;&nbsp;&nbsp;&nbsp;<br/>&copy; 2018 payurfees.com  </b> All rights reserved. |  &nbsp;Design by: <a href="http://www.websys.co.in" target="_blank" title="Website development company india">WEBSYS</a>
                 
                 </div>
                 
                  
                 <div class="span4">
                 
                 <b style="color: #000">Follow us on</b> &nbsp;&nbsp;
                 <a href="" target="_blank" title="pinterest"><img src="images/twitter.png" alt="" /></a> &nbsp;
                 <a href="" target="_blank" title="pinterest"><img src="images/fb.png" alt="" /></a> &nbsp;
                 <a href="" target="_blank" title="pinterest"><img src="images/in.png" alt="" /></a> &nbsp;
                 <a href="" target="_blank" title="pinterest"><img src="images/youtube.png" alt="" /></a> &nbsp;
                 
                <a href="" target="_blank" title="pinterest"><img src="images/pinterest.png" alt="" /></a> &nbsp;
                <a href="" target="_blank" title="googleplus"><img src="images/googleplus.png" alt="" /></a>&nbsp;
                <a href="" target="_blank" title="whatsapp"><img src="images/whatsapp.png" alt="" /></a>              
               
               </div>
               
               
               
               
            </div>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow79.js"></script>
<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>

        
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
