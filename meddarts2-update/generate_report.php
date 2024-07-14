<?php
require('fpdf/fpdf.php');

// Include database connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "test_project";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $fileId = $_GET['id'];

    $stmt = $conn->prepare("SELECT filename, filepath, description FROM files WHERE id = ?");
    $stmt->bind_param("i", $fileId);
    $stmt->execute();
    $stmt->bind_result($filename, $filepath, $description);
    $stmt->fetch();
    $stmt->close();

    // Generate PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'File Report', 0, 1, 'C');

    // File Preview
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
    if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
        $pdf->Image($filepath, 10, 20, 50, 50);
    }

    // Filename
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Filename:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, $filename, 0, 1);

    // Description
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, 'Description:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, $description);

    // Output PDF
    $pdf->Output('D', 'File_Report_' . $filename . '.pdf');
}
?>
