<?php 

session_start();

include 'database.php';

if (isset($_POST['sign_up'])) {
  $username = $mysqli -> real_escape_string( $_POST['sign_up_username']);
  $firstName = $mysqli -> real_escape_string( $_POST['sign_up_firstName']);
  $lastName = $mysqli -> real_escape_string( $_POST['sign_up_lastName']);
  $password = $mysqli -> real_escape_string( $_POST['sign_up_password']);
  $cpassword = $mysqli -> real_escape_string( $_POST['sign_up_confirm_password']);
  // $picture=mysqli_real_escape_string($mysqli,$_POST['sign_up_picture']);
  $email = $mysqli -> real_escape_string( $_POST['sign_up_email']);

  $checkUsername = $mysqli->query("select username from accounts where userName='$username'");
  $checkEmail = $mysqli->query("select email from accounts where email='$email'");
  $row = $checkUsername->fetch_row();
  $row2 = $checkEmail->fetch_row();

  if ($row && $row2) {
   $_SESSION['error'] = "Username and Email already exists another one."; 
   header("location: ../index.php");
  } elseif ($row) {
    $_SESSION['error'] = "Username already exists another one."; 
    header("location: ../index.php");
  } elseif ($row2) {
    $_SESSION['error'] = "Email already exists another one."; 
    header("location: ../index.php");
  } elseif ($password != $cpassword) {
    $_SESSION['error'] = "Passwords do not match."; 
    header("location: ../index.php");
  } else {

    define("FILEREPOSITORY", "../images/");

    if (is_uploaded_file($_FILES['sign_up_picture']['tmp_name'])) {
      if ($_FILES['sign_up_picture']['type'] != "image/jpeg") {
$_SESSION['error'] = "Image must be of the type JPEG";
header("location: ../homepage.php");

      } else {
        $filename = uniqid() . ".jpg";
        $result = move_uploaded_file($_FILES['sign_up_picture']['tmp_name'], FILEREPOSITORY . $filename);
        if ($result == 1) {
          $picture = 'images/' . $filename;
          $query = "INSERT INTO `accounts`(`username`, `firstName`, `lastName`, `email`, `password`, `profilePicture`) VALUES ('$username','$firstName','$lastName','$email','$password','$picture')";
          $is_uploaded = $mysqli->query($query);
          if ($is_uploaded) {
            $_SESSION['success'] = "Registration Succesfull. Log in to continue."; 
            header("location: ../index.php");

          } else {
            $_SESSION['error'] = "Sorry an error occured. Try resubmitting the form."; 
            header("location: ../index.php");

          }
        } else {
            $_SESSION['error'] = "Sorry an error occured during file uploading. Try resubmitting the form."; 
            header("location: ../index.php");
        }
      }
    }
  }
}
$_POST = array();
$mysqli -> close();



?>