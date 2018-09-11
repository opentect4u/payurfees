<?php
$db_host="localhost";
$db_user="websysc_RRsofT";
$db_password="R@RsofT$312";
$db_name="websysc_RRsofT";
$link=mysql_connect("$db_host","$db_user","$db_password");
mysql_select_db($db_name,$link)
or die("Couldn't Open Database");
?>
