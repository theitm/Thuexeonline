<?php 
session_start();

    require_once("lib/connection.php"); 
    require('site.php');
  load_top();   
  require('source/cssuser.php');
  load_header();


if ( !$_SESSION['username'] )
{ 
    header('Location: home.php');
}
else
{ 
    $username=$_SESSION['username'];
    $sql_query = @mysqli_query("SELECT * FROM users WHERE username='{$username}'");
    $users = @mysqli_fetch_array( $sql_query ); 
    //----Noi dung thong bao sau khi sua
    $thanhcong='Sửa thành công!';
    $kothanh='Sửa không thành công';
    if (isset($_POST["btn_submit"])) {
        $name = addslashes( $_POST['name'] );
        $pass = addslashes( $_POST['pass'] );
        $sn = addslashes( $_POST['sn'] );
        $email = addslashes( $_POST['email'] );
        $sdt = addslashes( $_POST['sdt'] );
        $sql="UPDATE users SET
            sdt = '$sdt',
            email = '$email',
            Name = '$name',
            Birthday = '$sn' 
            WHERE username = '$username' LIMIT 1 ;";
 
 
        if ($sua=mysqli_query($conn, $sql))
        {
                $_SESSION['thanhcong']=$thanhcong;
                header('Location: user.php');
        }
        else
                echo "<div class='alert alert-danger'>".$kothanh."</div>";
 
        if ($_POST['pass']!="") {
            $sqlx="UPDATE users SET password = '$pass' WHERE username = '$username' LIMIT 1 ;";
            $suapass=mysqli_query($conn, $sqlx);
            if ($suapass) 
                echo "(Đã đổi pass) ";
            else
                echo "(Chưa đổi pass) ";
        }
    }
    else
        require('source/botedituser.php');
        load_footer();
        // echo"
        // <form method='POST' action='#'>
        //     <table border='1' wusernameth='100%' username='table1' cellspacing='0' cellpadding='0' style='border-collapse: collapse' bordercolor='#C0C0C0'>
        //         <tr>
        //             <td>Tên:</td>
        //             <td><input type='text' value='{$users['Name']}' name='name' size='20'></td>
        //         </tr>
        //         <tr>
        //             <td>email:</td>
        //             <td><input type='text' value='{$users['email']}' name='email' size='20'></td>
        //         </tr>
        //         <tr>
        //             <td>Sinh Nhật:</td>
        //             <td><input type='text' name='sn' value='{$users['Birthday']}' size='20'></td>
        //         </tr>
        //         <tr>
        //             <td>sdt:</td>
        //             <td><input type='text' name='sdt' value='{$users['sdt']}' size='20'></td>
        //         </tr>
        //         <tr>
        //             <td>Pass:</td>
        //             <td><input type='password' name='pass' size='20'></td>
        //         </tr>
        //     </table>
        //     <p align='center'><input type='submit' name='btn_submit' value='Sửa'></p>
        // </form>
        // ";
} 
?>

