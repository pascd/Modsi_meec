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
            <a href="registo.html">Minha Conta</a>
        </div>

		<p>
			Ainda não criou conta? Preencha os seguintes dados para ter acesso às restantes funcionalidades.
            
            <div id="form" style="margin-left: 2%; background-color: #f5f4f4; width: 96%;">
                
                <script>
                    $(document).ready(function() {
                        $('#registo').submit(function(e) {
                            e.preventDefault();
                            $.ajax({
                                url: 'registo_val.php',
                                type: 'POST',
                                data: $(this).serialize(),
                                dataType: 'json',
                                success: function(response) {
                                    if (response.status == 'success') {
                                        alert('Registration successful!');
                                    } else {
                                        $('#username-error').text(response.errors.Primeiro);
                                        $('#email-error').text(response.errors.Email);
                                        $('#password-error').text(response.errors.Password);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText);
                                }
                            });
                        });
                    });
	            </script>
                

                <form class="registo" action='registo_val.php' method="post" style="float: center; margin: 1% ;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <br>
                    Primeiro Nome: 
                    <input type="text" name="primeiro" placeholder="Luzinda"><br><br>
                    Último Nome: 
                    <input type="text" name="ultimo" placeholder="Pereira"><br><br>
                    Data de Nascimento: 
                    <input type="date" id="birthday" name="nascimento"><br><br>
                    Número de Utente: 
                    <input type="text" name="contribuinte" pattern="[0-9]{9}"><br><br>
                    Email: 
                    <input type="email" name="email" placeholder="luzindapereira@email.com" size="30"><br><br>
                    Número de Telemóvel: 
                    <input type="tel" id="phone" name="telemovel" placeholder="912345678" pattern="[0-9]{9}"><br><br>
                    Palavra-Chave: 
                    <input type="password" name="password"><br><br>
                    Repita a Palavra-Chave Anterior: 
                    <input type="password" name="cpassword"><br><br>
                <br>
                <input id="submit" type="submit"/><br><br>
            </div>		
    		</p>
	</body>
</html>