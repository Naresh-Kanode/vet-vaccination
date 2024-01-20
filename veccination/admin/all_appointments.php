
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

        echo "Notification sent successfully!";
    } else {
        echo "Error fetching data from the database.";
    }
}
?>


<?php
include "connect.php";

session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: admin_login.php");
    exit();
}

// Handle logout logic
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: admin_login.php");
    exit();
}

?>

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
<form method="POST">
        <button type="submit" class="btn btn-outline-danger fw-bold w-100" name="logout">Logout</button>
    </form>
  <table class="table my-3 table-borderd table-hover table-striped">
    <thead>
      <tr>
        <th scope="col">Sr no</th>
        <th scope="col">Name</th>
        <th scope="col">Pet Name</th>
        <th scope="col">Email<br></th>
        <th scope="col">Mobile</th>
        <th scope="col">Appointment Type</th>
        <th scope="col">Symptoms</th>
        <th scope="col">Date & Time</th>
        <th scope="col">Reschedule </th>
        <th scope="col">Notify </th>
        
      </tr>
    </thead>
    <tbody>

      <?php
              $sql = "select * from vaccination_table";
              $result = mysqli_query($conn, $sql);
              if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                      $name = $row['name'];
                      $petname = $row['petname'];
                      $email = $row['email'];
                      $phone = $row['phone'];
                      $typeofappointment = $row['typeofappointment'];
                      $symptoms = $row['symptoms'];
                      $datetime = $row['datetime'];
                      echo '<tr>
                      <th scope="row">' . $id . '</th>
                      <td>' . $name . '</td>
                      <td>' . $petname . '</td>
                      <td>' . $email . '</td>
                      <td>' . $phone . '</td>
                      <td>' . $typeofappointment . '</td>
                      <td>' . $symptoms . '</td>
                      <td>' . $datetime . '</td>
                      <td>
                          <form method="POST" action="reschedule.php">
                              <input type="hidden" name="petname" value="' . $petname . '">
                              <input type="hidden" name="new_datetime" value="' . $datetime . '">
                              <button type="submit" class="btn btn-primary" name="reschedule_row">Reschedule</button>
                          </form>
                      </td>
                      <td>
                          <form method="POST">
                              <input type="hidden" name="petname" value="' . $petname . '">
                              <input type="hidden" name="appointment_time" value="' . $datetime . '">
                              <button type="submit" class="btn btn-success" name="send_notification_row">Send Notification</button>
                          </form>
                      </td>
                  </tr>';
              }
              }
            
      
            
              ?>


</body>

</html>