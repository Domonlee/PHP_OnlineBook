<?php
require("config.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script language="javascript">
	function modify(id,value)
	{
		location.href="ShoppingModify.php?id="+id+"&value="+value;
	}
</script>
<?php
	if($_SESSION["user"]=="")
	{
	echo "<script language=javascript>alert('����û�е�½�����ȵ�½���������û��ע�ᣬ����ע���ڵ�½');window.location='login.php'</script>";
		?>
		<?php
		exit();
	}
	$id=$_GET["id"];
	$books=$_SESSION["booksArray"];
	if($id<>"")
	{	
		if($books[$id]=="")
		{
			$books[$id]=1;
		}
		else
		{
			$books[$id]=$books[$id]+1;
		}
		$_SESSION["booksArray"]=$books;
	}
?>
        <form action="" method="post" name="frm" id="frm">
          <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
              <th bgcolor="#FFFFFF">ͼ����</th>
              <th bgcolor="#FFFFFF">ͼ������</th>
              <th bgcolor="#FFFFFF">ͼ������</th>
              <th bgcolor="#FFFFFF">ͼ�������</th>
              <th bgcolor="#FFFFFF">��Ʒ����</th>
              <th bgcolor="#FFFFFF">��ǰ���</th>
              <th bgcolor="#FFFFFF">��������</th>
              <th bgcolor="#FFFFFF">ɾ��</th>
            </tr>
		<?php
			$sum=0;
			while ($fruit_books = current($books))
			{
				$id=key($books);
				$sql="select * from bookinfo where ID=$id";
				$rs=mysql_query($sql);
				$rows=mysql_fetch_assoc($rs);
		?>
			<tr>
              <td bgcolor="#FFFFFF"><?php echo $id?></td>
              <td bgcolor="#FFFFFF"><?php echo $rows["bookname"]?></td>
              <td bgcolor="#FFFFFF"><?php echo $rows["author"]?></td>
              <td bgcolor="#FFFFFF"><?php echo $rows["publisher"]?></td>
              <td bgcolor="#FFFFFF"><?php echo $rows["price"]?></td>
              <td bgcolor="#FFFFFF"><?php echo $rows["num"]?></td>
              <td bgcolor="#FFFFFF"><label>
                <input name="txt<?php echo $id?>" type="text" id="txt<?php echo $id?>" size="3" value="<?php echo $fruit_books?>" />
                <input type="button" name="Submit3" value="�޸�����" onclick="modify(<?php echo $id?>,frm.txt<?php echo $id?>.value)" />
              </label></td>
              <td bgcolor="#FFFFFF"><input type="button" value="ɾ��" onclick="if(confirm('ȷ��Ҫɾ����?')){location.href='ShoppingDel.php?id=<?php echo $id?>'}" /></td>
            </tr>
		<?php
				$sum+=$rows["price"]*$fruit_books;
				next($books);
			}
		?>
            <tr>
	      <td colspan="5" bgcolor="#FFFFFF"><font size="5"><b> �ܼۣ�<?php echo $sum?></font></b></td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="8" align="center" bgcolor="#FFFFFF"><input type="button" name="Submit" value="����" onclick="location.href='goShopping.php'">
              <input type="button" name="Submit2" value="��������" onClick="window.close()"></td>
            </tr>
          </table>
        </form>
</body>
</html>
