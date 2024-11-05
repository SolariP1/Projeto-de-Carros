<?php
$host = "localhost";     
$username = "root";        
$password = "";            
$database = "saep";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Conexão falhada: " . mysqli_connect_error());
}
?>
