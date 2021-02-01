


<?php

include 'backend/database.php';



if (isset($_POST['login'])) {
  session_start();
  $username = $mysqli -> real_escape_string($_POST['login_username']);

  $password = $mysqli -> real_escape_string($_POST['login_password']);

  $q = "select * from accounts where username = '$username' and password = '$password'";
  
  $result = $mysqli->query($q);


  if ( $if_user_exits = $result->fetch_array()) {




    if ($if_user_exits[1] == $username  &&  $if_user_exits[5] == $password) {


      if (!empty($_POST["rememberMe"])) {
        setcookie("username", $username, time() + 3600);
        setcookie("password", $password, time() + 3600);
        
      } else {
        
        if (isset($_COOKIE["username"])) {
          setcookie("username", "");
        }
        if (isset($_COOKIE["password"])) {
          setcookie("password", "");
        }
      }

      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['picture'] = $if_user_exits[6];
      $_SESSION['user_id'] = $if_user_exits[0];
      $_SESSION['firstName'] = $if_user_exits[2];
      $_SESSION['lastName'] = $if_user_exits[3];
      $_SESSION['email'] = $if_user_exits[4];

      header("location: homepage.php");
    }
    else {
      $_SESSION['error'] = "Sorry user does not exist try again.";
      header("location: index.php");
      
    }
  } else {
    
$_SESSION['error'] = "Sorry user does not exist try again.";
header("location: index.php");
  }
}


$mysqli -> close();

?>




