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

                <form class="registo" action='registo_val.php' method="post" style="float: center; margin: 1% ;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <br>
                    Primeiro Nome: 
                    <input type="text" name="primeiro" placeholder="Luzinda" required><br><br>
                    Último Nome: 
                    <input type="text" name="ultimo" placeholder="Pereira" required><br><br>
                    Data de Nascimento: 
                    <input type="date" id="birthday" name="nascimento" required><br><br>
                    Número de Utente: 
                    <input type="text" name="contribuinte" pattern="[0-9]{9}" required><br><br>
                    Email: 
                    <input type="email" name="email" placeholder="luzindapereira@email.com" size="30" required><br><br>
                    Número de Telemóvel: 
                    <input type="tel" id="phone" name="telemovel" placeholder="912345678" pattern="[0-9]{9}" required><br><br>
                    Palavra-Chave: 
                    <input type="password" name="password" required><br><br>
                    Repita a Palavra-Chave Anterior: 
                    <input type="password" name="cpassword" required><br><br>
                <br>
                <input type="submit"/><br><br>
            </div>
		
    		</p>
	</body>
</html>