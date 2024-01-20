<?php

// Retrieve data from the AJAX request
$name = $_POST['name'];
$petname = $_POST['petname'];
$email = $_POST['email'];
$typeofappointment = $_POST['typeofappointment'];
$symptoms = $_POST['symptoms'];
$datetime = $_POST['datetime'];

// Compose email message
$subject = 'Appointment Notification';
$message = "Dear $name,\n\n";
$message .= "Your appointment for $typeofappointment has been scheduled.\n";
$message .= "Pet Name: $petname\n";
$message .= "Symptoms: $symptoms\n";
$message .= "Date and Time: $datetime\n\n";
$message .= "Thank you for choosing our services.";

// Send email (you may need to configure your mail server settings)
mail($email, $subject, $message);

// You can add additional logic here based on the email sending result

?>
