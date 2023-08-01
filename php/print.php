<?php
require_once('./tcpdf/tcpdf.php');

if (isset($_POST['print_ticket'])) {
    $useremail = $_SESSION['email'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM booking WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $useremail);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the data from the result set (since we expect a single row, no need for a loop)
        $row = $result->fetch_assoc();

        // Now you can access the data using $row['column_name']
        $name = $row['name'];
        $email = $row['email'];
        $check_in = $row['check_in'];
        $check_out = $row['check_out'];
        $adults = $row['adults'];
        $children = $row['children'];
        $rooms = $row['rooms'];
        $room_type = $row['room_type'];

        $address=$_SESSION['address'];

        // Clear any previous output
        ob_clean();

        // Create a new TCPDF instance
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set the creator and author
        $pdf->SetCreator('Your Company Name');
        $pdf->SetAuthor('Md Mehedi Hasan');
        $pdf->SetTitle('Ticket');

        // Add a new page
        $pdf->AddPage();

        // Set font and add ticket information
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'BS Online Management', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Ticket Information', 0, 1, 'C');
        $pdf->Cell(0, 10, '---------------------', 0, 1, 'C');

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Name: ' . $name, 0, 1);
        $pdf->Cell(0, 10, 'Email : ' . $email, 0, 1);
        $pdf->Cell(0, 10, 'Address : ' . $address, 0, 1);
        $pdf->Cell(0, 10, 'Check_in: ' . $check_in, 0, 1);
        $pdf->Cell(0, 10, 'Check_out: ' . $check_out, 0, 1);
        $pdf->Cell(0, 10, 'Adults: ' . $adults, 0, 1);
        $pdf->Cell(0, 10, 'Children: ' . $children, 0, 1);
        $pdf->Cell(0, 10, 'Rooms: ' . $rooms, 0, 1);
        $pdf->Cell(0, 10, 'Room Type: ' . $room_type, 0, 1);

        // Add the author name to the right end of the page
        $pdf->Cell(0, 10, 'Manager       ', 0, 1, 'R');
        $pdf->Cell(0, 10, 'Md Mehedi Hasan', 0, 1, 'R');

        // Output the PDF as a download
        $pdf->Output('ticket.pdf', 'D');
        exit;
    }
}
?>
