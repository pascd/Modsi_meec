$(document).ready(function () {

$('#save-changes-btn').click(function () {
    // Get the values of the form inputs
    var senha_atual = $('#password_atual').val();
    var nova_senha = $('#nova_password').val();
    var confirmar_senha = $('#confirmar_password').val();
    var alterar_senha = "Sim";
    // Send an AJAX request to the PHP script
    $.ajax({
        url: 'editar_perfil.php',
        type: 'POST',
        data: {
            senha_atual: senha_atual,
            nova_senha: nova_senha,
            confirmar_senha: confirmar_senha,
            alterar_senha: alterar_senha
        },
        success: function (response) {
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
        }
    });
    location.reload();
});

    $('#perfil-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "/perfil/editar_perfil.php",
            type: "POST",
            data: $('#perfil-form').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status == 'success') {
                    //console.log("AJAX");
                    $('.error').text('');
                    $('#perfil-check').text('Perfil editado com sucesso.');
                    location.reload();
                } else {
                    $('.error').text('');
                    $('#primeiro-erro').html(response.errors.primeiro);
                    $('#ultimo-erro').text(response.errors.ultimo);
                    $('#nascimento-erro').text(response.errors.nascimento);
                    $('#nus-erro').text(response.errors.nus);
                    $('#email-erro').text(response.errors.email);
                    $('#telemovel-erro').text(response.errors.telemovel);
                    $('#passwordatual-erro').text(response.errors.password_atual);
                    $('#novapassword-erro').text(response.errors.nova_password);
                    $('#confirmarpassword-erro').text(response.errors.confirmar_password);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});
