<?php
session_start();
include("includes/connect.php");
function generatePIN($digits = 5){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
$otp_pin = generatePIN();

 include("header.php");
if($_REQUEST['name'])
{
$same_num=mysql_num_rows(mysql_query("select * from tbl_parent where 1 and mobile='".addslashes($_REQUEST['mobile'])."'"));
$same_num2=mysql_num_rows(mysql_query("select * from tbl_parent where 1 and password='".addslashes($_REQUEST['password'])."'"));
if($same_num=='0')
{
 $sql="insert into tbl_parent set
 state='".$_REQUEST['state']."',
 otp_code='".$_REQUEST['otp']."',
 ins_id='".addslashes($_SESSION['ins_id'])."',
name='".addslashes($_REQUEST['name'])."',
password='".addslashes($_REQUEST['password'])."',
email='".addslashes($_REQUEST['email'])."',
mobile='".addslashes($_REQUEST['mobile'])."',
doj='".date("Y-m-d")."'";
mysql_query($sql);
$myid = mysql_insert_id();
?>

<?php
$to = $_REQUEST['email'];
$subject = "User OTP Verify - Payurfees";
$message = "
<html>
<head>
<title>Email Content</title>
</head>
<body>
<p>Hi ".ucwords($_REQUEST['name'])."!</p>
<p>
".$_REQUEST['otp']." is the OTP for mobile no. verification at payurfees.com.OTP valid for 5mins.Pls donot share it with anyone.
<br/><br/>
Thanks,<br/>
Team Payurfees
</p>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Payurfees Team <info@payurfees.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>
<?php
$otp2=($_REQUEST['otp']);
$name2=ucwords($_REQUEST['name']);
$mob2=($_REQUEST['mobile']);
    $url = "https://bulksms.sssplsales.in/api/api_http.php";
    $recipients = array($mob2);
    $param = array(
        'username' => 'PAYFEE',
        'password' => 'pay357fee',
        'senderid' => 'PAYFEE',
        'text' => 'Hi '.$name2.','
		. $otp2.' is the OTP for mobile no. verification at payurfees.com.OTP valid for 5mins.Pls donot share it with anyone.

Thanks,
Team Payurfees',
        'route' => 'Informative',
        'type' => 'text',
        'datetime' => '2018-07-18 12:28:57',
        'to' => implode(';', $recipients),
    );
    $post = http_build_query($param, '', '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: close"));
    $result = curl_exec($ch);
    if(curl_errno($ch)) {
        $result = "cURL ERROR: " . curl_errno($ch) . " " . curl_error($ch);
    } else {
        $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        switch($returnCode) {
            case 200 :
                break;
            default :
                $result = "HTTP ERROR: " . $returnCode;
        }
    }
    curl_close($ch);
  //  print $result;
?>
<script type="text/javascript">
alert("check Email/SMS  for OTP..");
location.href="potp-verify.php?id=<?php echo base64_encode($myid*402);?>";
</script>
<?php
}
else
{
$msg=2;
}

}
?>

<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span8 offset2">
					
					
					
									<form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">
									
									
									<div class="module-head" style="background:#042144">
							<h3 style="color:#fff; ">Registration To Pay Fees</h3>
                            
                          
<?php
if($msg2=='2')
{
?>
<p align="center" style="color:#FF0000">Same Mobile No. of Authorised Person is already used in our database </p>
<?php
}
?>
						</div>
									<p>&nbsp;</p>
				
<div class="control-group">
											<label class="control-label" for="basicinput"><b>Name</b><font color="red">*</font> :</label>
											<div class="controls"><input type="text" name="name" id="name" class="span8 tip">
                                            <input type="hidden" class="" name="otp" id="otp" value="<?php echo $otp_pin;?>">
											</div>
										</div>


<div class="control-group">
											<label class="control-label" for="basicinput"><b>Email</b><font color="red"></font> :</label>
											<div class="controls"><input type="text" name="email" id="email" class="span8 tip">
											</div>
										</div>





<div class="control-group">
											<label class="control-label" for="basicinput"><b>Mobile No.</b><font color="red">*</font> :</label>
											<div class="controls"><input type="text" name="mobile" id="mobile" class="span8 tip">
											</div>
										</div>

<div class="control-group">
											<label class="control-label" for="basicinput"><b>State</b><font color="red">*</font> :</label>
											<div class="controls"><select name="state" id="state" class="span8 tip">
                                            <option value="">--select--</option>
                                            <?php
											$sp="select * from state where 1 order by id asc";
											$rp=mysql_query($sp);
											while($dp=mysql_fetch_array($rp))
											{
											?>
                                            <option value="<?php echo $dp['state_name'];?>"><?php echo $dp['state_name'];?></option>
                                            <?php
											}?>
                                            </select>
											</div>
										</div>

<div class="control-group">
											<label class="control-label" for="basicinput"><b>Password</b><font color="red">*</font> :</label>
											<div class="controls"><input type="password" name="password" id="password" class="span8 tip">
											</div>
										</div>

<div class="control-group">
											<label class="control-label" for="basicinput"><b>Re-Password</b><font color="red">*</font> :</label>
											<div class="controls"><input type="password" name="cpassword" id="cpassword" class="span8 tip">
											</div>
										</div>
<div class="control-group">
											<div class="controls">
												<input type="submit" class="btn btn-primary btn-large" name="submit" id="submit" value="Submit" onClick="return test1();"/>
											</div>
										</div>
</form>

<script type="text/javascript" >
function test1()
{


if(document.getElementById('name').value=='')
{
alert("Please enter the   Name");
document.getElementById('name').focus();
return false;
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
/*
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

if(document.getElementById('mobile').value=='')
{
alert("Please enter the  Mobile No.");
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
*/

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

if(document.getElementById('state').value=='')
{
alert("Please select the State Name");
document.getElementById('state').focus();
return false;
}


if(document.getElementById('password').value=='')
{
alert("Please enter the Password");
document.getElementById('password').focus();
return false;
}
var paswd=/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]{5,})$/;
//var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,8}$/;  
if(!document.getElementById('password').value.match(paswd))   
{   
alert('Enter Password which must be minimum 5 character ,containing at least 1 character 1 number')  
return false;  
}  
if(document.getElementById('cpassword').value=='')
{
alert("Please enter the Re-Password");
document.getElementById('cpassword').focus();
return false;
}

if(document.getElementById('password').value!=document.getElementById('cpassword').value)
{
alert("Do not match  Password and Re-Password");
document.getElementById('cpassword').focus();
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

	<?php include("footer.php");?>