<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/mail/email_enviar.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $acao = $_POST['acao'];
    if ($acao == "Apagar") {

        $id_vaga = $_POST['id_vaga'];

        $sel_sql = "SELECT * FROM marcacao WHERE vaga='$id_vaga'";
        $ans = mysqli_query($db, $sel_sql);

        $sel_sql_2 = "SELECT * FROM vagas WHERE id_vagas='$id_vaga'";
        $ans_2 = mysqli_query($db, $sel_sql_2);
        $row_2 = mysqli_fetch_assoc($ans_2);

        $vacina = $row_2['vacina'];
        $data = $row_2['data_vaga'];
        $hora = $row_2['hora'];

        while ($row = mysqli_fetch_assoc($ans)) {
            $paciente = $row['paciente'];

            $sel_sql_3 = "SELECT * FROM users WHERE id_user='$paciente'";
            $ans_3 = mysqli_query($db, $sel_sql_3);
            $row_3 = mysqli_fetch_assoc($ans_3);
            $nome = $row_3['primeiro_nome'];
            $apelido = $row_3['ultimo_nome'];
            $email = $row_3['email'];

            $html = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/mail/apagar_reserva_mail.html');

            $emailContent = str_replace('{nome}', $nome, $html);
            $emailContent = str_replace('{apelido}', $apelido, $emailContent);
            $emailContent = str_replace('{vacina}', $vacina, $emailContent);
            $emailContent = str_replace('{data}', $data, $emailContent);
            $emailContent = str_replace('{hora}', $hora, $emailContent);

            $destino = $email;
            $assunto = "Cancelamento de reserva";
            $mensagem = $emailContent;

            enviar($destino, $assunto, $mensagem);
        }


        $rem_sql = "DELETE FROM vagas WHERE id_vagas='$id_vaga'";
        mysqli_query($db, $rem_sql);

        $rem_sql_2 = "DELETE FROM marcacao WHERE vaga='$id_vaga'";
        mysqli_query($db, $rem_sql_2);
    } else {

        $vacina = $_POST['vacinas'];
        $vagas = $_POST['vagas'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        //$acao = $_POST['acao'];
        //$id_vaga = $_POST['id_vaga'];

        var_dump($vacina);
        var_dump($vagas);
        var_dump($data);
        var_dump($hora);

        $errors = array();

        if (empty($vacina)) {
            $errors['vacina'] = "E necessario selecionar uma vacina.";
        }

        if (empty($vagas)) {
            $errors['vagas'] = "E necessario introduzir vagas.";
        } else if (!preg_match('/^[0-9]+$/', $vagas)) {
            $errors['vagas'] = "So pode conter numeros.";
        }

        if (empty($data)) {
            $errors['data'] = "E necessario introduzir uma data.";
        }

        if (empty($hora)) {
            $errors['hora'] = "E necessario introduzir uma hora.";
        }
    }
    if (empty($errors)) {
        $response = array('status' => 'success');
        $ins_sql = "INSERT INTO vagas (vacina, vagas, data_vaga, hora) VALUES ('$vacina', '$vagas', '$data', '$hora')";
        if (mysqli_query($db, $ins_sql)) {
            echo "Registo criado com sucesso.";
        } else {
            echo "Erro ao criar registo: " . mysqli_error($db);
        }
        mysqli_close($db);
    } else {
        $response = array('status' => 'error', 'errors' => $errors);
    }


    header('Content-Type: application/json');
    echo json_encode($response);
}
