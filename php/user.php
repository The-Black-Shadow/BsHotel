<?php
session_start();
$acctype1 = 'admin';
$acctype = 'user';

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
        $stmt = $conn->prepare("INSERT INTO user (email, name, password, address, acc_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $_POST['email'], $_POST['name'], $_POST['password'], $_POST['address'], $acctype);
        $stmt->execute();

        $_SESSION['register_successful'] = true;

        header("Location: ".$_SERVER['PHP_SELF']);
        exit(); 
    }
}

if (isset($_SESSION['register_successful']) && $_SESSION['register_successful']) {
    echo '<script type="text/javascript">
            window.onload = function () { alert("Registration successful"); } 
          </script>';

    $_SESSION['register_successful'] = false;
}
//=================================================================================
if (isset($_POST['logIn'])) {
    include 'connection.php';

    // Escape user inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Create a SQL query to fetch the user data based on email and password
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Check if there is exactly one matching user
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Store user data in session variables
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['address'] = $row['address'];
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
            $_SESSION['error_message'] = "Invalid email or password!";
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Error in database query.";
        header("Location: index.php");
        exit();
    }
}

if (isset($_POST['upProfile'])) {
    $name = $_POST['name'];
    $email = $_SESSION['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE user SET name = ?, password = ?, address = ? WHERE email = ?");
    $stmt->bind_param("ssss", $name, $password, $address, $email);

    if ($stmt->execute()) {
        // Update successful
        $_SESSION['name'] = $name;
        $_SESSION['address'] = $address;
        header("Location: profile.php");
    } else {
        // Update failed
        echo "Error updating profile: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

?>
