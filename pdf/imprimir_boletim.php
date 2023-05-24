<?php

require_once('imprimir_pdf.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

session_start();
$nus = $_SESSION['nus'];

$id_paciente = $_SESSION['id'];

$sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente' AND estado ='Resolvido'";
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
$html .= "Caro/a " . $_SESSION['primeiro_nome'] . ' ' . $_SESSION['ultimo_nome'] . ',';
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

imprimir_pdf($html, $nus);
