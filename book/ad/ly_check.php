<?php
	ob_start();
	session_start();
	if($_SESSION["admin"]=="")
	{
 	echo "<script language=javascript>alert('ÇëÖØÐÂµÇÂ½£¡');window.location='login.php'</script>";
	}
?>