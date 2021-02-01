<?php
session_start();
if(!$_SESSION['username'])
{
    header("location: ../index.php");
}
include('database.php');

$id=$_GET['id'];
$mysqli->query("DELETE FROM questions WHERE id=$id");
$_SESSION['success'] = "Question deleted succesfully";
header('location: ../my-questions.php');

$mysqli -> close();
?>
