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

    <table>
        <tr>
            <td> Vacina </td>
            <td> Data </td>
            <td> Hora </td>
        </tr>
        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
        session_start();
        $id_paciente=$_SESSION['id'];

        $sel_sql = "SELECT * FROM marcacao WHERE vaga='$id_paciente'";
        $ans = mysqli_query($db, $sel_sql);
        if (mysqli_num_rows($ans) > 0) {
            while ($row = mysqli_fetch_assoc($ans)) {
                $vaga = $row['vaga'];
                $sel_sql_2 = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
                $ans_2 = mysqli_query($db, $sel_sql_2);
                $row_2 = mysqli_fetch_assoc($ans_2)
        ?>
                    <br>
                    <tr>
                        <td> <?php echo $row_2['vacina']; ?> </td>
                        <td> <?php echo $row_2['data_vaga']; ?> </td>
                        <td> <?php echo $row_2['hora']; ?> </td>
                        <form id="agendar-form" method='post' action="agendar_val.php">
                            <input type='radio' name='id_vagas' value='<?php echo $row['id_vagas'] ?>'>

                            </td>
                    </tr>
        <?php
            }
        } else {
            echo "Sem resultados";
        }

        ?>
        <input type='submit'>
        </form>
        <div id="agendar-check" class="error"></div>
    </table>
    <p>

        <script src="/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#agendar-form').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "agendar_val.php",
                        type: "POST",
                        data: $('#agendar-form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 'success') {
                                console.log("AJAX");
                                //$('#agendar-form')[0].reset();
                                $('.error').text('');
                                $('#agendar-check').text('Agendamento realizado com sucesso!');
                            } else {
                                $('#agendar-check').text(response.errors.agendar);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log("AJAX erro");
                            console.log("Error: " + errorThrown);

                        }
                    });
                });
            });
        </script>
    </p>
</body>

</html>