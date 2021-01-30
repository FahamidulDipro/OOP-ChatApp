<?php
include "crud.php";

try{
    $db = new PDO("mysql:host=localhost;dbname=pdochat","root","");
    $chat = new Chat($db); 
}catch(Exception $e){
    print"Error!:".$e->getMessage();
    die();
}

?>