
<?php 
require_once("lib/connection.php");
if (isset($_SESSION['thanhcong']) )
{ 
      echo "<div class='alert alert-success'>".$_SESSION['thanhcong']."</div>";
}
if ( !isset($_SESSION['username']) )
{ 
   header('Location: home.php');
}

else
{           unset($_SESSION['thanhcong']);
            $username=$_SESSION['username'];
            $sql="select * from users where username ='$username'";
            $query=mysqli_query($conn,$sql);
            if($query === FALSE) 
            { 
                die(mysqli_error($conn)); // TODO: better error handling
            }
            while($row = mysqli_fetch_array($query))
            {
            echo "<div class=\"container\">\n";
            echo "      <div class=\"row\">\n";
            echo "        <div class=\"col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad\" >\n";
            echo "          <div class=\"panel panel-info\">\n";
            echo "            <div class=\"panel-heading\">\n";
            echo "              <h3 class=\"panel-title\">Thông tin cá nhân</h3>\n";
            echo "            </div>\n";
            echo "            <div class=\"panel-body\">\n";
            echo "              <div class=\"row\">\n";
            echo "            \n";
            echo "                <div class=\" col-md-9 col-lg-9 \"> \n";
            echo "                  <table class=\"table table-user-information\">\n";
            echo "                    <tbody>\n";
            echo "                      <tr>\n";
            echo "                        <td>Họ và tên</td>\n";
            echo "                        <td>".$row['name']."</td>\n";
            echo "                      </tr>\n";
            echo "                      <tr>\n";
            echo "                        <td>Ngày sinh</td>\n";
            echo "                        <td>".$row['Birthday']."</td>\n";
            echo "                      </tr>\n";
            echo "                      <tr>\n";
            echo "                        <td>Số điện thoại</td>\n";
            echo "                        <td>".$row['sdt']."</td>\n";
            echo "                      </tr>\n";
            echo "                   \n";
            echo "                    \n";
            echo "                    <tr>\n";
            echo "                        <td>Email</td>\n";
            echo "                        <td>".$row['email']."</td>\n";
            echo "                      </tr>\n";
            echo "                        \n";
            echo "                     \n";
            echo "                    </tbody>\n";
            echo "                  </table>\n";
            echo "\t\t\t\t\t\t\t<td><a href=\"home.php\" class=\"btn btn-warning\"><i class=\"fa fa-angle-left\"></i>  Về trang chủ</a></td>\n";
            echo "                  \n";
            echo "                  <a href=\"edituser.php\" class=\"btn btn-primary\">Thay đổi thông tin</a>\n";

            echo "                </div>\n";
            echo "              </div>\n";
            echo "            </div>\n";
            echo "                 \n";
            echo "            \n";
            echo "          </div>\n";
            echo "        </div>\n";
            echo "      </div>\n";
            echo "    </div>";
 }
}
?>