<?php
	session_start();
	$id=$_GET["id"];
	$books=$_SESSION["booksArray"];
	unset($books[$id]);
	$_SESSION["booksArray"]=$books;
	header("location:ShoppingCar.php");
?>
