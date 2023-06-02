<script src="criar_vagas.js"></script>
<?php

echo "<link rel='stylesheet' href='../styles.css'>";
echo "<link rel='stylesheet' href='../style.css'>";

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "Deseja apagar a vaga:";
    echo'<br><br>';

    $id_vaga_selec = $_POST['id_vaga'];
    $sel_sql = "SELECT v.*, vac.vacina
                FROM vagas v
                JOIN vacinas vac ON v.vacina = vac.id_vacina
                WHERE v.id_vagas = '$id_vaga_selec'";
    $ans = mysqli_query($db, $sel_sql);

    echo '<table class="content-table">';
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
