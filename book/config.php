<?php
	//error_reporting(0);
	ob_start();
	session_start(); //开启缓存
	$conn=@mysql_connect("127.0.0.1","root","lizhao");  //配置mysql服务器信息
	if($conn==null)
	{
		echo "数据库打开失败";
		exit; //数据库打开失败，退出
	}
	mysql_query("SET NAMES 'gbk'"); //设置数据库编码
	mysql_select_db("BookDB"); //选择数据库
?>
