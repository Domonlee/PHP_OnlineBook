<?php
require_once("../config.php");
require_once('ly_check.php');
require_once("../imagepass/global.php");
include('./fckeditor/fckeditor.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script language="javascript">
function checkform(){
	var v = DoProcess();
	if(v != true){
	    alert("����������");
		return false;
	}	
}  
</script>
</head>

<body>
<?php
	$ID=$_GET[ID];
	$path=$_GET["path"];
	if($_POST["Submit"])
	{
		$imagepath= Upload("images","/bs/imagepass/images/",array(".gif",".jpg",".jpeg"),51200);
		if($imagepath=="")
		{
		    $sql="update bookinfo set bookname = '".$_POST[bookname]."', author = '".$_POST[author]."', ISBN = '".$_POST[ISBN]."', publisher = '".$_POST[publisher]."', type = '".$_POST[type]."', price = '".$_POST[price]."', publishtime = '".$_POST[publishtime]."', num = '".$_POST[num]."', info = '".$_POST[content]."' where ID = ".$_GET[ID];
//		    echo "1-------$sql----";
		    mysql_query($sql);
		}
		else
		{
			$root=$_SERVER['DOCUMENT_ROOT'];
			$filepath=$root.$path;
			if(is_file($filepath))
			{
			    unlink($filepath);
			    $sql="update bookinfo set bookname = '".$_POST[bookname]."', author = '".$_POST[author]."', ISBN = '".$_POST[ISBN]."', publisher = '".$_POST[publisher]."', type = '".$_POST[type]."', price = '".$_POST[price]."', publishtime = '".$_POST[publishtime]."', num = '".$_POST[num]."', info = '".$_POST[content]."',picsrc='".$_POST[image]."', where ID = ".$_GET[ID];
//			    echo "2-------$sql----";
			    mysql_query($sql);
			}
			else
			{
			    $sql="update bookinfo set bookname = '".$_POST[bookname]."', author = '".$_POST[author]."', ISBN = '".$_POST[ISBN]."', publisher = '".$_POST[publisher]."', type = '".$_POST[type]."', price = '".$_POST[price]."', publishtime = '".$_POST[publishtime]."', num = '".$_POST[num]."', info = '".$_POST[content]."',picsrc='$imagepath' where ID = ".$_GET[ID];
			    //echo "3-------$sql----";
			    mysql_query($sql);
			}
		}
		?>
		
		<h2 align="center" style="color:#FF0000">�޸ĳɹ�</h2>
		<div align="center"><a href="admin.php">����</a></div>
		<?php
		exit;
	}
	$sql="select * from bookinfo where ID=".$_GET[ID];
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs)or die(mysql_error());
?>
<form id="form1" name="form1" method="post" action="" onSubmit="return checkform();" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
      <th height="28" colspan="2" class="bg_tr">�鼮��Ϣ�޸�</th>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">�鼮���ƣ�</td>
      <td class="td_bg">
        <input name="bookname" type="text" id="bookname"  value="<?php echo $rows[bookname] ?>"/>
      </td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">�鼮���ߣ�</td>
      <td class="td_bg">
        <input name="author" type="text" id="author" value="<?php echo $rows[author] ?>"/>
      </td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">ISBN��</td>
      <td class="td_bg">
        <input name="ISBN" type="text" id="ISBN" value="<?php echo $rows[ISBN] ?>"/>
      </td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">�����磺</td>
      <td class="td_bg">
        <input name="publisher" type="text" id="publisher" value="<?php echo $rows[publisher] ?>"/>
      </td>
    </tr>
    
    <tr>
      <td height="28" align="right" class="td_bg">�鼮���</td>
      <td height="28" class="td_bg"><select name="type" id="type">
	  <?php
	  	$sql="select * from booktype";
		$rs=mysql_query($sql);
		while($rows1=mysql_fetch_assoc($rs))
		{
			if($rows1["id"]==$rows["ID"])
			{
			?>
			<option value="<?php echo $rows1["id"]?>" selected="selected"><?php echo $rows1["booktype"]?></option>
			<?php
			}
			else
			{
			?>
			<option value="<?php echo $rows1["id"]?>"><?php echo $rows1["booktype"]?></option>
			<?php
			}
		}
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">ͼ��۸�</td>
      <td class="td_bg">
        <input name="price" type="text" id="price" value="<?php echo $rows[price] ?>"/>
      </td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">����ʱ�䣺</td>
      <td class="td_bg">
        <input name="publishtime" type="text" id="publishtime" value="<?php echo $rows[publishtime] ?>"/>
      </td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">���������</td>
      <td class="td_bg">
        <input name="num" type="text" id="num" value="<?php echo $rows[num] ?>"/>
      </td>
    </tr>
    <tr>
      <td height="28" align="right" class="td_bg">�޸�ͼƬ��</td>
      <td height="28" class="td_bg"><!--<input name="imagetxt" type="text" value="<?php echo $rows[picsrc] ?>"--><input type="file" name="images" >���ϴ��µ�ͼƬ</td>
    </tr>
    <tr>
      <td height="28" align="right" class="td_bg">ͼ���飺</td>
	<td class="td_bg">
        <input name="content" type="text" id="content" value="<?php echo $rows[info] ?>"/>
	 </td>
<!--      <td height="28" class="td_bg">?php
	$sBasePath = $_SERVER['PHP_SELF'] ;
	$sBasePath = dirname($sBasePath).'/fckeditor/';
	$aFCKeditor = new FCKeditor('content') ;
	$aFCKeditor->Width="750px";                   //�������Ŀ�� 
	$aFCKeditor->Height="500px";                 //�������ĸ߶� 
	$aFCKeditor->BasePath=$sBasePath;
	$aFCKeditor->Value=$rows[product_contents];
	$aFCKeditor->Create();
	?></td> -->
    </tr>
    <tr>
      <td height="28" colspan="2" align="center" class="td_bg"><input type="submit" name="Submit" value="�ύ" />
      <input type="reset" name="Submit2" value="����" /></td>
    </tr>
  </table>
</form>
</body>
</html>
