var row_id_vagas = document.querySelectorAll('#table_vagas tr');
var row_id_vacinas = document.querySelectorAll('#table_vacinas tr');
var id_vaga;
var outra;
var vacina;
var acao;

$(document).ready(function () {
    $('#vagas-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "criar_vagas_val.php",
            type: "POST",
            data: $('#vagas-form').serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status == 'success') {
                    $('#vagas-form')[0].reset();
                    $('.error').text('');
                    $('#vagas-check').text('Vagas introduzidas com sucesso');
                    location.reload();
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

        if(outra == 1)
        {
            vacina = $("#outra_vacina").val();
        }else{
            vacina = $("#vacinas").val();
        }
        
        acao = "";
        var vagas = $("#id_vagas").val();
        var data = $("#id_data").val();
        var hora = $("#id_hora").val();

        var dados = {
            vacinas: vacina,
            vagas: vagas,
            data: data,
            hora: hora,
            outra: outra,
            acao: acao
        };

        $.ajax({
            url: "criar_vagas_val.php",
            type: "POST",
            dataType: "json",
            data: dados,
            success: function (response) {

                if (response.status === "success") {
                    console.log("Sucesso");
                    location.reload();
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
            console.log(id_vaga);
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

    row_id_vacinas.forEach(function (row_3) {
        row_3.addEventListener('click', function (event) {

            row_id_vacinas.forEach(function (otherRow) {
                otherRow.classList.remove('active');
            });

            this.classList.add('active');

            id_vacina = this.getAttribute('id_vacina');
            console.log(id_vacina);
            $.ajax({
                url: "tab_conf_apagar_vacina.php",
                type: "POST",
                data: { id_vacina: id_vacina },
                dataType: "html",
                success: function (response) {
                    $(".modal-body-apagar-vacinas").html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("AJAX erro");
                    console.log("Error: " + errorThrown);

                }
            });
        });
    });



});

function verificaroutra(opcao)
{
    var outra_vacina = document.getElementById("outra_vacina");
    if(opcao.value == "outro"){
        outra_vacina.disabled = false;
        outra = 1;
    }else{
        outra_vacina.disabled = true;
        outra = 0;
    }
}

function apagar_vaga(button) {
    acao = "apagar_vaga";
    var xhttp = new XMLHttpRequest();
    $.ajax({
        url: "criar_vagas_val.php",
        type: "POST",
        data: { id_vaga: id_vaga, acao: acao },
        dataType: "html",
        success: function (response) {
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX erro");
            console.log("Error: " + errorThrown);
        }
    });
    location.reload();
}

function apagar_vacina(button) {
    acao = "apagar_vacina";
    var xhttp = new XMLHttpRequest();
    $.ajax({
        url: "criar_vagas_val.php",
        type: "POST",
        data: { id_vacina: id_vacina, acao: acao },
        dataType: "html",
        success: function (response) {
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX erro");
            console.log("Error: " + errorThrown);
        }
    });
    console.log(data);
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

function mostrarVagas() {
    document.getElementById("vagas-table").style.display = "block";
    document.getElementById("vacinas-table").style.display = "none";
}

function mostrarVacinas() {
    document.getElementById("vagas-table").style.display = "none";
    document.getElementById("vacinas-table").style.display = "block";
}
