<?php
$ketnoi=mysqli_connect("localhost","root","");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysqli_select_db("banhang_php",$ketnoi);
mysqli_query("set names utf8");

$ktTonTai="SELECT * FROM thanhvien WHERE TenDangNhap='".$_POST["tendangnhap"]."' and MatKhau='".$_POST["matkhaucu"]."'";
$truyvanktTonTai=mysqli_query($ktTonTai);
if(mysqli_num_rows($truyvanktTonTai) > 0)
{
    $thaydoiMatKhau="UPDATE thanhvien SET MatKhau='".$_POST["matkhaumoi"]."' WHERE TenDangNhap='".$_POST["tendangnhap"]."'";
    if(mysqli_query($thaydoiMatKhau))
        echo "Đổi mật khẩu thành công";
    else
        echo "Xảy ra lỗi";
}
else
{
    echo "Mật khẩu không chính xác" ;
}

?>