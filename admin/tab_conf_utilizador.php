<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    $id_selec=$_POST['id_selec'];
    $sel_sql = "SELECT * FROM users WHERE id_user='$id_selec'";
    $ans = mysqli_query($db, $sel_sql);
    $id_tabela = "utilizador";
    

    if (mysqli_num_rows($ans) > 0) {
        echo '<table class="content-table" id="' . $id_tabela . '">';
        echo '<tr>';
        echo '<td> Primeiro Nome </td>';
        echo '<td> Ultimo Nome </td>';
        echo '<td> Nascimento </td>';
        echo '<td> NUS </td>';
        echo '<td> Email </td>';
        echo '<td> Contacto </td>';
        echo '<td> Nivel </td>';
        echo '</tr>';
        while ($row = mysqli_fetch_assoc($ans)) {

            if ($row['nivel'] == 3) {
                $nivel = "Paciente";
            } else if ($row['nivel'] == 2) {
                $nivel = "Enfermeiro";
            } else if ($row['nivel'] == 1) {
                $nivel = "Admin";
            }
            
            echo '<tr class="touch2">';
            echo '<td>' . $row['primeiro_nome'] . '</td>';
            echo '<td>' . $row['ultimo_nome'] . '</td>';
            echo '<td>' . $row['nascimento'] . '</td>';
            echo '<td>' . $row['nus'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['contacto'] . '</td>';
            echo '<td>' . $nivel . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
