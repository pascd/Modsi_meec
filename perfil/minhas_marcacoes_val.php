<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/mail/email_enviar.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $vaga = $_POST["id_vaga"];
    echo var_dump($vaga);
    $acao = $_POST["acao"];
    echo var_dump($acao);
    $paciente = $_SESSION["id"];

    if ($acao == "Apagar") {
        $rem_sql = "DELETE FROM marcacao WHERE paciente='$paciente' AND vaga='$vaga'";
        mysqli_query($db, $rem_sql);

        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
        $ans = mysqli_query($db, $sel_sql);
        $row = mysqli_fetch_array($ans);
        $nome = $_SESSION['primeiro_nome'];
        $apelido = $_SESSION['ultimo_nome'];
        $data = $row['data_vaga'];
        $hora = $row['hora'];
        $vacina = $row['vacina'];

        $n_vagas = $row['vagas'] + 1;

        $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$vaga'";
        mysqli_query($db, $query);

        $html = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/mail/apagar_reserva_mail.html');

        // Replace placeholders in HTML template with dynamic content
        $emailContent = str_replace('{nome}', $nome, $html);
        $emailContent = str_replace('{apelido}', $apelido, $emailContent);
        $emailContent = str_replace('{vacina}', $vacina, $emailContent);
        $emailContent = str_replace('{data}', $data, $emailContent);
        $emailContent = str_replace('{hora}', $hora, $emailContent);

        $destino = $_SESSION['email'];
        $assunto = "Re-agendamento de Vacina";
        $mensagem = $emailContent;

        enviar($destino, $assunto, $mensagem);

    }

    if ($acao == "Alterar") {
        $estado = "Marcado";
        $vaga_nova = $_POST["id_vaga_nova"];

        $ins_sql = "INSERT INTO marcacao(paciente, vaga, estado) VALUES ('$paciente', '$vaga_nova', '$estado')";
        mysqli_query($db, $ins_sql);

        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
        $ans = mysqli_query($db, $sel_sql);
        $row = mysqli_fetch_array($ans);
        $n_vagas = $row['vagas'] - 1;
        $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$vaga'";
        mysqli_query($db, $query);

        $rem_sql = "DELETE FROM marcacao WHERE paciente='$paciente' AND vaga='$vaga'";
        mysqli_query($db, $rem_sql);

        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
        $ans = mysqli_query($db, $sel_sql);
        $row = mysqli_fetch_array($ans);

        $n_vagas = $row['vagas'] + 1;

        $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$vaga'";
        mysqli_query($db, $query);


        //Para o email
        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
        $ans = mysqli_query($db, $sel_sql);

        if (mysqli_num_fields($ans) > 0) {
            $row = mysqli_fetch_array($ans);
            $nome = $_SESSION['primeiro_nome'];
            $apelido = $_SESSION['ultimo_nome'];
            $data = $row['data_vaga'];
            $hora = $row['hora'];
            $vacina = $row['vacina'];
        }

        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga_nova'";
        $ans = mysqli_query($db, $sel_sql);

        if (mysqli_num_fields($ans) > 0) {
            $row = mysqli_fetch_array($ans);
            $data_2 = $row['data_vaga'];
            $hora_2 = $row['hora'];
        }

        // Get HTML template
        $html = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/mail/alterar_reserva_mail.html');

        // Replace placeholders in HTML template with dynamic content
        $emailContent = str_replace('{nome}', $nome, $html);
        $emailContent = str_replace('{apelido}', $apelido, $emailContent);
        $emailContent = str_replace('{vacina}', $vacina, $emailContent);
        $emailContent = str_replace('{data}', $data, $emailContent);
        $emailContent = str_replace('{hora}', $hora, $emailContent);
        $emailContent = str_replace('{data_2}', $data_2, $emailContent);
        $emailContent = str_replace('{hora_2}', $hora_2, $emailContent);

        $destino = $_SESSION['email'];
        $assunto = "Re-agendamento de Vacina";
        $mensagem = $emailContent;

        enviar($destino, $assunto, $mensagem);
    }
}
?>