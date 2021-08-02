<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
		<!--//webfonts-->
</head>
 
<body>
<tr>
            <td height="115" align="left" valign="top"><img src="images/head.png" width="960" height="90"></td>
          </tr> 
	<div class="main">
    
    
           <?php
			$sid=$_GET["sid"];
				$con=mysql_connect("localhost","root","");
				$selectbd=mysql_select_db("stock",$con);
				
				
				$select="select * from user where id=$sid";
				$sql=mysql_query($select);
				$row=mysql_fetch_array($sql);
				
                
				?>
		<form method="post" action="update_user.php?sid=<?php echo $row['id'];?>"  id="loginForm">
        <a href="admin.php"><h1>Exit from here</h1></a>
    		<h1><span>Guardian Pharmacy <lable> Login </lable></span> </h1>
  			<div class="inset">
	  			<p>
	    		 <label for="email">USER NAME</label>
   	 			<input id="email" name="myusername" size="25" type="text" value="<?php echo $row['username'];?>"/>
				</p>
  				<p>
				    <label for="password">PASSWORD</label>
				    <input id="password" name="mypassword" size="25" 
type="text" value="<?php echo $row['password'];?>"/>
  				</p>
                
                <p>
				    
				    <input type="hidden" name="usertype" value="admin" >
                    
                     
  				</p>
                
 			 </div>
 	 
			  <p class="p-container">
			    
			    <input value="Update User" id="submit" type="submit" name="update">
			  </p>
              
              <p class="p-container">
			    
			    <input value="Delete User" id="submit" type="submit" name="delete">
			  </p>

		</form>
	</div>  
			<!-----start-copyright---->
   					<div class="copy-right">
						<p>Code Software Investiments</a></p> 
					</div>
				<!-----//end-copyright---->
                
         
</body>
</html>