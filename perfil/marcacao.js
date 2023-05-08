//Seleciona todas as linhas e adiciona à variàvel rows
var rows = document.querySelectorAll('tbody tr');
var acao;
var id;
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
        id = this.getAttribute('id_vaga');
    });
});

function deleteRow(button) {
    var acao = "Apagar";
    // Remove the row from the table
    button.parentNode.remove();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xhttp.open('POST', 'minhas_marcacoes_val.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_vaga=' + encodeURIComponent(id) + '&acao=' + encodeURIComponent(acao));
    window.reload();
}