<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Gerir Utilizadores</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style.css">

    <script src="utilizadores.js"></script>

</head>

<body>

        <!-- ***** Header Area Start ***** -->
        <script src="../jquery-3.6.4.min.js"></script>
        <script> 
            $(function(){
            $("#header-area").load("../menu_bar.php"); 
            });
        </script>   
        <div id="header-area"></div>
        <!-- ***** Header Area End ***** -->

        <br><br><br><br>
        <br><br><br><br>
        <br><br>

    <input type="text" id="filtro" onkeyup="Filtro()" placeholder="Procurar utilizador..">

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

                if ($row['nivel'] == 3) {
                    $nivel = "Paciente";
                } else if ($row['nivel'] == 2) {
                    $nivel = "Enfermeiro";
                } else if ($row['nivel'] == 1) {
                    $nivel = "Admin";
                }

                echo '<tr id_user="' . $row['id_user'] . '">';
                echo '<td>' . $row['primeiro_nome'] . '</td>';
                echo '<td>' . $row['ultimo_nome'] . '</td>';
                echo '<td>' . $row['nascimento'] . '</td>';
                echo '<td>' . $row['nus'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['contacto'] . '</td>';
                echo '<td>' . $nivel . '</td>';
                echo '</tr>';
            }
            echo "</table>";
        }
        ?>
        <button class='btn' onclick='apagar_u(this)'>Apagar Utilizador</button>
    </div>

    <br><br><br><br>
    
    <!-- ***** Footer Area Start ***** -->
    <script>
        $(function(){
        $("#footer-area").load("../footer.php");
        });
    </script>   
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->
</body>

</html>