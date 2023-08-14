<?php
    
    include 'php/connection.php';
    include 'php/user.php';

    // Check if user is logged in as admin
    if (!isset($_SESSION['acc_type']) || $_SESSION['acc_type'] !== 'admin') {
        header("Location: login.php"); // Redirect to login page if not admin
        exit();
    }

    // Handle printing bookings for the selected date
    if (isset($_POST['printBookings'])) {
        require_once('./tcpdf/tcpdf.php');
        $selectedDate = $_POST['check_in'];

        // Prepare and execute the query to fetch bookings for the selected date
        $stmt = $conn->prepare("SELECT * FROM booking WHERE DATE(check_in) = ?");
        $stmt->bind_param("s", $selectedDate);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        // Create a new TCPDF instance
        $pdf = new TCPDF();
        $pdf->SetCreator('Your Company Name');
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Bookings for ' . $selectedDate);
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', 'B', 16);

        // Add title
        $pdf->Cell(0, 10, 'Bookings for ' . $selectedDate, 0, 1, 'C');

        // Add booking details
        while ($row = $result->fetch_assoc()) {
            $pdf->SetFont('helvetica', '', 12);
            $pdf->Cell(0, 10, 'Booking Id: ' . $row['booking_id'], 0, 1);
            $pdf->Cell(0, 10, 'Name: ' . $row['name'], 0, 1);
            $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
            $pdf->Cell(0, 10, 'Check-in: ' . $row['check_in'], 0, 1);
            $pdf->Cell(0, 10, 'Check-out: ' . $row['check_out'], 0, 1);
            // ... Add more details as needed ...
            $pdf->Cell(0, 10, '-----------------------', 0, 1);
        }

        // Output the PDF as a download
        $pdf->Output('bookings_for_' . $selectedDate . '.pdf', 'D');
        exit(); // Make sure to exit the script after generating the PDF
    }


    // Handle booking deletion
    if (isset($_POST['deleteBooking'])) {
        $selectedDate = $_POST['check_in'];

        // Prepare and execute the delete query
        $stmt = $conn->prepare("DELETE FROM booking WHERE DATE(check_in) = ?");
        $stmt->bind_param("s", $selectedDate);
        if ($stmt->execute()) {
            // Bookings deleted successfully
            $_SESSION['deleteMessage'] = 'Bookings for ' . $selectedDate . ' deleted successfully';
        } else {
            // Failed to delete bookings
            $_SESSION['deleteMessage'] = 'Error deleting bookings: ' . $stmt->error;
        }
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <form method="post">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="check_in">
        <button type="submit" name="viewBookings">View Bookings</button>
        <button type="submit" name="printBookings">Print Bookings</button>
    </form>

    <?php
        if (isset($_POST['viewBookings'])) {
            $selectedDate = $_POST['check_in'];

            // Prepare and execute the query to fetch bookings for the selected date
            $stmt = $conn->prepare("SELECT * FROM booking WHERE DATE(check_in) = ?");
            $stmt->bind_param("s", $selectedDate);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            // Display bookings
            if ($result->num_rows > 0) {
                echo '<h2>Bookings for ' . $selectedDate . '</h2>';
                echo '<table border="1">';
                echo '<tr><th>Booking Id</th><th>Name</th><th>Email</th><th>Check-in</th><th>Check-out</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['booking_id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['check_in'] . '</td>';
                    echo '<td>' . $row['check_out'] . '</td>';;
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p>No bookings found for ' . $selectedDate . '</p>';
            }
        }       
    ?>
    <br><br>
    <?php
if (isset($_POST['deleteBooking'])) {
    // Get the booking ID from the form
    $bookingID = $_POST['bookingID'];

    // Include your database connection file
    include 'connection.php';

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM booking WHERE booking_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookingID); // Assuming booking_id is an integer
    if ($stmt->execute()) {
        // Set a session variable to indicate successful booking deletion
        $_SESSION['delete_booking'] = true;
    } else {
        // Set a session variable to indicate unsuccessful booking deletion
        $_SESSION['delete_booking'] = false;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the original page after processing the form
    header("Location: ".$_SERVER['PHP_SELF']);
    exit(); // Make sure to exit after the redirect
}

// Check if the booking deletion was successful and show the appropriate message
if (isset($_SESSION['delete_booking'])) {
    if ($_SESSION['delete_booking']) {
        echo '<script type="text/javascript">
                window.onload = function () { alert("Booking deleted successfully"); } 
            </script>';
    } else {
        echo '<script type="text/javascript">
                window.onload = function () { alert("Error deleting booking"); } 
            </script>';
    }

    // Reset the session variable to prevent showing the message again on reload
    unset($_SESSION['delete_booking']);
}
?>

    <p>Delete Booking :</p>
        <form method="post">
            <input type="number" name="bookingID" id="" placeholder="Enter Booking Id">
            <button type="submit" name="deleteBooking">Delete</button>
        </form>

    <a href="logout.php">Logout</a>
</body>
</html>
