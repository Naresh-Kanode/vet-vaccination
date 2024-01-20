<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="style.css">

</head>

<body>

<?php
include "connect.php";

if(isset($_POST['send_notification_row'])) {
    $petname = $_POST['petname'];
    $appointment_time = $_POST['appointment_time'];

    // Calculate the date and time one day before the appointment
    $notification_time = date('Y-m-d H:i:s', strtotime($appointment_time . ' -1 day'));

    // Fetch other details based on petname and appointment_time from the database
    $sql = "SELECT * FROM vaccination_table WHERE petname = '$petname' AND datetime = '$appointment_time'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];

        // Customize the notification message
        $message = "Dear $name,\n\nThis is a reminder for your appointment scheduled on $appointment_time.";

        // Example using the mail function for email notification
        $subject = "Appointment Reminder";
        $headers = "From: your_email@example.com";

        // Replace the email sending logic with your actual notification mechanism
        mail($email, $subject, $message, $headers);

        // Echo a success message with a class for styling
        echo '<div class="notification-message success">Notification sent successfully!</div>';

        // Add JavaScript code to remove the success class after 0.5 seconds
        echo '<script>
                setTimeout(function(){
                    document.querySelector(".notification-message").classList.remove("success");
                }, 500);
              </script>';
    } else {
        // Echo an error message with a class for styling
        echo '<div class="notification-message error">Error fetching data from the database.</div>';
    }
}
?>
