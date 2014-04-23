<?php
	include("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="images/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	$pagesize=10;
	$sql="select * from bookinfo inner join booktype on bookinfo.type=booktype.id";
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
	$sql="select * from bookinfo inner join booktype on bookinfo.type=booktype.id limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
  <tr>
    <th height="27" colspan="11" align="left" class="bg_tr">&nbsp;后台&gt;&gt;图书管理</th>
  </tr>
  <tr>
        <td width="3%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="19%" align="center" bgcolor="#FFFFFF">书名</td>
        <td width="15%" align="center" bgcolor="#FFFFFF">作者</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">ISBN</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">出版社</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">类型</td>
        <td width="9%" align="center" bgcolor="#FFFFFF">出版时间</td>
        <td width="4%" align="center" bgcolor="#FFFFFF">价格</td>
        <td width="3%" align="center" bgcolor="#FFFFFF">数量</td>
        <td width="8%" align="center" bgcolor="#FFFFFF">书籍图片</td>
        <td width="9%" align="center" bgcolor="#FFFFFF">操作</td>
      </tr>
     <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	    <tr>
	    <td  width="3%"><?php echo $rows["ID"]?></td>
	    <td  width="19%" height="26"><?php echo $rows["bookname"]?></td>
	    <td  width="15%" height="26"><?php echo $rows["author"]?></td>
	    <td  width="10%" height="26"><?php echo $rows["ISBN"]?></td>
	    <td width="10%" height="26" ><?php echo $rows["publisher"]?></td>
	    <td width="10%" height="26" ><?php echo $rows["booktype"]?></td>
	    <td width="9%" height="26" ><?php echo $rows["publishtime"]?></td>
	    <td width="4%" height="26" ><?php echo $rows["price"]?></td>
	    <td width="3%" height="26" ><?php echo $rows["num"]?></td>
	    <td align="center" ><img src="<?php echo $rows["picsrc"]?>" width="40" height="40"/></td>
	    <td align="center" ><input type="button" value="修改" onclick="location.href='Modify_book.php?ID=<?php echo $rows["ID"]?>&path=<?php echo $rows["picsrc"]?>'" />
		<input type="button" value="删除" onclick="if(confirm('确定要删除吗?')){location.href='Del_book.php?ID=<?php echo $rows["ID"]?>&path=<?php echo $rows["picsrc"]?>'}" /></td>
	    </tr>
	<?php
	}
  ?>
   <tr>
      <th height="25" colspan="11" align="center" class="bg_tr">
    <?php
	if($pageno==1)
	{
	?>
	首页 | 上一页 | <a href="?pageno=<?php echo $pageno+1?>">下一页</a> | <a href="?pageno=<?php echo $pagecount?>">末页</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上一页</a> | 下一页 | 末页
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上一页</a> | <a href="?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>">末页</a>
	<?php
	}
?>
	&nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息 </th>
  </tr>
</table>
</body>
</html>
