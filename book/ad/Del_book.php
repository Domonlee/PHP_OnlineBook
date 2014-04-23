<?php
	require_once("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
</head>

<body>
<?
	$ID=$_GET["ID"];
	$path=$_GET["path"];
	$root=$_SERVER['DOCUMENT_ROOT'];
	$filepath=$root.$path;
	if(file_exists($filepath))
	{
		unlink($filepath);
	}
	$sql="delete from bookinfo where ID=".$_GET[ID];
	mysql_query($sql);
	//header("location:admin_index.php");
?>
		<h2 align="center" style="color:#FF0000">删除成功</h2>
</body>
</html>
