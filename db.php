<?php


$host = 'localhost';
$dbname = 'toDoList';
$user = 'root';
$pass = '';

$dsn="mysql:host=$host;dbname=$dbname";
try{
    $conn =new PDO($dsn , $user ,$pass);
    
}catch(PDOException $e){
    echo "failed" . $e->getMessage();
}

?>

