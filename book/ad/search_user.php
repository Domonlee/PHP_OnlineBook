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
    <td width="999" height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr">&nbsp;后台管理&nbsp;&gt;&gt;&nbsp;用户查询</td>
  <tr>
    <td height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr"><form id="form1" name="form1" method="post" action="" style="margin:0px; padding:0px;">
        <table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">
          <tr>
            <td width="36%" align="center">
              <select name="seltype" id="seltype">
                <option value="name">用户名称</option>
                <option value="ID">用户标识</option>
                <option value="email">用户邮件</option>
                <option value="tel">用户电话</option>
                <option value="address">用户地址</option>
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
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">用户标识</td>
        <td width="21%" align="center" bgcolor="#FFFFFF">用户名称</td>
        <td width="21%" align="center" bgcolor="#FFFFFF">用户邮件</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">用户电话</td>
        <td width="32%" align="center" bgcolor="#FFFFFF">用户地址</td>
      </tr>
<?php
	$pagesize=10;
	$sql = "select * from user where ".$_POST[seltype]." like ('%".$_POST[coun]."%')";
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
	$sql="select * from user where ".$_POST[seltype]." like ('%".$_POST[coun]."%') order by id desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
     <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	    <tr align="center">
	    <td class="td_bg" width="6%"><?php echo $rows["ID"]?></td>
	    <td class="td_bg" width="21%" height="26"><?php echo $rows["name"]?></td>
	    <td class="td_bg" width="21%" height="26"><?php echo $rows["email"]?></td>
	    <td width="12%" height="20" class="td_bg"><?php echo $rows["tel"]?></td>
	    <td width="12%" height="32" class="td_bg"><?php echo $rows["address"]?></td>
	    <td class="td_bg" width="20%">
	    <!--<a href="update.php?ID=<?php echo $rows[ID] ?>" class="trlink">修改</a>&nbsp;&nbsp;<a href="del.php?ID=<?php echo $rows[ID] ?>" class="trlink">删除</a></td> -->
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

