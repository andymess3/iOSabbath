<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";
$int_date = date('D'); 

// selecting data from database

	// connect to database

	$sql= mysqli_connect($servername,$username,$password, $dbname) 
	or die("Unable to select database");

	// select data

	$query= "SELECT * FROM Emails1 WHERE day_of_week = '$int_date'";
	$result= mysqli_query ($sql, $query) 
	or die ('Error querying database.');

	// fetch emails from corresponding rows

	while ($row = mysqli_fetch_array($result)) {
	$email= $row['Email'];
	$name= $row['Name'];

	// mailer
	
	// echo '<br>Email sent to: ' . $name;
	$to = $email;
	$subject = "iOSabbath";
	$text = "Today is your iOSabbath. You are invited to forget your phone and enjoy the day without it.";
	mail($to, $subject, $text);
	}

	// close connection
	
	mysqli_close($sql);

 //  cron job running everyday at 6 am

$path = "http://localhost:8888";
$cron = $path . "/index.php";
echo exec("*6*** php -q ".$cron." &> /dev/null");

?>
