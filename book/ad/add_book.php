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
	if(myform.bookname.value=="")
	{
		alert("�鼮���Ʋ���Ϊ��");
		myform.bookname.focus()
		return false
	}
	if(myform.price.value=="")
	{
		alert("�鼮�۸���Ϊ��")
		myform.price.focus()
		return false
	}
	else
	{
		if(isNaN(myform.price.value))
		{
			alert("�鼮�۸����������")
			myform.price.focus()
			return false
		}
	}
	if(myform.images.value=="")
	{
		alert("�ϴ�ͼƬ����Ϊ��")
		myform.images.focus()
		return false
	}
	var v = DoProcess();
	if(v != true){
	    alert("����������");
		return false;
	}	
	return true;
}  
</script>
</head>

<body>
<?php
	if($_POST["Submit"])
	{
		$bookname=$_POST["bookname"];
		$author=$_POST["author"];
		$ISBN=$_POST["ISBN"];
		$publisher=$_POST["publisher"];
		$type=$_POST["type"];
		$price=$_POST["price"];
		$publishtime=$_POST["publishtime"];
		$info=$_POST["content"];
		$num=$_POST["num"];
		$imagepath= Upload("images","/bs/imagepass/images/",array(".gif",".jpg",".jpeg"),51200);
		$sql= "insert into bookinfo (id,bookname,author,ISBN,publisher,type,price,publishtime,info,num,picsrc) values('','$bookname','$author','$ISBN','$publisher','$type','$price','$publishtime','$info','$num','$imagepath')";;
		mysql_query($sql);
?>
		
		<h2 align="center" style="color:#FF0000">��ӳɹ�</h2>
		<div align="center"><a href="admin.php">����</a></div>
		<?php
		die();
	}
?>
<form id="myform" name="myform" method="post" action="" onSubmit="return checkform();" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
      <th height="27" colspan="2" class="bg_tr">����鼮��Ϣ</th>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">�鼮���ƣ�</td>
      <td class="td_bg"><label>
        <input name="bookname" type="text" id="bookname" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">�鼮���ߣ�</td>
      <td class="td_bg"><label>
        <input name="author" type="text" id="author" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">ISBN��</td>
      <td class="td_bg"><label>
        <input name="ISBN" type="text" id="ISBN" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">�����磺</td>
      <td class="td_bg"><label>
        <input name="publisher" type="text" id="publisher" />
      </label></td>
    </tr>
    
    <tr>
      <td height="27" align="right" class="td_bg">�鼮���</td>
      <td width="522" class="td_bg"><label>
	  	<?php
			$rs_itm=mysql_query("select * from booktype")
		?>
        <select name="type" id="type">
		<?php
			while($rows_itm=mysql_fetch_assoc($rs_itm))
			{
			?>
			<option value="<?php echo $rows_itm["id"]?>"><?php echo $rows_itm["booktype"]?></option>
			<?php
			}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">ͼ��۸�</td>
      <td class="td_bg"><label>
        <input name="price" type="text" id="price" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">����ʱ�䣺</td>
      <td class="td_bg"><label>
        <input name="publishtime" type="text" id="publishtime" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">���������</td>
      <td class="td_bg"><label>
        <input name="num" type="text" id="num" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">���ͼƬ��</td>
      <td class="td_bg"><input type="file" name="images"></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">ͼ���飺</td>
      <td class="td_bg"><label>
        <input name="content" type="text" id="content" />
      </label></td>
      <!--<td class="td_bg">
    ?php
	$sBasePath = $_SERVER['PHP_SELF'] ;
	$sBasePath = dirname($sBasePath).'/fckeditor/';
	$aFCKeditor = new FCKeditor('content') ;
	$aFCKeditor->Width="950px";                   //�������Ŀ�� 
	$aFCKeditor->Height="400px";                 //�������ĸ߶� 
	$aFCKeditor->BasePath=$sBasePath;
	$aFCKeditor->Create();
?></td>
    </tr>
    <tr>
      <td colspan="2" class="td_bg"><input id="content" name="content" style="display:none;"></input>
    </td>
    </tr>-->
    <tr>
      <td colspan="2" align="center" class="td_bg"><label>
        <input type="submit" name="Submit" value="�ύ" />
        <input type="reset" name="Submit2" value="����" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
