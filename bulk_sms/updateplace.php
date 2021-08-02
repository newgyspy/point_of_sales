<?php
ob_start();
                           if(isset($_POST["up"])){
                       
                            
                               $id=$_GET["id"];
                                $cys =$_POST['cys'];
                                $desc =$_POST['description'];

        $host = 'localhost';
        $db = 'tourism';
        $user = 'root';
        $pass = '';

        // Connect to the database
        $con = mysql_connect($host, $user, $pass);
        mysql_select_db($db,$con);
                               $g= mysql_query("update class set place='$cys' , description='$desc' where class_id='$id'",$con) or die(mysql_error());
                             header("Location:admin_class.php");
                           }
                            ?>   
                