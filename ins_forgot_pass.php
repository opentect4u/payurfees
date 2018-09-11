<?php include("header.php");

if($_REQUEST['email3'])
{
$sql=mysql_fetch_array(mysql_query("select * from tbl_institute where mobile='".$_REQUEST['email3']."'"));
if(!$sql)
	{
?>
<script language="javascript">
location.href="ins_forgot_pass.php?opt=3";
</script>
<?php
}
else
{
$member_data=mysql_fetch_array(mysql_query("select * from tbl_institute where 1 and mobile='".$_REQUEST['email3']."'"));
$to=$member_data['email'];
$subject="Forgot Password of Payurfess - Institute";
$message = "
<html>
<head>
<title>Email Content</title>
</head>
<body>
<p>Hi ".ucwords($member_data['name'])."!</p>
<p>
".$member_data['password']." is the password of your institute login with your login mobile no..
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
<script language="javascript">

		location.href="ins_forgot_pass.php?opt=4";

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
if($_REQUEST['opt']=='4')
{
?><b style="color:green; text-align:center">Your password has been sent to your registered email id.!!!</b><br/>

<?php
}
?>


<?php
if($_REQUEST['opt']=='3')
{
?><b style="color:red; text-align:center">Your mobile No. is incorrect !! Please insert registered  mobile no..</b>

<?php
}
?>
</div>


						<div class="module-head" style="background:#042144">
							<h3 style="color:#fff">Forgot your password</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="email3" name="email3" placeholder="Mobile No.">
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