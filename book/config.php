<?php
	//error_reporting(0);
	ob_start();
	session_start(); //��������
	$conn=@mysql_connect("127.0.0.1","root","lizhao");  //����mysql��������Ϣ
	if($conn==null)
	{
		echo "���ݿ��ʧ��";
		exit; //���ݿ��ʧ�ܣ��˳�
	}
	mysql_query("SET NAMES 'gbk'"); //�������ݿ����
	mysql_select_db("BookDB"); //ѡ�����ݿ�
?>
