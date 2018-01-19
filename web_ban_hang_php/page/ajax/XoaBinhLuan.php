<?php
$ketnoi=mysqli_connect("localhost","root","");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysqli_select_db("banhang_php",$ketnoi);
mysqli_query("set names utf8");

$xoaBinhLuan="DELETE FROM binhluan WHERE MaBinhLuan='".$_POST["mabinhluan"]."'";

    if(mysqli_query($xoaBinhLuan))
        echo "Xóa bình luận thành công";
    else
        echo "Đã xảy ra lỗi";
?>