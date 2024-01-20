<?php

    // Your admin authentication logic goes here

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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-5 shadow">
                    <h2 class="my-3 text-center text-info">Admin Login</h2>
                <form action="admin_login.php" method="post">
                    <div class="mb-3 my-4">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Admin Email" required>
                    </div>
                    <div class="mb-3 my-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Admin Password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary my-4 w-100" name="login">Login</button>
                </form>
                <?php
                session_start();

                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                
                if ($email === 'admin@gmail.com' && $password === '123') {
                    // Admin login successful
                    $_SESSION['admin_logged_in'] = true;
                    header("Location: all_appointments.php");
                    exit();
                } else {
                    // Admin login failed
                    echo "Invalid email or password";
                }
            }
                ?>
                
                </div>
                
            </div>
        </div>
    </div>

</body>

</html>
