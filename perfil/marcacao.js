var row_id = document.querySelectorAll('tbody tr');
var acao;
var id_vaga;
var vacina;
var id_vaga_nova;


row_id.forEach(function (row_2) {
    row_2.addEventListener('click', function (event) {

        row_id.forEach(function (otherRow) {
            otherRow.classList.remove('active');
        });

        this.classList.add('active');

        id_vaga = this.getAttribute('id_vaga');
        vacina = this.getAttribute('vacina');
    });
});

function apagar_m(button) {
    var acao = "Apagar";

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

function tabelaVagas() {

    document.getElementById('alterar_popup').style.display = 'block';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var vagas = JSON.parse(this.responseText);

            var table = document.getElementById("novas_vagas");
            table.innerHTML = "";
            for (var i = 0; i < vagas.length; i++) {
                var row = table.insertRow();
                var col1 = row.insertCell(0);
                var col2 = row.insertCell(1);
                var col3 = row.insertCell(2);
                col1.innerHTML = vagas[i].vacina;
                col2.innerHTML = vagas[i].data_vaga;
                col3.innerHTML = vagas[i].hora;
                row.setAttribute("id_vaga_nova", vagas[i].id_vagas);

                row.addEventListener("click", function () {
                    id_vaga_nova = this.getAttribute("id_vaga_nova");
                    console.log(id_vaga_nova);
                });
            }
        }
    };

    xhttp.open("POST", "tabelavagas.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("vacina=" + encodeURIComponent(vacina));
}

function alterar_m(button) {

    acao = "Alterar";


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };

    xhttp.open('POST', 'minhas_marcacoes_val.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id_vaga_nova=' + encodeURIComponent(id_vaga_nova) + '&acao=' + encodeURIComponent(acao) + '&id_vaga=' + encodeURIComponent(id_vaga));
    location.reload();

}

function closePopup() {
    document.getElementById('alterar_popup').style.display = 'none';
}