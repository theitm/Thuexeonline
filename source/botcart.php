<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<?php
error_reporting(E_ALL & ~ E_NOTICE);  

$ok=1;
if(isset($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $k => $v)
	{
		if(isset($k))
		{
			$ok=2;
		}
	}
}
if($ok == 2)
{



			echo "<div class=\"container\">\n";
			echo "\t<form action=\"#\" method=\"POST\" >\n";
			echo "\t<table id=\"cart\" class=\"table table-hover table-condensed\">\n";
			echo "    \t\t\t\t<thead>\n";
			echo "\t\t\t\t\t\t<tr>\n";
			echo "\t\t\t\t\t\t\t<th style=\"width:50%\">Tên Xe</th>\n";
			echo "\t\t\t\t\t\t\t<th style=\"width:10%\">Giá</th>\n";
			echo "\t\t\t\t\t\t\t<th style=\"width:10%\">Số lượng</th>\n";
			echo "\t\t\t\t\t\t\t<th style=\"width:20%\" class=\"text-center\">Tổng cộng</th>\n";
			echo "\t\t\t\t\t\t\t<th style=\"width:10%\"></th>\n";
			echo "\t\t\t\t\t\t</tr>\n";
			echo "\t\t\t\t\t</thead>\n";
			echo "\t\t\t\t\t<tbody>\n";
			echo "\t\t\t\t\t\t<tr>\n";
			foreach($_SESSION['cart'] as $key=>$value)
			{
				$item[]=$key;
			}
			$str=implode(",",$item);
			require_once("lib/connection.php");
			$sql="select * from xe where id in ($str)";
			$query=mysqli_query($conn,$sql);
			if($query === FALSE) 
			{ 
    			die(mysqli_error($conn)); // TODO: better error handling
			}

			while($row = mysqli_fetch_array($query))
			{
			echo "\t\t\t\t\t\t\t<td data-th=\"Tên xe\">\n";
			echo "\t\t\t\t\t\t\t\t<div class=\"row\">\n";
			echo "\t\t\t\t\t\t\t\t\t<div class=\"col-sm-2 hidden-xs \"><img src=\"img/xe/".$row['id'].".png\" style=\" height:50px; width:auto; alt=\"...\" class=\"img-responsive\"/></div>\n";
			echo "\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">\n";
			echo "\t\t\t\t\t\t\t\t\t\t<h4 class=\"nomargin\">$row[tenxe]</h4>\n";
			echo "\t\t\t\t\t\t\t\t\t\t<p>Loại xe: ".$row[loai]."</p>\n";
			echo "\t\t\t\t\t\t\t\t\t</div>\n";
			echo "\t\t\t\t\t\t\t\t</div>\n";
			echo "\t\t\t\t\t\t\t</td>\n";
			echo "\t\t\t\t\t\t\t<td data-th=\"Giá\">".number_format($row['gia'],3)."VND"."</td>\n";
			echo "\t\t\t\t\t\t\t<td data-th=\"Số luợng\">\n";
			echo "\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control text-center\" name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'>\n";
			echo "\t\t\t\t\t\t\t</td>\n";
			echo "\t\t\t\t\t\t\t<td data-th=\"Tổng cộng\" class=\"text-center\">". number_format($_SESSION['cart'][$row['id']]*$row['gia'],3) ." VND</td>\n";
			echo "\t\t\t\t\t\t\t<td class=\"actions\" data-th=\"\">\n";
			echo "\t\t\t\t\t\t\t\t<a href='delcart.php?productid=$row[id]'><button class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash-o\"></i></button></a>\t\t\t\t\t\t\t\t\n";
			echo "\t\t\t\t\t\t\t</td>\n";
			echo "\t\t\t\t\t\t</tr>\n";
			$total+=$_SESSION['cart'][$row['id']]*$row['gia'];
			}
			echo "\t\t\t\t\t</tbody>\n";
			echo "\t\t\t\t\t<tfoot>\n";
			echo "\t\t\t\t\t\t<tr class=\"visible-xs\">\n";
			echo "\t\t\t\t\t\t\t<td align=\"left\" class=\"text-center\"><a href='delcart.php?productid=0' class=\"btn btn-danger\" role=\"button\"><i class=\"fa fa-trash-o\"></i> Xóa toàn bộ giỏ</button></a>\n";
			echo "\t\t\t\t\t\t\t<td class=\"text-center\"><input type='submit' class=\"btn btn-info btn-sm\" name='submit' value='Cập nhật giỏ hàng'></td>\n";
			
			echo "</div>";
			echo "\t\t\t\t\t\t</tr>\n";
			echo "\t\t\t\t\t\t<tr>\n";
			echo "\t\t\t\t\t\t\t<td><a href=\"pay.php\" class=\"btn btn-warning\"><i class=\"fa fa-angle-left\"></i> Tiếp tục mua hàng</a></td>\n";
			echo "\t\t\t\t\t\t\t<td colspan=\"2\" class=\"hidden-xs\"></td>\n";
			echo "\t\t\t\t\t\t\t<td class=\"hidden-xs text-center\"><strong>Tổng cộng ". number_format($total,3)." VND</strong></td>\n";
			echo "\t\t\t\t\t\t\t<td><a href=\"thanhtoan.php\" class=\"btn btn-success btn-block\">Thanh toán <i class=\"fa fa-angle-right\"></i></a></td>\n";
			echo "\t\t\t\t\t\t</tr>\n";
			echo "\t\t\t\t\t</tfoot>\n";
			echo "\t\t\t\t</table>\n";
			echo "\t</form>\n";
			echo "</div>";
			$_SESSION['tongtien']=$total;
}

else
	{
		echo "<div class='alert alert-danger'>Bạn chưa có xe nào trong giỏ</div>";
		echo "\t\t\t\t\t\t\t<td><a href=\"pay.php\" class=\"btn btn-warning\"><i class=\"fa fa-angle-left\"></i> Tiếp tục mua hàng</a></td>\n";
	}

?>
