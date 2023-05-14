let $modal = $("#myModal");
$modal.draggable({
  handle: ".modal-header",
});
$modal.resizable();

$(document).ready(function () {
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
                    $('#password-erro').text(response.errors.password);
                    $('#cpassword-erro').text(response.errors.cpassword);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});