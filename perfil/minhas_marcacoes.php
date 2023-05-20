<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Marcações</title>

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

    <div>

        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
        session_start();
        $id_paciente = $_SESSION['id'];

        $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente'";
        $ans = mysqli_query($db, $sel_sql);
        if (mysqli_num_rows($ans) > 0) {
            echo '<table class="content-table">';
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
                    echo '<tr id_vaga="' . $row_2['id_vagas'] . '" vacina="' . $row_2['vacina'] . '">';
                    echo '<td>' . $row_2['vacina'] . '</td>';
                    echo '<td>' . $row_2['data_vaga'] . '</td>';
                    echo '<td>' . $row_2['hora'] . '</td>';
                    echo '</tr>';
                }
            }
            echo "</table>";
        }

        ?>
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">Alterar</button>
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">Apagar</button>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50%;width: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Alterar reserva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body-alterar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter_2">Alterar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50%;width: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmação de alteração de reserva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body-confirmar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="save-changes-btn" onclick="alterar_m(this)">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="marcacao.js"></script>
    <!-- ***** Footer Area Start ***** -->
    <script>
        $(function() {
            $("#footer-area").load("../footer.php");
        });
    </script>
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->
</body>

</html>