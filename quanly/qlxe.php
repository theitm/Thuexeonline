<?php

  require('source/header.php');
  // Code phân trang

?>

     <!--------------------------
        Nội dung trang
        -------------------------->
     <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách xe hiện có</h3>

              <!-- <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table " align="center">
                <tbody><tr>
                  <th>ID</th>
                  <th>Tên xe</th>
                  <th>Loại</th>
                  <th>Giá</th>
                  <th>Số lượng gốc</th>
                  <th>Số lượng còn lại</th>
                  <th>Sửa thông tin</th>
                </tr>
                <?php

                    //TÌM LIMIT VÀ CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 6;
                    //TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                    $total_page = ceil($totalxe / $limit);
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
                    $resultxe = mysqli_query($conn, "SELECT * FROM xe LIMIT $start, $limit");
                                    if(mysqli_num_rows($resultxe) > 0)
                                     {
                                       while($rowxe=mysqli_fetch_array($resultxe))
                                     {
                                echo "                <tr>\n";
                                echo "                  <td>".$rowxe['id']."</td>\n";
                                echo "                  <td>".$rowxe['tenxe']."</td>\n";
                                echo "                  <td>".$rowxe['loai']."</td>\n";
                                echo "                  <td>".$rowxe['gia']."</td>\n";
                                echo "                  <td>".$rowxe['soluong']."</td>\n";
                                echo "                  <td>".$rowxe['conlai']."</td>\n";
                                echo "                  <td class=\"actions\" data-th=\"\">\n";
                                echo "                  <a href='addxe.php?productid=$rowxe[id]'><button class=\"btn btn-warning btn-sm\"><i class=\"fa fa-pencil-square-o\"></i></button></a>\n";
                                echo "                  </td>\n";
                                echo "                  </tr>";
                              }
                            }
                            // productid=$row[id]

                ?>
              </tbody>

            </table>

            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>       
     </div>
          <?php
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="qlxe.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="qlxe.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="qlxe.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
    </section>
    <!-- /.content -->
  </div>
<?php
require('source/footer.php');
?>