<?php 
require_once("../config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" type="text/css" href="image/css.css">
<script language="javascript">
	var flag="";
	function checkForm()
	{
		if(frm.adminname.value=="")
		{
			alert("用户名不能为空")
			frm.adminname.focus()
			return false;
		}
		if(flag=="1")
		{
			alert("此用户名已经被注册");
			frm.adminname.focus()
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
	}
	function ajaxSubmit()
	{
		//获取用户输入
		var adminname=document.forms[0].adminname.value;
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
		xmlhttp.open("post","checkAdminname.php",true);
		//当方法为post时需要设置http头
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
		//发送数据
		var str="adminname="+escape(adminname);
		xmlhttp.send(str);
	}
</script>
</head>
<body>
<?php
	if ($_POST["Submit"])
	{
		$adminname=$_POST["adminname"];
		$pwd=$_POST["pwd"];
		$sql="insert into admin(adminname,password) values ('$adminname','$pwd')";
		mysql_query($sql);
		echo "<script language=javascript>alert('注册成功！');window.location='ly_right.php'</script>";
		?>
		<?php
		exit();
	}
?>
<form id="frm" name="frm" method="post" action="" onsubmit="return checkForm()" >
  <table class="table" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <th colspan="4" class="bg_tr" align="center">管理员注册</th>
    </tr>
    <tr>
      <td width="40%" align="right" class="bg_tr" bgcolor="#FFFFFF">用户名:</td>
      <td bgcolor="#FFFFFF"><input name="adminname" type="text" id="adminname" onkeyup="ajaxSubmit()"/><label id="msg"></label>
      <label id="message"></label></td>
    </tr>
    <tr>
      <td width="40%" align="right" class="bg_tr" bgcolor="#FFFFFF">密码:</td>
      <td bgcolor="#FFFFFF"><input name="pwd" type="text" id="pwd" /></td>
    </tr>
    <tr>
      <td width="40%" align="right" class="bg_tr" bgcolor="#FFFFFF">确认密码:</td>
      <td bgcolor="#FFFFFF"><input name="pwd2" type="text" id="pwd2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="提交" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
</body>
</html>

