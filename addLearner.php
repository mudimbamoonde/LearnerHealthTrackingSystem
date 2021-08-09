<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:Add Learner</title>
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
        <h1>Add Learner</h1>
        <?php 
         if(isset($_POST['saveLearner'])){
           require_once "include/config.php";
           $fname = $_POST['fname'];
           $lname = $_POST['lname'];
           $dob = $_POST['dob'];
           $grade = $_POST['grade'];
           $sex = $_POST['sex'];
           $chronic = $_POST['chronic'];
           $address = $_POST['address'];

           $sql = "INSERT INTO learner (learnerID,fname,lname,dob,grade,sex,chronic,Address) VALUES (?,?,?,?,?,?,?,?)";
           $stmt = $con->prepare($sql);
           $stmt->bindValue(1,null);
           $stmt->bindValue(2,$fname);
           $stmt->bindValue(3,$lname);
           $stmt->bindValue(4,$dob);
           $stmt->bindValue(5,$grade);
           $stmt->bindValue(6,$sex);
           $stmt->bindValue(7,$chronic);
           $stmt->bindValue(8,$address);
           
          
           if($stmt->execute()){
            $lastID =  $con->lastInsertId();
             echo "<div class='alert alert-success'>Successfully Added <a href='addGuardian.php?id=".$lastID."' class='btn btn-warning'>Click Here</a> to  ADD Guardian</div>";
           }else{
            echo "<div class='alert alert-danger'>Failed to Add Learner</div>";

           }
         

         }
        
        ?>
        <form method="post">
            <div class="row">
                <div class="col-md-5">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" require>
                </div>
                <div class="col-md-5">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" require>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" require>
                </div>
                <div class="col-md-5">
                    <label for="grade">Grade</label>
                    <select class="form-control" name="grade" id="grade" require>
                        <option selected disabled>SELECT GRADE</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <label for="sex">Sex</label>
                    <select class="form-control" name="sex" id="sex" require>
                        <option selected disabled>SELECT SEX</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <label for="sex">Chronic Ills</label>
                    <select class="form-control" name="chronic" id="chronic" require>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary" name="saveLearner" value="Save Learner"> 
                </div>
                <!-- <div class="col-md-4">
                     <a class="btn btn-warning" href="#" role="button">Add Guardian</a> 
                </div> -->
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
