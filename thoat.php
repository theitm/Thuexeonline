<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
echo '<title>Đăng xuất thành công!</title>';
if (session_destroy())
{	
	$done="Chúc mừng bạn đã đăng xuất thành công!";
	$_SESSION['done'] = $done;
	header('Location: login.php');
    
}
	
else
    echo "<div class='alert alert-danger'>"."Đăng xuất không thành công!"."</div>";
?>