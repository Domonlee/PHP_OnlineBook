<?php
include("../config.php");
require_once('ly_check.php');
$sql="delete from bookinfo where ID=".$_GET[ID];
$arry=mysql_query($sql,$conn);
if($arry){
echo "<script> alert('ɾ���ɹ�');location='list_book.php';</script>";
}
else
echo "ɾ��ʧ��";
?>
