<script src="marcacao.js"></script>
<?php
echo "Deseja apagar a marcação para a vaga:";
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_vaga_selec = $_POST['id_vaga'];

    $sel_sql = "SELECT v.*, vac.vacina
                FROM vagas v
                JOIN vacinas vac ON v.vacina = vac.id_vacina
                WHERE v.id_vagas = '$id_vaga_selec'";
    
    $ans = mysqli_query($db, $sel_sql);

    echo '<table id="table_alt">';
    while ($row = mysqli_fetch_assoc($ans)) {
        echo '<td>' . $row['vacina'] . '</td>';
        echo '<td>' . $row['data_vaga'] . '</td>';
        echo '<td>' . $row['hora'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}