<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/mail/email_enviar.php';
session_start();

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_paciente = $_SESSION['id'];
    $id_vaga = $_POST['id_vagas'];

    $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente' AND vaga='$id_vaga'";
    $ans = mysqli_query($db, $sel_sql);

    if ($ans->num_rows > 0) {
        $errors['agendar']="Já possui uma reserva para este horário";
    }

    $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente'";
    $ans = mysqli_query($db, $sel_sql);

    if (mysqli_num_fields($ans) > 0) {
        $row = mysqli_fetch_array($ans);
    }

    if (empty($errors)) {
        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$id_vaga'";
        $ans = mysqli_query($db, $sel_sql);

        if (mysqli_num_fields($ans) > 0) {
            $row = mysqli_fetch_array($ans);
            $n_vagas = $row['vagas'] - 1;

            $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$id_vaga'";
            mysqli_query($db, $query);
        }

        //Registar o agendamento na base de dados
        $estado = 'Marcado';
        $ins_sql = "INSERT INTO marcacao(paciente, vaga, estado) VALUES ('$id_paciente', '$id_vaga', '$estado')";
        mysqli_query($db, $ins_sql);


        //Para o email
        $sel_sql = "SELECT v.*, vac.vacina
                FROM vagas v
                JOIN vacinas vac ON v.vacina = vac.id_vacina
                WHERE v.id_vagas = '$id_vaga'";
        $ans = mysqli_query($db, $sel_sql);

        if (mysqli_num_fields($ans) > 0) {
            $row = mysqli_fetch_array($ans);
            $n_vagas = $row['vagas'] - 1;

            $nome = $_SESSION['primeiro_nome'];
            $apelido = $_SESSION['ultimo_nome'];
            $data = $row['data_vaga'];
            $hora = $row['hora'];
            $vacina = $row['vacina'];
        }

        // Get HTML template
        $html = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/mail/agendar_mail.html');

        // Replace placeholders in HTML template with dynamic content
        $emailContent = str_replace('{nome}', $nome, $html);
        $emailContent = str_replace('{apelido}', $apelido, $emailContent);
        $emailContent = str_replace('{vacina}', $vacina, $emailContent);
        $emailContent = str_replace('{data}', $data, $emailContent);
        $emailContent = str_replace('{hora}', $hora, $emailContent);

        $destino = $_SESSION['email'];
        $assunto = "Agendamento de Vacina";
        $mensagem = $emailContent;

        enviar($destino, $assunto, $mensagem);


        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'errors' => $errors);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    mysqli_close($db);
}
