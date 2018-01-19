<?php
$ketnoi=mysqli_connect("localhost","root","");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysqli_select_db("banhang_php",$ketnoi);
mysqli_query("set names utf8");

$csBinhLuan="UPDATE binhluan SET NoiDung='".$_POST["noidung"]."' WHERE MaBinhLuan='".$_POST["mabinhluan"]."'";

    if(mysqli_query($csBinhLuan))
        echo "Chình sửa bình luận thành công";
    else
        echo "Đã xảy ra lỗi";
?>