<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/styles.css">

<head>
    <h1>
        Sistema de vacinação Portuguesa!
    </h1>
    <script src="/jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $("#menu_bar").load("/menu_bar.php");
        });
    </script>

    <script src="criar_vagas.js"></script>

    <script>
        $(function() {
            $("#footer").load("/footer.php");
        });
    </script>
</head>

<body>
    <div id="menu_bar"></div>
    <p>
        Introduzir vagas para vacinação
    </p>
    <div id="form" style="margin-left: 2%; background-color: #f5f4f4; width: 96%;">

        <form id="vagas-form" action="criar_vagas_val.php" method="post" style="float: center; margin: 1% ;">
            <br>
            Vacina:
            <br><br>
            <label for="id_vacina_covid">Covid</label>
            <input type="radio" id="id_vacina_covid" name="vacinas" value="Covid"><br><br>
            <label for="id_vacina_hepatite">Hepatite</label>
            <input type="radio" id="id_vacina_hepatite" name="vacinas" value="Hepatite"><br><br>
            <div id="vacina-erro" class="error"></div>
            Vagas:
            <input type="text" id="id_vagas" name="vagas"><br><br>
            <div id="vagas-erro" class="error"></div>
            Data:
            <input type="date" id="id_data" name="data"><br><br>
            <div id="data-erro" class="error"></div>
            Hora:
            <input type="time" id="id_hora" name="hora"><br><br>
            <div id="hora-erro" class="error"></div>
            <br>
            <input type="submit"><br><br>
            <div id="vagas-check" class="error"></div>
        </form>
    </div>
    <br><br><br><br><br>

    <input type="text" id="filtro" onkeyup="Filtro()" placeholder="Procurar utilizador..">

    <div>
        <tr>
            <td> Vacina </td>
            <td> Vagas </td>
            <td> Data </td>
            <td> Hora </td>
            <td> Apagar </td>
        </tr>
        <?php

        require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

        $sel_sql = "SELECT * FROM vagas";
        $ans = mysqli_query($db, $sel_sql);
        $id_tabela = "vagas";
        if (mysqli_num_rows($ans) > 0) {
            echo '<table id="' . $id_tabela . '">';
            while ($row = mysqli_fetch_assoc($ans)) {
                echo '<tr id_vaga="' . $row['id_vagas'] . '">';
                echo '<td>' . $row['vacina'] . '</td>';
                echo '<td>' . $row['vagas'] . '</td>';
                echo '<td>' . $row['data_vaga'] . '</td>';
                echo '<td>' . $row['hora'] . '</td>';
                echo "<button class='btn' onclick='apagar_v(this)'> X </button>";
                echo '</tr>';
            }
            echo "</table>";
        }
        ?>

        <div id="footer"></div>
</body>

</html>