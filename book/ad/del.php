<?php
include("../config.php");
require_once('ly_check.php');
$sql="delete from bookinfo where ID=".$_GET[ID];
$arry=mysql_query($sql,$conn);
if($arry){
echo "<script> alert('É¾³ý³É¹¦');location='list_book.php';</script>";
}
else
echo "É¾³ýÊ§°Ü";
?>
