<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
   <!-- Page Content -->
   <!-- Page Content -->
    <?php
    $ok=1;
     if(isset($_SESSION['cart']))
     {
      foreach($_SESSION['cart'] as $k=>$v)
      {
       if(isset($v))
       {
       $ok=2;
       }
      }
     }
     if ($ok != 2)
      {
      echo "     <br> <p align='right'; style=\"position: absolute; right: 50px;\">";
      echo "        <a href=\"cart.php\" class=\"btn btn-success\">\n";
      echo "<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"> Giỏ hàng: "."0"."</i>\n";
      echo "        </a>\n";
      echo "      </p>";
     } else {
      $items = $_SESSION['cart'];
      echo "     <br> <p align='right'; style=\"position: absolute; right: 50px;\">";
      echo "        <a href=\"cart.php\" class=\"btn btn-success\">\n";
      echo "<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"> Giỏ hàng: ".count($items)."</i>\n";
      echo "        </a>\n";
      echo "      </p>";
 
     }
    ?>
    <div class="container" >
  
      <!-- Page Heading -->
      <h1 class="my-4">Danh sách xe
        <small>(Hiện có)</small>
      </h1>
      <div class="row">
      <?php
      // $sql="select * from xe order by id desc";
      // $query=mysqli_query($conn,$sql);

      // <!-- Code phân trang --> 
      $result = mysqli_query($conn, 'select count(id) as total from xe');
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];
      //TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 6;
      //TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limit);
      // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
      // Tìm Start
      $start = ($current_page - 1) * $limit;
      // TRUY VẤN LẤY DANH SÁCH TIN TỨC
      // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
      $results = mysqli_query($conn, "SELECT * FROM xe LIMIT $start, $limit");

      if(mysqli_num_rows($results) > 0)
      {
       while($row=mysqli_fetch_array($results))
       {
        
        echo "        <div class=\"col-lg-4 col-sm-6 portfolio-item\"  >\n";
        echo "          <div class=\"card h-100\" align='center'  >\n";
        echo "            <a href=\"#\"><img class=\"card-img-top \" src=\"img/xe/".$row['id'].".png\" style=\" height:150px; width:auto;  alt=\"\"  ></a> \n ";
        echo "            <div class=\"card-body\">\n";
        echo "              <h4 class=\"card-title\">\n";
        echo "                <a href=\"#\" id='dream1'>$row[tenxe]</a>\n";
        echo "              </h4>\n";
        echo "              <p class=\"card-text\">- Loại xe: $row[loai]</p>\n";
        echo "              <p class=\"card-text\">- Giá: ".number_format($row['gia'],3)." VND</p>\n";
        echo "      <p>Nhấn thuê ngay: \n";
        echo "        <a href=\"addcart.php?item=$row[id]\" class=\"btn btn-info\">\n";
        echo "<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"> Thuê ngay</i>\n";
        
        echo "        </a>\n";
        echo "      </p>";
        echo "            </div>\n";
        echo "          </div>\n";
        echo "        </div>";
       }
      }
      ?>
      </div>
      <?php
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="pay.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="pay.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="pay.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
      <!-- Pagination -->
     <!--  <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div> -->
    <!-- /.container -->