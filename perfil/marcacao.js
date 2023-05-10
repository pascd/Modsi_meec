//Seleciona todas as linhas e adiciona à variàvel rows
var row_id = document.querySelectorAll('tbody tr');
var acao;
var id_vaga;
var vacina;
var id_vaga_nova;

//Atribui um evento de clique a cada linha
row_id.forEach(function (row_2) {
    row_2.addEventListener('click', function (event) {

        //Isto significa que apenas a linha que foi selecionada vai ficar como ativa
        row_id.forEach(function (otherRow) {
            otherRow.classList.remove('active');
            //otherRow.querySelector('.action-button').remove();
        });

        // Adiciona a linha selecionada como ativa
        this.classList.add('active');

        // Vai buscar o id da linha selecionada
        id_vaga = this.getAttribute('id_vaga');
        vacina = this.getAttribute('vacina');
        //console.log(id_vaga);
        //console.log(vacina);
    });
});

function apagar_m(button) {
    var acao = "Apagar";

    //button.parentNode.remove();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    if (id_vaga != "") {
        xhttp.open('POST', 'minhas_marcacoes_val.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('id_vaga=' + encodeURIComponent(id_vaga) + '&acao=' + encodeURIComponent(acao));
        location.reload();
    }
}

function alterar_m(button) {

    if (id_vaga != "" && id_vaga != "null" && id_vaga!="undefined") {
        document.getElementById('alterar_popup').style.display = 'block';
    }
    else{
        document.getElementById('alterar_popup').style.display = 'none';
    }
        acao = "Alterar";

        //button.parentNode.remove();

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };

        /*
        $.ajax({
            url: "minhas_marcacoes.php",
            type: "POST",
            data: {vacina_tipo: vacina, id_selec: id_vaga},
            success: function(response) {
                console.log(response);
            }
        });
        */

        xhttp.open('POST', 'minhas_marcacoes.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('id_vaga=' + encodeURIComponent(id_vaga) + '&vacina=' + encodeURIComponent(vacina));
    /*
    xhttp.open('POST', 'minhas_marcacoes_val.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_vaga_nova=' + encodeURIComponent(id_vaga_nova) + '&acao=' + encodeURIComponent(acao) + '&id_vaga=' + encodeURIComponent(id_vaga));
    location.reload();
    */
}

function closePopup() {
    document.getElementById('alterar_popup').style.display = 'none';
}