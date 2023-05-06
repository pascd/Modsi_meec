<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../styles.css">

<head>
        <link rel="icon" href="../img/Vaccine.png">

        <title>
            Entrar
        </title>

        <script src="../jquery-3.6.4.min.js"></script>
        <script> 
            $(function(){
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

        <p></p>
        
        <div class="double_column">

            <div style="text-align: center; font-size: large;">Faça login na sua conta!</div>

            <form id="login-form" action="login_val.php" method="post">
                <br>
                <table class="login_form">
                    <tr>
                        <td>Email<br>
                            <input type="email" id="id_email" name="email"><br><br>
                            <div id="email-erro" class="error"></div>
                        </td>
                    </tr>    
                    <tr>
                        <td>Palavra-Chave<br>
                            <input type="password" id="id_password" name="password"><br><br>
                            <div id="password-erro" class="error"></div>

                        </td>
                    </tr>
                </table>
                <br>
                <input type="submit" class="login_register_btn"><br>
                <div id="registo-check" class="error"></div>
            </form>
        </div>


        <div class="double_column">

            <div style="text-align: center; font-size: large;">Novo visitante? Registe-se agora!</div><br><br>

            <form id="registo-form" action="registo_val.php" method="post">
                <table class="registo_form">
                    <tr>
                        <td>Primeiro Nome<br>
                            <input type="text" id="id_primeiro" name="primeiro" placeholder="Luzinda"><br><br>
                            <div id="primeiro-erro" class="error"></div>
                        </td>
                        <td>Último Nome<br>
                            <input type="text" id="id_ultimo" name="ultimo" placeholder="Pereira"><br><br>
                            <div id="ultimo-erro" class="error"></div>
                        </td>
                    </tr>
              
                    <tr>
                        <td>Data de Nascimento<br>
                            <input type="date" id="id_nascimento" name="nascimento"><br><br>
                            <div id="nascimento-erro" class="error"></div>
                        </td>
                        <td>Número de Utente<br>
                            <input type="text" id="id_NUS" name="NUS"><br><br>
                            <div id="nus-erro" class="error"></div>
                        </td>
                    </tr>
                    <tr>    
                        <td>Email<br>
                            <input type="email" id="id_email" name="email" placeholder="luzindapereira@email.com"><br><br>
                            <div id="email-erro" class="error"></div>
                        </td>
                        <td>Número de Telemóvel<br>
                            <input type="tel" id="id_phone" name="telemovel" placeholder="912345678"><br><br>
                            <div id="telemovel-erro" class="error"></div>
                        </td>
                    </tr>
                    <tr>    
                        <td>Palavra-Chave<br>
                            <input type="password" id="id_password" name="password"><br><br>
                            <div id="password-erro" class="error"></div>
                        </td>
                        <td>Repita a Palavra-Chave<br>
                            <input type="password" id="id_cpassword" name="cpassword"><br><br>
                            <div id="cpassword-erro" class="error"></div>
                        </td>
                    </tr> 
                 </table>
                 <br>
                <input type="submit" class="login_register_btn"><br>
                <div id="registo-check" class="error"></div>
            </form>
        </div>


        <script>
            $(document).ready(function() {
                $('#login-form').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "login_val.php",
                        type: "POST",
                        data: $('#login-form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 'success') {
                                $('#login-form')[0].reset();
                                window.location.href = "../pagina_inicial/index.php";
                            } else {
                                $('.error').text('');
                                $('#email-erro').text(response.errors.email);
                                $('#password-erro').text(response.errors.password);
                            }
                        },
                    });
                });
            });



            $(document).ready(function() {
                $('#registo-form').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "/registo/registo_val.php",
                        type: "POST",
                        data: $('#registo-form').serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 'success') {
                                console.log("AJAX");
                                $('#registo-form')[0].reset();
                                $('.error').text('');
                                $('#registo-check').text('Registo realizado com sucesso!');
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
                            console.log("AJAX erro");
                            console.log("Error: " + errorThrown);

                        }
                    });
                });
            });
        </script>

        <p></p>

        <div id="footer"></div>


    </body>

</html>