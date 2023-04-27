<?php 
        require_once('../database.php');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        /*
        $Primeiro = mysqli_real_escape_string($db,$_POST['primeiro']);
        $Ultimo = mysqli_real_escape_string($db,$_POST['ultimo']);
        $Email = mysqli_real_escape_string($db,$_POST['email']);
        $Nascimento = mysqli_real_escape_string($db,$_POST['nascimento']);
        $Telemovel = mysqli_real_escape_string($db,$_POST['telemovel']);
        $NUS = mysqli_real_escape_string($db,$_POST['NUS']);
        $Password = mysqli_real_escape_string($db,$_POST['password']);
        $CPassword = mysqli_real_escape_string($db,$_POST['cpassword']);
        */
        
        $Primeiro = $_POST['primeiro'];
        $Ultimo = $_POST['ultimo'];
        $Email = $_POST['email'];
        $Nascimento = $_POST['nascimento'];
        $Telemovel = $_POST['telemovel'];
        $NUS = $_POST['NUS'];
        $Password = $_POST['password'];
        $CPassword = $_POST['cpassword'];
        
    $errors = array();
    
    if (empty($Primeiro)) {
      $errors['primeiro'] = "Primeiro nome e necessario.";
    }
    else if(!preg_match('/^[a-zA-Z]+$/',$Primeiro))
    {
      $errors['primeiro'] = "So pode conter letras.";
    }

    if (empty($Ultimo)) {
      $errors['ultimo'] = "Ultimo nome e necessario.";
    }
    else if(!preg_match('/^[a-zA-Z]+$/',$Ultimo))
    {
      $errors['ultimo'] = "So pode conter letras.";
    }

    if (empty($Email)) {
      $errors['email'] = "Email e necessario.";
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Utilize um formato valido de email.";
    } else {
      $sel_sql = "SELECT * FROM users WHERE Email = '$Email'";
      $ans = mysqli_query($db, $sel_sql);
      if($ans->num_rows > 0)
      {
        $errors['email'] = "Este email ja esta a ser utilizado.";
      }
    }

    if (empty($Nascimento)) {
      $errors['nascimento'] = "Data de nascimento a necessaria.";
    }

    if (empty($Telemovel)) {
      $errors['telemovel'] = "Telemovel e necessario.";
    }
    else if(!preg_match('/^[0-9]+$/',$Telemovel))
    {
      $errors['telemovel'] = "Telemovel so pode conter numeros.";
    }
    else if(strlen($Telemovel)!=9)
    {
      $errors['telemovel'] = "Telemovel tem 9 digitos.";
    } else{
      $sel_sql = "SELECT * FROM users WHERE Contacto = '$Telemovel'";
      $ans = mysqli_query($db, $sel_sql);
      if($ans->num_rows > 0)
      {
        $errors['telemovel'] = "Este telemovel ja esta a ser utilizado.";
      }
    }
    
    if (empty($NUS)) {
      $errors['nus'] = "Numero de utente de saude e necessario.";
    }
    else if(!preg_match('/^[0-9]+$/',$NUS))
    {
      $errors['nus'] = "Numero de utente so pode conter numeros.";
    }
    else if(strlen($NUS)!=9)
    {
      $errors['nus'] = "Numero de utente de saude tem 9 digitos.";
    } else{
      $sel_sql = "SELECT * FROM users WHERE NUS = '$NUS'";
      $ans = mysqli_query($db, $sel_sql);
      if($ans->num_rows > 0)
      {
        $errors['nus'] = "Este NUS ja esta a ser utilizado.";
      }
    }
    

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

    if (empty($errors)) {
      $response = array('status' => 'success');
      $Password_Hash = password_hash($password, PASSWORD_BCRYPT);
      $Nivel = 3;
      $ins_sql = "INSERT INTO users (P_nome, U_nome, Nascimento, NUS, Email, Contacto, Pass, Nivel) VALUES ('$Primeiro', '$Ultimo', '$Nascimento', '$NUS', '$Email', '$Telemovel', '$Password_Hash', '$Nivel')";
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
?>