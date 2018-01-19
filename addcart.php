<?php
session_start();
$id=$_GET['item'];
if(isset($_SESSION['cart'][$id]))
{
	$qty = $_SESSION['cart'][$id] + 1;

}
else
{
	$qty=1;
}
$_SESSION['cart'][$id]=$qty;
if(isset($_SESSION['lastpage']))
{
	
	header("location:".$_SESSION['lastpage']."");
}
else 
header("location:pay.php");

exit('Đã thêm xe vào giỏ!');
?>
