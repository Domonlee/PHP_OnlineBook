<?php
	require_once("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>订单列表</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	$pagesize=10;
	$sql="select * from orders order by orderid desc";
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

	$sql="select * from orders order by orderid desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>

<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
  <tr>
    <th height="27" colspan="6" align="left" class="bg_tr">&nbsp;后台&gt;&gt;订单管理</th>
  </tr>
  <tr>
    <th height="26" class="td_bg">订单编号</th>
    <th class="td_bg">客户姓名</th>
    <th class="td_bg">订货时间</th>
    <th class="td_bg">处理情况</th>
    <th class="td_bg">订单详情</th>
    <th class="td_bg">删除订单</th>
  </tr>
  <?php
  	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
    <td height="26" align="center" class="td_bg"><?php echo $rows["orderid"]?></td>
    <td align="center" class="td_bg"><?php echo $rows["username"]?></td>
    <td align="center" class="td_bg"><?php echo $rows["time"]?></td>
    <td align="center" class="td_bg">
	<?php
		if ($rows["flag"]==1)
		{
		?>
		<div style="color:#FF0000">处理完毕!</div>
		<?php	
		}
		else
		{
		?>
		<div style="color:#00CC00">尚未处理!</div>
		<?php
		}
	?>	</td>
    <td align="center" class="td_bg"><a href="Detail_order.php?id=<?php echo $rows["orderid"]?>" class="trlink">订单详情</a></td>
    <td align="center" class="td_bg"><a href="Del_order.php?id=<?php echo $rows["orderid"]?>" class="trlink">删除</a></td>
  </tr>
	<?php
	}
  ?>
     <tr>
      <th height="25" colspan="7" align="center" class="bg_tr">
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
