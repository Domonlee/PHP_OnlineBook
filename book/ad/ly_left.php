<?php
	require_once("../config.php");
	include("ly_check.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
}
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
}
#navigation a.head {
	cursor:pointer;
	background:url(images/main_34.gif) no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li li a:hover {
	background:url(images/tab_bg.gif) repeat-x;
		border:solid 1px #adb9c2;
}
-->
</style>
</head>
<body>
<div  style="height:100%;">
  <ul id="navigation">
    <li> <a class="head">系统设置</a>
      <ul>
        <li><a href="ly_reg.php" target="rightFrame">管理员注册</a></li>
      </ul>
      <ul>
        <li><a href="ly_pwd.php" target="rightFrame">密码修改</a></li>
      </ul>
    </li>
	 <li><a class="head">图书管理</a>
       <ul>
        <li><a href="Admin_book.php" target="rightFrame">图书管理</a></li>
		<li><a href="Add_book.php" target="rightFrame">添加书籍</a></li>
      </ul>
	 <li><a class="head">订单管理</a>
       <ul>
        <li><a href="Manager_order.php " target="rightFrame">查看/管理订单</a></li>
      </ul>
    </li>
	 <li><a class="head">查询功能</a>
       <ul>
        <li><a href="Search_book.php " target="rightFrame">书籍查询</a></li>
      </ul>
       <ul>
        <li><a href="Search_user.php " target="rightFrame">用户查询</a></li>
      </ul>
       <ul>
        <li><a href="Search_order.php " target="rightFrame">订单查询</a></li>
      </ul>
    </li>
    <li> <a class="head">版本信息</a>
      <ul>
        <li>
          <div align="center">V2</div>
        </li>
      </ul>
    </li>
  </ul>
</div>
</body>
</html>
