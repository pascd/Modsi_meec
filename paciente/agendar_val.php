<?php 

    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
    session_start();
    var_dump($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id_vaga = $_POST['id_vagas'];
        var_dump($id_vaga);

        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$id_vaga'";
        $ans = mysqli_query($db,$sel_sql);
        
        if(mysqli_num_fields($ans)>0)
        {
            $row = mysqli_fetch_array($ans);
            
            $n_vagas = $row['vagas']-1;

            $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$id_vaga'";
            mysqli_query($db, $query);
           
        }
        
        //Registar o agendamento na base de dados
        $estado = 'Marcado';
        $id_paciente = $_SESSION['id'];
        $ins_sql = "INSERT INTO marcacao(paciente, vaga, estado) VALUES ('$id_paciente', '$id_vaga', '$estado')";
        mysqli_query($db, $ins_sql);

        $response = array('status' => 'success');

    } 

    header('Content-Type: application/json');
    echo json_encode($response);
    mysqli_close($db);


?>