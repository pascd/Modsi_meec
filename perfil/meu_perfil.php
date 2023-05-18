<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Sistema de vacinação Portuguesa | Perfil</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/Vaccine.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../style.css">

</head>

<?php session_start(); ?>

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
    <br><br><br><br>
    <br><br><br><br>


    <div id="form" style="margin-left: 2%; background-color: #f5f4f4; width: 96%;">

    <br><form id="perfil-form" action="editar_perfil.php" method="post" style="float: center; margin: 1% ;">

            <h3 style="text-align: center; font-size: large;">Meu Perfil</h3><br>

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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Alterar password
            </button>

            <input type="submit" class="btn btn-primary" value="Editar"><br><br>
            <div id="perfil-check" class="error"></div>
        </form>
    </div>

    <script src="perfil.js"></script>
    </script>
    </p>


    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Alterar a Password</h5>
                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="actualPassword" class="col-form-label">Password atual</label>
                            <input type="password" class="form-control" id="password_atual">
                        </div>
                        <div class="form-group">
                            <label for="newPassword" class="col-form-label">Nova password</label>
                            <input type="password" class="form-control" id="nova_password">
                        </div>
                        <div class="form-group">
                            <label for="confirmNewPassword" class="col-form-label">Confirmar nova password</label>
                            <input type="password" class="form-control" id="confirmar_password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="save-changes-btn">Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- ***** Footer Area Start ***** -->
    <script>
        $(function() {
            $("#footer-area").load("../footer.php");
        });
    </script>
    <div id="footer-area"></div>
    <!-- ***** Footer Area End ***** -->

</body>

</html>