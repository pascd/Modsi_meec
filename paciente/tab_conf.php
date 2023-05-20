<?php
echo "Deseja confirmar o agendamento da vaga:";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vaga_selec = $_POST['id_selec'];
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    $sel_sql = "SELECT id_vagas, vacina, vagas, data_vaga, hora FROM vagas WHERE id_vagas = '$vaga_selec'";
    $ans = mysqli_query($db, $sel_sql);
}

if (mysqli_num_rows($ans) > 0) {
    echo "<table class='content-table'>";
    echo "<tr>";
    echo "<th>Vacina</td>";
    echo "<th>Vagas</td>";
    echo "<th>Data</td>";
    echo "<th>Hora</td>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($ans)) {
        if ($row['vagas'] > 0) {
            echo '<tr id_vaga="' . $row['id_vagas'] . '" class="touch">';
            echo '<td>' . $row['vacina'] . '</td>';
            echo '<td>' . $row['vagas'] . '</td>';
            echo '<td>' . $row['data_vaga'] . '</td>';
            echo '<td>' . $row['hora'] . '</td>';
            echo '</tr>';
        }
    }

    echo "</table>";
} else {
    echo "Sem resultados";
}
