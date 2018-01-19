<?php
session_start();
require('lib/connection.php');
      // Check admin
      if(isset($_SESSION['username']))
      {
      $username = $_SESSION['username'];

      $resultktadmin = mysqli_query($conn, "SELECT * FROM users WHERE username='".$username."'");
      $rowktadmin= mysqli_fetch_array($resultktadmin);
      if ( $rowktadmin['id']=="1")
      {
        header('Location: quanly/index.php');
      }
      else
        $_SESSION['sdt']=$rowktadmin['id'];
      }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Web cho thuê xe máy Quy Nhơn</title>

    <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--edit-->
  <link rel="stylesheet" href="css/cover.css">
  </head>

  <body>

    <div class="site-wrapper" style="background-image: url(img/coverxe.jpg); background-size: cover; background-position: center center;">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">VArrive- Trang thuê xe máy uy tín nhất!</h3>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading"><?php
            if (isset($_SESSION['username']))
            {
              echo 'Chào mừng '.$_SESSION['username'].' quay trở lại!';
            }
            else
            {
              echo "Quy Nhơn xinh đẹp!";
            }
            ?>
            </h1>
            <p class="lead" style="color: black; font-weight: initial;">THUÊ MỘT CHIẾC XE TỐT, THÊM MỘT CHUYẾN ĐI VUI.<br>
            Hàng trăm chiếc xe tốt sẵn sàng đưa bạn đi mọi nơi!</p>
            <p class="lead">
              <a href="home.php" class="btn btn-lg btn-secondary">Bắt đầu cuộc hành trình</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Made by <a href="https://www.facebook.com/thefrostarcher" target="charset">Quan</a></p>
            </div>
          </div>

        </div>

      </div>

      </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
