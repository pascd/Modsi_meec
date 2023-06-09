<script src="marcacao.js"></script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "Deseja confirmar a alteração da marcação:";

    $id_vaga_selec = $_POST['id_vaga'];
    $id_vaga_nova = $_POST['id_vaga_selec'];

    $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$id_vaga_selec'";
    $ans = mysqli_query($db, $sel_sql);

    //echo "<table>";
    echo '<table id="table_alt" class="content-table">';
    // echo '<table class="content-table" id="table_reserva">';
    echo '<tr>';
    echo '<th> Vacina </th>';
    echo '<th> Data </th>';
    echo '<th> Hora </th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($ans)) {
        //echo '<tr id_vaga_nova="' . $row_3['id_vagas'] . '" class="touch2">';
        echo '<tr class="touch2">';
        echo '<td>' . $row['vacina'] . '</td>';
        echo '<td>' . $row['data_vaga'] . '</td>';
        echo '<td>' . $row['hora'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo "Para a vaga:";

    $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$id_vaga_nova'";
    $ans = mysqli_query($db, $sel_sql);

    echo '<table id="table_alt" class="content-table">';
    echo '<tr>';
    echo '<th> Vacina </th>';
    echo '<th> Data </th>';
    echo '<th> Hora </th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($ans)) {
        echo '<tr class="touch2">';
        echo '<td>' . $row['vacina'] . '</td>';
        echo '<td>' . $row['data_vaga'] . '</td>';
        echo '<td>' . $row['hora'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
