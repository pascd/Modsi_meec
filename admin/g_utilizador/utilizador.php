<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user = $_POST["id_user"];
    $acao = $_POST["acao"];

    if ($acao == "Apagar") {
        $rem_sql = "DELETE FROM users WHERE id_user='$user'";
        mysqli_query($db, $rem_sql);
    }
}
?>