<?php
    require_once('./tcpdf/tcpdf.php');

    if (isset($_POST['print_ticket'])) {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
        $pdf->SetCreator('Your Company Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Ticket');
    
        $pdf->AddPage();
    
        $pdf->SetFont('helvetica', 'B', 16);
    
        $pdf->Cell(0, 10, 'Ticket Information', 0, 1, 'C');
        $pdf->Cell(0, 10, '---------------------', 0, 1, 'C');
    
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Name: John Doe', 0, 1);
        $pdf->Cell(0, 10, 'Ticket ID: 12345', 0, 1);
        $pdf->Cell(0, 10, 'Event: Concert', 0, 1);
        $pdf->Cell(0, 10, 'Date: 2023-07-28', 0, 1);
    
        $pdf->Output('ticket.pdf', 'D'); 
        exit;
    }
?>