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
    WHERE vac.vacina = '$vacina' AND v.data_vaga >= curdate()";

    $ans_3 = mysqli_query($db, $sel_sql_3);

    echo '<table id="table_alt" class="content-table">';
    // echo '<table class="content-table" id="table_reserva">';
             echo '<tr>';
             echo '<th> Vacina </th>';
             echo '<th> Data </th>';
             echo '<th> Hora </th>';
             echo '</tr>';
    while ($row_3 = mysqli_fetch_assoc($ans_3)) {

        echo '<tr id_vaga_nova="' . $row_3['id_vagas'] . '" class="touch2">';
        echo '<td>' . $row_3['vacina'] . '</td>';
        echo '<td>' . $row_3['data_vaga'] . '</td>';
        echo '<td>' . $row_3['hora'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
