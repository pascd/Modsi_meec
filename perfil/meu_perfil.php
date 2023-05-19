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

    <br><form id="perfil-form" action="editar_perfil.php" method="post" style="float: center; margin: 5% ;">

            <h2 style="text-align: center; font-size: large;">Meu Perfil</h2><br>

            <div style="float:left;margin-right:20px;width: 47%; ">
                <label for="id_primeiro">Primeiro Nome</label>
                <input type="text" class="form-control border-top-0 border-right-0 border-left-0" id="id_primeiro" name="primeiro" value="<?php echo $_SESSION['primeiro_nome']; ?>" readonly>
                
            </div>
            <div style="float:left;width: 47%;">
                <label for="id_ultimo">Último Nome</label>
                <input type="text" class="form-control border-top-0 border-right-0 border-left-0" id="id_ultimo" name="ultimo" value="<?php echo $_SESSION['ultimo_nome']; ?>" readonly>

            </div>
            <div id="primeiro-erro" class="error"></div>
            <div id="ultimo-erro" class="error"></div>

            <div>
                <label for="id_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control border-top-0 border-right-0 border-left-0" id="id_nascimento" name="nascimento" value="<?php echo $_SESSION['nascimento']; ?>" readonly>
            </div>
            <div id="nascimento-erro" class="error"></div>

            <div style="float:left;margin-right:20px;width: 47%;">
                <label for="id_NUS">Número de Utente</label>
                <input type="text" class="form-control border-top-0 border-right-0 border-left-0" id="id_NUS" name="NUS" value="<?php echo $_SESSION['nus']; ?>" readonly>
            </div>
            <div style="float:left;width: 47%;">
                <label for="id_phone">Número de Telemóvel</label>
                <input type="tel" class="form-control border-top-0 border-right-0 border-left-0" id="id_phone" name="telemovel" value="<?php echo $_SESSION['contacto']; ?>">
                <br>
            </div>
            <div id="telemovel-erro" class="error"></div>
            <div id="nus-erro" class="error"></did>

            <div style="float:left;width: 100%;">
                <label for="id_email" style="color: #000000;">Email</label>
                <input type="email" class="form-control border-top-0 border-right-0 border-left-0" id="id_email" name="email" value="<?php echo $_SESSION['email']; ?>">
            </div>
            <div id="email-erro" class="error"></div>


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
                            <div id="passwordatual-erro" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="newPassword" class="col-form-label">Nova password</label>
                            <input type="password" class="form-control" id="nova_password">
                            <div id="novapassword-erro" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="confirmNewPassword" class="col-form-label">Confirmar nova password</label>
                            <input type="password" class="form-control" id="confirmar_password">
                            <div id="confirmarpassword-erro" class="error"></div>
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