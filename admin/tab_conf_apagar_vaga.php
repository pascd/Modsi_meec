<script src="criar_vagas.js"></script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "Deseja apagar a vaga:";
    echo'<br><br>';

    $id_vaga_selec = $_POST['id_vaga'];

    $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$id_vaga_selec'";
    $ans = mysqli_query($db, $sel_sql);

    echo "<table>";
    while ($row = mysqli_fetch_assoc($ans)) {
        echo '<td>' . $row['vacina'] . '</td>';
        echo '<td>' . $row['data_vaga'] . '</td>';
        echo '<td>' . $row['hora'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}