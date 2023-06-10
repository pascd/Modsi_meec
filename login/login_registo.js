$(document).ready(function () {
    $('#login-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "login_val.php",
            type: "POST",
            data: $('#login-form').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status == 'success') {
                    $('#login-form')[0].reset();
                    var alt_senha = response.alterar_senha;
                    console.log(alt_senha);
                    if (alt_senha == 1) {
                        window.location.href = "/perfil/meu_perfil.php";
                    } else {
                        window.location.href = "/FrontEnd/index.php";
                    }
                } else {
                    $('.error').text('');
                    $('#email-login-erro').text(response.errors.email);
                    $('#password-login-erro').text(response.errors.password);
                }
            },
        });
    });
});



$(document).ready(function () {
    $('#registo-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "registo_val.php",
            type: "POST",
            data: $('#registo-form').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status == 'success') {
                    console.log("AJAX");
                    $('.error').text('');
                    $('#registo-check').text('Registo realizado com sucesso!');
                    location.reload();
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
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});
