
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


			echo "<form action='cart.php' method='post'>";
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
			  
			echo "<div class='pro'>";
			echo "<h3>$row[tenxe]</h3>";
			echo "Loai xe: $row[loai] - Gia: ".number_format($row['gia'],3)." VND<br />";
			echo "<p align='right'>So Luong: <input type='text' name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'> - ";
			echo "<a href='delcart.php?productid=$row[id]'>Xoa Sach Nay</a></p>";
			echo "<p align='right'> Gia tien cho mon hang: ". number_format($_SESSION['cart'][$row['id']]*$row['gia'],3) ." VND</p>";
			echo "</div>";
			$total+=$_SESSION['cart'][$row['id']]*$row['gia'];
			}
		echo "<div class='pro' align='right'>";
		echo "<b>Tong tien cho cac mon hang: <font color='red'>". number_format($total,3)." VND</font></b>";
		echo "</div>";
		echo "<input type='submit' name='submit' value='Cap Nhat Gio Hang'>";
		echo "<div class='pro' align='center'>";
		echo "<b><a href='index.php'>Mua Sach Tiep</a> - <a href='delcart.php?productid=0'>Xoa Bo Gio Hang</a></b>";
		echo "</div>";	
	}

else
	{
		echo "<div class='pro'>";
		echo "<p align='center'>Ban khong co mon hang nao trong gio hang<br /><a href='pay.php'>Thuê xe</a></p>";
		echo "</div>";
	}
?>
