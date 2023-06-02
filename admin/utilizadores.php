<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Gerir Utilizadores</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../styles.css">

</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <script src="../jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $("#header-area").load("../menu_bar.php");
        });
    </script>
    <div id="header-area"></div>
    <!-- ***** Header Area End ***** -->

    <br><br><br><br>
    <br><br><br><br>
    <br><br>

    <div style="text-align: center; font-size: large;">Tabela de Gestão de Utilizadores</div><br><br>

    <input type="text" id="filtro" onkeyup="Filtro()" placeholder="Procurar utilizador..">

    <div>

        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

        $sel_sql = "SELECT * FROM users";
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

                echo '<tr id_user="' . $row['id_user'] . '" class="touch">';
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
        ?>
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">Apagar utilizador</button>
        <button type="button" class="btn" onclick="gerarPDF()">Imprimir Boletim</button>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%;width: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Remover utilizador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="save-changes-btn" onclick="apagar_u(this)">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


    <br><br><br><br>

    <!-- ***** Footer Area Start ***** -->
    <script src="utilizadores.js"></script>
    <script>
        $(function() {
            $("#footer-area").load("../footer.php");
        });
    </script>
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->
</body>

</html>