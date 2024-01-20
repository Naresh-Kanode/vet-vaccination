

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vet_vaccination";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("error:" . $conn->connect_error);
} else{
    echo"success";
}






?>