<?php
//Set the DB variables
$dsn = 'mysql:host=localhost;dbname=superstore'; 
$username = 'mgs_user'; 
$password = 'pa55word';

//connect with the DB
try 
{ $db = new PDO($dsn, $username, $password); // creates PDO object
} catch (PDOException $e) 
{ 
$error_message = $e->getMessage(); 


}

 ?>