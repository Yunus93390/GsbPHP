<?php
/**
 * 
 */
class FPDF{
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10, utf8_decode($infovisiteur['nom'] . " " . $infovisiteur['prenom']), 0, 1);
$pdf->Cell(0,10, utf8_decode(""), 0, 1);
$pdf->Cell(0,10, utf8_decode("_______________________________________"), 0, 1);
$pdf->Cell(0,10, utf8_decode(""), 0, 1);
$pdf->Cell(0,10, utf8_decode("Vos fiches FRAIS :"), 0, 1);
$pdf->Cell(0,10, utf8_decode(""), 0, 1);
foreach($fraisforfait as $forfait) {
  $pdf->Cell(0,10, utf8_decode($forfait['libelle'] . " " . $forfait['quantite']), 0, 1);
}
$pdf->Cell(0,10, utf8_decode(""), 0, 1);
$pdf->Cell(0,10, utf8_decode("_______________________________________"), 0, 1);
$pdf->Cell(0,10, utf8_decode(""), 0, 1);
$pdf->Cell(0,10, utf8_decode("Vos fiches FRAIS HORS FORFAIT :"), 0, 1);
$pdf->Cell(0,10, utf8_decode(""), 0, 1);
foreach($fraishorsforfait as $forfait) {
  $pdf->Cell(0,10, utf8_decode("[" . $forfait['libelle'] . "]" . " le " . $forfait['date'] . ", d'un montant de " . $forfait['montant']), 0, 1);
}
$pdf->Output();
}
?>