$(document).ready(function() {
    $('#vagas-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "criar_vagas_val.php",
            type: "POST",
            data: $('#vagas-form').serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    console.log("AJAX");
                    $('#vagas-form')[0].reset();
                    $('.error').text('');
                    $('#vagas-check').text('Vagas introduzidas com sucesso');
                } else {
                    $('.error').text('');
                    $('#vacina-erro').html(response.errors.vacina);
                    $('#vagas-erro').text(response.errors.vagas);
                    $('#data-erro').text(response.errors.data);
                    $('#hora-erro').text(response.errors.hora);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});