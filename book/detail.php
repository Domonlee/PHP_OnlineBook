<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�鼮��ϸ��Ϣ</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	$id=$_GET["id"];
	$sql="select * from booktype inner join bookinfo on bookinfo.type=booktype.id where bookinfo.ID=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
  <tr>
    <th colspan="2" bgcolor="#FFFFFF"><font size="5"><b>�鼮��ϸ��Ϣ</font></b></th>
  </tr>
  <tr>
    <td width="10%" bgcolor="#FFFFFF">�鼮���ƣ�</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["bookname"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�鼮���ߣ�</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["author"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">ISBN��</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["ISBN"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�����磺</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["publisher"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�鼮���</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["booktype"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�鼮�۸�</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["price"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">����ʱ�䣺</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["publishtime"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�鼮��飺</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["info"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�鼮��棺</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["num"]?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><label>
      <input type="button" name="Submit" value="��ӡ" onClick="window.print()" />
      <input type="button" name="Submit2" value="�ر�" onClick="window.close()" />
    </label></td>
  </tr>
</table>
</body>
</html>
