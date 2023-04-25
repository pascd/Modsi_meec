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
        $NISS = $_POST['NISS'];
        $Password = $_POST['password'];
        $CPassword = $_POST['cpassword'];

        // Server-side validation
    $errors = array();
    
    if (empty($Primeiro)) {
      $errors['primeiro'] = "Primeiro nome e necessario.";
    }

    if (empty($Ultimo)) {
      $errors['ultimo'] = "Ultimo nome e necessario.";
    }

    if (empty($Email)) {
      $errors['email'] = "Email e necessario.";
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Utilize um formato valido de email.";
    }

    if (empty($Nascimento)) {
      $errors['nascimento'] = "Data de nascmineto a necessaria.";
    }

    if (empty($Telemovel)) {
      $errors['telemovel'] = "Telemóvel e necessario.";
    }
    
    if (empty($NISS)) {
      $errors['niss'] = "NISS e necessario.";
    }

    if (empty($Password)) {
      $errors['password'] = "Password e necesssaria.";
    } else if ($Password != $CPassword){
      $errors['password'] = "Password e necesssaria.";
    }

    if (empty($CPassword)) {
      $errors['cpassword'] = "Password e necesssaria.";
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