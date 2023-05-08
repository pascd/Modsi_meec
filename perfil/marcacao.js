//Seleciona todas as linhas e adiciona à variàvel rows
var rows = document.querySelectorAll('tbody tr');
var acao;
var id_vaga;
var vacina;
var id_vaga_nova;

//Atribui um evento de clique a cada linha
rows.forEach(function (row_2) {
    row_2.addEventListener('click', function (event) {

        //Isto significa que apenas a linha que foi selecionada vai ficar como ativa
        rows.forEach(function (otherRow) {
            otherRow.classList.remove('active');
            //otherRow.querySelector('.action-button').remove();
        });

        // Adiciona a linha selecionada como ativa
        this.classList.add('active');

        // Vai buscar o id da linha selecionada
        id_vaga = this.getAttribute('id_vaga');
        vacina = this.getAttribute('vacina');
    });
});

function apagar_m(button) {
    var acao = "Apagar";
    // Remove the row from the table
    //button.parentNode.remove();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    if(id_vaga != ""){
    xhttp.open('POST', 'minhas_marcacoes_val.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_vaga=' + encodeURIComponent(id_vaga) + '&acao=' + encodeURIComponent(acao));
    location.reload();
    }
}

function alterar_m(button) {
    acao = "Alterar";
    // Remove the row from the table
    button.parentNode.remove();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };

    id_vaga_nova = 2;

    xhttp.open('POST', 'minhas_marcacoes.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_vaga=' + encodeURIComponent(id_vaga) + '&vacina=' + encodeURIComponent(vacina));

    xhttp.open('POST', 'minhas_marcacoes_val.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_vaga_nova=' + encodeURIComponent(id_vaga_nova) + '&acao=' + encodeURIComponent(acao) + '&id_vaga=' + encodeURIComponent(id_vaga));
    //location.reload();
}