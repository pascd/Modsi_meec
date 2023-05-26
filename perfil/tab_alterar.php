<script src="marcacao.js"></script>
<?php
echo "Escolha a vaga para alterar:";
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_vaga_selec = $_POST['id_vaga'];
    $vacina = $_POST['vacina'];

    $sel_sql_3 = "SELECT v.*, vac.vacina
    FROM vagas v
    JOIN vacinas vac ON v.vacina = vac.id_vacina
    WHERE vac.vacina = '$vacina'";

    $ans_3 = mysqli_query($db, $sel_sql_3);

    echo '<table id="table_alt">';
    while ($row_3 = mysqli_fetch_assoc($ans_3)) {

        echo '<tr id_vaga_nova="' . $row_3['id_vagas'] . '">';
        echo '<td>' . $row_3['vacina'] . '</td>';
        echo '<td>' . $row_3['data_vaga'] . '</td>';
        echo '<td>' . $row_3['hora'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
