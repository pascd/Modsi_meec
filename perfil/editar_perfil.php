<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    session_start();
    
    $id = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $Primeiro_new = $_POST['primeiro'];
        $Ultimo_new = $_POST['ultimo'];
        $Nascimento_new = $_POST['nascimento'];
        $Email_new = $_POST['email'];
        $NUS_new = $_POST['NUS'];
        $Telemovel_new = $_POST['telemovel'];

        $errors = array();
    
        if (empty($Primeiro_new)) {
          $errors['primeiro'] = "Primeiro nome e necessario.";
        }
        else if(!preg_match('/^[a-zA-Z]+$/',$Primeiro_new))
        {
          $errors['primeiro'] = "So pode conter letras.";
        }
    
        if (empty($Ultimo_new)) {
          $errors['ultimo'] = "Ultimo nome e necessario.";
        }
        else if(!preg_match('/^[a-zA-Z]+$/',$Ultimo_new))
        {
          $errors['ultimo'] = "So pode conter letras.";
        }
    
        if (empty($Email_new)) {
          $errors['email'] = "Email e necessario.";
        } else if (!filter_var($Email_new, FILTER_VALIDATE_EMAIL)) {
          $errors['email'] = "Utilize um formato valido de email.";
        } else {
          $sel_sql = "SELECT * FROM users WHERE email = '$Email_new'";
          $ans = mysqli_query($db, $sel_sql);
          if($ans->num_rows > 1)
          {
            $errors['email'] = "Este email ja esta a ser utilizado.";
          }
        }
    
        if (empty($Nascimento_new)) {
          $errors['nascimento'] = "Data de nascimento a necessaria.";
        }
    
        if (empty($Telemovel_new)) {
          $errors['telemovel'] = "Telemovel e necessario.";
        }
        else if(!preg_match('/^[0-9]+$/',$Telemovel_new))
        {
          $errors['telemovel'] = "Telemovel so pode conter numeros.";
        }
        else if(strlen($Telemovel_new)!=9)
        {
          $errors['telemovel'] = "Telemovel tem 9 digitos.";
        } else{
          $sel_sql = "SELECT * FROM users WHERE contacto = '$Telemovel_new'";
          $ans = mysqli_query($db, $sel_sql);
          if($ans->num_rows > 1)
          {
            $errors['telemovel'] = "Este telemovel ja esta a ser utilizado.";
          }
        }
        
        if (empty($NUS_new)) {
          $errors['nus'] = "Numero de utente de saude e necessario.";
        }
        else if(!preg_match('/^[0-9]+$/',$NUS_new))
        {
          $errors['nus'] = "Numero de utente so pode conter numeros.";
        }
        else if(strlen($NUS_new)!=9)
        {
          $errors['nus'] = "Numero de utente de saude tem 9 digitos.";
        } else{
          $sel_sql = "SELECT * FROM users WHERE nus = '$NUS_new'";
          $ans = mysqli_query($db, $sel_sql);
          if($ans->num_rows > 1)
          {
            $errors['nus'] = "Este NUS ja esta a ser utilizado.";
          }
        }
        
        /*
        if (empty($Password)) {
          $errors['password'] = "Password e necesssaria.";
        } else if(strlen($Password)<8)
        {
          $errors['password'] = "Password necessita de ter pelo menos 8 caracteres.";
        }
    
        if (empty($CPassword)) {
          $errors['cpassword'] = "Confirme a password.";
        } else if ($Password != $CPassword){
          $errors['cpassword'] = "Passwords nao coincidem.";
        }
        */

        if (empty($errors)) {
          $response = array('status' => 'success');
            //$Password_Hash = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE users SET primeiro_nome='$Primeiro_new', ultimo_nome='$Ultimo_new', nascimento='$Nascimento_new', nus='$NUS_new', email='$Email_new', contacto='$Telemovel_new' WHERE id_user=$id";
            mysqli_query($db, $query);
            //echo "Erro ao criar registo: " . mysqli_error($db);
            mysqli_close($db);
        } else {
          $response = array('status' => 'error', 'errors' => $errors);
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);

    }
