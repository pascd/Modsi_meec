<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $alteracoes = json_decode($_POST['alteracoes'], true);

    foreach ($alteracoes as $selecao) {
    
        $id_marcacao = $selecao['id_marcacao'];
        $estado = $selecao['estado'];
    
        $query = "UPDATE marcacao SET estado='$estado' WHERE id_marcacao=$id_marcacao";
        mysqli_query($db, $query);
        
      }


    
}
