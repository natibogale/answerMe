<?php
session_start();

if (!$_SESSION['username']) {
    header("location:index.php");
}


include 'backend/database.php';

if (isset($_POST['post_question'])) {


        $author = $_SESSION['username'];
    

    $question = $mysqli -> real_escape_string($_POST['question']);
    $category = $_POST['category'];

    $unique_id = uniqid();
    $author_id = $_SESSION['user_id'];


        if (!empty($_POST['anonymous'])) {
            $anonymous = "yes";
        } else {
            $anonymous = "no";
        }

        $query = "INSERT INTO `questions`(`author`,`author_id`, `question`,`unique_id`,`category`,`anonymous`) VALUES ('$author','$author_id','$question','$unique_id','$category','$anonymous')";
        $is_posted = $mysqli->query($query);

        if ($is_posted) {
            $_SESSION['success'] = "Question succesfully posted. Wait for answers.";
            header("location:homepage.php");
        } else {
            $_SESSION['error'] = "Unknown error occurred. Try again.";
            header("location:homepage.php");

        }
    
}
   

if (isset($_POST['comment_button'])) {

    $author = $mysqli -> real_escape_string ($_POST['commenter']);
    $unique_id = $mysqli -> real_escape_string( $_POST['unique_id']);
    $answer =$mysqli -> real_escape_string($_POST['comment']);
    $question =$mysqli -> real_escape_string($_POST['question']);

    $who = $_SESSION['username'];
    $query = "INSERT INTO `answers`(`question`,`unique_id`, `answer`, `author`,`who`) VALUES ('$question','$unique_id','$answer','$author','$who')";
    $is_posted = $mysqli->query($query);
    if ($is_posted) {

        $_SESSION['success'] = "Answer succesfully given. Thanks for helping the person.";
        if(isset($_GET['q_id']))
        {
            $q_id = $_GET['q_id'];
            header('location:question-detail.php?$question_id='.$_GET['q_id']);

        }
        else {
            header("location:homepage.php");
        }
        

    } else {
        $_SESSION['error'] = "Unknown error occurred. Try again.";
        header("location:homepage.php");
    }
}




$mysqli -> close();
$_POST = array();

?>