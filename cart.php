<?php
session_start();
	
	if(!(isset($_SESSION['username'])))
	{
		$chuadangnhap="Vui lòng đăng nhập để xem giỏ và đặt hàng";
		$_SESSION['chuadangnhap']=$chuadangnhap;
		header('location: login.php');
	}
if(isset($_POST['submit']))
{
	foreach($_POST['qty'] as $key=>$value)
	{
		if( ($value == 0) and (is_numeric($value)))
		{
			unset ($_SESSION['cart'][$key]);
		}
		elseif(($value > 0) and (is_numeric($value)))
		{
			$_SESSION['cart'][$key]=$value;
		}
	}
	header("location:cart.php");
}
?>
<?php
	require('site.php');
	load_top();
	require('source/csscart.php');
	load_header();
	require('source/botcart.php');
	load_footer();
?>