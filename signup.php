<?php
	session_start();
?>
<?php 
            if(!empty($_SESSION['username']))
            	header('Location: home.php')
                
        ?>
<?php
		require_once("lib/connection.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["password"];
 			$name = $_POST["name"];
  			$sdt = $_POST["sdt"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			if ($username == "" || $password == "" || $name == "" || $sdt == "") 
			{
				  $error="Bạn vui lòng nhập đầy đủ thông tin!";
  			}
  			else
  		// 		if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
  		// 		{
				// $nameErr = "Tên chỉ gồm ký tự và khoảng trống";
				// }
				// else
  				{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);
 
					if(mysqli_num_rows($kt)  > 0){
						 $error="Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    sdt
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$sdt'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		$success="Chúc mừng bạn đã đăng ký thành công!";
				   		$_SESSION['success'] = $success;
				   		header('Location: login.php');
					}
									    
					
			 	 }
	}
	?>
<?php
	require('site.php');
	load_top();
	require('source/csssignup.php');
	load_header();
	require('source/botsignup.php');
	load_footer();
?>