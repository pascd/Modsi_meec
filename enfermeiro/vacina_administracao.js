var row_id = document.querySelectorAll('table tr');
var acao;
var id_user;
let alteracoes = [];


$(document).ready(function () {

$('select#estado').on('change', function () {
    var id_marcacao = $(this).closest('tr').attr('id_marcacao');
    var estado = $(this).val();

    var selecoes = {
        id_marcacao: id_marcacao,
        estado: estado
    };

    alteracoes.push(selecoes);
    console.log(alteracoes);


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //location.reload();
        }
    }

    xhttp.open('POST', 'vacina_administracao_val.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('alteracoes=' + encodeURIComponent(JSON.stringify(alteracoes)));
    //location.reload();
});
});

function Filtro() {
    var filtro = document.getElementById("filtro").value;
    filtro = filtro.toUpperCase();
    var tabela = document.getElementById("marcacao");
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

/*row_id.forEach(function (row) {
    row.addEventListener('click', function (event) {

        row_id.forEach(function (otherRow) {
            otherRow.classList.remove('active');

        });

        this.classList.add('active');

        id_user = this.getAttribute('id_user');

    });
});
*/