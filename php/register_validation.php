<?php

//variables to store errors
$name_empty = $surname_empty = $login_empty = $password_empty = $password_repeat_empty = 0;
$name_m_err = $surname_m_err = $login_m_err = $password_m_err = $password_repeat_m_err = 0;

//variables to store 5 fields
$name = $surname = $username = $password = $password_repeat = "";

// Define $username and $password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  //---- name validate  
  if (empty($_POST["name"])) {
    $name_empty = 1;
  } elseif (!preg_match('/^[а-яА-Яa-zA-Z]+$/u',$_POST["name"])) {
    // only letters are allowed!
    $name_m_err = 1;
  } else {
    $name = secure_input($_POST["name"]);
  }
  
  //---- surname validate  
  if (empty($_POST["surname"])) {
    $surname_empty = 1;
  } elseif (!preg_match('/^[а-яА-Яa-zA-Z]+$/u',$_POST["surname"])) {
    // only letters are allowed!
    $surname_m_err = 1;
  } else {  
    $surname = secure_input($_POST["surname"]);
  }
  
  //---- login validate  
  if (empty($_POST["login"])) {
    $login_empty = 1;
  } elseif (!preg_match('/^[a-zA-Z0-9]+$/',$_POST["login"])) {
    // only letters and numbers are allowed!
    $login_m_err = 1;
  } else {    
    $username = secure_input($_POST["login"]);
  }
  
  //---- password validate
  if (empty($_POST["password"])) {
    $password_empty = 1;
  } elseif (!preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $_POST["password"])) {
      // if not matches pattern
      $password_m_err = 1;
  } else {
    $password = secure_input($_POST["password"]);
  }
  
   if (empty($_POST["password_repeat"])) {
    $password_repeat_empty = 1;
  } elseif (secure_input($_POST["password_repeat"])!== $password) {
      //should be the same!
      $password_repeat_m_err = 1;
      $password = "";
  }
  
    if (!($name_empty || $surname_empty || $login_empty || $password_empty || $password_repeat_empty ||
          $name_m_err || $surname_m_err || $login_m_err || $password_m_err || $password_repeat_m_err)) {
        // No errors! Success!
        /*
        // Setup database
        $connection = mysqli_connect("localhost", "root", "","foxcloud");
        // SQL query to add user
        $query = mysqli_query($connection,"select * from users where HASH='$password' AND LOGIN='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            session_start();
            $_SESSION['login_user']=$username;
            header("location: index.php");
        } else {
            $login_error=1;
        }
        mysqli_close($connection); // Closing Connection
         *
         */
        echo "Успех!";
    }
}

// Secure from injections
function secure_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    //$data = mysqli_real_escape_string($data);
  return $data;
}

?>
