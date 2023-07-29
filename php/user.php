<?php
// Start the session
    session_start();
    $acctype1 = 'admin';
    $acctype = 'user';
// Check if the form was submitted
if (isset($_POST['submit'])) {
    include 'connection.php';

    mysqli_query($conn, "insert into user values('$_POST[name]', '$_POST[email]', '$_POST[password]', '$acctype')");

    // Set a session variable to indicate successful booking
    $_SESSION['register_successfull'] = true;

    // Redirect back to the original page after processing the form
    header("Location: ".$_SERVER['PHP_SELF']);
    exit(); // Make sure to exit after the redirect
}

// Check if the booking was successful and show the success message
if (isset($_SESSION['register_successfull']) && $_SESSION['register_successfull']) {
    echo '<script type="text/javascript">
            window.onload = function () { alert("Booking successful"); } 
          </script>';

    // Reset the session variable to prevent showing the message again on reload
    $_SESSION['register_successfull'] = false;
}
?>
?>