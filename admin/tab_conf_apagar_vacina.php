<script src="criar_vagas.js"></script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "Deseja apagar a vacina:";
    echo'<br><br>';

    $id_vaga_selec = $_POST['id_vacina'];
    $sel_sql = "SELECT * FROM vacinas WHERE id_vacina = '$id_vaga_selec'";
    $ans = mysqli_query($db, $sel_sql);

    echo "<table>";
    echo '<tr>';
    echo '<th> Id_Vacina </th>';
    echo '<th> Vacina </th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($ans)) {
        echo '<tr>';
        echo '<td>' . $row['id_vacina'] . '</td>';
        echo '<td>' . $row['vacina'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
