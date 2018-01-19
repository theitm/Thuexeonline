<form action="#" method="POST">
  <div class="container">
    <label><b>Tên đăng nhập</b></label>
    <input type="text" placeholder="Nhập tên đăng nhập" name="username">
    <label><b>Mật khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password">
    <label><b>Họ & tên</b></label>
    <input type="text" placeholder="Nhập họ tên" name="name">
    <label><b>Số điện thoại</b></label>
    <input type="text" placeholder="Nhập số điện thoại" name="sdt">    
       <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <div class="clearfix">  
      <button type="submit" name="btn_submit" class="signupbtn">Sign Up</button>
    </div>
       <?php 
            if(!empty($error)) 
                echo "<div class='alert alert-danger'>".$error."</div>"; 
            if(!empty($nameErr)) 
                echo "<div class='alert alert-danger'>".$nameErr."</div>";
            ?>
  </div>
</form>