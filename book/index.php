<?php
 include_once("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table width="999" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
  <tr>
    <td bgcolor="#FFFFFF"><img src="images/top.jpg" width="999" height="150" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="999" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php" title="��ҳ">��ҳ</a></td>
       <!-- <td align="center" background="images/button1_bg.jpg"><a href="?ID=1" title="���С˵">���С˵</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="?ID=4" title="��������">��������</a></td>-->
        <td align="center" background="images/button1_bg.jpg"><a href="login.php"  title="��½ע��">��½ע��</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="999" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="300" valign="top">
<table width="100%" height="176" border="0" cellpadding="0" cellspacing="0" class="center_border">
      <tr>
        <td height="175" valign="top">
	<?php
	if(!$_GET[ID]){
	$sql="select * from bookinfo";
	}else{
	$sql="select * from bookinfo where ID=".$_GET[ID];
	}
	$rs=mysql_query($sql);
	$pagesize=20;
	$rs=mysql_query($sql);

	$recordcount=mysql_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	$pageno=$_GET["pageno"];
	if($pageno=="")
	{
		$pageno=1;
	}
	if($pageno<1)
	{
		$pageno=1;
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;

	if(!$_GET[ID]){
	$sql="select * from bookinfo limit $startno,$pagesize";
	}else{
	$sql="select * from bookinfo where ID='".$_GET[id]."' limit $startno,$pagesize";
	}
	$rs=mysql_query($sql);
?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
      <td align="left" bgcolor="#FFFFFF" class="forumRowHighlight">
	  <table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
  <tr>
    <td width="100" rowspan="5" align="center" bgcolor="#FFFFFF"><img src="<?php echo $rows["picsrc"]?>" width="80" height="80" /></td>
    <td bgcolor="#FFFFFF">�鼮����:<?php echo $rows["bookname"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�鼮�۸�:<?php echo $rows["price"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">�鼮����:	
	<?php $sql2="select * from booktype where id=".$rows["type"];
	$rs2=mysql_query($sql2);
	$rows2=mysql_fetch_assoc($rs2);
	echo $rows2["booktype"];
	?>
	</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF" ><font size="3"><b><a href="#" onClick="window.open('ShoppingCar.php?id=<?php echo $rows["ID"]?>','ShoppingCar','width=550 height=300')">���빺�ﳵ</a></font></b></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><input type="button" value="��ϸ��Ϣ" onClick="window.open('detail.php?id=<?php echo $rows["ID"]?>')" /></td>
  </tr>
</table>
	                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
	                        <tr>
	                          <td height="3"></td>
                        </tr>
                  </table></td>
			  	  <?php
			$i++;
		if($i%2==0)
		{
			echo "</tr><tr>";
		}
	}
?>
      </tr>
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
  <tr>
  <td height="30" align="center" background="images/button1_bg.jpg">
  <?php
	if($pageno==1)
	{
	?>
    ��ҳ | ��һҳ | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="?ID=<?php echo $_GET[ID] ?>&pageno=1">��ҳ</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | ��һҳ | ĩҳ
    <?php
	}
	else
	{
	?>
    <a href="?ID=<?php echo $_GET[ID] ?>&pageno=1">��ҳ</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno+1?>" class="forumRowHighlight">��һҳ</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
?>
    &nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ</td>
  </tr>
  </table>
          </td></tr>
    </table>
</td>
  </tr>
</table>
<table width="100%" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="999" height="30" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td align="center" background="images/button1_bg.jpg" bgcolor="#FFFFFF">�ҵ���ַ��http://www.domon.cn ��Ȩ���У�Domon Powered by <a href="http://www.domon.cn" target="_blank" >www.Domon.com</a>  </script></td>
  </tr>
</table>
</body>
</html>
