<?php
    ob_start();
    session_start();
	if($_SESSION['username'])
    {
		$_SESSION['username']='';
		$_SESSION['admin'] ='';
        header("location: index.php");
    }	
	ob_end_flush();
?>	