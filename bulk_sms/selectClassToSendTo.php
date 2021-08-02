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


                    </ul>
                </div>

            </div>
            <div class="span9">





                <a href="tourist_home.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                <br>
                <br>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Farmer Sms</strong>
                </div>
                <div class="hero-unit-2">
                    <form class="form-horizontal" method="POST" action="sendsmsToSpecificClass.php?class=<?php $_POST['class']; ?>">
                         
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">SEND TO ALL FARMERS OF</label>
                            <div class="controls">

                                <input type="text" name="class"  class="span5" required value="<?php echo $_GET['class']; ?>" readonly="" />
                               
                                </div>
                           
                               
                        </div>
                        
                        
                    </form>
                    <center>
                    <i class="icon-plus-sign icon-large"></i>&nbsp;<a href="sendsmsToSpecificClass.php?class=<?php echo $_GET['class'] ; ?>">CONTINUE</a>
                    </center>
                </div>




                <!-- end slider -->
            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>

</body>
</html>


