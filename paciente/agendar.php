<!DOCTYPE html>
<html>
<!-- <link rel="stylesheet" type="text/css" href="../styles.css"> -->

<!-- <head>
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

    
</head> -->

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

    <div id="menu_bar"></div>

    <div class="medilife-book-an-appoinment-area">
        <div style="text-align: center; font-size: large;">Faça aqui o seu agendamento!</div><br><br>
        <tr>
            <td> Vacina </td>
            <td> Vagas </td>
            <td> Data </td>
            <td> Hora </td>
        </tr>
        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

        $sel_sql = "SELECT id_vagas, vacina, vagas, data_vaga, hora FROM vagas";
        $ans = mysqli_query($db, $sel_sql);

        if (mysqli_num_rows($ans) > 0) {
            echo "<table>";
            while ($row = mysqli_fetch_assoc($ans)) {
                if ($row['vagas'] > 0) {
                    echo '<tr id_vaga="' . $row['id_vagas'] . '">';
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

        ?>
        <button class='btn' onclick='agendar(this)'>Agendar vaga</button>
        <div id="agendar-check"></div>
      
        <script src="agendar.js"></script>
    </div>
    <div id="footer"></div>
    

</body>

</html>