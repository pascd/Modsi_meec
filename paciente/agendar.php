<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../styles.css">

<head>
    <title>Registo</title>

    <script src="../jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $("#menu_bar").load("../menu_bar.php");
        });
    </script>

    <script> 
        $(function(){
            $("#footer").load("../footer.php"); 
        });
    </script>   

</head>

<body>
    <h1>
        Sistema de vacinação Portuguesa!
    </h1>

    <div id="menu_bar"></div>

    <table>
        <tr>
            <td> Vacina </td>
            <td> Vagas </td>
            <td> Data </td>
            <td> Hora </td>
            <td> Selecionar </td>
        </tr>
        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

        $sel_sql = "SELECT id_vagas, vacina, vagas, data_vaga, hora FROM vagas";

        $ans = mysqli_query($db, $sel_sql);
        if (mysqli_num_rows($ans) > 0) {
            while ($row = mysqli_fetch_assoc($ans)) {
                if ($row['vagas'] > 0) {
        ?>
                    <br>
                    <tr>
                        <td> <?php echo $row['vacina']; ?> </td>
                        <td> <?php echo $row['vagas']; ?> </td>
                        <td> <?php echo $row['data_vaga']; ?> </td>
                        <td> <?php echo $row['hora']; ?> </td>
                        <form id="agendar-form" method='post' action="agendar_val.php">
                            <input type='radio' name='id_vagas' value='<?php echo $row['id_vagas'] ?>'>

                            </td>
                    </tr>
        <?php
                }
            }
        } else {
            echo "Sem resultados";
        }

        ?>
        <input type='submit'>
        </form>
        <div id="agendar-check"></div>
    </table>
    <p>

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

    <div id="footer"></div>
</body>

</html>