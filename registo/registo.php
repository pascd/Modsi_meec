
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="/styles.css">

	<head>
		<title>Registo</title>

	</head>
	<body>
        <h1>
            Sistema de vacinação Portuguesa!
        </h1>
        <script src="/jquery-3.6.4.min.js"></script>
        <script> 
            $(function(){
            $("#menu_bar").load("/menu_bar.php"); 
            });
        </script>   

        <div id="menu_bar"></div>

		<p>
			Ainda não criou conta? Preencha os seguintes dados para ter acesso às restantes funcionalidades.
            
            <div id="form" style="margin-left: 2%; background-color: #f5f4f4; width: 96%;">                               

                <form id="registo-form" action="registo_val.php" method="post" style="float: center; margin: 1% ;">
                    <br>
                    Primeiro Nome: 
                    <input type="text" id= "id_primeiro" name="primeiro" placeholder="Luzinda"><br><br>
                    <div id="primeiro-erro" class="error"></div>
                    Último Nome: 
                    <input type="text" id="id_ultimo" name="ultimo" placeholder="Pereira"><br><br>
                    <div id="ultimo-erro" class="error"></div>
                    Data de Nascimento: 
                    <input type="date" id="id_nascimento" name="nascimento"><br><br>
                    <div id="nascimento-erro" class="error"></div>
                    Número de Utente: 
                    <input type="text" id="id_NUS" name="NUS"><br><br>
                    <div id="nus-erro" class="error"></div>
                    Email: 
                    <input type="email" id="id_email" name="email" placeholder="luzindapereira@email.com"><br><br>
                    <div id="email-erro" class="error"></div>
                    Número de Telemóvel: 
                    <input type="tel" id="id_phone" name="telemovel" placeholder="912345678"><br><br>
                    <div id="telemovel-erro" class="error"></div>
                    Palavra-Chave: 
                    <input type="password" id="id_password" name="password"><br><br>
                    <div id="password-erro" class="error"></div>
                    Repita a Palavra-Chave Anterior: 
                    <input type="password" id="id_cpassword" name="cpassword"><br><br>
                    <div id="cpassword-erro" class="error"></div>
                    <br>
                    <input type="submit"><br><br>
                    <div id="registo-check" class="error"></div>
                </form>
            </div>
            <script src="../jquery-3.6.4.min.js"></script>
            <script>
                    $(document).ready(function() {
                        $('#registo-form').submit(function(e) 
                        {
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
                                    } 
                                    else {
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
    		</p>
	</body>
</html>
