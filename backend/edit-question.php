<?php



if (!$_SESSION['username']) {
    header("location: ../index.php");
}
include 'database.php';

if (isset($_POST['update_question'])) {


    $question = $mysqli -> real_escape_string($_POST['question']);
$id = $mysqli -> real_escape_string($_POST['id']);
        if (!empty($_POST['anonymous'])) {
            $anonymous = "yes";
        } else {
            $anonymous = "no";
        }

        $query = "UPDATE `questions` SET `question`='$question' ,`anonymous`='$anonymous' WHERE id = $id";
        $is_posted = $mysqli->query($query);

        if ($is_posted) {
            $_SESSION['success'] = "Question edited succesfully";
header('location: ../my-questions.php');

        } else {
            $_SESSION['error'] = "Unknown error occurred. Try again.";
            header("location: ../my-questions.php");

        }
    
}


?>