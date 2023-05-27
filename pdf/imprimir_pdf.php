<?php
require '../vendor/autoload.php';

session_start();
$tipo = $_POST['tipo'];

if ($tipo == 1) {
    $id = $_SESSION['id'];
} else {
    $id = $_POST['id'];
}
imprimir_pdf($id);
function imprimir_pdf($id)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    $sel_sql_3 = "SELECT * FROM users WHERE id_user='$id'";
    $ans_3 = mysqli_query($db, $sel_sql_3);
    $row_3 = mysqli_fetch_assoc($ans_3);
    $nus = $row_3['nus'];
    $primeiro = $row_3['primeiro_nome'];
    $ultimo = $row_3['ultimo_nome'];


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

    // HTML message

    $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id' AND estado ='Resolvido'";
    $ans = mysqli_query($db, $sel_sql);

    $html = '<style>';
    $html .= '

.texto_apresentacao{
    text-align: justify;
}

.content-table {
    width: 100%;
    border-collapse: collapse;
}

.content-table th {
    background-color: #4399FC;
    color: white;
    border: 1px solid black;
    padding: 8px;
}

.content-table td {
    border-top: none;
    border-bottom: none;

    padding: 8px;
}

.content-table tr:first-child th {
    border-top: 1px solid black;
}
';
    $html .= '</style>';

    $html .= "<div class='texto_apresentacao'>";
    $html .= "Caro/a " . $primeiro . ' ' . $ultimo . ',';
    $html .= "<br><br>";
    $html .= "É com grande satisfação que lhe apresentamos um resumo detalhado das vacinas que lhe foram administradas por meio da parceria entre a SVPortugal e o nosso prestigiado centro de saúde. A sua saúde é a nossa principal prioridade, e é um privilégio poder oferecer serviços de vacinação de qualidade para cuidar de si.";
    $html .= "<br><br>";
    $html .= "Segue abaixo o seu boletim de vacinas registado pela SVPortugal.";
    $html .= "<br><br>";
    $html .= '</div>';

    $html .= '<table class="content-table" id="table_reserva">';
    $html .= '<tr>';
    $html .= '<th> Vacina </th>';
    $html .= '<th> Data </th>';
    $html .= '<th> Hora </th>';
    $html .= '</tr>';
    while ($row = mysqli_fetch_assoc($ans)) {
        $vaga = $row['vaga'];
        $sel_sql_2 = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
        $ans_2 = mysqli_query($db, $sel_sql_2);
        while ($row_2 = mysqli_fetch_assoc($ans_2)) {
            $html .= '<tr>';
            $html .= '<td>' . $row_2['vacina'] . '</td>';
            $html .= '<td>' . $row_2['data_vaga'] . '</td>';
            $html .= '<td>' . $row_2['hora'] . '</td>';
            $html .= '</tr>';
        }
    }
    $html .= '</table>';
    $html .= "<div class='texto_apresentacao'>";
    $html .= "<br><br>";
    $html .= "Valorizamos a sua confiança no nosso trabalho e agradecemos por escolher a SVPortugal. Se tiver alguma dúvida adicional ou precisar de informações complementares sobre as vacinas que recebeu, a nossa equipa estará disponível para o ajudar através do Email: site.vacinacao@gmail.com.";
    $html .= "<br><br><br>";
    $html .= "Atenciosamente,";
    $html .= "<br>";
    $html .= "SVPortugal";
    $html .= '</div>';

    // set default font subsetting mode

    $pdf->setFont('dejavusans', '', 14, '', true);

    $pdf->AddPage();

    $pdf->writeHTML($html);

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="boletim_' . $nus . '.pdf"');

    $pdf->Output('boletim_' . $nus . '.pdf', 'I');

}
