<?php
include("../config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<script language="javascript"> 
    function checkreg()
    { 			
		if (form1.name.value=="")
		{
	        alert("真实姓名不能为空！");
			form1.name.focus();
			return false;
	    }
		if (form1.password.value=="" )
		{
	        alert("密码不能为空！");
			form1.password.focus();
			return false;
	    }
		if (form1.pwd.value=="" )
		{
	        alert("确认密码不能为空！");
			form1.pwd.focus();
			return false;
	    }
		if (form1.password.value!=form1.pwd.value && form1.password.value!="")
		{
			alert("两次密码不一样，请确认！");
			form1.password.focus();
			return false;
		}
		if (form1.email.value=="")
		{
			// 如果Email为空，则显示警告信息
	        alert("Email不能为空！");
			form1.email.focus();
			return false;
	    }
		else if (form1.email.value.charAt(0)=="." ||
			form1.email.value.charAt(0)=="@"||
			form1.email.value.indexOf('@', 0) == -1 ||
			form1.email.value.indexOf('.', 0) == -1 ||
			form1.email.value.lastIndexOf("@")==form1.email.value.length-1 ||
			form1.email.value.lastIndexOf(".")==form1.email.value.length-1)
		{
			alert("Email的格式不正确！");
			form1.email.select();
			return false;
		}
		return true;

    }	
</script>
<?php 
if($_POST['submit']){
// 取得网页的参数
$adminname=$_POST['adminname'];
$password=$_POST['password'];
$email=$_POST['email'];
$tele=$_POST['tele'];
$truename=$_POST['truename'];
// 加密密码 md5加密无法逆转
//$password=md5($password);
// 连接数据库，注册用户
$sql="insert into admin(adminname, password, email, tele, truename) values('$adminname','$password','$email', '$tele','$truename')";
mysql_query($sql,$conn) or die ("注册用户失败: ".mysql_error());

// 获得注册用户的自动id，以后使用此id才可登录
$result=mysql_query("select last_insert_id()",$conn);
$re_arr=mysql_fetch_array($result);
$id=$re_arr[0];

//注册成功，自动登录，注册session变量
session_register("adminuser");
$user=$id;
echo "<script language=javascript>alert('注册成功!');</script>";
	}
?>
<body>
<form name="form1" method="post" action="" enctype='multipart/form-data' onSubmit="return checkreg()" >
  <table width="782" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr> 
      <th colspan="2" bgcolor="#FFFFFF"><font size="5">管理员注册界面</font></th>
    </tr>    
    <tr> 
      <td width="364" align="right" bgcolor="#FFFFFF">用户名：</td>
      <td width="403" bgcolor="#FFFFFF"> 
        <input type="text" name="adminname">
    </tr>
    <tr> 
      <td align="right" bgcolor="#FFFFFF">密   码：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="password" name="password">        
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">确认密码：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="password" name="pwd">        
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">Email：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="email">        
    </tr>
	 <tr> 
      <td align="right" bgcolor="#FFFFFF">电   话：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="tele">
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">真实姓名：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="truename">
    </tr>    
    <tr> 
      <td  align=right bgcolor="#FFFFFF" > 
        <input type="submit" name="submit" value="注 册">
      </td>
      <td align=left bgcolor="#FFFFFF"> 
        <input type="reset" name="submit" value="重 写">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
