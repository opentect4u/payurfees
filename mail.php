<?php
$headers="From:".'Payurfees'." <info@payurfees.com>"."\r\n";
$headers .= "MIME-Version: 1.0\n";
$to= "abhijit@featuredhost.com";
$subject = 'Contact Us: Payurfees';
$headers .= "Content-Type: text/html; charset=ISO-8859-1";

$message='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' ;
$message.='<html><head><meta content="text/html;charset=ISO-8859-1" http-equiv="Content-Type"></head><body>' ;
$message.="<table width='100%' cellspacing='2' cellpadding='2' border='0'><tr><td colspan='2'>&nbsp;</td></tr>";
$message.="<tr><td width='40%' align=left><strong>Name : </strong></td><td width='60%'>".$_POST['name'] ."</td></tr>" ;

$message.="<tr><td width='40%' align=left><strong>E-Mail : </strong></td><td width='60%'>".$_POST['email'] ."</td></tr>" ;
$message.="<tr><td width='40%' align=left><strong>Mobile : </strong></td><td width='60%'>".$_POST['mobile'] ."</td></tr>" ;
$message.="<tr><td width='40%' align=left><strong>Message : </strong></td><td width='60%'>".$_POST['comments'] ."</td></tr>" ;

//$message.="<tr><td width='40%' align=left><strong>Cooments : </strong></td><td width='60%'>".$_POST['comments'] ."</td></tr><br>" ;

$message.="</table></body></html>";
if($_POST['email'])
{
	mail($to, $subject, $message, $headers);
	?>
    <script type="text/javascript">
	alert("Main sent Successfully...");
	location.href="index.php";
	</script>
    <?php
}
?>

