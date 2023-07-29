<?php
// Start the session
session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    include 'connection.php';

    // Your form processing logic here
    $name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $check_inn = date('Y-m-d', strtotime($_POST['check_in']));
    $check_outt = date('Y-m-d', strtotime($_POST['check_out']));
    $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
    mysqli_query($conn, "insert into booking values('$name', '$email', '$check_inn', '$check_outt', '$_POST[adults]', '$_POST[children]', '$_POST[rooms]', '$room_type')");

    // Set a session variable to indicate successful booking
    $_SESSION['booking_success'] = true;

    // Redirect back to the original page after processing the form
    header("Location: ".$_SERVER['PHP_SELF']);
    exit(); // Make sure to exit after the redirect
}

// Check if the booking was successful and show the success message
if (isset($_SESSION['booking_success']) && $_SESSION['booking_success']) {
    echo '<script type="text/javascript">
            window.onload = function () { alert("Booking successful"); } 
          </script>';

    // Reset the session variable to prevent showing the message again on reload
    $_SESSION['booking_success'] = false;
}
?>
