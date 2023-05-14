<!DOCTYPE html>
<html lang="pt">

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
    <link rel="stylesheet" href="../styles.css">

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

    <div class="medilife-book-an-appoinment-area">
        <div style="text-align: center; font-size: large;">Faça aqui o seu agendamento!</div><br><br>

        <!-- <div class="skrr-container"> -->
            
            <?php

                echo "<div class='skrr-container'>";
                echo "<form method='post'>";
                echo "<select name='vaccine_selection' class='skrr-box'>";
                echo "<option>Selecionar Vacina</option>";
                echo "<option value='option_1'>Covid</option>";
                echo "<option value='option_2'>Hepatite</option>";
                echo "<option value='option_3'>Todas</option>";
                echo "</select>";
                echo "<p></p>";
                echo "<button type='submit' class='submeter'>Visualizar marcações</button>";
                echo "</form>";
                echo "</div>";

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Check if the form has been submitted via POST
                $selected_vaccine = $_POST['vaccine_selection'];

                if ($selected_vaccine == "option_3"){

                require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

                $sel_sql = "SELECT id_vagas, vacina, vagas, data_vaga, hora FROM vagas";
                $ans = mysqli_query($db, $sel_sql);

                }

                if ($selected_vaccine == "option_2"){

                    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    
                    $sel_sql = "SELECT id_vagas, vacina, vagas, data_vaga, hora FROM vagas WHERE vacina = 'Hepatite'";
                    $ans = mysqli_query($db, $sel_sql);
    
                }

                if ($selected_vaccine == "option_1"){

                    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    
                    $sel_sql = "SELECT id_vagas, vacina, vagas, data_vaga, hora FROM vagas WHERE vacina = 'Covid'";
                    $ans = mysqli_query($db, $sel_sql);
    
                }

                if (mysqli_num_rows($ans) > 0) {
                    echo "<table class='content-table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<td>Vacina</td>";
                    echo "<td>Vagas</td>";
                    echo "<td>Data</td>";
                    echo "<td>Hora</td>";
                    echo "</tr>";
                    echo "</thead>";
                    while ($row = mysqli_fetch_assoc($ans)) {
                        if ($row['vagas'] > 0) {
                            //echo '<tr id_vaga="' . $row['id_vagas'] . '">';
                            echo "<tr class='touch'>";
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
                }
                // Print the selected vaccine option
                // echo "You selected: " . $selected_vaccine;

            ?>

            <!-- <form method="post">
            <select name="vaccine_selection" class="skrr-box">
                <option>Selecionar Vacina</option>
                <option value="option_1">Covid</option>
                <option value="option_2">Hepatite</option>
                <option value="option_3">Todas</option>
            </select>
            <p></p>
                <button type="submit" class="submeter">Visualizar marcações</button>
            </form> -->

            
        <!-- </div> -->
        <p></p>
        <!-- <tr>
            <td> Vacina </td>
            <td> Vagas </td>
            <td> Data </td>
            <td> Hora </td>
        </tr> -->
        
        <?php

        /*require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

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

        */?>

        <!-- <button class='btn' onclick='agendar(this)'>Agendar vaga</button>
        <div id="agendar-check"></div>
      
        <script src="agendar.js"></script> -->
    </div>

    <script> 
        $(function(){
        $("#footer-area").load("../footer.php"); 
        });
    </script>   
    <div id="footer-area"></div>
    

</body>

</html>