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

    <?php include "nav.php";
    ?>

    <div class="container mt-5">



<div class="card">

<div class="card-body">
<h2>My Questions</h2>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Question</th>
      <th scope="col">Date Asked</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
<?php 


    include('backend/my-questions-back.php');

?>

</tbody>
</table>
</div>

</div>



    <?php
    require('foot.php');
    ?>




</body>

</html>