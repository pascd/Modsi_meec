$(document).ready(function () {
    $('#vagas-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "criar_vagas.php",
            type: "POST",
            data: $('#vagas-form').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status == 'success') {
                    console.log("AJAX");
                    $('#vagas-form')[0].reset();
                    $('.error').text('');
                    $('#vagas-check').text('Vagas introduzidas com sucesso');
                } else {
                    $('.error').text('');
                    $('#vacina-erro').text(response.errors.vacina);
                    $('#vagas-erro').text(response.errors.vagas);
                    $('#data-erro').text(response.errors.data);
                    $('#hora-erro').text(response.errors.hora);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});

function apagar_v(button) {
    var row = button.parentNode;
    var id = row.getAttribute("id_vaga");
    var acao = "Apagar";
    // send an AJAX request to delete the row from the database
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "criar_vagas_val.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            // if the row is successfully deleted from the database, remove it from the HTML table
            row.parentNode.removeChild(row);
        }
    };
    xhttp.send("id_vaga=" + id, "acao" + acao);
    location.reload();
}
