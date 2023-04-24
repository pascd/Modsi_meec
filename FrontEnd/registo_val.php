<?php
        
        //require_once('database.php');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        /*
        // $data will be encoded as json and then returned by the script
        $data = array(
            'success' => false, // Flag whether everything was successful
            'errors' => array() // Provide information regarding the error(s)
        );
        */

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
        $Contribuinte = $_POST['contribuinte'];
        $Password = $_POST['password'];
        $CPassword = $_POST['cpassword'];

        // Server-side validation
  $errors = array();

  if (empty($Primeiro)) {
    $errors[] = "Name is required";
  }

  if (empty($Email)) {
    $errors[] = "Email is required";
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  }
  if (empty($Password)) {
    $errors[] = "Password is required";
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