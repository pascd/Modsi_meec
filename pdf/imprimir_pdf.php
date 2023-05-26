<?php
require '../vendor/autoload.php';

function imprimir_pdf($html, $nus)
{
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator("SVPortugal");
    $pdf->SetAuthor('SVPortugal');
    $pdf->SetTitle('Boletim_' . $nus);

    //Cria o Header, colocar logo do site
    $pdf->setHeaderData('logo.png', PDF_HEADER_LOGO_WIDTH, 'SVPortugal', 'Boletim de Vacinas do utente ' . $nus, array(0, 0, 0), array(0, 0, 0));
    $pdf->setFooterData(array(0, 0, 0), array(0, 0, 0));

    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // ---------------------------------------------------------

    // set default font subsetting mode

    $pdf->setFont('dejavusans', '', 14, '', true);

    $pdf->AddPage();

    $pdf->writeHTML($html);

    $pdf->Output('boletim_' . $nus . '.pdf', 'I');
}
