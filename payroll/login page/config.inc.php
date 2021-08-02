<?php

$hostname = 'mysql11.000webhost.com';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
 $dbname   = 'a4018284_payroll'; // Your database name.
 $username = 'a4018284_jade';             // Your database username.
 $password = '1234jadelanga';                 // Your database password. If your database has no password, leave it empty.

// Let's connect to host
 mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
 // Select the database
 mysql_select_db($dbname) or DIE('Database name is not available!');

?>