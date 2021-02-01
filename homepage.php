<?php
session_start();
if (isset($_SESSION['username'])) {
} else {
    header("Location:index.php");
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    require('head.php');

    ?>
</head>

<body style="background-color:#0a192f">

    <?php include "nav.php"; ?>


    <div class="container ">

        <div class="car text-center mt-4">
            
        <a href="homepage.php?category=all">    <span class="badge badge-dark mt-2  mr-4" style="padding: 10px;">All</span></a>

        <a href="homepage.php?category=technology">      <span class="badge badge-primary mt-2 mr-4" style="padding: 10px;">Technology</span></a>
        <a href="homepage.php?category=health" >     <span class="badge badge-secondary mt-2  mr-4" style="padding: 10px;">Health and Sciences</span></a>
        <a href="homepage.php?category=sports">      <span class="badge badge-success mt-2  mr-4" style="padding: 10px;">Sports and Life style</span></a>
        <a href="homepage.php?category=curiosity">      <span class="badge badge-danger mt-2  mr-4" style="padding: 10px;">Curiosity</span></a>
        <a href="homepage.php?category=society">      <span class="badge badge-warning mt-2  mr-4" style="padding: 10px;">Society</span></a>
        <a href="homepage.php?category=relation">     <span class="badge badge-info mt-2  mr-4" style="padding: 10px;">RelationShip</span></a>
        <a href="homepage.php?category=other">     <span class="badge badge-success mt-2  mr-4" style="padding: 10px;">Other</span></a>

        </div>








<?php
require('question-list.php');

?>






    </div>























    

    <?php
    require('foot.php');
    ?>
























</body>

</html>