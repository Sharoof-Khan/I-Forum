<?php
// Connection for database
$servername= "localhost";
$username = "root";
$password= "";
$database= "iforum";

$conn = mysqli_connect($servername, $username,$password,$database);
if(!$conn){
    die("Database not connected due to this error--->".mysqli_connect_error());
}


?>