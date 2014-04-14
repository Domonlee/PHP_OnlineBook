<?php
include("../config.php");
require_once('ly_check.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>书籍管理中心</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script Language="JavaScript" Type="text/javascript">
<!--
function myform_Validator(theForm)
{

  if (theForm.name.value == "")
  {
    alert("请输入书名。");
    theForm.name.focus();
    return (false);
  }
    if (theForm.price.value == "")
  {
    alert("请输入书名价格。");
    theForm.price.focus();
    return (false);
  }
    if (theForm.type.value == "")
  {
    alert("请输入书名所属类别。");
    theForm.type.focus();
    return (false);
  }
 return (true);
 }

//--></script>
</head>
<?php
if($_POST[action]=="insert"){
$sql = "insert into bookinfo (id,bookname,author,ISBN,publisher,type,price,publishtime,info,num) values('','".$_POST[name]."','".$_POST[author]."','".$_POST[ISBN]."','".$_POST[publisher]."','".$_POST[type]."','".$_POST[price]."','".$_POST[publishtime]."','".$_POST[info]."','".$_POST[num]."')";
$arr=mysql_query($sql,$conn);
if ($arr){
		echo "<script language=javascript>alert('添加成功！');window.location='add.php'</script>";
			}
			else{
				echo "<script>alert('添加失败');history.go(-1);</script>";
				}

		}
?>
<body>
<form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript">
      <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;后台管理&nbsp;&gt;&gt;&nbsp;新书入库</td>
        </tr>
        <tr>
          <td width="31%" align="right" class="td_bg">书名：</td>
          <td width="69%" class="td_bg">
            <input name="name" type="text" id="name" size="15" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">作者：</td>
          <td class="td_bg">
            <input name="author" type="text" id="author"  />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">ISBN：</td>
          <td class="td_bg">
            <input name="ISBN" type="text" id="ISBN"  />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">出版社：</td>
          <td class="td_bg">
            <input name="publisher" type="text" id="publisher" size="15" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">类型：</td>
          <td class="td_bg">
            <input name="type" type="text" id="type"  />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">价格：</td>
          <td class="td_bg">
            <input name="price" type="text" id="price"  />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">出版时间：</td>
          <td class="td_bg">
            <input name="publishtime" type="text" id="publishtime"  />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">入库总量：</td>
          <td class="td_bg"><input name="num" type="text" id="num" size="5" maxlength="15" />
            本</td>
        </tr>
        <tr>
          <td rowspan="3" align="right" class="td_bg">书籍简介：</td>
          <td rowspan="3" width="100%" class="td_bg">
            <input name="info" type="text" id="info" />          </td>
        </tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
          <td align="center" class="td_bg">
          <input type="hidden" name="action" value="insert">
            <input type="submit" name="button" id="button" value="提交" />          </td>
          <td class="td_bg">　　
            <input type="reset" name="button2" id="button2" value="重置" />       </td>
        </tr>
  </table>
</form>
</body>
</html>
