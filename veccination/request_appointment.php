<?php
include"connect.php";
$name = $_POST["name"];
$petname = $_POST["petname"];
$email = $_POST["email"];
$phone=$_POST["phone"];
$typeofappointment = $_POST["typeofappointment"];
$symptoms = $_POST["symptoms"];
$datetime = $_POST["datetime"];

// Format the datetime value to match MySQL datetime format
$datetimeFormatted = date('Y-m-d H:i:s', strtotime($datetime));

$sql = "INSERT INTO vaccination_table (name, petname, email,phone,typeofappointment, symptoms, datetime) 
        VALUES ('$name', '$petname', '$email','$phone', '$typeofappointment', '$symptoms', '$datetimeFormatted')";

if ($conn->query($sql) === TRUE) {
    header("Location:index.php");
    echo '<div class="alert alert-light" role="alert">Appointment booked successfully!</div>';
   
} else {
    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . $conn->error . '</div>';
}

$conn->close();
?>
