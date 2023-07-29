<?php
// Start the session
session_start();
$acctype1 = 'admin';
$acctype = 'user';

// Check if the form was submitted
if (isset($_POST['signUp'])) {
    include 'connection.php';

    // Check if the email already exists in the database
    $email = $_POST['email'];
    $check_query = "SELECT email FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($result) > 0) {
        // Email already exists, display an error message
        echo '<script type="text/javascript">
                window.onload = function () { alert("This email is already registered. Please use a different email."); } 
              </script>';
    } else {
        // Email does not exist, proceed with registration
        // Prepare the statement to insert user data
        $stmt = $conn->prepare("INSERT INTO user (email, name, password, acc_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['email'], $_POST['name'], $_POST['password'], $acctype);
        $stmt->execute();

        // Set a session variable to indicate successful registration
        $_SESSION['register_successful'] = true;

        // Redirect back to the original page after processing the form
        header("Location: ".$_SERVER['PHP_SELF']);
        exit(); // Make sure to exit after the redirect
    }
}

// Check if the registration was successful and show the success message
if (isset($_SESSION['register_successful']) && $_SESSION['register_successful']) {
    echo '<script type="text/javascript">
            window.onload = function () { alert("Registration successful"); } 
          </script>';

    // Reset the session variable to prevent showing the message again on reload
    $_SESSION['register_successful'] = false;
}
?>
