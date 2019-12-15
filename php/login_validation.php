<?php
session_start();
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
        //fix charset
        mysqli_set_charset ($connection , 'utf8');
        // SQL query to check user
        $password = hash_pasword($password);
        $query = mysqli_query($connection,"select * from users where HASH='$password' AND LOGIN='$username'");
        $rows = mysqli_num_rows($query);
        $data = mysqli_fetch_assoc($query);
        if ($rows == 1) {\
            session_destroy();
            session_id($data["ID"]);
            session_start();
            $_SESSION['user_login']=$data['LOGIN'];
            $_SESSION['user_name']=$data['NAME'];
            $_SESSION['user_surname']=$data['S_NAME'];
            $_SESSION['user_group_id']=$data['GROUP_ID'];
            echo session_id(). $_SESSION['user_name'];
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

//hash password
function hash_pasword($pwd){
    $pwd = md5($pwd);
    return $pwd;
}
?>
