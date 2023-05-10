<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../styles.css">

<head>
    <h1>
        Sistema de vacinação Portuguesa!
    </h1>
    <script src="/jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $("#menu_bar").load("/menu_bar.php");
        });
    </script>

    <script>
        $(function() {
            $("#footer").load("/footer.php");
        });
    </script>
    <script src="vacina_administracao.js"></script>

</head>

<body>

    <div id="menu_bar"></div>

    <input type="text" id="filtro" onkeyup="Filtro()" placeholder="Procurar marcação..">

    <div>
        <tr>
            <td> Vacina </td>
            <td> Data </td>
            <td> Hora </td>
            <td> NUS </td>
            <td> Estado </td>
        </tr>
        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

        $sel_sql = "SELECT * FROM marcacao";
        $ans = mysqli_query($db, $sel_sql);
        $id_tabela = "marcacao";
        if (mysqli_num_rows($ans) > 0) {
            while ($row = mysqli_fetch_assoc($ans)) {

                $id_paciente = $row['paciente'];
                $id_vaga = $row['vaga'];

                $sel_sql_2 = "SELECT * FROM vagas WHERE id_vagas='$id_vaga'";
                $ans2 = mysqli_query($db, $sel_sql_2);

                $sel_sql_3 = "SELECT * FROM users WHERE id_user='$id_paciente'";
                $ans3 = mysqli_query($db, $sel_sql_3);

                $estado = $row['estado'];
                $id_select = "estado";

                if (mysqli_num_rows($ans2) > 0 && mysqli_num_rows($ans2) > 0) {

                    echo '<table id="' . $id_tabela . '">';
                    while ($row_2 = mysqli_fetch_assoc($ans2)) {
                        while ($row_3 = mysqli_fetch_assoc($ans3)) {
                            echo '<tr id_marcacao="' . $row['id_marcacao'] . '">';
                            echo '<td>' . $row_2['vacina'] . '</td>';
                            echo '<td>' . $row_2['data_vaga'] . '</td>';
                            echo '<td>' . $row_2['hora'] . '</td>';
                            echo '<td>' . $row_3['nus'] . '</td>';
                            echo '<td>' . '<select id="' . $id_select . '">';
                            echo '<option value="' . $estado . '">' . $estado . '</option>';
                            if ($estado == "Marcado") {
                                echo '<option value="Resolvido">Resolvido</option>';
                                echo '<option value="Ausente">Ausente</option>';
                            } else if ($estado == "Resolvido") {
                                echo '<option value="Marcado">Marcado</option>';
                                echo '<option value="Ausente">Ausente</option>';
                            } else if ($estado == "Ausente") {
                                echo '<option value="Marcado">Marcado</option>';
                                echo '<option value="Resolvido">Resolvido</option>';
                            }
                            echo '</select>' . '<td>';
                            echo '</tr>';
                        }
                    }
                    echo "</table>";
                }
            }
        }
        ?>
    </div>
    <div id="footer"></div>
</body>

</html>