<?php
include "crud.php";

try{
    $db = new PDO("mysql:host=localhost;dbname=pdochat","root","");
   
}catch(Exception $e){
    print"Error!:".$e->getMessage();
    die();
}
$chat = new Chat($db); 
?>