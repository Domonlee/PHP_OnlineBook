<?php
	include_once("inc/conn.php");
	$adminname=$_POST["adminname"];
	if($adminname=="")
	{
		echo 2;
		exit();
	}
	$sql="select * from admin where adminname='$adminname'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==0)
	{
		echo 0;
	}
	else
	{
		echo 1;
	}
?>
