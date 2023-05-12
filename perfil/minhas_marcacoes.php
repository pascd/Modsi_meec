<!DOCTYPE html>
<html>
<!-- <link rel="stylesheet" type="text/css" href="../styles.css">

<head>
    <title>Registo</title>

</head> -->

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

</head>

<body>
    <!-- <h1>
        Sistema de vacinação Portuguesa!
    </h1>
    <script src="/jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $("#menu_bar").load("/menu_bar.php");
        });
    </script> -->

    <!-- Preloader -->
    <!-- <div id="preloader">
            <div class="medilife-load"></div>
        </div> -->

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

    <div id="menu_bar"></div>

    <div class="medilife-book-an-appoinment-area">
        <div style="text-align: center; font-size: large;">Faça aqui a gestão das suas marcações!</div><br><br>
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
                    echo "<table>";
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
                    echo "</table>";
                }
            }

            ?>
            <button class='btn' onclick='apagar_m(this)'>Apagar</button>
            <button class='btn' onclick='alterar_m(this)'>Alterar</button>
    </div>

    <div class="alterar_popup" id="alterar_popup">
        <div class="popup_cont">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $id_vaga_selec = $_POST['id_vaga'];
                $vacina = $_POST['vacina'];

                $sel_sql_3 = "SELECT * FROM vagas WHERE vacina='$vacina'";
                $ans_3 = mysqli_query($db, $sel_sql_3);

                echo "<table>";
                while ($row_3 = mysqli_fetch_assoc($ans_3)) {
                    
                    echo '<tr id_vaga_nova="' . $row_3['id_vagas'] . '">';
                    echo '<td>' . $row_3['vacina'] . '</td>';
                    echo '<td>' . $row_3['data_vaga'] . '</td>';
                    echo '<td>' . $row_3['hora'] . '</td>';
                    echo '</tr>';
                    
                }
                echo "</table>";
            }
            ?>
            <button class="btn" onclick="closePopup()">Fechar</button>
            <button class="btn">Alterar</button>
        </div>
    </div>

    <script src="marcacao.js"></script>

    <script src="login_registo.js"></script>
    <!-- ***** Footer Area Start ***** -->
    <script>
        $(function() {
            $("#footer-area").load("/footer.php");
        });
    </script>
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** --> 
</body>

</html>