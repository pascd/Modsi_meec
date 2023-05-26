<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Agendamentos</title>

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

    <br><br><br><br><br>
    <br><br><br><br><br>

    <div class="medilife-book-an-appoinment-area">
        <div style="text-align: center; font-size: large;">Faça aqui o seu agendamento!</div><br><br>

        <!-- <div class="skrr-container"> -->

        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

        $vacinaOptions = "";
        $query = "SELECT id_vacina, vacina FROM vacinas";
        $result = mysqli_query($db, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idVacina = $row['id_vacina'];
                $vacina = $row['vacina'];
                $vacinaOptions .= "<option value='$idVacina'>$vacina</option>";
            }
        } else {
            echo "Error retrieving vaccine options from the database.";
            exit();
        }


        echo "<div class='skrr-container'>";
        echo "<form method='post'>";
        echo "<label>Selecionar Vacina</label>";
        echo "<select name='vaccine_selection' class='skrr-box'>";
        echo "<option>" . $mostrar . "</option>";
        echo $vacinaOptions;
        echo "</select>";
        echo "<p></p>";
        echo "<button type='submit' class='submeter'>Visualizar marcações</button>";
        echo "</form>";
        echo "</div>";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $selected_vaccine = $_POST['vaccine_selection'];

            $sel_sql = "SELECT v.*, vac.vacina
            FROM vagas v
            JOIN vacinas vac ON v.vacina = vac.id_vacina
            WHERE v.vacina = '$selected_vaccine'";
            $ans = mysqli_query($db, $sel_sql);

            if (mysqli_num_rows($ans) > 0) {
                echo "<table class='content-table'>";
                echo "<tr>";
                echo "<th>Vacina</td>";
                echo "<th>Vagas</td>";
                echo "<th>Data</td>";
                echo "<th>Hora</td>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($ans)) {
                    if ($row['vagas'] > 0) {
                        echo '<tr id_vaga="' . $row['id_vagas'] . '" class="touch">';
                        echo '<td>' . $row['vacina'] . '</td>';
                        echo '<td>' . $row['vagas'] . '</td>';
                        echo '<td>' . $row['data_vaga'] . '</td>';
                        echo '<td>' . $row['hora'] . '</td>';
                        echo '</tr>';
                    }
                }

                echo "</table>";
            } else {
                echo "Sem resultados";
            }
        }

        ?>
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">Agendar vaga</button>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50%;width: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmação de agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="save-changes-btn" onclick="agendar(this)">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="agendar.js"></script>
    <script>
        $(function() {
            $("#footer-area").load("../footer.php");
        });
    </script>
    <div id="footer-area"></div>


</body>

</html>