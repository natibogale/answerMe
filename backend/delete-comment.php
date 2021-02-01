<?php
session_start();
if(!$_SESSION['username'])
{
    header("location: ../index.php");
}
include('database.php');

$id=$_GET['id'];
$mysqli->query("DELETE FROM answers WHERE id=$id");
$_SESSION['success'] = "Comment deleted succesfully";
header('location: ../question-detail.php?$question_id='.$_GET['q_id']);

$mysqli -> close();
?>
