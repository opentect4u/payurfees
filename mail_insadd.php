<?php
if($_REQUEST['ins_name'])
{

$headers="From:"."Payurfees"." <info@featuredhost.com>"."\r\n";
$headers .= "MIME-Version: 1.0\n";
$to= "abhijit@featuredhost.com";
//$to2="smhsskolkata@gmail.com";
$subject = 'Refer Institute - Payurfees';
$headers .= "Content-Type: text/html; charset=ISO-8859-1";

$message='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' ;
$message.='<html><head><meta content="text/html;charset=ISO-8859-1" http-equiv="Content-Type"></head><body>' ;
$message.="<table width='100%' cellspacing='2' cellpadding='2' border='0'>";
$message.="<tr><td width='40%' align=left><strong>Institute Name : </strong></td><td width='60%'>".$_POST['ins_name'] ."</td></tr>" ;
$message.="<tr><td width='40%' align=left><strong>Institute : </strong></td><td width='60%'>".$_POST['ins_type'] ."</td></tr>" ;
$message.="<tr><td width='40%' align=left><strong>Address : </strong></td><td width='60%'>".$_POST['address'] ."</td></tr>" ;
$message.="<tr><td width='40%' align=left><strong>Contact Person : </strong></td><td width='60%'>".$_POST['contact_person'] ."</td></tr>" ;
$message.="<tr><td width='40%' align=left><strong>E-Mail : </strong></td><td width='60%'>".$_POST['email'] ."</td></tr>" ;
$message.="<tr><td width='40%' align=left><strong>Mobile : </strong></td><td width='60%'>".$_POST['mobile'] ."</td></tr>" ;



$message.="</table></body></html>";
	mail($to, $subject, $message, $headers);
?>
<script type="text/javascript">
alert("Thank you for your interest");
location.href="index.php";
</script>
<?php
}
?>
