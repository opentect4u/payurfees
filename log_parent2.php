<?php
session_start();
include("includes/connect.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login of Parent</title>
</head>

<body>
<form name="reg" action="pcheck.php" method="post">
<table border="0" cellpadding="2" cellspacing="2" align="center" width="36%">


<tr>
<td>&nbsp;</td>
<td><h3>Login</h3></td>
</tr>
<?php
if($_REQUEST['opt']=='5')
{
?><tr>
<td>&nbsp;</td>
<td><b style="color:red">Check your mail box and activate your account!!!</b></td>
</tr>
<?php
}
?>
<?php
if($_REQUEST['opt']=='2')
{
?><tr>
<td>&nbsp;</td>
<td><b style="color:red">Invalid Login!!!</b></td>
</tr>
<?php
}
?>
<tr>
<td><b>Mobile No.:</b></td>
<td><input type="text" name="email3" id="email3"/></td>
</tr>




<tr>
<td><b>Password:</b></td>
<td><input type="password" name="password3" id="password3"/></td>
</tr>


<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" id="submit" value="Submit"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
  <td></td>
  <td><a href="#">Forgot Password?</a></td>
  </tr>
  
   <tr>
  <td></td>
  <td><input type="checkbox" value="1" name="rem"> Remember password for browser</td>
  </tr>
  
<!--<tr>
<td>&nbsp;</td>
<td><input type="checkbox" />Remember Me | <a href="forgot-pass.php">Forgot Password?</a></td>
</tr>-->



</table>
</form>
</body>
</html>
