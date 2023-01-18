<?php 

// establish database info : 

// die function in php used to ends the execution of a script and outputs a message 
// it equivalent to exit() function 

$server_name = "localhost" ;
$user_name = "root" ;
$password = "Mounaim_user2001";
$database = "php_proj";

$connect = new mysqli($server_name,$user_name,$password,$database);

if ($connect->connect_error){
    die("connection to database failed ! " . $connect->connect_error );
}else { 
    echo ""; 
};

?>