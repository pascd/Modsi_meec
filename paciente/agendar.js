var row_id = document.querySelectorAll('table tr');
var id_vaga;

row_id.forEach(function (row) {
    row.addEventListener('click', function (event) {

        row_id.forEach(function (otherRow) {
            otherRow.classList.remove('active');
        });

        this.classList.add('active');

        id_vaga = this.getAttribute('id_vaga');
        console.log(id_vaga);

        $.ajax({
            url: "tab_conf.php",
            type: "POST",
            data: {id_selec : id_vaga},
            dataType: "html",
            success: function (response) {
                $(".modal-body").html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });

    });
});

function agendar(button) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open('POST', 'agendar_val.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_vagas=' + encodeURIComponent(id_vaga));
    console.log(id_vaga);
    window.location();

}

$(document).ready(function () {
    $('#agendar-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "agendar_val.php",
            type: "POST",
            data: $('#agendar-form').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status == 'success') {
                    console.log("AJAX");
                    //$('#agendar-form')[0].reset();
                    $('.error').text('');
                    $('#agendar-check').text('Agendamento realizado com sucesso!');
                } else {
                    $('#agendar-check').text(response.errors.agendar);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});