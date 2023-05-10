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

        <script src="login_registo.js"></script>

    </head>

    <body>
        <h1>
            Sistema de vacinação Portuguesa!
        </h1>

        <div id="menu_bar"></div>

        <p></p>
        
        <div class="double_column">

            <div style="text-align: center; font-size: large;">Entre na sua conta!</div><br><br>

            <form class="login_form" id="login-form" action="login_val.php" method="post">
                <label for="id_email" style="display:block;">Email</label>
                <input type="email" id="id_email" name="email" placeholder="Email"><br><br>
                <div id="email-login-erro" class="error"></div>

                <label for="id_password" style="display:block;">Email</label>
                <input type="password" id="id_password" name="password" placeholder="Password"><br><br>
                <div id="password-login-erro" class="error"></div>
                <br>
                <input type="submit" class="login_register_btn" value="Entrar"><br>
                <div id="registo-check" class="error"></div>
            </form>
        </div>


        <div class="double_column">

            <div style="text-align: center; font-size: large;">Novo visitante? Registe-se agora!</div><br><br>

            <form class="registo_form" id="registo-form" action="registo_val.php" method="post">
                <div style="float:left;margin-right:20px;width: 47%; ">
                    <label for="id_primeiro" style="display:block;">Primeiro Nome</label>
                    <input type="text" id="id_primeiro" name="primeiro" placeholder="Primeiro Nome" style="display:block;">           
                </div>
                <div style="float:left;width: 47%; ">
                    <label for="id_ultimo" style="display:block;">Último Nome</label>
                    <input type="text" id="id_ultimo" name="ultimo" placeholder="Último Nome" style="display:block;">
                </div>
                <br><br>
                <div id="primeiro-erro" class="error"></div>
                <div id="ultimo-erro" class="error"></div><br>

                <label for="id_nascimento" style="display:block;">Data de Nascimento</label>
                <input type="date" id="id_nascimento" name="nascimento"><br><br>
                <div id="nascimento-erro" class="error"></div>

                <div style="float:left;margin-right:20px;width: 47%; ">
                    <label for="id_NUS" style="display:block;">Número de Utente</label>
                    <input type="text" id="id_NUS" name="NUS" placeholder="123456789" style="display:block;">                
                </div>
                <div style="float:left;width: 47%; ">
                    <label for="id_phone" style="display:block;">Número de Telemóvel</label>
                    <input type="tel" id="id_phone" name="telemovel" placeholder="912345678" style="display:block;">
                </div>
                <br><br>
                <div id="telemovel-erro" class="error"></div>
                <div id="nus-erro" class="error"></div><br>

                <label for="id_email" style="display:block;">Email</label>
                <input type="email" id="id_email" name="email" placeholder="Email"><br><br>
                <div id="email-erro" class="error"></div>


                <label for="id_password" style="display:block;">Password</label>
                <input type="password" id="id_password" name="password" placeholder="Password"><br><br>
                <div id="password-erro" class="error"></div>

                <label for="id_cpassword" style="display:block;">Repita a Password</label>
                <input type="password" id="id_cpassword" name="cpassword" placeholder="Password"><br><br>
                <div id="cpassword-erro" class="error"></div>

                 <br>
                <input type="submit" class="login_register_btn" value="Registar"><br>
                <div id="registo-check" class="error"></div>
            </form>
        </div>


        <p style="text-align: center;">Nunca disponibilize a sua password mesmo se alguém lhe perguntar. Nós nunca iremos pedir a sua password!</p>

        <div id="footer"></div>


    </body>

</html>