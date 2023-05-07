<?php 

    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        date_default_timezone_set("Europe/Lisbon");
        $data_atual = date('y-m-d h:i:s');
        
        $vaga = $_POST["id_vagas"];
        $acao = $_POST["acao"];
        $paciente = $_SERVER["id"];

        if($acao == "apagar")
        {
            $rem_sql = "DELETE FROM marcacao WHERE paciente='$paciente' AND vaga='$vaga'";
            mysqli_query($db,$rem_sql);
            
            $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$vaga'";
            $ans = mysqli_query($db, $sel_sql);
            $row = mysqli_fetch_array($ans);

            $n_vagas = $row['vagas'] + 1;

            $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$vaga'";
            mysqli_query($db,$query);
        }

        if($acao == "alterar")
        {



            $rem_sql = "DELETE FROM marcacao WHERE paciente='$paciente' AND vaga='$vaga'";
            mysqli_query($db,$rem_sql);
        }
    }

?>