<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../styles.css">

<head>
    <title>Registo</title>

</head>

<body>
    <h1>
        Sistema de vacinação Portuguesa!
    </h1>
    <script src="/jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $("#menu_bar").load("/menu_bar.php");
        });
    </script>

    <div id="menu_bar"></div>

    <div style="overflow-x:auto;">
        <table>
            <tr>
                <td> Vacina </td>
                <td> Data </td>
                <td> Hora </td>
            </tr>
            <?php

            require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
            session_start();
            $id_paciente = $_SESSION['id'];

            $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente'";
            $ans = mysqli_query($db, $sel_sql);
            if (mysqli_num_rows($ans) > 0) {
                while ($row = mysqli_fetch_assoc($ans)) {
                    echo "<tbody>";
                    $vaga = $row['vaga'];
                    $sel_sql_2 = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
                    $ans_2 = mysqli_query($db, $sel_sql_2);
                    while ($row_2 = mysqli_fetch_assoc($ans_2)) {
                        echo '<tr id_vaga="' . $row_2['id_vagas'] . '">';
                        echo '<td vacina="' . $row_2['vacina'] . '">' . $row_2['vacina'] . '</td>';
                        echo '<td>' . $row_2['data_vaga'] . '</td>';
                        echo '<td>' . $row_2['hora'] . '</td>';
                        echo '</tr>';
                    }
                    echo "</tbody>";
                }
            }

            ?>
            <button class='action-button' onclick='apagar_m(this)'>Apagar</button>
            <button class='action-button' onclick='alterar_m(this)'>Alterar</button>



            <div class="alterar_popup">
                <div class="alterar_cont">
                    <?php
                    $vacina = $_POST['vacina'];
                    $sel_sql = "SELECT * FROM vagas WHERE vacina='$vacina'";
                    $ans = mysqli_query($db, $sel_sql);
                    if (mysqli_num_rows($ans) > 0) {
                        while ($row = mysqli_fetch_assoc($ans)) {
                            echo "<tbody>";
                            $vacina = $POST['vacina'];
                            echo var_dump($vacina);
                            $sel_sql_2 = "SELECT * FROM vagas WHERE vacina='$vacina'";
                            $ans_2 = mysqli_query($db, $sel_sql_2);
                            while ($row_2 = mysqli_fetch_assoc($ans_2)) {
                                echo '<tr id_vaga_nova="' . $row_2['id_vagas'] . '">';
                                echo '<td>' . $row_2['vacina'] . '</td>';
                                echo '<td>' . $row_2['data_vaga'] . '</td>';
                                echo '<td>' . $row_2['hora'] . '</td>';
                                echo '</tr>';
                            }
                            echo "</tbody>";
                        }
                        echo "<button class='action-button' onclick='apagar_m(this)'>Apagar</button>";
                        echo "<button class='action-button' onclick='alterar_m(this)'>Alterar</button>";
                    }

                    ?>
                    <button class="btn" onclick="closePopup()">Fechar</button>
                </div>
            </div>

            <script src="marcacao.js"></script>
</body>

</html>