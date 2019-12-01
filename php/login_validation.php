<?php

$usr_error = $pwd_error =$login_error= 0; 
$username = $password = "";

// Define $username and $password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  // Initialize username
  if (empty($_POST["login"])) {
    $usr_error = 1;
  } else {
    $username = secure_input($_POST["login"]);
  }
  
  //Initialize password
  if (empty($_POST["password"])) {
    $pwd_error = 1;
  } else {
    $password = secure_input($_POST["password"]);
  }

    if( !$pwd_error && !$usr_error) {
        // Setup database
        $connection = mysqli_connect("localhost", "root", "","foxcloud");
        // SQL query to check user
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
    }
}

// Secure from injections
function secure_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    //$data = mysql_real_escape_string($data);
  return $data;
}
?>
