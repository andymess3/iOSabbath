<?php 

//setting time

date_default_timezone_set('EST');

// server setup 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

//gather data

$users_name = $_POST['name'];
$users_email = $_POST['email'];
$users_day = date("Y-m-d", strtotime($_POST['day']));
$dayofweek = date('D', strtotime($users_day));



// data input

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Emails1 (email, name, day, day_of_week)
            VALUES ('$users_email', '$users_name', '$users_day', '$dayofweek')";
    $conn->exec($sql);
    echo "New record created successfully.<br>Your first email will be sent on $users_day, and you will recieve emails every subsequent $dayofweek.";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

include "run.php";

?>   
