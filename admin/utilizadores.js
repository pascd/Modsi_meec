var row_id = document.querySelectorAll('table tr');
var acao;
var id_user;

row_id.forEach(function (row) {
    row.addEventListener('click', function (event) {

        row_id.forEach(function (otherRow) {
            otherRow.classList.remove('active');

        });

        this.classList.add('active');

        id_user = this.getAttribute('id_user');

        $.ajax({
            url: "tab_conf_utilizador.php",
            type: "POST",
            data: { id_selec: id_user },
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

function apagar_u(button) {
    var acao = "Apagar";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };

    xhttp.open('POST', 'utilizador.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_user=' + encodeURIComponent(id_user) + '&acao=' + encodeURIComponent(acao));
    location.reload();

}

function Filtro() {
    var filtro = document.getElementById("filtro").value;
    filtro = filtro.toUpperCase();
    var tabela = document.getElementById("utilizador");
    var linhas = tabela.getElementsByTagName("tr");
    var colunas;
    var valor_coluna;
    var i, j;

    for (i = 1; i < linhas.length; i++) {
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

function gerarPDF() {
    var tipo = 0;
    $.ajax({
        url: '/pdf/imprimir_pdf.php',
        type: 'POST',
        data: { tipo: tipo, id: id_user},
        xhrFields: {
            responseType: 'blob' // Set the response type to blob
        },
        success: function (response) {
            // Create a new Blob object from the response
            var blob = new Blob([response]);

            // Create a link element and set its attributes for downloading the file
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'boletim_vacinas.pdf';

            // Append the link to the document and trigger the download
            document.body.appendChild(link);
            link.click();

            // Clean up resources
            document.body.removeChild(link);
            window.URL.revokeObjectURL(link.href);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}