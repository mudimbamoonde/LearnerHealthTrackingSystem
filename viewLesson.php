<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:View Lesson Plan</title>
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
        <div class="text-center">
            <h2>HEALTHY LEARNERS</h2>
            <h4>HEALTH EDUCATION LESSON PLAN</h4>
        </div>
        <hr>
          <?php 
                    require_once "include/config.php";
                     if(isset($_GET['id'])){
                         
                         $search = $con->prepare("SELECT*FROM lessonplan WHERE lessonplan.lessonID=?");
                         $search->bindValue(1,$_GET["id"]);
                         $search->execute();

                             $row = $search->fetch(PDO::FETCH_OBJ);
                            echo "<p><b>DURATION (HOURS)</b>: ".$row->duration." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date</b>: ".$row->dateRecorded."</p>";
                            echo "<p><b>GRADE(s)</b>: ".$row->grade."</p>";
                            echo "<p><b>HEALTH TOPIC</b>: ".$row->healthtopic."</p>";
                            echo "<p><b>SUB-TOPIC</b>: ".$row->subtopic."</p>";
                            echo "<p><b>OBJECTIVES</b>: ".$row->Objective."</p>";
                            echo "<p><b>KEY MESSAGES</b>: ".$row->keyMessage."</p>";
                            echo "<p><b>TEACHING METHOD</b>: ".$row->TeachingMethod."</p>";
                            echo "<p><b>EVALUATION METHOD</b>: ".$row->EvaluationMethod."</p>";
                            echo "<p><b>TOTAL # OF PUPILS IN ATTENDANCE</b>: ".$row->NumberOfLearners."</p>";
                    }
                    ?>
                    <p><br></p>
                    <table class="table">
                      <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Sex</th>
                            <th>Signature</th>
                        </tr>
                    </thead>
              <tbody>
              <?php 
                    require_once "include/config.php";
            
                        $search = $con->prepare("SELECT*FROM learner INNER JOIN lessonplansignup ON lessonplansignup.learnerID = learner.learnerID WHERE lessonplansignup.lessonID=?");
                        $search->bindValue(1,$_GET["id"]);
                        $search->execute();
                        if ($search->rowCount() > 0) {
                            $n = 0;
                            while ($row = $search->fetch(PDO::FETCH_OBJ)) {
                                $n++;
                                echo '<tr>
                                <td>'.$n.'</td>
                                <td>'.$row->fname.'</td>
                                <td>'.$row->lname.'</td>
                                <td>'.$row->sex.'</td>
                                <td></td>
                            
                               </tr>';
                            }
                        }else{
                            echo '<tr>
                            <td></td>
                            <td>
                            <form action="evaluate_addLearner.php?vip='.$_GET["id"].'" method="post">
                              <input type="number" name="NumberOfLearners" class="form-control" placeholder="Enter the Number of Learners"/>
                              <input type="hidden" name="lessonplanID" value='.$_GET["id"].'><br>
                             <input type="submit" name="Submit" class="btn btn-danger" value="Add Learners"/>
                              </form></td>
                            <td></td>
                            <td></td>
                     
                           </tr>';
                        }
                     
                    ?>
                  
              </tbody>
          </table>
                    
          
          </p>
        </div>
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
