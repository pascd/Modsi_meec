
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
			Ainda não criou conta? Preencha os seguintes dados para ter acesso às restantes funcionalidades.
            
            <div id="form" style="margin-left: 2%; background-color: #f5f4f4; width: 96%;">                               

                <form id="registo-form" action="registo_val.php" method="post" style="float: center; margin: 1% ;">
                    <br>
                    Primeiro Nome: 
                    <input type="text" id= "id_primeiro" name="primeiro" placeholder="Luzinda"><br><br>
                    <div id="primeiro-error" class="error"></div>
                    Último Nome: 
                    <input type="text" id="id_ultimo" name="ultimo" placeholder="Pereira"><br><br>
                    <div id="ultimo-error" class="error"></div>
                    Data de Nascimento: 
                    <input type="date" id="id_nascimento" name="nascimento"><br><br>
                    <div id="nascimento-error" class="error"></div>
                    Número de Utente: 
                    <input type="text" id="id_NISS" name="NISS" pattern="[0-9]{9}"><br><br>
                    <div id="niss-error" class="error"></div>
                    Email: 
                    <input type="email" id="id_email" name="email" placeholder="luzindapereira@email.com" size="30"><br><br>
                    <div id="email-error" class="error"></div>
                    Número de Telemóvel: 
                    <input type="tel" id="id_phone" name="telemovel" placeholder="912345678" pattern="[0-9]{9}"><br><br>
                    <div id="telemovel-error" class="error"></div>
                    Palavra-Chave: 
                    <input type="password" id="id_password" name="password"><br><br>
                    <div id="password-error" class="error"></div>
                    Repita a Palavra-Chave Anterior: 
                    <input type="password" id="id_cpassword" name="cpassword"><br><br>
                    <div id="cpassword-error" class="error"></div>
                    <br>
                <input type="submit"><br><br>
                <div id="registo_check" class="error"></div>
            </div>
            <script src="jquery-3.6.4.min.js"></script>
            <script>
                    $(document).ready(function() {
                        $('#registo-form').submit(function(e) {
                            e.preventDefault();
                            $.ajax({
                                url: "registo_val.php",
                                type: "POST",
                                data: $('#registo-form').serialize(),
                                dataType: "json",
                                success: function(response) {
                                    if (response.status == 'success') {
                                        $('#primeiro-error').text('Registo realizado com sucesso!');
                                    } 
                                    else {
                                        $('#primeiro-error').text(responde.errors,primeiro);
                                        $('#ultimo-error').text(responde.errors.ultimo);
                                        $('#nascimento-error').text(responde.errors.nascimento);
                                        $('#niss-error').text(responde.errors.niss);
                                        $('#email-error').text(responde.errors.email);
                                        $('#telemovel-error').text(responde.errors.telemovel);
                                        $('#password-error').text(responde.errors.password);
                                        $('#password-error').text(responde.errors.cpassword);
                                    }
                                },
                            });
                        });
                    });
	            </script>
    		</p>
	</body>
</html>
