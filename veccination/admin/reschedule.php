<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reschedule_row'])) {
    // Check if 'petname' and 'new_datetime' are set
    if (isset($_POST['petname']) && isset($_POST['new_datetime'])) {
        $petname = $_POST['petname'];
        $newDatetime = $_POST['new_datetime'];

        // Update the appointment time in the database
        $updateSql = "UPDATE vaccination_table SET datetime='$newDatetime' WHERE petname='$petname'";
        mysqli_query($conn, $updateSql);

        // Redirect to the all_appointments.php page after rescheduling

    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reschedule Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container-fluid">
        <div class="col-12 col-lg-6 col-md-6 mx-auto">
            <form class="card p-5 my-5" method="POST">
                <div class="mb-3">
                    <label for="petname" class="form-label">Pet Name</label>
                    <input type="text" class="form-control" id="petname" name="petname" readonly
                        value="<?php echo isset($_POST['petname']) ? $_POST['petname'] : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="new_datetime" class="form-label">New Appointment Date & Time</label>
                    <input type="datetime-local" class="form-control" id="new_datetime" name="new_datetime" required
                        value="<?php echo isset($_POST['new_datetime']) ? $_POST['new_datetime'] : ''; ?>">
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6">
                        <button type="submit" class="btn btn-primary" name="reschedule_row">Reschedule
                            Appointment</button>
                    </div>
                </div>
            </form>

            <div class="col-12 col-lg-6 col-md-6">
                <a href="all_appointments.php"><button type="submit" class="btn btn-primary"
                        name="reschedule_row">Return To Appointments</button></a>
            </div>
        </div>
    </div>
    </div>

</body>

</html>