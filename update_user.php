      <?php
				if(isset($_POST["update"])){
				$con=mysql_connect("localhost","root","");
				$selectbd=mysql_select_db("stock",$con);
				$username=$_POST["myusername"];
				$password=$_POST["mypassword"];
				$sid=$_GET["sid"];
				
				
				$update="update user set username='$username',password='$password' where id=$sid";
				$sql=mysql_query($update);
				header("Location:view_users.php");
				}
				
				
				
				  if(isset($_POST["delete"])){
				$con=mysql_connect("localhost","root","");
				$selectbd=mysql_select_db("stock",$con);
				
				$sid=$_GET["sid"];
				
				
				$delete="delete from user where id=$sid";
				$sql=mysql_query($delete);
				header("Location:view_users.php");
				
                }
                
				?>