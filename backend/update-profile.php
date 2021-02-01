<?php 

session_start();

include 'database.php';

if (isset($_POST['profile_update'])) {
  $username = $mysqli -> real_escape_string( $_POST['profile_username']);
  $firstName = $mysqli -> real_escape_string( $_POST['profile_firstName']);
  $lastName = $mysqli -> real_escape_string( $_POST['profile_lastName']);
  $password = $mysqli -> real_escape_string( $_POST['old_password']);
  $cpassword = $mysqli -> real_escape_string( $_POST['new_password']);
  $email = $mysqli -> real_escape_string( $_POST['profile_email']);
  $id = $_SESSION['user_id']; 
  $checkUsername = $mysqli->query("select * from accounts where userName='$username'");
  $checkEmail = $mysqli->query("select * from accounts where email='$email'");
  $row = $checkUsername->fetch_row();
  $row2 = $checkEmail->fetch_row();

  
  $session = $_SESSION['username'];
  $checkPassword = $mysqli->query("select password from accounts where password='$password' AND userName = '$session'");
  $row3 = $checkPassword->fetch_row();

  if ($row && $row2 && $row[0] != $id && $row2[0] != $id ) {
   $_SESSION['error'] = "Username and Email already exists another one."; 
   header("location: ../index.php");
  } elseif ($row && $row[0] != $id) {
      
    $_SESSION['error'] = "Username already exists another one."; 
    header("location: ../homepage.php");
  } elseif ($row2 && $row2[0] != $id) {
      
    $_SESSION['error'] = "Email already exists another one."; 
    header("location: ../homepage.php");
  } 
  elseif(!$row3)
  {

    $_SESSION['error'] = "Old password do not match."; 
    header("location: ../homepage.php");
  }
   else {
    
    if($cpassword)
    {
        $password = $cpassword;
    }


    define("FILEREPOSITORY", "images/");

    if (is_uploaded_file($_FILES['profile_picture']['tmp_name'])) {
      if ($_FILES['profile_picture']['type'] != "image/jpeg") {
$_SESSION['error'] = "Image must be of the type JPEG";
header("location: ../homepage.php");

      } else {
        $filename = uniqid() . ".jpg";
        $result = move_uploaded_file($_FILES['profile_picture']['tmp_name'], FILEREPOSITORY . $filename);
        if ($result == 1) {
          $picture = 'images/' . $filename;

          $id = $_SESSION['user_id'];


          $query = "UPDATE `accounts` SET `username`='$username',`firstName`='$firstName',`lastName`='$lastName',`email`='$email',`password`='$password', `profilePicture` = '$picture' WHERE id = $id ";
          $is_uploaded = $mysqli->query($query);
          if ($is_uploaded) {
              $_SESSION['username'] = $username;
              $_SESSION['firstName'] = $firstName;
              $_SESSION['lastName'] = $lastName;
              $_SESSION['email'] = $email;
              $_SESSION['password'] = $password;
              $_SESSION['picture'] = $picture;
              $_SESSION['success'] = "Update Succesful."; 
              header("location: ../homepage.php");

          } else {
            $_SESSION['error'] = "Sorry an error occured. Try resubmitting the form."; 
            header("location: ../homepage.php");

          }
        } else {
            $_SESSION['error'] = "Sorry an error occured during file uploading. Try resubmitting the form."; 
            header("location: ../homepage.php");
        }
      }
    }
    else {
          $id = $_SESSION['user_id'];
          $query = "UPDATE `accounts` SET `username`='$username',`firstName`='$firstName',`lastName`='$lastName',`email`='$email',`password`='$password' WHERE id = $id ";
          $is_uploaded = $mysqli->query($query);
          if ($is_uploaded) {
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['success'] = "Update Succesful."; 
            header("location: ../homepage.php");

          } else {
            $_SESSION['error'] = "Sorry an error occured. Try resubmitting the form."; 
            header("location: ../homepage.php");

          }

      }
  }
}
$_POST = array();
$mysqli -> close();



?>