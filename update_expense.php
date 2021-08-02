      <?php
				if(isset($_POST["update"])){
				$con=mysql_connect("localhost","root","");
				$selectbd=mysql_select_db("stock",$con);
				$expense=$_POST["expense"];
				$amount=$_POST["amount"];
				$date=$_POST["date"];
				$sid=$_GET["sid"];
				
				
				$update="update expences set expense='$expense',amount='$amount',date='$date' where id=$sid";
				$sql=mysql_query($update);
				header("Location:view_expenses.php");
				}
				
				
				
				  if(isset($_POST["delete"])){
				$con=mysql_connect("localhost","root","");
				$selectbd=mysql_select_db("stock",$con);
				
				$sid=$_GET["sid"];
				
				
				$delete="delete from expences where id=$sid";
				$sql=mysql_query($delete);
				header("Location:view_expenses.php");
				
                }
                
				?>