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

    <input type="text" id="filtro" onkeyup="myFunction()" placeholder="Procurar utilizador..">

    <div>
            <tr>
                <td> Primeiro Nome </td>
                <td> Ultimo Nome </td>
                <td> Nascimento </td>
                <td> NUS </td>
                <td> Email </td>
                <td> Contacto </td>
                <td> Nivel </td>
            </tr>
            <?php

            require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

            $sel_sql = "SELECT * FROM users";
            $ans = mysqli_query($db, $sel_sql);
            $id_tabela = "utilizador";

            if (mysqli_num_rows($ans) > 0) {
                echo '<table id="' . $id_tabela . '">';
                while ($row = mysqli_fetch_assoc($ans)) {
                        echo '<tr id_user="' . $row['id_user'] . '">';
                        echo '<td>' . $row['primeiro_nome'] . '</td>';
                        echo '<td>' . $row['ultimo_nome'] . '</td>';
                        echo '<td>' . $row['nascimento'] . '</td>';
                        echo '<td>' . $row['nus'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['contacto'] . '</td>';
                        echo '<td>' . $row['nivel'] . '</td>';
                        echo '</tr>';
                    }
                    echo "</table>";
                }
            
            ?>
            <button class='btn' onclick='apagar_m(this)'>Apagar</button>
            <button class='btn' onclick='alterar_m(this)'>Alterar</button>
    </div>

    <script src="utilizadores.js"></script>
</body>

</html>