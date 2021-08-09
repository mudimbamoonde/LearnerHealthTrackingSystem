<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:Start Screening</title>
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
        <h1 class="text-danger">Start Screening</h1>
        <hr>
        <?php 
        require_once "include/config.php";
         if(isset($_POST['saveScreening'])){
           
           $doe = $_POST['doe'];
           $nameoflearner = $_POST['nameoflearner'];
           $thinkmd = $_POST['thinkmd'];
           $medicalsupplies = $_POST['medicalsupplies'];
           $referred = $_POST['referred'];
           $followupdate = $_POST['followupdate'];
           $clinicdiagnosis = $_POST['clinicdiagnosis'];

           $sql = "INSERT INTO screeningregistry(ScreeningID,LearnerID,thinkMDSuspectedDiagnosis,MedicationSupplied,referred,FollowUpDate,ClinicDiagnosis) VALUES(?,?,?,?,?,?,?)";
           $stmt = $con->prepare($sql);
           $stmt->bindValue(1,null);
           $stmt->bindValue(2,$nameoflearner);
           $stmt->bindValue(3,$thinkmd);
           $stmt->bindValue(4,$medicalsupplies);
           $stmt->bindValue(5,$referred);
           $stmt->bindValue(6,$followupdate);
           $stmt->bindValue(7,$clinicdiagnosis);
    
          
           if($stmt->execute()){
            $lastID =  $con->lastInsertId();
             echo "<div class='alert alert-success'>Screening Successfully Completed</div>";
           }else{
            echo "<div class='alert alert-danger'>Failed to Screen Learner</div>";

           }
         

         }
        
        ?>
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="doe">Date of Exam dd/mm/yyy</label>
                    <input type="date" class="form-control" name="doe" id="doe" placeholder="Enter Date of Exam dd/mm/yyy">
                </div>
                <div class="col-md-6">
                    <label for="nameoflearner">Name of Learner </label>
                   <?php 
                    $search = $con->prepare("SELECT*FROM learner WHERE learnerID");
                    $search->execute();
                    echo "<select name='nameoflearner' id='nameoflearner' class='form-control'>";
                    echo "<option>SELECT LEARNER</option>";
                    while($row = $search->fetch(PDO::FETCH_OBJ)){
                        echo '<option value="'.$row->learnerID.'">'.$row->fname." ".$row->lname.'</option>';
                    }
                    echo "</select>";

                   ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="thinkmd">ThinkMD Suspected Diagnosis</label>
                    <input type="text" class="form-control" name="thinkmd" id="thinkmd" require>
                </div>
            
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="medicalsupplies">Medication Supplied List the medications or supplies you gave the child or guardian</label>
                    <textarea class="form-control" name="medicalsupplies" id="medicalsupplies"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="referred">Referred</label>
                   <select class="form-control" name="referred" id="referred">
                       <option value="Y">Yes</option>
                       <option value="N">No</option>
                    </select>
                </div>
               
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="followupdate">Follow-Up Date</label>
                    <input type="date" class="form-control" name="followupdate" id="followupdate"/>
                </div>

                <div class="col-md-6">
                    <label for="clinicdiagnosis">Clinic Diagnosis</label>
                    <textarea name="clinicdiagnosis" id="clinicdiagnosis" class="form-control"></textarea>
                </div>
            </div>
            <br>

            <br>
            <div class="row">
                <div class="col-md-6">
                     <input type="submit" class="btn btn-primary" name="saveScreening" value="Save"> 
                </div>
              
            </div>

        </form>
    
          
          </p>
        </div>
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
