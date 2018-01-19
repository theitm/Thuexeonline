<?php
session_start();
$ketnoi=mysqli_connect("localhost","root","");
if(!$ketnoi)
    echo "Kết nối thất bại";

mysqli_select_db("banhang_php",$ketnoi);
mysqli_query("set names utf8");

$tendangnhap=$_POST["tendangnhap"];
$matkhau=$_POST["matkhau"];
$tranghientai=$_POST["tranghientai"];

$ktTonTai="SELECT * FROM thanhvien WHERE TenDangNhap='".$tendangnhap."' and MatKhau='".$matkhau."'";
$truyvanktTonTai=mysqli_query($ktTonTai);

if(mysqli_num_rows($truyvanktTonTai)>0) {
    echo "<script>alert('Đăng nhập thành công')</script>";
    $_SESSION["tendangnhap"]=$tendangnhap;
}
else {
    echo "<script>alert('Tài khoản hoặc mật khẩu không đúng')</script>";
}

?>

<script>
    location='<?php echo $tranghientai; ?>';
</script>