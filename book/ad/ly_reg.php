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
			alert("�û�������Ϊ��")
			frm.adminname.focus()
			return false;
		}
		if(flag=="1")
		{
			alert("���û����Ѿ���ע��");
			frm.adminname.focus()
			return false;
		}
		if(frm.pwd.value=="")
		{
			alert("���벻��Ϊ��");
			frm.pwd.focus()
			return false
		}
		if(frm.pwd2.value=="")
		{
			alert("ȷ�����벻��Ϊ��")
			frm.pwd2.focus()
			return false;
		}
		else
		{
			if(frm.pwd.value!=frm.pwd2.value)
			{
				alert("ȷ�����������Ҫһ��")
				frm.pwd2.focus()
				return false;
			}
		}
	}
	function ajaxSubmit()
	{
		//��ȡ�û�����
		var adminname=document.forms[0].adminname.value;
		//����XMLHttpRequest����
		var xmlhttp;
		if (window.XMLHttpRequest) 
		{ 
			xmlhttp=new XMLHttpRequest();// Mozilla, Safari, ...�����
			if (http_request.overrideMimeType) 
			{//��Щ�汾��Mozilla �����������������ص�δ����XML mime-type ͷ����Ϣ������ʱ�������ˣ�Ҫȷ�����ص����ݰ���text/xml��Ϣ��
				http_request.overrideMimeType("text/xml");
			}
		} 
		else if (window.ActiveXObject) 
		{ 
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");// IE�����
		}
		//�����������������
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4)
			{
				if(xmlhttp.status==200)//����������˷��ص�����ȷ�Ľ�����������п�����ȷ�Ľ���XML��200��ʾ�������أ�404��ʾ�Ҳ�����ҳ��500��ʾ�������ڲ�����
				{
					flag=xmlhttp.responseText
					if(flag=="0")
					{
						msg.innerHTML="<span style=color:#009900; font-size:12px>��ϲ,���û�û�б�ע��</span>"
					}
					else if(flag=="1")
					{
						msg.innerHTML="<span style=color:#FF0000; font-size:12px>��Ǹ,���û��Ѿ���ע��</span>"
					}
					else
					{
						msg.innerHTML="";
					}
				}
				else
				{	
					alert("�����ύʧ��");
				}
			}
		}
		//�����ӣ�true�����첽��false����ͬ��
		xmlhttp.open("post","checkAdminname.php",true);
		//������Ϊpostʱ��Ҫ����httpͷ
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
		//��������
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
		echo "<script language=javascript>alert('ע��ɹ���');window.location='ly_right.php'</script>";
		?>
		<?php
		exit();
	}
?>
<form id="frm" name="frm" method="post" action="" onsubmit="return checkForm()" >
  <table class="table" width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <th colspan="4" class="bg_tr" align="center">����Աע��</th>
    </tr>
    <tr>
      <td width="40%" align="right" class="bg_tr" bgcolor="#FFFFFF">�û���:</td>
      <td bgcolor="#FFFFFF"><input name="adminname" type="text" id="adminname" onkeyup="ajaxSubmit()"/><label id="msg"></label>
      <label id="message"></label></td>
    </tr>
    <tr>
      <td width="40%" align="right" class="bg_tr" bgcolor="#FFFFFF">����:</td>
      <td bgcolor="#FFFFFF"><input name="pwd" type="text" id="pwd" /></td>
    </tr>
    <tr>
      <td width="40%" align="right" class="bg_tr" bgcolor="#FFFFFF">ȷ������:</td>
      <td bgcolor="#FFFFFF"><input name="pwd2" type="text" id="pwd2" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="�ύ" />
      <input type="reset" name="Submit2" value="����" /></td>
    </tr>
  </table>
</form>
</body>
</html>

