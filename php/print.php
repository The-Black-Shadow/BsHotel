<?php
require_once('./tcpdf/tcpdf.php');

if (isset($_POST['print_ticket'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $rooms = $_POST['rooms'];
    $room_type = $_POST['room_type'];

        // Clear any previous output
        ob_clean();

        // Create a new TCPDF instance
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Set the creator and author
        $pdf->SetCreator('BS Online Booking');
        $pdf->SetAuthor('Md Mehedi Hasan');
        $pdf->SetTitle('Ticket');

        // Add a new page
        $pdf->AddPage();

        // Set font and add ticket information
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'BS Online Booking', 0, 1, 'C');
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
    
?>
