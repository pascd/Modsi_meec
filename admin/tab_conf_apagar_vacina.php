<script src="criar_vagas.js"></script>
<?php

echo "<link rel='stylesheet' href='../styles.css'>";
echo "<link rel='stylesheet' href='../style.css'>";

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "Deseja apagar a vacina:";
    echo'<br><br>';

    $id_vaga_selec = $_POST['id_vacina'];
    $sel_sql = "SELECT * FROM vacinas WHERE id_vacina = '$id_vaga_selec'";
    $ans = mysqli_query($db, $sel_sql);

    echo '<table class="content-table">';
    echo '<tr>';
    echo '<th> Id </th>';
    echo '<th> Vacina </th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($ans)) {
        echo '<tr class="touch2">';
        echo '<td>' . $row['id_vacina'] . '</td>';
        echo '<td>' . $row['vacina'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
