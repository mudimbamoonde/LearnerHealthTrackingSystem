<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:Manage Learner</title>
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
        <div class="col-lg-12 mx-auto">
        <h1 class="card-heading">Manage Lesson Plans</h1>
      
    <hr>
          <table class="table">
              <thead>
                  <tr>
                      <th>LessonID</th>
                      <th>Duration</th>
                      <th>Date Recorded</th>
                      <th>Grade</th>
                      <th>Health Topic</th>
                      <th>SubTopic</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              <?php 
                    require_once "include/config.php";
            
                        $search = $con->prepare("SELECT*FROM lessonplan");
                        $search->execute();
                        if ($search->rowCount() > 0) {
                            while ($row = $search->fetch(PDO::FETCH_OBJ)) {
                                echo '<tr><td>'.$row->lessonID.'</td>
                                <td>'.$row->duration.'</td>
                                <td>'.$row->dateRecorded.'</td>
                                <td>'.$row->grade.'</td>
                                <td>'.$row->healthtopic.'</td>
                                <td>'.$row->subtopic.'</td>
                                <td><a href="viewLesson.php?id='.$row->lessonID.'" >view</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a> | <a href="" class="btn btn-sm btn-success">Edit</a> </td></tr>';
                            }
                        }
                     
                    ?>
                  
              </tbody>
          </table>
        </div>
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
