<?php
	ob_start();
	session_start();  //打开会话
	$dblink=@mysql_connect("localhost","root","lizhao"); //mysql主机,用户名,密码
	if($dblink==null)
	{
		echo "数据库打开失败";
		exit;
	} //如果数据库无法链接则提示
	mysql_query("SET NAMES 'gb2312'");  //mysql 字符集
	mysql_select_db("shopping"); //选择数据库
?>
