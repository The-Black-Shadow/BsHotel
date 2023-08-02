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
                echo '<tr><th>Name</th><th>Email</th><th>Check-in</th><th>Check-out</th><th>Actions</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['check_in'] . '</td>';
                    echo '<td>' . $row['check_out'] . '</td>';
                    echo '<td>
                            <form method="post">
                                <input type="hidden" name="check_in" value="' . $selectedDate . '">
                                <button type="submit" name="deleteBooking">Delete</button>
                            </form>
                        </td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p>No bookings found for ' . $selectedDate . '</p>';
            }
        }       

        // Display delete message if set
        if (isset($_SESSION['deleteMessage'])) {
            echo '<p>' . $_SESSION['deleteMessage'] . '</p>';
            unset($_SESSION['deleteMessage']);
        }
    ?>

    <a href="logout.php">Logout</a>
</body>
</html>
