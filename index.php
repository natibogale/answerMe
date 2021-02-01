<!doctype html>
<html lang="en">

<head>


  <?php

  session_start();
  require('head.php');

  if (isset($_SESSION['username']) && $_SESSION['username']) {
    header("location:homepage.php");
  }
  
  ?>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>

<body  style="background-color:#0a192f;">

  <?php
  require('nav.php');

  ?>




  <div class="position-relative overflow-hidden  p-3 p-md-5 m-md-3 text-center " style="color: wheat;" >
    <div class="col-md-5 p-lg-5  mx-auto my-5">
      <h1 class="display-4 font-weight-normal " >Answer Me</h1>
      <p class="lead font-weight-normal"> is a place to gain and share knowledge. It's a platform to ask questions and connect with people who contribute unique insights and quality answers.</p>
      <a class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal" type="button" href="">Log in</a>
    </div>


  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Technology</h2>
        <p class="lead">This platform offers different categorical questions</p>
      </div>

      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">

    </div>
    

    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Health and Sciences</h2>
        <p class="lead">You can ask and answer anonumously if you wish</p>
      </div>
      <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Relationships</h2>
        <p class="lead">Get answers and advices from the community</p>
      </div>
      <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Curious</h2>
        <p class="lead">Are you feeling curious, then join us </p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
  </div>




  <?php 
    require('modals/login-modal.php');
  require('modals/signup-modal.php'); 
  require('foot.php') ?>

</html>