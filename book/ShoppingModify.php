<?php
	session_start();
	$id=$_GET["id"];
	$value=$_GET["value"];
	$books=$_SESSION["booksArray"];
	$books[$id]=$value;
	$_SESSION["booksArray"]=$books;
	header("location:ShoppingCar.php");
?>