var row_id_vagas = document.querySelectorAll('#table_vagas tr');
var id_vaga;

$(document).ready(function () {
    $('#vagas-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "criar_vagas.php",
            type: "POST",
            data: $('#vagas-form').serialize(),
            dataType: "html",
            success: function (response) {
                if (response.status == 'success') {
                    console.log("AJAX");
                    $('#vagas-form')[0].reset();
                    $('.error').text('');
                    $('#vagas-check').text('Vagas introduzidas com sucesso');
                } else {
                    $('.error').text('');
                    $('#vagas-check').text(response.errors);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });

    $("#vagas-form").submit(function (event) {
        event.preventDefault();

        var vacina = $("#vacinas").val();
        var vagas = $("#id_vagas").val();
        var data = $("#id_data").val();
        var hora = $("#id_hora").val();

        var dados = {
            vacinas: vacina,
            vagas: vagas,
            data: data,
            hora: hora
        };

        $.ajax({
            url: "criar_vagas_val.php",
            type: "POST",
            dataType: "json",
            data: dados,
            success: function (response) {

                if (response.status === "success") {
                    console.log("Sucesso");
                } else {
                    console.error("Error: " + response.errors);
                }
            },
            error: function (xhr, status, error) {

                console.error("Erro: " + error);
            }
        });
    });

    row_id_vagas.forEach(function (row_2) {
        row_2.addEventListener('click', function (event) {

            row_id_vagas.forEach(function (otherRow) {
                otherRow.classList.remove('active');
            });

            this.classList.add('active');

            id_vaga = this.getAttribute('id_vaga');

            $.ajax({
                url: "tab_conf_apagar_vaga.php",
                type: "POST",
                data: { id_vaga: id_vaga },
                dataType: "html",
                success: function (response) {
                    $(".modal-body-apagar-vagas").html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("AJAX erro");
                    console.log("Error: " + errorThrown);

                }
            });
        });
    });

});

function apagar_v(button) {
    var acao = "Apagar";
    var xhttp = new XMLHttpRequest();
    $.ajax({
        url: "criar_vagas_val.php",
        type: "POST",
        data: { id_vaga: id_vaga, acao: acao },
        dataType: "json",
        success: function (response) {
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX erro");
            console.log("Error: " + errorThrown);
        }
    });
    location.reload();
}

function Filtro() {
    var filtro = document.getElementById("filtro").value;
    filtro = filtro.toUpperCase();
    var tabela = document.getElementById("table_vagas");
    var linhas = tabela.getElementsByTagName("tr");
    var colunas;
    var valor_coluna;
    var i, j;

    for (i = 0; i < linhas.length; i++) {
        colunas = linhas[i].getElementsByTagName("td");
        for (j = 0; j < colunas.length; j++) {
            if (colunas[j]) {
                valor_coluna = colunas[j].textContent || colunas[j].innerText;
                valor_coluna = valor_coluna.toUpperCase();
                if (valor_coluna.toUpperCase().indexOf(filtro) > -1) {
                    linhas[i].style.display = ""; // show
                    break;
                } else {
                    linhas[i].style.display = "none"; // hide
                }
            }
        }
    }
}
