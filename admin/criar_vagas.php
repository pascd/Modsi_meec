<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Gerir Vagas</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style.css">

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
    <p>
        <!-- ***** Book An Appoinment Area Start ***** -->
    <div class="medilife-book-an-appoinment-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="appointment-form-content">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 col-lg-9">
                                <div class="medilife-appointment-form">
                                    <h3 style="color: #ffffff;">Introduzir vagas para vacinação</h3>
                                    <br>
                                    <form id="vagas-form" action="" method="post">
                                        <div class="row align-items-end">
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="vacinas" style="color: #ffffff;">Vacina</label>
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
                                                    ?>
                                                    <select class="form-control" id="vacinas" name="vacinas" style="background-color: #ffffff;">
                                                        <option id="id_vacina_covid" value="Covid" style="background-color: #ffffff;">Covid-19</option>
                                                        <option id="id_vacina_hepatite" value="Hepatite" style="background-color: #ffffff;">Hepatite</option>
                                                        <option id="id_vacina_tetano" value="Tetano" style="background-color: #ffffff;">Tetano</option>
                                                        <option id="id_vacina_sarampo" value="Sarampo" style="background-color: #ffffff;">Sarampo</option>
                                                    </select>
                                                    <br><br>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="id_data" style="color: #ffffff;">Data</label>
                                                    <input type="date" class="form-control" id="id_data" name="data" id="date" style="background-color: #ffffff;">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="id_hora" style="color: #ffffff;">Hora</label>
                                                    <input type="time" class="form-control" id="id_hora" name="hora" id="time" style="background-color: #ffffff;">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="id_vagas" style="color: #ffffff;">Número a Administrar</label>
                                                    <input type="number" class="form-control border-top-0 border-right-0 border-left-0" id="id_vagas" name="vagas" placeholder="Número" style="background-color: #ffffff;">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-5 mb-0">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="medilife-appoint-btn">Submeter Vagas</button>
                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="vagas-check" class="error"></div>

                            <div class="col-12 col-lg-3">
                                <div class="medilife-contact-info">
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="../img/icons/alarm-clock.png" alt="">
                                        <p>2ª a 6ª - 09h30h às 20h <br>FECHADO aos Fim de Semana</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="../img/icons/envelope.png" alt="">
                                        <p>+351 22 83 40 500 <br>1181808@isep.ipp.pt<br>1190937@isep.ipp.pt<br>1190939@isep.ipp.pt</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info">
                                        <img src="../img/icons/map-pin.png" alt="">
                                        <p>Rua Dr. António Bernardino de Almeida, 431 <br>4249-015 Porto</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

    <input type="text" id="filtro" onkeyup="Filtro()" placeholder="Procurar vaga..">

    <br><br><br>

    <div>

        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
        echo '<table class="content-table" id="table_vagas">';
        echo '<tr>';
        echo '<th> Vacina </th>';
        echo '<th> Vagas </th>';
        echo '<th> Data </th>';
        echo '<th> Hora </th>';
        echo '</tr>';


        $sel_sql_2 = "SELECT v.*, vac.vacina
                FROM vagas v
                JOIN vacinas vac ON v.vacina = vac.id_vacina";
        $ans_2 = mysqli_query($db, $sel_sql_2);
        while ($row_2 = mysqli_fetch_assoc($ans_2)) {
            echo '<tr id_vaga="' . $row_2['id_vagas'] . '">';
            echo '<td>' . $row_2['vacina'] . '</td>';
            echo '<td>' . $row_2['vagas'] . '</td>';
            echo '<td>' . $row_2['data_vaga'] . '</td>';
            echo '<td>' . $row_2['hora'] . '</td>';
            echo '</tr>';
        }

        echo "</table>";

        ?>
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">Apagar</button>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 50%;width: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Apagar vaga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body-apagar-vagas">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter_2" onclick="apagar_v(this)">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Book An Appoinment Area End ***** -->
    <br><br><br><br>

    <!-- ***** Footer Area Start ***** -->
    <script src="criar_vagas.js"></script>
    <script>
        $(function() {
            $("#footer-area").load("../footer.php");
        });
    </script>
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->
</body>

</html>