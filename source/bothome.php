  <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="img/cover.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Đặt xe dễ dàng</h1>
                <p>Chỉ với vài bước cơ bản, bạn đã có thể tìm cho mình một chiếc xe ưng ý để bắt đầu một cuộc hành trình mới..</p>
                <p><a class="btn btn-lg btn-primary" href="pay.php" role="button">Tìm xe ngay</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="img/coverxe.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Các địa điểm hấp dẫn</h1>
                <p>Với một bề dày lịch sử cũng như được mẹ thiên nhiên ưu đãi, Quy Nhơn có rất nhiều địa điểm thú vị đang chờ bạn khám phá...</p>
                <p><a class="btn btn-lg btn-primary" href="place.php" role="button">Tìm hiểu thêm</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="img/noon.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Góc chia sẻ</h1>
                <p>Các kinh nghiệm, lưu ý khi đi "phượt" bằng xe máy cùng những chia sẻ rất đáng giá từ chính các bạn..</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Tìm hiểu thêm</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <?php
      if(!empty($_SESSION['success'])) 
                echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
              ?>
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/home/grang.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Ghềnh ráng</h2>
            <p>Ghềnh Ráng là một quần thể thiên nhiên hùng vĩ, gồm dãy núi Xuân Vân chạy dài ôm sát biển và những ghềnh đá nhiều màu sắc độc đáo. Cát ở đây trắng mịn và biển xanh trong. Từ trên sườn đồi có thể ngắm bao quát toàn bộ phía Đông thành phố Quy Nhơn.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Xem chi tiết &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/home/grang.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Kỳ co</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Xem chi tiết &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/home/grang.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Tháp đôi</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Xem chi tiết &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->