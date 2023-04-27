<?php 
        require_once('../database.php');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        /*
        $Email = mysqli_real_escape_string($db,$_POST['email']);
        $Password = mysqli_real_escape_string($db,$_POST['password']);
        */
        
        $Email = $_POST['email'];
        $Password = $_POST['password'];
        
    $errors = array();
    
    if (empty($Email)) {
      $errors['email'] = "Email e necessario.";
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Utilize um formato valido de email.";
    } else {
        $sel_sql = "SELECT * FROM users WHERE Email = '$Email'";
        $ans = mysqli_query($db, $sel_sql);
        if($ans->num_rows == 0)
        {
          $errors['email'] = "Este email nao esta registado.";
        }
      }

    if (empty($Password)) {
      $errors['password'] = "Password e necesssaria.";
    } else if(strlen($Password)<8)
    {
      $errors['password'] = "Password muito pequena.";
    } else{
        $sel_sql = "SELECT Pass FROM users WHERE Email = '$Email'";
        $ans = mysqli_query($db, $sel_sql);
        if(mysqli_num_fields($ans)>0)
        {
            $row = mysqli_fetch_array($ans);
            $Password_Hash = $row['Pass'];
            /*
            if(!password_verify($Password, $Password_Hash)){
              $errors['password'] = "Credenciais de acesso erradas";
            }
            */
        }
    }
    
    if (empty($errors)) {
      $response = array('status' => 'success');
      $sel_sql = "SELECT * FROM users WHERE Email = '$Email'";
      $ans = mysqli_query($db, $sel_sql);
      if(mysqli_num_fields($ans)>0)
        {
            $row = mysqli_fetch_array($ans);
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['primeiro_nome'] = $row['P_Nome'];
            $_SESSION['ultimo_nome'] = $row['U_Nome'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['contacto'] = $row['Contacto'];
            $_SESSION['nus'] = $row['NUS'];
            $_SESSION['nascimento'] = $row['Nascimento'];
            $_SESSION['nivel'] = $row['Nivel'];
        }
    } else {
      $response = array('status' => 'error', 'errors' => $errors);
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    mysqli_close($db);
    }