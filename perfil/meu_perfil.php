<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/styles.css">

<head>
    <title>Meu perfil</title>

</head>

<?php session_start(); ?>

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

    <p>
        Meu perfil

    <div id="form" style="margin-left: 2%; background-color: #f5f4f4; width: 96%;">

        <form id="perfil-form" action="editar_perfil.php" method="post" style="float: center; margin: 1% ;">
            <br>
            Primeiro Nome:
            <input type="text" id="id_primeiro" name="primeiro" value="<?php echo $_SESSION['primeiro_nome']; ?>" readonly><br><br>
            <div id="primeiro-erro" class="error"></div>
            Último Nome:
            <input type="text" id="id_ultimo" name="ultimo" value="<?php echo $_SESSION['ultimo_nome']; ?>" readonly><br><br>
            <div id="ultimo-erro" class="error"></div>
            Data de Nascimento:
            <input type="date" id="id_nascimento" name="nascimento" value="<?php echo $_SESSION['nascimento']; ?>" readonly><br><br>
            <div id="nascimento-erro" class="error"></div>
            Número de Utente:
            <input type="text" id="id_NUS" name="NUS" value="<?php echo $_SESSION['nus']; ?>" readonly><br><br>
            <div id="nus-erro" class="error"></div>
            Email:
            <input type="email" id="id_email" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>
            <div id="email-erro" class="error"></div>
            Número de Telemóvel:
            <input type="tel" id="id_phone" name="telemovel" value="<?php echo $_SESSION['contacto']; ?>"><br><br>
            <div id="telemovel-erro" class="error"></div>
            <!--
            Palavra-Chave:
            <input type="password" id="id_password" name="password"><br><br>
            <div id="password-erro" class="error"></div>
            Repita a Palavra-Chave Anterior:
            <input type="password" id="id_cpassword" name="cpassword"><br><br>
            <div id="cpassword-erro" class="error"></div>
            -->
            <br>
            <input type="submit" value="Editar"><br><br>
            <div id="perfil-check" class="error"></div>
        </form>
    </div>
    <script src="/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#perfil-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/perfil/editar_perfil.php",
                    type: "POST",
                    data: $('#perfil-form').serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 'success') {
                            //console.log("AJAX");
                            $('.error').text('');
                            $('#perfil-check').text('Perfil editado com sucesso.');
                            location.reload();
                        } else {
                            $('.error').text('');
                            $('#primeiro-erro').html(response.errors.primeiro);
                            $('#ultimo-erro').text(response.errors.ultimo);
                            $('#nascimento-erro').text(response.errors.nascimento);
                            $('#nus-erro').text(response.errors.nus);
                            $('#email-erro').text(response.errors.email);
                            $('#telemovel-erro').text(response.errors.telemovel);
                            $('#password-erro').text(response.errors.password);
                            $('#cpassword-erro').text(response.errors.cpassword);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        //console.log("AJAX erro");
                        console.log("Error: " + errorThrown);

                    }
                });
            });
        });
    </script>
    </p>
</body>

</html>