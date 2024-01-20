<?php
include_once"connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appoitment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script>
        // Load header and footer using jQuery
        $(document).ready(function () {
            $("#header").load("header.html");
            $("#footer").load("footer.html");
        });
    $(document).ready(function () {
        // Target the phone input field by its ID
        var phoneInput = $("#phone");

        // Add an input event listener to the phone input field
        phoneInput.on("input", function () {
            // Get the input value
            var inputValue = $(this).val();

            // Remove non-numeric characters using a regular expression
            var numericValue = inputValue.replace(/\D/g, '');

            // Limit the length to 10 digits
            numericValue = numericValue.substring(0, 10);

            // Update the input field value
            $(this).val(numericValue);
        });
    });
</script>
</head>

<body class="bg-dark">
    <div id="header"></div>
    <div class="container-fluid p-0 m-0">
        <h4 class="text-center text-light bg-info p-5 fs-2">Request For Appointment</h4>
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <img src="./img/appoitment_img.png" class="w-100 p-5 " alt="">
            </div>
            <div class="col-12 col-lg-6 col-md-6 mx-auto p-5">
                <div class="card p-5 mt-5  shadow-lg card_bg">
                    <form method="POST" action="request_appointment.php">
                    <!-- action="request_appointment.php" -->
                        <input type="text" class="form-control my-4" name="name" id="name" for="name"
                            placeholder="Enter Your Full Name" required  autocomplete="off">
                        <input type="text" class="form-control my-4" name="petname" id="petname" for="petname"
                            placeholder="Enter Your Pet Name" required  autocomplete="off">
                        <input type="email" class="form-control my-4" name="email" id="email" for="email"
                            placeholder="Enter Your Email" required  autocomplete="off">
                        <input type="number" class="form-control my-4" name="phone" id="phone" for="phone"
                            placeholder="Enter Phone" required  autocomplete="off" maxlength="10" pattern="[0-9]{10}">
                        <select name="typeofappointment" id="typeofappointment" class="form-select my-4" required  autocomplete="off">
                            <option value="">Select The Service Your Pet Needs</option>
                            <option value="regular checkup">Regular Checkup</option>
                            <option value="vaccination">vaccination</option>
                            <option value="grooming">Grooming</option>
                            <option value="surgery">Surgery</option>
                            <option value="wellness exam">Wellness Exam</option>
                            <option value="dental cleaning">Dental Cleaning</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" class="form-control my-4" name="symptoms" id="symptoms" for="symptoms"
                            placeholder="Symptoms" required  autocomplete="off">
                        <input type="datetime-local" class="form-control my-4" id="datetime"
                            name="datetime" required  autocomplete="off">
                        <button type="submit" class="btn btn-outline-info w-100 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div id="footer"></div>

</body>

</html>