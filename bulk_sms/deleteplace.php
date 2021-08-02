<?php
ob_start();
     
                               $id=$_GET["id"];
                                

        $host = 'localhost';
        $db = 'tourism';
        $user = 'root';
        $pass = '';

        // Connect to the database
        $con = mysql_connect($host, $user, $pass);
        mysql_select_db($db,$con);
                               $g= mysql_query("delete from class where class_id='$id'",$con) or die(mysql_error());
                             header("Location:admin_class.php");
                           
                            ?>  