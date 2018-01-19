<div class="section">
  <div class="top-border left"></div>
  <div class="top-border right "></div>
  <h1>Cảm ơn bạn!</h1>
  <p class="contact">Cảm ơn bạn đã chọn dịch vụ thuê xe máy của VArrive. Chúng tôi sẽ liên hệ các bạn trong 2- 3 tiếng nữa!</p>
  <?php
  	if(!isset($_SESSION['username']))
  	{

  		echo "  <form action=\"#\" method=\"POST\">\n";
  		echo "Vui lòng nhập số điện thoại!<br>";
		echo "  \t<input name=\"sdt\" type=\"text\">\n";
		echo "  \t<br><br>\n";
		echo "  \t<input type=\"submit\" name=\"submit_btn\" class=\"contact btn btn-primary btn-lg\" value=\"Ðặt xe\"><br><br>\n";
		echo "  </form>";
                if(!empty($error)) 
                echo "<div class='alert alert-danger'>".$error."</div>"; 
  	}
  ?>

</div>