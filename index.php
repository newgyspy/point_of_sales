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
    		<h3><span>Nile Coffee Farmers Association <lable> Login </lable></span> </h3>
  			<div class="inset">
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
				    <label for="password">USER TYPE</label>
				    <select name="usertype">
                    <option>Admin</option>
                     <option>User</option>
                    </select>
  				</p>
                
                
                
                
                
                
                
				  <p>
				    <input type="checkbox" name="remember" id="remember">
				    <label for="remember">Remember me for 14 days</label>
				  </p>
 			 </div>
 	 
			  <p class="p-container">
			    <span><a href="#">Forgot password ?</a></span>
			    <input value="Login" id="submit" type="submit">
			  </p>
		</form>
	</div>  
			<!-----start-copyright---->
   					<div class="copy-right">
						<p>Code Software Investiments All rights reserved.</a></p> 
					</div>
				<!-----//end-copyright---->
</body>
</html>