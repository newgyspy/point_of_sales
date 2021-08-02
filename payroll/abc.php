<?php

// Inialize session
 session_start();

// Check, if username session is NOT set then this page will jump to login page
 if (!isset($_SESSION['username'])) {
 header('Location: login page/admin.php');
 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Guardian Phamacy</title>
<link href="abc css.css" rel="stylesheet" type="text/css" />
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
            document.location='../logout.php';
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
<div class="wrapper">
<div class="abc"></div>
<div class="company"><div class="log">&nbsp;<a href="../admin.php" class="logout"><h1>Back to Main Menu</h1></a></div></div>
<div class="time">
<table border="0">
<tr><td>
<div class="tymbar">
<script type="text/javascript"> document.write(''+Date()+'') </script></div>
</td></tr>
</table>
</div>
<div class="link">
<a  href="abc.php" class="ab"><div class="bar1">Home<img src="links/main3.png" height="25"></div></a>
<a href="entry.php" class="ab"><div class="bar2">Entry<img src="links/entry.png" height="25"></div></a>
<a href="add.php" class="ab"><div class="bar3">Add<img src="links/edit.png" height="25"></div></a>
<a href="search.php" class="ab"><div class="bar4">Search<img src="links/2.PNG" height="25"></div></a>

</div>
<div class="profilehome"></div>
<div class="body"><center>
<img src="img/building-elevation.jpg" class="imgpro" width="870" height="500"></center>
</div>
<div class="footer"></div>
</div>
</body>
</html>
