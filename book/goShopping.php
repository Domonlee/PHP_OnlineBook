<?php
	require_once("config.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	if($_SESSION["user"]=="")
	{
		header("location:index.php");
		exit();
	}
	
	$user=$_SESSION["user"];
	$books=$_SESSION["booksArray"];
	$time=date("Y-m-d H:i:s");
	$sql="insert into orders (username,flag,time) values ('$user',0,'$time')";
	mysql_query($sql);
	/*$sql="select * from orders order by orderid desc limit 0,1";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	$orderid=$rows["orderid"];*/
	$orderid=mysql_insert_id();   //得到上一次所插入数据的ID
	while($fruit_books=current($books))
	{
		$sql="insert into orderdetail (orderid,booksid,amount) values ($orderid,".key($books).",".$fruit_books.")";
		mysql_query($sql);
		next($books);
	}
	echo "<script language=javascript>alert('购买成功，稍候我们会与您进行联系，谢谢！');window.location='index.php'</script>";
?>
</body>
</html>
