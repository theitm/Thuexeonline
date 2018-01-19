<div>    
      <?php 
            if(!empty($_SESSION['success']))
            {
                echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                unset($_SESSION['success']);
            }
            if(!empty($_SESSION['done']))
            { 
                echo "<div class='alert alert-success'>".$_SESSION['done']."</div>";
                unset($_SESSION['done']);
            }
            if(!empty($_SESSION['chuadangnhap']))
            {
                echo "<div class='alert alert-warning'>".$_SESSION['chuadangnhap']."</div>";
                unset($_SESSION['chuadangnhap']);
            }
        ?>
<form class="lgform" action="#" method="post">
  <div class="imgcontainer">
    <img src="img/thuexe.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Tên đăng nhập</b></label>
    <input type="text" placeholder="Nhập tên đăng nhập" name="username" required>

    <label><b>Mật khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password" required>

    <button type="submit"  name="btn_submit">Đăng nhập</button>
    <input type="checkbox" checked="checked"> Nhớ tài khoản
  </div>
    <?php 
            if(!empty($error)) 
                echo "<div class='alert alert-danger'>".$error."</div>"; 
        ?>
  <div class="container" >
    <span class="psw">Chưa có tài khoản <a href="signup.php">Đăng ký?</a></span>
  </div>
</form>
</div>
    