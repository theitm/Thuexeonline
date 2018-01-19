<?php
session_start();
if(isset($_SESSION["username"])) {
	require_once("lib/connection.php");
    $layThanhVien="SELECT * FROM users where username='".$_SESSION["username"]."'";
    $truyvanlayThanhVien=mysqli_query($conn,$layThanhVien);
    $cotTV=mysqli_fetch_array($truyvanlayThanhVien);
	}
	        if(isset($_SESSION["cart"])) {
            $username=$_SESSION["username"];
            $sdt=$cotTV['sdt'];
            $ngaydat=date("Y-m-d");

            $themDonDat="INSERT INTO  dondatmoi(username,sdt,ngaydat) VALUES('".$username."',".$sdt."','".$ngaydat."')";

            if(mysqli_query($conn,$themDonDat)) {
            	$id = 0;
                $layDonDat = "SELECT * FROM dondatmoi ORDER BY id";
                $truyvanlayDonDat = mysqli_query($conn,$layDonDat);
                while ($cotDD = mysqli_fetch_array($truyvanlayDonDat)) {
                    $id = $cotDD["id"];
                }

                foreach ($_SESSION["cart"] as $cotGH) {
                    $loaixe=$row["loaixe"];
                    $soluong=$_SESSION['cart'][$row['id']];

                    $themCT_DonDat="INSERT INTO ct_dondatmoi VALUES('".$id."','".$loaixe."','".$soluong."')";
                    mysqli_query($themCT_DonDat);
                }
            	unset($_SESSION["cart"]);
            	unset($_SESSION['tongtien']);
                header('Location: thank.php');
            }
            else
            {
                echo "Đã xảy ra lỗi";
                 header('Location: thank.php');
            }
        }





        			// function laydsxe()
			// {
			// 	foreach($_SESSION['cart'] as $key=>$value)
			// 	{
			// 		$item[]=$key;
			// 	}
			// 	$str=implode(",",$item);
			// 	$server_username = "root";
			// 	$server_password = "";
			// 	$server_host = "localhost";
			// 	$database = 'thuexe';

			// 	$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");	
			// 	mysqli_query($conn,"SET NAMES 'UTF8'");
			// 	$sql="select * from xe where id in ($str)";
			// 	$query=mysqli_query($conn,$sql);
			// 	if($query === FALSE) 
			// 	{ 
	  //   			die(mysqli_error($conn)); // TODO: better error handling
			// 	}

			// 	while($row = mysqli_fetch_array($query))
			// 	{	
			// 		$queue="";
			// 		$loai= (string)$row['loai'];
			// 		$soluong= (string)$_SESSION['cart'][$row['id']];
			// 		$thanhtien= (string)$_SESSION['cart'][$row['id']]*$row['gia'];
			// 		$queue=array_unshift( $loai,"x",$soluong,"=",$thanhtien,$queue);
			// 	}
			// 	    return $queue;
			// }	
?>


