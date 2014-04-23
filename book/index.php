<?php
 include_once("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>网上书店</title>
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
        <td align="center" background="images/button1_bg.jpg"><a href="index.php" title="首页">首页</a></td>
       <!-- <td align="center" background="images/button1_bg.jpg"><a href="?ID=1" title="外国小说">外国小说</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="?ID=4" title="计算机相关">计算机相关</a></td>-->
        <td align="center" background="images/button1_bg.jpg"><a href="login.php"  title="登陆注册">登陆注册</a></td>
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
    <td bgcolor="#FFFFFF">书籍名称:<?php echo $rows["bookname"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">书籍价格:<?php echo $rows["price"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">书籍类型:	
	<?php $sql2="select * from booktype where id=".$rows["type"];
	$rs2=mysql_query($sql2);
	$rows2=mysql_fetch_assoc($rs2);
	echo $rows2["booktype"];
	?>
	</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF" ><font size="3"><b><a href="#" onClick="window.open('ShoppingCar.php?id=<?php echo $rows["ID"]?>','ShoppingCar','width=550 height=300')">放入购物车</a></font></b></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><input type="button" value="详细信息" onClick="window.open('detail.php?id=<?php echo $rows["ID"]?>')" /></td>
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
    首页 | 上一页 | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno+1?>">下一页</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pagecount?>">末页</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="?ID=<?php echo $_GET[ID] ?>&pageno=1">首页</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno-1?>">上一页</a> | 下一页 | 末页
    <?php
	}
	else
	{
	?>
    <a href="?ID=<?php echo $_GET[ID] ?>&pageno=1">首页</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno-1?>">上一页</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pageno+1?>" class="forumRowHighlight">下一页</a> | <a href="?ID=<?php echo $_GET[ID] ?>&pageno=<?php echo $pagecount?>">末页</a>
    <?php
	}
?>
    &nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息</td>
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
    <td align="center" background="images/button1_bg.jpg" bgcolor="#FFFFFF">我的网址：http://www.domon.cn 版权所有：Domon Powered by <a href="http://www.domon.cn" target="_blank" >www.Domon.com</a>  </script></td>
  </tr>
</table>
</body>
</html>
