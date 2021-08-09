<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:SHT Learner Health Screening Registry</title>
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
  <div class="container-fluid">
      <div class="bg-light p-5 rounded">
        <div class="col-md-12 mx-auto">
        <h3 class="text-danger">SHT Learner Health Screening Registry</h3>
        <hr>
          <?php 
                    require_once "include/config.php";
                
                   
                    ?>
                    <table class="table table-sm">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Date of Exam</th>
                            <th>Name Of Learner</th>
                            <th>Date Of Birth</th>
                            <th>Grade</th>
                            <th>Sex</th>
                            <th>Guardian</th>
                            <th>Medication Supplied</th>
                            <th>Referred</th>
                            <th>Follow-Up Date</th>
                            <th>Clinic Diagnosis</th>
            
                        </tr>
                    </thead>
              <tbody>
              <?php 
                    require_once "include/config.php";
            
                        $search = $con->prepare("SELECT*FROM learner INNER JOIN  screeningregistry ON screeningregistry.learnerID = learner.learnerID LEFT JOIN guardian ON learner.learnerID = guardian.learnerID");
                
                        $search->execute();
                        if ($search->rowCount() > 0) {
                            while ($row = $search->fetch(PDO::FETCH_OBJ)) {
                                echo '<tr>
                                <td>'.$row->learnerID.'</td>
                                <td>'.$row->fname.'</td>
                                <td>'.$row->lname.'</td>
                                <td>'.$row->dob.'</td>
                                <td>'.$row->grade.'</td>
                                <td>'.$row->sex.'</td>
                                <td><a href="viewGuardian.php?id='.$row->guardianID.'" class="btn btn-sm btn-primary">View</a></td>
                                <td>'.$row->MedicationSupplied.'</td>
                                <td>'.$row->referred.'</td>
                                <td>'.$row->FollowUpDate.'</td>
                                <td>'.$row->ClinicDiagnosis.'</td>
                             
                            
                               </tr>';
                            }
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
