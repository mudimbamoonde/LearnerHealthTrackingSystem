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
<?php 
if (isset($_POST["saveLessonPlanData"])) {
  require_once "include/config.php";
  $up = $con->prepare("UPDATE lessonplan SET NumberOfLearners=? WHERE lessonID=?");
  $up->bindValue(1,$_POST["NumberOfLearners"]);
  $up->bindValue(2,$_GET["vip"]);
  $up->execute();

  for ($i=0; $i<$_POST["NumberOfLearners"];  $i++){
   
    $stmt = $con->prepare("INSERT INTO lessonplansignup(signupID,learnerID,lessonID) VALUES(?,?,?)");
    $stmt->bindValue(1, null);
    $stmt->bindValue(2, $_POST["learnerID"][$i]);
    $stmt->bindValue(3, $_GET["vip"]);

    if ($stmt->execute()) {
        echo "Lesson Plan Successfull Set";
    } else {
        echo "Failed to Set";
    }

  }
    
}
?>
  <div class="container">
      <div class="bg-light p-5 rounded">
        <div class="col-lg-12 mx-auto">
        <h1 class="card-heading">Manage Lesson Plans</h1>
      
    <hr>
          
          <form method="post">
              <?php 
                    require_once "include/config.php";
            
                        $search = $con->prepare("SELECT*FROM learner");
                        $search->execute();
                        if ($search->rowCount() < $_POST["NumberOfLearners"]) {
                            echo "<div class='alert alert-warning'>The Number of Learners in Attendance are more than the Learners in record.<br> Please Register the Learners and try again!</div>";
                        
                        }else{
                            echo "<Label><b>Learner FullName</b></Label><br>";
                        
                            for($i=0; $i<=$_POST["NumberOfLearners"]; $i++){
                            
                              echo '<input type="hidden" name="NumberOfLearners" value="'.$_POST["NumberOfLearners"].'"/>';
                                    
                                      while ($row = $search->fetch(PDO::FETCH_OBJ)) {
                                        echo '<select name="learnerID[]" class="form-control">
                                         <option>SELECT LEARNER</option>
                                         <option value="'.$row->learnerID.'">'.$row->fname." ".$row->lname.'</option>
                                      </select><br>';
                                      }

                                  
                                      
                             
                            }

                            echo '<br><input type="submit" name="saveLessonPlanData" class="btn btn-info"value="Submit"/>';
                        }

                       
                     
                    ?>
                   
                  </form>
                  
        
        </div>
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>