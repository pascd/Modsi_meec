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

        $Primeiro = mysqli_real_escape_string($conn,$_POST['primeiro']);
        $Ultimo = mysqli_real_escape_string($conn,$_POST['ultimo']);
        $Email = mysqli_real_escape_string($conn,$_POST['email']);
        $Nascimento = mysqli_real_escape_string($conn,$_POST['nascmineto']);
        $Telemovel = mysqli_real_escape_string($conn,$_POST['telemovel']);
        $Contribuinte = mysqli_real_escape_string($conn,$_POST['contribuinte']);
        $Password = mysqli_real_escape_string($conn,$_POST['password']);
        $CPassword = mysqli_real_escape_string($conn,$_POST['cpassword']);

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

  if (count($errors) > 0) {
    echo "<ul>";
    foreach ($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";
  } else {
    // Success message
    echo "Registration successful!";
  }
}
?>