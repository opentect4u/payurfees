<?php include("header.php");?>


	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" action="pcheck.php" method="post" >
                    
                   <div align="center"> 
                    <?php
if($_REQUEST['opt']=='5')
{
?><b style="color:red; text-align:center">Check your mail box and activate your account!!!</b><br/>

<?php
}
?>
<?php
if($_REQUEST['opt']=='2')
{
?><b style="color:red; text-align:center">Invalid Login!!!</b><br/>
<?php
}
?>

<?php
if($_REQUEST['opt']=='3')
{
?><b style="color:red; text-align:center">Your registration is successful,</b>
<br/> 
  <span style="color:#009900; text-align:center"> for activation please contact us at  info@payurfees.com or call us at 9903044748/9831887194/9007006639</span>
  <br/>
<?php
}
?>
</div>


						<div class="module-head" style="background:#042144">
							<h3 style="color:#fff">Sign In</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="email3" name="email3" placeholder="Mobile No.">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password3" id="password3" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<input type="submit" name="submit" class="btn btn-primary pull-right" value="Login"/>
                                    
                                    <labe><a href="parent_forgot_pass.php">Forgot Password?</a></label>
									<label class="checkbox">
										<!--<input type="checkbox" name="rem" value="1"> Keep me signed in-->
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<?php include("footer.php");?>