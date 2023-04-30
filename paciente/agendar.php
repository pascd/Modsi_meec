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
        ?>
                <br>
                <tr>
                    <td> <?php echo $row['vacina']; ?> </td>
                    <td> <?php echo $row['vagas']; ?> </td>
                    <td> <?php echo $row['data_vaga']; ?> </td>
                    <td> <?php echo $row['hora']; ?> </td>
                    <td>
                        <form method=post action="agendar_val.php">
                    </td>
                    <input type='radio' name='id_vagas' value='<?php $row['id_vagas'] ?>'>
                    <input type='submit'>
                    </form>
                    </td>
                </tr>
        <?php

            }
        } else {
            echo "Sem resultados";
        }

        ?>
    </table>
    <p>

        <script src="/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#vagas-form').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "criar_vagas_val.php",
                        type: "POST",
                        data: $('#vagas-form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 'success') {
                                console.log("AJAX");
                                $('#vagas-form')[0].reset();
                                $('.error').text('');
                                $('#vagas-check').text('Vagas introduzidas com sucesso');
                            } else {
                                $('.error').text('');
                                $('#vacina-erro').html(response.errors.vacina);
                                $('#vagas-erro').text(response.errors.vagas);
                                $('#data-erro').text(response.errors.data);
                                $('#hora-erro').text(response.errors.hora);
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