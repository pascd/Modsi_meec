<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

if (!isset($_POST['vacinas'])) {
    $vacina = '';
} else {
    $vacina = $_POST['vacinas'];
}

$vagas = $_POST['vagas'];
$data = $_POST['data'];
$hora = $_POST['hora'];

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
