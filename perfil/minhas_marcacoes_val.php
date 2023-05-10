<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $vaga = $_POST["id_vaga"];
    $acao = $_POST["acao"];
    $paciente = $_SESSION["id"];
    $vaga_nova = $_POST["id_vaga_nova"];

    if ($acao == "Apagar") {
        $rem_sql = "DELETE FROM marcacao WHERE paciente='$paciente' AND vaga='$vaga'";
        mysqli_query($db, $rem_sql);

        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
        $ans = mysqli_query($db, $sel_sql);
        $row = mysqli_fetch_array($ans);

        $n_vagas = $row['vagas'] + 1;

        $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$vaga'";
        mysqli_query($db, $query);
    }

    if ($acao == "Alterar") {
        $estado = "Marcado";

        $ins_sql = "INSERT INTO marcacao(paciente, vaga, estado) VALUES ('$paciente', '$vaga_nova', '$estado')";
        mysqli_query($db, $ins_sql);

        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
        $ans = mysqli_query($db,$sel_sql);
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
    }
}
