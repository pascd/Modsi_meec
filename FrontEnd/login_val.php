<?php 
        require_once('database.php');
        
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
        $ans = $db->query($sel_sql);
        if($ans->num_rows == 0)
        {
          $errors['email'] = "Este email nao esta registado.";
        }
      }

    if (empty($Password)) {
      $errors['password'] = "Password e necesssaria.";
    } else if(strlen($Password)<8)
    {
      $errors['password'] = "De certeza que e esta a sua password? Muito pequena.";
    } else{
        $sel_sql = "SELECT Pass FROM users WHERE Email = '$Email'";
        $ans = $db->query($sel_sql);
        if($ans->num_rows == 1)
        {
            $row = $ans->fetch_assoc();
            $Password_Hash = $row['Pass'];
            if(!password_verify($Password_Hash, $Password)){
                $errors['password'] = "Credenciais de acesso erradas";
            }
        }
    }
    

    if (empty($errors)) {
      $response = array('status' => 'success');
    } else {
      $response = array('status' => 'error', 'errors' => $errors);
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    mysqli_close($db);
    }