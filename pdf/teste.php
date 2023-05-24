<!DOCTYPE html>
<header>
    <style src="../style.css"></style>
    <style src="../styles.css"></style>
</header>
<body>
    OLA
    <?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
        session_start();
        $id_paciente = $_SESSION['id'];

        $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente'";
        $ans = mysqli_query($db, $sel_sql);
        if (mysqli_num_rows($ans) > 0) {
            echo '<table class="content-table" id="table_reserva">';
            echo '<tr>';
            echo '<th> Vacina </th>';
            echo '<th> Data </th>';
            echo '<th> Hora </th>';
            echo '</tr>';
            while ($row = mysqli_fetch_assoc($ans)) {

                $vaga = $row['vaga'];
                $sel_sql_2 = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
                $ans_2 = mysqli_query($db, $sel_sql_2);
                while ($row_2 = mysqli_fetch_assoc($ans_2)) {
                    echo '<td>' . $row_2['vacina'] . '</td>';
                    echo '<td>' . $row_2['data_vaga'] . '</td>';
                    echo '<td>' . $row_2['hora'] . '</td>';
                    echo '</tr>';
                }
            }
            echo "</table>";
        }
    
    ?>
</body>