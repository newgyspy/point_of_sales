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
		<form method="post" action="checklogin.php"  id="loginForm">
        <h1><span><a href="../index.php">Move to admin panel</a></span> </h1>
    		
  			<div class="inset">
            <h1><span>Reprovide your Login details</span> </h1>
	  			<p>
	    		 <label for="email">USER NAME</label>
   	 			<input id="email" name="myusername" size="25" type="text"/>
				</p>
  				<p>
				    <label for="password">PASSWORD</label>
				    <input id="password" name="mypassword" size="25" 
type="password"/>
  				</p>
                
                <p>
				      <input id="usertype" name="usertype" size="25" 
type="hidden" value="admin"/>
  				</p>
                
               
 			 </div>
 	 
			  <p class="p-container">
			    
			    <input value="Login" id="submit" type="submit">
			  </p>
		</form>
	</div>  
			<!-----start-copyright---->
   					<div class="copy-right">
						<p>Rodman Computers All rights reserved(0782056092).</a></p> 
					</div>
				<!-----//end-copyright---->
</body>
</html>