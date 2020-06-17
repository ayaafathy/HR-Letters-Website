<?php
//include connection file

include_once("connection.php");
include_once('libs/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',15,10,20);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'',0,0,'C');
    // Line break
    $this->Ln(20);
    $this->SetFont('Arial','B',7);
    $this->Cell(220,10,'',0,0,'C');


   $this->Ln(30);

   $this->Line(0,25,350,25);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}



$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',8);
$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
$result="SELECT `Letter` FROM `Emp_letter` WHERE ReqID='$id'";

$rs = $conn->query($result);
$fetchAllData = $rs->fetch_all(MYSQLI_ASSOC);
  foreach($fetchAllData as $data)
{
$text=date('F j,Y')."\n{$data['Letter']}";
$pdf->SetXY($margin_left,$margin_top+30);
$pdf->MultiCell($width*$margin_left,4,$text,0,'L');
}


ob_end_clean();
$pdf->Output();

?>
