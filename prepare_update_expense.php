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
 
<body onload="setTimeout('startCountDown()',2000);" onmousemove="resetTimer();">

<form name="counter"><input type="text" size="5" name="timer" disabled="disabled" /></form> 


<script type="text/javascript"> 
<!--   
 // edit startSeconds as you see fit 
 // simple timer example provided by Thomas

 var startSeconds = 700;
 var milisec = 0;
 var seconds=startSeconds;
 var countdownrunning = false
 var idle = false;
 document.counter.timer.value=startSeconds;

function CountDown()
{ 
    if(idle == true)
    {

        if (milisec<=0)
        { 
            milisec=9 
            seconds-=1 
        } 
        if (seconds<=-1)
        { 
            document.location='logout.php';
            milisec=0 
            seconds+=1 
            return;
        } 
        else 
        milisec-=1; 
        document.counter.timer.value=seconds;
        setTimeout("CountDown()",100);
    }
    else
    {
        return;
    } 
}
function startCountDown()
{
   document.counter.timer.value=startSeconds;
   seconds = startSeconds;
   milisec = 0

   document.counter.timer.style.display = 'block';
   idle = true;
   CountDown();
   document.getElementById("alert").innerHTML = 'You are idle. you will be logged out after ' + startSeconds + ' seconds.';
   countdownrunning = false;   
}

function resetTimer()
{ 
    document.counter.timer.style.display = 'none';
    idle = false;    
    document.getElementById("alert").innerHTML = '';


    if(!countdownrunning)
        setTimeout('startCountDown()',2000);

    countdownrunning = true;

}

--> 
</script>
<tr>
            <td height="115" align="left" valign="top"><img src="images/head.png" width="960" height="90"></td>
          </tr> 
	<div class="main">
    
    
           <?php
			$sid=$_GET["sid"];
				$con=mysql_connect("localhost","root","");
				$selectbd=mysql_select_db("stock",$con);
				
				
				$select="select * from expences where id=$sid";
				$sql=mysql_query($select);
				$row=mysql_fetch_array($sql);
				
                
				?>
		<form method="post" action="update_expense.php?sid=<?php echo $row['id'];?>"  id="loginForm">
        <a href="admin.php"><h1>Exit from here</h1></a>
    		<h1><span>Guardian Pharmacy <lable></lable></span> </h1>
  			<div class="inset">
	  			<p>
	    		 <label for="expense">Expense</label>
   	 			<input id="expense" name="expense" size="25" type="text" value="<?php echo $row['expense'];?>"/>
				</p>
  				<p>
				    <label for="amount">AMOUNT</label>
				    <input id="amount" name="amount" size="25" 
type="text" value="<?php echo $row['amount'];?>"/>
  				</p>
                
                <p>
				    <label for="date">DATE</label>
				    <input type="text"  name="date" id="datefield1" value="<?php echo date('d-m-Y');?>" >
                    
                     
  				</p>
                
 			 </div>
 	 
			  <p class="p-container">
			    
			    <input value="Update Expense" id="submit" type="submit" name="update">
			  </p>
              
              <p class="p-container">
			    
			    <input value="Delete Expense" id="submit" type="submit" name="delete">
			  </p>

		</form>
	</div>  
			<!-----start-copyright---->
   					<div class="copy-right">
						<p>Code Software Investiments</a></p> 
					</div>
				<!-----//end-copyright---->
                
                	<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.date_input.js"></script>
<link rel="stylesheet" href="date_input.css" type="text/css">
<script type="text/javascript">$(function() {
  
  $("#datefield1").date_input(); 
 
});</script>
                
         
</body>
</html>