<?php
session_start();

if (!isset($_SESSION['indice'])) {
    echo "Se te fue la sesion. Click <a href='index.html'>aquí</a> para iniciar sesión";
} else {
    require('fpdf.php');

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            $this->Image('icono.png', 10, 8, 20);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(80);
            $this->Cell(30, 10, 'Listado de Productos', 0, 0, 'C');
            $this->Ln(20);
        }

        // Pie de página
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(200, 220, 255);

    $pdf->Cell(140, 10, 'Producto', 1, 0, 'C', 1);
    $pdf->Cell(50, 10, 'Precio', 1, 1, 'C', 1);
    $pdf->total = 0;

    for ($i = 0; $i <= $_SESSION['indice']; $i++) {
        $pdf->Cell(140, 10, $_SESSION['carrito'][$i], 1, 0, 'L');
        $pdf->Cell(50, 10, $_SESSION['precio'][$i] . '$', 1, 1, 'L');
        $pdf->total += $_SESSION['precio'][$i];
    }

    $pdf->Output();
}
?>


