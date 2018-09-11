<?php
include("includes/connect.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<table border="1" cellpadding="2" cellspacing="2" width="90%" align="center">
<tr bgcolor="#3366FF">
<td>Sl No.</td>
<td>Ins Name</td>
<td>Contact Person</td>
<td>Email</td>
<td>Mobile</td>
<td>Password</td>
<td>Registered</td>
</tr>

<?php
$s="select * from tbl_institute where 1 order by id desc";
$r=mysql_query($s);
$c=1;
while($d=mysql_fetch_array($r))
{
if($c%2=='0')
{
$bg='#ececec';
}
else
{
$bg='#ffffff';
}
?>
<tr bgcolor="<?php echo $bg;?>">
<td><?php echo $c;?>.</td>
<td><?php echo $d['ins_name'];?></td>
<td><?php echo $d['name'];?></td>
<td><?php echo $d['email'];?></td>
<td><?php echo $d['mobile'];?></td>
<td><?php echo $d['password'];?></td>
<td><?php $dt=explode("-",$d['doj']); echo $dt[2]."/".$dt[1]."/".$dt[0];?></td>
</tr>

<?php
$c++;
}
?>
</table>
<body>
</body>
</html>
