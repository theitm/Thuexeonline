</head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">VA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" username="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payfind.php">Tìm xe</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="pay.php">Danh sách xe hiện có</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="contact.php">Liên hệ</a>
            </li>
          </ul>
        <div class="row" style="position: absolute;
        right: 50px;">
        <?php
            if (!isset($_SESSION['username']))
            {
              echo " <form action=\"login.php\" class=\"form-inline mt-2 mt-md-0\">\n";
              echo "            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Ðăng nhập</button>\n";
              echo "          </form>";
            }
            else
            { 
              if($_SESSION['username']=='admin')
              {
              echo " <form action=\"quanly/index.php\" class=\"form-inline mt-2 mt-md-0\">\n";
              echo "            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Về trang quản lý</button>\n";
              echo "          </form>";
              }
              else
              {
              echo "<div class=\"dropdown\">\n";
              echo "  <button class=\"btn btn-outline-success dropdown-toggle\" type=\"button\" username=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n";
              echo "    Xin chào ".$_SESSION['username']."!\n";
              echo "  </button>\n";
              echo "  <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">\n";
             
              echo "    <a class=\"dropdown-item\" href=\"user.php\">Xem thông tin</a>\n";
               echo "    <a class=\"dropdown-item\" href=\"edituser.php\">Sửa thông tin</a><hr>\n";
              echo "    <a class=\"dropdown-item\" href=\"thoat.php\">Thoát</a>\n";
              echo "  </div>\n";
              echo "</div>";

                }






              //  echo " <form action=\"user.php\" class=\"form-inline mt-2 mt-md-0\">\n";
              // echo "            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\"></button>\n";
            }
        ?>
      </div>
        </div>
      </nav>
    </header>