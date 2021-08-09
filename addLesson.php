<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:Add Lesson Plan</title>
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
        <div class="col-sm-12 mx-auto">
        <h1 class="text-danger">Add Lesson Plan</h1>
        <hr>
        <?php 
         if(isset($_POST['saveLessonPlan'])){
           require_once "include/config.php";
           $duration = $_POST['duration'];
           $daterecord = $_POST['daterecord'];
           $htopic = $_POST['htopic'];
           $stopic = $_POST['stopic'];
           $grade = $_POST['grade'];
           $objectives = $_POST['objectives'];
           $keymessages = $_POST['keymessages'];
           $tmethod = $_POST['tmethod'];
           $emethod = $_POST['emethod'];

           $sql = "INSERT INTO lessonplan (lessonID,duration,dateRecorded,grade,healthtopic,subtopic,Objective,keyMessage,TeachingMethod,EvaluationMethod) VALUES (?,?,?,?,?,?,?,?,?,?)";
           $stmt = $con->prepare($sql);
           $stmt->bindValue(1,null);
           $stmt->bindValue(2,$duration);
           $stmt->bindValue(3,$daterecord);
           $stmt->bindValue(4,$grade);
           $stmt->bindValue(5,$htopic);
           $stmt->bindValue(6,$stopic);
           $stmt->bindValue(7,$objectives);
           $stmt->bindValue(8,$keymessages);
           $stmt->bindValue(9,$tmethod);
           $stmt->bindValue(10,$emethod);
    
          
           if($stmt->execute()){
            $lastID =  $con->lastInsertId();
             echo "<div class='alert alert-success'>Successfully Added</div>";
           }else{
            echo "<div class='alert alert-danger'>Failed to Add Lesson Plan</div>";

           }
         

         }
        
        ?>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="duration">Duration(Hours)</label>
                    <input type="text" class="form-control" name="duration" id="duration" placeholder="Duration in Hours " require>
                </div>
                <div class="col-md-6">
                    <label for="daterecord">Date </label>
                    <input type="date" class="form-control" name="daterecord" id="daterecord" require>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="grade">Grade</label>
                    <input type="text" class="form-control" name="grade" id="grade" placeholder="Enter Grade " require>
                </div>
            
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="htopic">Health Topic</label>
                    <input type="text" class="form-control" name="htopic" id="htopic" placeholder="Enter Health Topic" require>
                </div>
                <div class="col-md-6">
                    <label for="stopic">Sub-Topic</label>
                    <input type="text" class="form-control" name="stopic" id="stopic" placeholder="Enter Sub-Topic" require>
                </div>
               
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="objectives">Objectives</label>
                    <textarea name="objectives" id="objectives" class="form-control"></textarea>
                </div>

                <div class="col-md-6">
                    <label for="keymessages">Key Messages</label>
                    <textarea name="keymessages" id="keymessages" class="form-control"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="tmethod">Teaching Method</label>
                    <input type="text" class="form-control" name="tmethod" id="tmethod" placeholder="Enter Teaching Method" required>
                </div>

                <div class="col-md-6">
                    <label for="emethod">Evaluation Method</label>
                    <input type="text" class="form-control" name="emethod" id="emethod" placeholder="Enter Evaluation Method" require>
                </div>
            </div>
            <br>
            <!-- <div class="row">
                <div class="col-md-6">
                    <label for="tattendance">Learners in Attendance</label>
                    <input type="text" class="form-control" name="tattendance" id="tattendance" placeholder="Total Number# of Learners in Attendance " require>
                </div>
            </div> -->
            <!-- <br> -->
            <!-- <div class="row">
                <div class="col-md-12">
                   <table class="table table-responsive">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>First Name</th>
                               <th>SURNAME</th>
                               <th>SEX</th>
                               <th>SIGNATURE</th>
                               <th><a href="javascript:void(0)" class="btn btn-sm btn-success" id="addLearners"><span class="fs-5 text">+</span>Add Learner</a></th>
                           </tr>
                           <tbody class="addtr">
                               
                           </tbody>
                       </thead>
                   </table>
                </div>
            </div> -->
            <br>
            <div class="row">
                <div class="col-md-6">
                     <input type="submit" class="btn btn-primary" name="saveLessonPlan" value="Save"> 
                </div>
                <!-- <div class="col-md-4">
                     <a class="btn btn-warning" href="#" role="button">Add Guardian</a> 
                </div> -->
            </div>

        </form>
        <script>
           const addLearner = document.getElementById("addLearners");
           addLearner.addEventListener('click', function(){
               //Create Table row
               const tr =document.createElement("tr");
               const dat = document.createTextNode("John");
               
               const td =document.createElement("td");
               tr.appendChild(td);
              
               td.appendChild(dat);
               console.log(td);

              var ele =  document.getElementById("addtr");
            

           });
        </script>
          
          
          </p>
        </div>
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
