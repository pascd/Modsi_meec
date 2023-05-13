<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Acesso</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <!-- Preloader -->
    <!-- <div id="preloader">
            <div class="medilife-load"></div>
        </div> -->

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
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div style="text-align: center; font-size: large;">Entre na sua conta!</div><br><br>

                    <form class="login_form" id="login-form" action="login_val.php" method="post">
                        <div>
                            <label for="id_email" style="display:block;">Email</label>
                            <input type="email" class="form-control border-top-0 border-right-0 border-left-0" id="id_email" name="email" placeholder="Email"><br><br>
                            <div id="email-login-erro" class="error"></div>

                            <label for="id_password" style="display:block;">Password</label>
                            <input type="password" class="form-control border-top-0 border-right-0 border-left-0" id="id_password" name="password" placeholder="Password"><br><br>
                            <div id="password-login-erro" class="error"></div>

                            <input type="submit" class="btn medilife-btn" value="Entrar"><br>
                            <div id="registo-check" class="error"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>

    <div class="medilife-book-an-appoinment-area">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div style="text-align: center; font-size: large;">Novo visitante? Registe-se agora!</div><br><br>

                    <form class="registo_form" id="registo-form" action="registo_val.php" method="post">
                        <div style="float:left;margin-right:20px;width: 47%; ">
                            <label for="id_primeiro">Primeiro Nome</label>
                            <input type="text" class="form-control border-top-0 border-right-0 border-left-0" id="id_primeiro" name="primeiro" placeholder="Primeiro Nome">
                        </div>
                        <div style="float:left;width: 47%; ">
                            <label for="id_ultimo">Último Nome</label>
                            <input type="text" class="form-control border-top-0 border-right-0 border-left-0" id="id_ultimo" name="ultimo" placeholder="Último Nome">
                        </div>
                        <br><br>
                        <div id="primeiro-erro" class="error"></div>
                        <div id="ultimo-erro" class="error"></div><br>

                        <label for="id_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control border-top-0 border-right-0 border-left-0" id="id_nascimento" name="nascimento"><br>
                        <div id="nascimento-erro" class="error"></div>

                        <div style="float:left;margin-right:20px;width: 47%; ">
                            <label for="id_NUS">Número de Utente</label>
                            <input type="text" class="form-control border-top-0 border-right-0 border-left-0" id="id_NUS" name="NUS" placeholder="123456789">
                        </div>
                        <div style="float:left;width: 47%; ">
                            <label for="id_phone">Número de Telemóvel</label>
                            <input type="tel" class="form-control border-top-0 border-right-0 border-left-0" id="id_phone" name="telemovel" placeholder="912345678">
                        </div>
                        <br><br>
                        <div id="telemovel-erro" class="error"></div>
                        <div id="nus-erro" class="error"></div><br><br>
                        <p></p>
                        <label for="id_email">Email</label>
                        <input type="email" class="form-control border-top-0 border-right-0 border-left-0" id="id_email" name="email" placeholder="Email"><br>
                        <div id="email-erro" class="error"></div>


                        <label for="id_password" style="display:block;">Password</label>
                        <input type="password" class="form-control border-top-0 border-right-0 border-left-0" id="id_password" name="password" placeholder="Password"><br>
                        <div id="password-erro" class="error"></div>

                        <label for="id_cpassword" style="display:block;">Repita a Password</label>
                        <input type="password" class="form-control border-top-0 border-right-0 border-left-0" id="id_cpassword" name="cpassword" placeholder="Password"><br>
                        <div id="cpassword-erro" class="error"></div>

                        <br>
                        <input type="submit" class="btn medilife-btn" value="Registar"><br>
                        <div id="registo-check" class="error"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <p style="text-align: center;">Nunca disponibilize a sua password mesmo se alguém lhe perguntar. Nós nunca iremos pedir a sua password!</p>

    <script src="login_registo.js"></script>
    <!-- ***** Footer Area Start ***** -->
    <script>
        $(function() {
            $("#footer-area").load("/footer.php");
        });
    </script>
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->    

</body>

</html>