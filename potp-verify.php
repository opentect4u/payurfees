<?php include("header.php");
$u_id=base64_decode($_REQUEST['id'])/402;
$data=mysql_fetch_array(mysql_query("select * from tbl_parent where  id='".$u_id."'"));
?>
<?php
if($_REQUEST['otp_code'])
 {
  $sql = "select * from tbl_parent where otp_code = '".$_REQUEST['otp_code']."' and id='".$u_id."' ";

 $res = mysql_query($sql);

  $num = mysql_num_rows($res);
if($num=='0')
{
$msg=2;
}
else
{
$sql2 = "update  tbl_parent set  otp_status='1'  where otp_code = '".$_REQUEST['otp_code']."' and id='".$u_id."' ";
mysql_query($sql2);
//$msg=1;





$to = $data['email'];
$subject = "Registration Notification from Payurfees - User";
$message = "
<html>
<head>
<title>Email Content</title>
</head>
<body>
<p>Hi ".ucwords($data['name']).",</p>
<p>

Welcome to payurfees.Thankyou for signing up.Please Login with userId : ".$data['mobile']." to add students & payfees.

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

$name2=ucwords($data['name']);
$mob2=($data['mobile']);
    $url = "https://bulksms.sssplsales.in/api/api_http.php";
    $recipients = array($mob2);
    $param = array(
        'username' => 'PAYFEE',
        'password' => 'pay357fee',
        'senderid' => 'PAYFEE',
        'text' => 'Hi '.$name2.','.
		
		'Welcome to payurfees.Thankyou for signing up.Please Login with userId : '.$data['mobile'].' to add students & payfees

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
alert("You are registered successfully..");
location.href="log_parent.php";
</script>
<?php
}

}
?>


	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" action="" method="post" >
                  
                   <div align="center"> 
   
<?php
if($msg=='2')
{
?><b style="color:red; text-align:center">Invalid OTP Code!!!</b><br/>
<?php
}
?>

<?php
if($_REQUEST['opt']=='3')
{
?><b style="color:blue; text-align:center">Your registration is successful,</b>
<br/> 
  <span style="color:#009900; text-align:center"> for activation please contact us at  info@payurfees.com or call us at  +91 33 46024723</span>
  <br/>
<?php
}
?>
</div>


						<div class="module-head" style="background:#042144">
							<h3 style="color:#fff">Enter OTP Code</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="otp_code" name="otp_code" placeholder="OTP Code">
								</div>
							</div>
							
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit"/>
                                    
                                    
								
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<?php include("footer.php");?>