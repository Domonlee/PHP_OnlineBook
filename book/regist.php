<?php 
require_once("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>夏日PHP电子商务系统V.01</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script language="javascript">
	var flag="";
	function checkForm()
	{
		if(frm.username.value=="")
		{
			alert("用户名不能为空")
			frm.username.focus()
			return false;
		}
		if(flag=="1")
		{
			alert("此用户名已经被注册");
			frm.username.focus()
			return false;
		}
		if(frm.pwd.value=="")
		{
			alert("密码不能为空");
			frm.pwd.focus()
			return false
		}
		if(frm.pwd2.value=="")
		{
			alert("确认密码不能为空")
			frm.pwd2.focus()
			return false;
		}
		else
		{
			if(frm.pwd.value!=frm.pwd2.value)
			{
				alert("确认密码和密码要一致")
				frm.pwd2.focus()
				return false;
			}
		}
		if(frm.phone.value=="")
		{
			alert("联系电话不能为空")
			frm.phone.focus()
			return false;
		}
		if(frm.address.value=="")
		{
			alert("地址不能为空")
			frm.address.focus()
			return false;
		}
	}
	function ajaxSubmit()
	{
		//获取用户输入
		var username=document.forms[0].username.value;
		//创建XMLHttpRequest对象
		var xmlhttp;
		if (window.XMLHttpRequest) 
		{ 
			xmlhttp=new XMLHttpRequest();// Mozilla, Safari, ...浏览器
			if (http_request.overrideMimeType) 
			{//有些版本的Mozilla 浏览器处理服务器返回的未包含XML mime-type 头部信息的内容时会出错。因此，要确保返回的内容包含text/xml信息。
				http_request.overrideMimeType("text/xml");
			}
		} 
		else if (window.ActiveXObject) 
		{ 
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");// IE浏览器
		}
		//创建请求结果处理程序
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4)
			{
				if(xmlhttp.status==200)//代表服务器端返回的是正确的结果，这样才有可能正确的解析XML。200表示正常返回；404表示找不到网页；500表示服务器内部错误
				{
					flag=xmlhttp.responseText
					if(flag=="0")
					{
						msg.innerHTML="<span style=color:#009900; font-size:12px>恭喜,此用户没有被注册</span>"
					}
					else if(flag=="1")
					{
						msg.innerHTML="<span style=color:#FF0000; font-size:12px>抱歉,此用户已经被注册</span>"
					}
					else
					{
						msg.innerHTML="";
					}
				}
				else
				{	
					alert("数据提交失败");
				}
			}
		}
		//打开连接，true代表异步，false代表同步
		xmlhttp.open("post","checkUsername.php",true);
		//当方法为post时需要设置http头
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
		//发送数据
		var str="username="+escape(username);
		xmlhttp.send(str);
	}

</script>
</head>

<body>
<?php
	if ($_POST["Submit"])
	{
		$username=$_POST["username"];
		$pwd=$_POST["pwd"];
		$sex=$_POST["sex"];
		$email=$_POST["email"];
		$yy=$_POST["yy"];
		$mm=$_POST["mm"];
		$dd=$_POST["dd"];
		$birth="$yy-$mm-$dd";
		$tel=$_POST["tel"];
		$address=$_POST["address"];
		$sql="insert into user(username,password,sex,birth,tel,email,address) values ('$username','$pwd','$sex','$birth','$tel','$email','$address')";
		mysql_query($sql);
		echo "<script language=javascript>alert('注册成功，祝您购物愉快！');window.location='index.php'</script>";
		?>
		<?php
		exit();
	}
?>
<form id="frm" name="frm" method="post" action="" onsubmit="return checkForm()" >
  <table width="600" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <th colspan="2" bgcolor="#FFFFFF">用户注册</th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">用户名:</td>
      <td bgcolor="#FFFFFF"><input name="username" type="text" id="username" onkeyup="ajaxSubmit()"/><label id="msg"></label>
      <label id="message"></label></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">密码:</td>
      <td bgcolor="#FFFFFF"><input name="pwd" type="text" id="pwd" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">确认密码:</td>
      <td bgcolor="#FFFFFF"><input name="pwd2" type="text" id="pwd2" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">性别:</td>
      <td bgcolor="#FFFFFF"><input type="radio" name="sex" value="男" checked="checked" />
        男
        <input type="radio" name="sex" value="女" />
      女</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">出生年月：</td>
      <td bgcolor="#FFFFFF"><select name="yy" id="yy">
        <script language="JavaScript" type="text/javascript">
	  	//date=new Date()
		//for(i=1955;i<date.getYear();i++)
		for(i=1955;i<2014;i++)
		{
			document.write("<option value="+i+">"+i+"</option>")
		}
		frm.yy[frm.yy.length-20].selected=true
	  </script>
      </select>
        年
        <select name="mm" id="mm">
          <script language="JavaScript" type="text/javascript">
	   	for(i=1;i<=12;i++)
		{
			if(i<10)
			{
				i="0"+i
			}
			document.write("<option value="+i+">"+i+"</option>")
		}
	   </script>
        </select>
        月
        <select name="dd" id="dd">
          <script language="JavaScript" type="text/javascript">
	   	for(i=1;i<=31;i++)
		{
			if(i<10)
			{
				i="0"+i
			}
			document.write("<option value="+i+">"+i+"</option>")
		}
	   </script>
        </select>
      日</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">电话:</td>
      <td bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">Email:</td>
      <td bgcolor="#FFFFFF"><input name="email" type="text" id="email" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">地址:</td>
      <td bgcolor="#FFFFFF"><input name="address" type="text" id="address" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>

<p align="center"><a href="login.php">已有帐号</a>&nbsp;&nbsp;<a href="index.php">返回首页</a></p>
</body>
</html>
