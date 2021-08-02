<?php
/*
  Magezi Relay WebApi - 2011-05-30
  Copyright (c) 2011 Magezi Solutions Ltd
  All rights reserved.
  
  
  
	$relay_user = '';
	$relay_pass = '';
	
	These are the values for your login details to www.bulksms.ug
	They have been left empty for you to fill.
	
	Make sure the rest is left unchanged otherwise you will not like the results.
		
*/


$relay_user = 'isaacsms';
$relay_pass = '460d110r';

$url = "http://relay.magezi.net/tosms.php?tel=".$_GET['tel']."&msg=".urlencode($_GET['msg'])."&name=".urlencode($_GET['sender'])."&app=webapi&relay_password=".$relay_pass."&relay_user=".$relay_user;

//echo @file_get_contents($url);


//sms ends
if($url){
	echo '<script>alert("Message Sent")</script>';
	echo $result;
	
	}
	else if(!$url){
	echo '<script>alert("Message Sending failed")</script>';
	
	}
?>