<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:Add Guardian</title>
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
        <h1>Add Guardian</h1>
        <?php 
         if(isset($_POST['saveGuardian'])){
           try{

            require_once "include/config.php";
           $fname = $_POST['fname'];
           $lname = $_POST['lname'];
           $contactno = $_POST['contactno'];
           $learnerid = $_POST['learnerid'];
           $address = $_POST['address'];
           $sql = "INSERT INTO guardian (guardianID,firstName,lastName,contactNumber,Address,learnerID) VALUES (?,?,?,?,?,?)";
           $stmt = $con->prepare($sql);
           $stmt->bindValue(1,null);
           $stmt->bindValue(2,$fname);
           $stmt->bindValue(3,$lname);
           $stmt->bindValue(4,$contactno);
           $stmt->bindValue(5,$address);
           $stmt->bindValue(6,$learnerid);
           
          
           if($stmt->execute()){
            // echo  $con->lastInsertId();
             echo "<div class='alert alert-success'>Successfully Added </div>";
           }else{
            echo "<div class='alert alert-danger'>Failed to Add Guardian </div>".$e->getMessage();
           }

           }catch(Exception $e){
              echo "<div class='alert alert-danger'>Failed to Add Guardian </div>".$e->getMessage();
           }
           
         

         }
        
        ?>
        <form method="post">
            <div class="row">
                <div class="col-md-5">
                <label for="learnerid">Learner Name</label>
                    <?php 
                    require_once "include/config.php";
                     if(isset($_GET['id'])){
                         
                         $search = $con->prepare("SELECT*FROM learner WHERE learnerID=?");
                         $search->bindValue(1,$_GET["id"]);
                         $search->execute();
                         $row = $search->fetch(PDO::FETCH_OBJ);
                         echo ' <input type="text" class="form-control" disabled value="'.$row->fname.' '. $row->lname.'">';
                         echo ' <input type="hidden" class="form-control" name="learnerid" id="learnerid" value="'.$row->learnerID.'">';
                    }else{
                        $search = $con->prepare("SELECT*FROM learner WHERE learnerID");
                        $search->execute();
                        echo "<select name='learnerid' id='learnerid' class='form-control'>";
                        echo "<option>SELECT LEARNER</option>";
                        while($row = $search->fetch(PDO::FETCH_OBJ)){
                            echo '<option value="'.$row->learnerID.'">'.$row->fname." ".$row->lname.'</option>';
                        }
                        echo "</select>";
                    }

                    
                    ?>

            
                    </div>
            </div>
            <br>
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
                    <label for="contactno">Contact Number</label>
                    <input type="text" class="form-control" name="contactno" id="contactno" require>
                </div>
                <div class="col-md-5">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                </div>
            </div>
            
            <br>
            <div class="row">
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary" name="saveGuardian" value="Save Guardian"> 
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
