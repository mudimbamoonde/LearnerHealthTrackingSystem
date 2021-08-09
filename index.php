<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Learner Health Tracking System</title>
    <!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
  </head>
  <body>
    
<main>
<?php 
 include "include/navbar.php";
?>
  <div class="container">
      <div class="bg-light p-5 rounded">
        
        <div class="col-sm-8 mx-auto">
          <h5 class="text-uppercase">Hi, <span class="btn btn-danger badge"><?php echo $_SESSION["firstName"]." ". $_SESSION["surname"] ?> </span></h5>
        <h1>Learner Health Tracking System</h1>
          <p>It is necessary to understand the health challenges facing learners in Zambia before trying to solve them. This system provides you with information 
            and tools on these health challanges and the statistics, lesson plans for the learners.</p>
          <p>
            <strong>Learning Objectives</strong><br>
            This system helps to understand :
            <ul>
               <li>Health Challenges among Zambian school-aged children</li>
               <li>The barriers preventing learners from effectively accessing healthcare</li>
               <li>The Link between health and learning</li>
               <li>The concept and benefits of the school health</li>
            </ul>
          </p>
          <p>
            <a class="btn btn-primary" href="addLesson.php" role="button">Start Lesson Planning &raquo;</a>
          </p>
         
          <p>Design and Developed by Justina SIN#</p>
        </div>
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
