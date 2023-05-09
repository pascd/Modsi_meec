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

    <div>
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
    </div>
    <p>

        <script src="agendar.js"></script>
    </p>
</body>

</html>