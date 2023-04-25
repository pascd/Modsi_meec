<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="styles.css">

	<head>
		<title>Registo</title>

	</head>
	<body>
        <h1>
            Sistema de vacinação Portuguesa!
        </h1>
        <div class="nav_bar">
            <a href="index.html">Home</a>
            <a href="#vacinas">Vacinas</a>
            <a href="#contactos">Contactos</a>
            <a href="#sobre">Sobre</a>
            <a href="registo.php">Minha Conta</a>
        </div>

		<p>
			Faça login na sua conta!
            
            <div id="form" style="margin-left: 2%; background-color: #f5f4f4; width: 96%;">                               

                <form id="login-form" action="login_val.php" method="post" style="float: center; margin: 1% ;">
                    <br>
                    Email: 
                    <input type="email" id="id_email" name="email"><br><br>
                    <div id="email-erro" class="error"></div>
                    Palavra-Chave: 
                    <input type="password" id="id_password" name="password"><br><br>
                    <div id="password-erro" class="error"></div>
                    <input type="submit"><br><br>
                    <div id="registo-check" class="error"></div>
                </form>
            </div>
            <script src="jquery-3.6.4.min.js"></script>
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
                                        window.location.href = "index.html";
                                    } 
                                    else {
                                        $('.errors').text('');
                                        $('#email-erro').text(response.errors.email);
                                        $('#password-erro').text(response.errors.password);
                                    }
                                },
                            });
                        });
                    });
	            </script>
    		</p>
	</body>
</html>