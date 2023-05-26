var row_id = document.querySelectorAll('table tr');
var acao;
var id_user;
let alteracoes = [];


$(document).ready(function () {
    $('input.estado').on('change', function () {
        var marcacaoId = $(this).data('marcacao');
        var estado = $(this).data('estado');
        var isChecked = $(this).is(':checked');

        var selecoes = {
            id_marcacao: marcacaoId,
            estado: estado
        };

        alteracoes.push(selecoes);
        console.log(alteracoes);

        if (isChecked) {
            $('input.estado[data-marcacao="' + marcacaoId + '"]').not(this).prop('checked', false);

            $.ajax({
                url: 'vacina_administracao_val.php', 
                method: 'POST',
                data: {alteracoes},
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
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
