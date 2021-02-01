




  <?php
  if (isset($_SESSION['username'])) {

  ?>


    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
      <a class="navbar-brand " href="homepage.php">
        <svg xmlns="http://www.w3.org/2000/svg" class="d-inline-block mb-1" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false">
          <title>Product</title>
          <circle cx="12" cy="12" r="10" />
          <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
        </svg>

        Answer Me

      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my-questions.php">My questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?profile" tabindex="-1" data-toggle="modal" data-target="#profileModal">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?ask-a-question" tabindex="-1" data-toggle="modal" data-target="#questionModal">Ask a question</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a href="backend/logout.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Log out</button>
          </a>
        </form>
      </div>
    </nav>














  <?php
  } else {
  ?>



 




    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
      <a class="navbar-brand " href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" class="d-inline-block mb-1" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false">
          <title>Product</title>
          <circle cx="12" cy="12" r="10" />
          <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
        </svg>

        Answer Me

      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"  style="visibility:hidden;">
          <li class="nav-item ">
            <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my-questions.php">My questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?profile" tabindex="-1" data-toggle="modal" data-target="#profileModal">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?ask-a-question" tabindex="-1" data-toggle="modal" data-target="#questionModal">Ask a question</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#signupModal" type="button">Sign up</button>
          
        </form>
      </div>
    </nav>


  <?php

  }

  ?>






  <?php
  if (isset($_SESSION['success']) && $_SESSION['success']) {
  ?>


    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['success'] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>


  <?php


    $_SESSION['success'] = "";
  }



  if (isset($_SESSION['error']) && $_SESSION['error']) {
  ?>


    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['error'] ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

  <?php

    $_SESSION['error'] = "";
  }

require('modals/post-question-modal.php');
require('modals/update-profile-modal.php');

?>




 

