<?php
include("../config.php");
require_once('ly_check.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script Language="JavaScript" Type="text/javascript">
<!--
function myform_Validator(theForm)
{

  if (theForm.name.value == "")
  {
    alert("������������");
    theForm.name.focus();
    return (false);
  }
    if (theForm.price.value == "")
  {
    alert("�����������۸�");
    theForm.price.focus();
    return (false);
  }
    if (theForm.type.value == "")
  {
    alert("�����������������");
    theForm.type.focus();
    return (false);
  }
 return (true);
 }

//--></script>
</head>
<?php
$sql="select * from bookinfo where ID=".$_GET[ID];
$arr=mysql_query($sql,$conn);
$rows=mysql_fetch_row($arr)or die(mysql_error());
?>
<?php 
if($_POST[action]=="modify"){
$sqlstr = "update bookinfo set bookname = '".$_POST[name]."', author = '".$_POST[author]."', ISBN = '".$_POST[ISBN]."', publisher = '".$_POST[publisher]."', type = '".$_POST[type]."', price = '".$_POST[price]."', publishtime = '".$_POST[publishtime]."', num = '".$_POST[num]."', info = '".$_POST[info]."' where ID = ".$_GET[ID];
$arry=mysql_query($sqlstr,$conn);
if ($arry){
				echo "<script> alert('�޸ĳɹ�');location='list.php';</script>";
			}
			else{
				echo "<script>alert('�޸�ʧ��');history.go(-1);</script>";
				}

		}
?>
<body>
<form id="myform" name="myform" method="post" action="" onSubmit="return myform_Validator(this)" language="JavaScript" >
      <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;��̨����&nbsp;&gt;&gt;&nbsp;�����޸�</td>
        </tr>
        <tr>
          <td width="31%" align="right" class="td_bg">������</td>
          <td width="69%" class="td_bg">
            <input name="name" type="text" id="name" value="<?php echo $rows[1] ?>" size="15" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">���ߣ�</td>
          <td class="td_bg">
            <input name="author" type="text" id="author" value="<?php echo $rows[2] ?>" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">ISBN��</td>
          <td class="td_bg">
            <input name="ISBN" type="text" id="ISBN" value="<?php echo $rows[3] ?>" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">�����磺</td>
          <td class="td_bg">
            <input name="publisher" type="text" id="publisher" value="<?php echo $rows[4] ?>" size="15" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">���ͣ�</td>
          <td class="td_bg">
            <input name="type" type="text" id="type"  value="<?php echo $rows[5] ?>"/>          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">�۸�</td>
          <td class="td_bg">
            <input name="price" type="text" id="price" value="<?php echo $rows[6] ?>" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">����ʱ�䣺</td>
          <td class="td_bg">
            <input name="publishtime" type="text" id="publishtime" value="<?php echo $rows[7] ?>" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">���������</td>
          <td class="td_bg"><input name="num" type="text" id="num" value="<?php echo $rows[9] ?>" size="5" maxlength="15" />
            ��</td>
        </tr>
        <tr>
          <td rowspan="3" align="right" class="td_bg">�鼮��飺</td>
          <td rowspan="3" width="100%" class="td_bg">
            <input name="info" type="text" id="info" value="<?php echo $rows[8] ?>"/>          </td>
        </tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
        <tr>
          <td align="right" class="td_bg">
          <input type="hidden" name="action" value="modify">
            <input type="submit" name="button" id="button" value="�ύ"/></td>
          <td class="td_bg">����
            <input type="reset" name="button2" id="button2" value="����"/></td>
        </tr>
      </table>
</form>
</body>
</html>
