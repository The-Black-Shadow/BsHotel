<?php
session_start();

if (isset($_POST['submit'])) {
    include 'connection.php';

    
    $name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $check_inn = date('Y-m-d', strtotime($_POST['check_in']));
    $check_outt = date('Y-m-d', strtotime($_POST['check_out']));
    $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
    mysqli_query($conn, "insert into booking (name, email, check_in, check_out, adults, children, rooms, room_type) values ('$name', '$email', '$check_inn', '$check_outt', '$_POST[adults]', '$_POST[children]', '$_POST[rooms]', '$room_type')");

    $_SESSION['booking_success'] = true;

    header("Location: ".$_SERVER['PHP_SELF']);
    exit(); 
}

if (isset($_SESSION['booking_success']) && $_SESSION['booking_success']) {
    echo '<script type="text/javascript">
            window.onload = function () { alert("Booking successful"); } 
          </script>';

    $_SESSION['booking_success'] = false;
}
?>
