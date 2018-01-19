<?php
  require('source/header.php');
?>
<div class="row">
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Đơn hàng chờ  </h3>

          <!--     <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div> -->
            </div>
      <!--------------------------
        Nội dung trang
        -------------------------->
   
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Số điện thoại</th>
                  <th>Trạng thái</th>
                </tr>
                <?php

                    //TÌM LIMIT VÀ CURRENT_PAGE
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 6;
                    //TÍNH TOÁN TOTAL_PAGE VÀ START
                    // tổng số trang
                    $total_page = ceil($totaldondatmoi / $limit);
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
                    $resultdonhangmoi = mysqli_query($conn, "SELECT * FROM dondatmoi LIMIT $start, $limit");

                                    if(mysqli_num_rows($resultdonhangmoi) > 0)
                                     {
                                       while($rowdondatmoi=mysqli_fetch_array($resultdonhangmoi))
                                     {
                                        $username=$rowdondatmoi['username'];
                                       $resultuses = mysqli_query($conn, "SELECT * FROM users WHERE username= '$username' ");
                                       $rowusers=mysqli_fetch_array($resultuses);
                                echo "                <tr>\n";
                                echo "                  <td>".$rowdondatmoi['id']."</td>\n";
                                echo "                  <td>".$rowdondatmoi['username']."</td>\n";
                                echo "                  <td>".$rowusers['sdt']."</td>\n";
                                echo "<td><span class=\"label label-warning\">Nhấn để xác nhận</span></td>";
                                echo "                  </tr>";
                              }
                            }
                            // productid=$row[id]

                ?>
              </tbody></table>
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
                echo '<a href="qldoanhthu.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="qldoanhthu.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="qldoanhthu.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  require('source/footer.php');
?>
 