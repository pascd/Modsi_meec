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
    </p>
    <div id="footer"></div>
</body>

</html>