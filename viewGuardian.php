<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:View Guardian</title>
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
        <h1 class="text-danger">Guardian File</h1>
        <hr>
          <?php 
                    require_once "include/config.php";
                     if(isset($_GET['id'])){
                         
                         $search = $con->prepare("SELECT*FROM learner INNER JOIN guardian ON learner.learnerID = guardian.learnerID WHERE learner.learnerID=?");
                         $search->bindValue(1,$_GET["id"]);
                         $search->execute();
                         if ($search->rowCount()> 0) {
                             $row = $search->fetch(PDO::FETCH_OBJ);
                             echo ' <input type="text" class="form-control" disabled value="'.$row->firstName.' '. $row->lastName.'">';
                             echo ' <input type="text" class="form-control" disabled value="Address: '.$row->Address.'">';
                             echo ' <input type="text" class="form-control" disabled value="Contact: '.$row->contactNumber.'">';
                         }else{
                           echo "<p class='text-dark'>No None Guardian for this Learner <a href='addGuardian.php?id=".$_GET['id']."' class='btn btn-sm btn-primary'>Add Guardian</a></p>";
                         }
                         
                      
                    }
                   
                    ?>
                    <table class="table">
                      <thead>
                        <tr>
                            <th>LearnerID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date Of Birth</th>
                            <th>Grade</th>
                            <th>Sex</th>
                            <th>Address</th>
                        </tr>
                    </thead>
              <tbody>
              <?php 
                    require_once "include/config.php";
            
                        $search = $con->prepare("SELECT*FROM learner WHERE learner.learnerID=?");
                        $search->bindValue(1,$_GET["id"]);
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
                                <td>'.$row->Address.'</td>
                            
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
