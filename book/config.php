<?php
	ob_start();
	session_start();  //�򿪻Ự
	$dblink=@mysql_connect("localhost","root","lizhao"); //mysql����,�û���,����
	if($dblink==null)
	{
		echo "���ݿ��ʧ��";
		exit;
	} //������ݿ��޷���������ʾ
	mysql_query("SET NAMES 'gb2312'");  //mysql �ַ���
	mysql_select_db("shopping"); //ѡ�����ݿ�
?>
