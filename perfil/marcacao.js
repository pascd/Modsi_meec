//Seleciona todas as linhas e adiciona à variàvel rows
var row_id_reservas = document.querySelectorAll('#table_reserva tr');
var row_id_alt = document.querySelectorAll('#table_alt tr');
var acao;
var id_vaga;
var vacina;
var id_vaga_selec;
var id_vaga_nova;

//Atribui um evento de clique a cada linha
row_id_reservas.forEach(function (row_2) {
    row_2.addEventListener('click', function (event) {

        //Isto significa que apenas a linha que foi selecionada vai ficar como ativa
        row_id_reservas.forEach(function (otherRow) {
            otherRow.classList.remove('active');
            //otherRow.querySelector('.action-button').remove();
        });

        // Adiciona a linha selecionada como ativa
        this.classList.add('active');

        // Vai buscar o id da linha selecionada
        id_vaga = this.getAttribute('id_vaga');
        vacina = this.getAttribute('vacina');
        console.log(id_vaga);
        //console.log(id_vaga);
        //console.log(vacina);

        $.ajax({
            url: "tab_alterar.php",
            type: "POST",
            data: { id_vaga: id_vaga, vacina: vacina },
            dataType: "html",
            success: function (response) {
                $(".modal-body-alterar").html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });

        $.ajax({
            url: "tab_conf_apagar.php",
            type: "POST",
            data: { id_vaga: id_vaga},
            dataType: "html",
            success: function (response) {
                $(".modal-body-apagar").html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});

row_id_alt.forEach(function (row_3) {
    row_3.addEventListener('click', function (event) {

        //Isto significa que apenas a linha que foi selecionada vai ficar como ativa
        row_id_alt.forEach(function (otherRow) {
            otherRow.classList.remove('active');
            //otherRow.querySelector('.action-button').remove();
        });

        // Adiciona a linha selecionada como ativa
        this.classList.add('active');

        // Vai buscar o id da linha selecionada
        id_vaga_selec = this.getAttribute('id_vaga_nova');
        console.log(id_vaga_selec);
        //console.log(id_vaga);
        //console.log(vacina);

        $.ajax({
            url: "tab_conf_alterar.php",
            type: "POST",
            data: { id_vaga_selec: id_vaga_selec, id_vaga: id_vaga, acao: acao },
            dataType: "html",
            success: function (response) {
                $(".modal-body-confirmar").html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX erro");
                console.log("Error: " + errorThrown);

            }
        });
    });
});

function apagar_m(button) {
    var acao = "Apagar";

    //button.parentNode.remove();

    $.ajax({
        url: "minhas_marcacoes_val.php",
        type: "POST",
        data: { id_vaga: id_vaga, acao: acao },
        success: function (response) {
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX erro");
            console.log("Error: " + errorThrown);

        }
    });
}

function alterar_m(button) {

    acao = "Alterar";

    //button.parentNode.remove();

    $.ajax({
        url: "minhas_marcacoes_val.php",
        type: "POST",
        data: { id_vaga: id_vaga, id_vaga_nova: id_vaga_selec, acao: acao },
        success: function (response) {
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("AJAX erro");
            console.log("Error: " + errorThrown);

        }
    });

}
