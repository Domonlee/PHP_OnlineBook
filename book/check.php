<?php
header("Content-Type:text/html;charset=gb2312");
@mysql_connect('localhost','root','ebaeba') or die("数据库服务器连接失败");
@mysql_select_db("test") or die("数据库不存在或不可用");



$uname = $_GET['userName'];
//下面进行数据库查询　　查找是不是有这一个用户
//如果没有查找到这个用户名



$sql="select * from t1 where name='".$uname."'";
$query=mysql_query($sql);
$row=mysql_fetch_object($query);

if(strlen($uname)<6||strlen($uname)>20)
{
   $msg="用户名必须是6至20个字符.";
}
else
{
	
   if($row==false)
   {
      $msg="该用户名有效，可以使用！";
   }
   else
   {
      $msg="对不起，此用户名已经存在，请更换用户名注册!";
   }
}
echo $msg ;
?>
