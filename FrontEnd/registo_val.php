<?php 
        //require_once('database.php');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        /*
        $Primeiro = mysqli_real_escape_string($conn,$_POST['primeiro']);
        $Ultimo = mysqli_real_escape_string($conn,$_POST['ultimo']);
        $Email = mysqli_real_escape_string($conn,$_POST['email']);
        $Nascimento = mysqli_real_escape_string($conn,$_POST['nascmineto']);
        $Telemovel = mysqli_real_escape_string($conn,$_POST['telemovel']);
        $Contribuinte = mysqli_real_escape_string($conn,$_POST['contribuinte']);
        $Password = mysqli_real_escape_string($conn,$_POST['password']);
        $CPassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
        */

        $Primeiro = $_POST['primeiro'];
        $Ultimo = $_POST['ultimo'];
        $Email = $_POST['email'];
        $Nascimento = $_POST['nascimento'];
        $Telemovel = $_POST['telemovel'];
        $NUS = $_POST['NUS'];
        $Password = $_POST['password'];
        $CPassword = $_POST['cpassword'];

        // Server-side validation
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
      // Do something with the form data (e.g. insert into database)
      $response = array('status' => 'success');
    } else {
      $response = array('status' => 'error', 'errors' => $errors);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    }
?>