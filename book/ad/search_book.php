<?php
include("../config.php");
require_once('ly_check.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
  <tr>
    <td width="999" height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr">&nbsp;后台管理&nbsp;&gt;&gt;&nbsp;图书查询</td>
  <tr>
    <td height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr"><form id="form1" name="form1" method="post" action="" style="margin:0px; padding:0px;">
        <table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">
          <tr>
            <td width="36%" align="center">
              <select name="seltype" id="seltype">
                <option value="ID">图书序号</option>
                <option value="bookname">图书名称</option>
                <option value="author">图书作者</option>
                <option value="ISBN">ISBN</option>
                <option value="publisher">出版社名称</option>
                <option value="type">图书类型</option>
                <option value="price">图书价格</option>
                <option value="publishtime">出版时间</option>
              </select>            </td>
            <td width="31%" align="center">
              <input type="text" name="coun" id="coun" />            </td>
            <td width="33%" align="center">
            <input type="submit" name="button" id="button" value="查询" onClick="return q_cont();" />            </td>
          </tr>
        </table>
    </form></td>  
  </table>
</td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      
      <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="21%" align="center" bgcolor="#FFFFFF">书名</td>
        <td width="15%" align="center" bgcolor="#FFFFFF">作者</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">ISBN</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">出版社</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">类型</td>
        <td width="9%" align="center" bgcolor="#FFFFFF">出版时间</td>
        <td width="3%" align="center" bgcolor="#FFFFFF">价格</td>
        <td width="3%" align="center" bgcolor="#FFFFFF">数量</td>
        <td width="9%" align="center" bgcolor="#FFFFFF">操作</td>
      </tr>
<?php
	$pagesize=10;
	$sql = "select * from bookinfo where ".$_POST[seltype]." like ('%".$_POST[coun]."%')";
	$rs=mysql_query($sql) or die("请输入查询条件!!!");
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
	$sql="select * from bookinfo where ".$_POST[seltype]." like ('%".$_POST[coun]."%') order by id desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
     <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	    <tr align="center">
	    <td class="td_bg" width="6%"><?php echo $rows["ID"]?></td>
	    <td class="td_bg" width="21%" height="26"><?php echo $rows["bookname"]?></td>
	    <td class="td_bg" width="15%" height="26"><?php echo $rows["author"]?></td>
	    <td class="td_bg" width="10%" height="26"><?php echo $rows["ISBN"]?></td>
	    <td width="12%" height="26" class="td_bg"><?php echo $rows["publisher"]?></td>
	    <td width="12%" height="26" class="td_bg"><?php echo $rows["type"]?></td>
	    <td width="9%" height="26" class="td_bg"><?php echo $rows["publishtime"]?></td>
	    <td width="3%" height="26" class="td_bg"><?php echo $rows["price"]?></td>
	    <td width="3%" height="26" class="td_bg"><?php echo $rows["num"]?></td>
	    <td class="td_bg" width="20%">
	    <a href="Modify_book.php?ID=<?php echo $rows[ID] ?>" class="trlink">修改</a>&nbsp;&nbsp;<a href="Del_book.php?ID=<?php echo $rows[ID] ?>" class="trlink">删除</a></td>
	    </tr>
	<?php
	}
?>
	    <tr>
      <th height="25" colspan="10" align="center" class="bg_tr">
    <?php
	if($pageno==1)
	{
	?>
	首页 | 上一页 | <a href="?pageno=<?php echo $pageno+1?>">下一页</a> | <a href="?pageno=<?php echo $_POST[seltype]?>">末页</a>
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
