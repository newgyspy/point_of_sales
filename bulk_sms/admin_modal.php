<?php
ob_start();
?>
<!-- modal -->

<div id="teacher" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">

    </div>
    <div class="modal-body">

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Login Administrator!</strong>&nbsp;Please Enter the Details Below.
        </div>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Username</label>
                <div class="controls">
                    <input type="text" name="username" id="inputEmail" placeholder="Enter Username">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                    <input type="password" name="password" id="inputPassword" placeholder="Enter Password">
                </div>
            </div>


            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="login_admin" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
                </div>


            </div>

            <?php
            if (isset($_POST['login_admin'])) {

                function clean($str) {
                    $str = @trim($str);
                    if (get_magic_quotes_gpc()) {
                        $str = stripslashes($str);
                    }
                    return mysql_real_escape_string($str);
                }

                $username = clean($_POST['username']);
                $password = clean($_POST['password']);

                $query = mysql_query("select * from teacher where username='$username' and password='$password'") or die(mysql_error());
                $count = mysql_num_rows($query);
                $row = mysql_fetch_array($query);


                if ($count > 0) {
                    session_start();
                    session_regenerate_id();
                    $_SESSION['id'] = $row['teacher_id'];
                    header('location:admin_home.php');
                    session_write_close();
                    exit();
                } else {
                    session_write_close();
                    ?>
                    <div class="pull-right">   
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert alert-danger"><i class="icon-remove-sign"></i>&nbsp;Access Denied</div>
                    </div>
                    <?php
                    exit();
                }
            }
            ?>
        </form>


        <!-- teacher -->




    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>

    </div>
</div

><!-- end modal -->