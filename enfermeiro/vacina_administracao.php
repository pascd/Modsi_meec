<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Administração Vacinas</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../styles.css">
    <script src="vacina_administracao.js"></script>

</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <script src="../jquery-3.6.4.min.js"></script>
    <script> 
        $(function(){
        $("#header-area").load("../menu_bar.php"); 
        });
    </script>   
    <div id="header-area"></div>
    <!-- ***** Header Area End ***** -->
    <br><br><br><br>
        <br><br><br><br>
        
    <div style="text-align: center; font-size: large;">Faça aqui o seu agendamento!</div><br>

    <input type="text" id="filtro" onkeyup="Filtro()" placeholder="Procurar marcação.." class="form-control border-top-0 border-right-0 border-left-0" style='margin-left:15%; width: 70%'>


    <div>
        <table class="content-table" id="marcacao">
            <tr>
                <th> Vacina </th>
                <th> Data </th>
                <th> Hora </th>
                <th> NUS </th>
                <th> Estado </th>
            </tr>
        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

        $sel_sql = "SELECT * FROM marcacao";
        $ans = mysqli_query($db, $sel_sql);
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

                if (mysqli_num_rows($ans2) > 0 && mysqli_num_rows($ans3) > 0) {
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
                                    echo '</select></td>';
                            echo '</tr>';
                        }
                    }
                }
            }
        }
        ?>
        </table>

    </div>


    <!-- ***** Footer Area Start ***** -->
    <script> 
        $(function(){
        $("#footer-area").load("../footer.php"); 
        });
    </script>   
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->
</body>

</html>