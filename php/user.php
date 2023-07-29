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
//=================================================================================
// Check if the form was submitted
if (isset($_POST['logIn'])) {
    include 'connection.php'; // Include your database connection file

    // Escape user inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Create a SQL query to fetch the user data based on email and password
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Check if there is exactly one matching user
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Store user data in session variables
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['acc_type'] = $row['acc_type'];

            // Redirect based on the acc_type value
            if ($row['acc_type'] == 'admin') {
                header("Location: ../admin.php");
                exit();
            } elseif ($row['acc_type'] == 'user') {
                header("Location: ../bsonline.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Invalid account type!";
                header("Location: index.php");
                exit();
            }
        } else {
            // Invalid login credentials
            $_SESSION['error_message'] = "Invalid email or password!";
            header("Location: index.php");
            exit();
        }
    } else {
        // Error in the database query
        $_SESSION['error_message'] = "Error in database query.";
        header("Location: index.php");
        exit();
    }
}

?>
