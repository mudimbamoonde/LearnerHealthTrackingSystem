<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:Add User</title>
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
        <h1>Add User</h1>
        <?php 
         if(isset($_POST['saveLearner'])){
           require_once "include/config.php";
           $fname = $_POST['fname'];
           $lname = $_POST['lname'];
           $email = $_POST['email'];
           $mobile = $_POST['mobile'];
           $password = $_POST['password'];
           $conpassword = $_POST['conpassword'];

           $validate = $con->prepare("SELECT*FROM user WHERE email=?");
           $validate->bindValue("email",$email);
           if($validate->rowCount() > 0 ){
            echo "<div class='alert alert-danger'>Account Already Exist!!</div>";
           }else{

            if ($password == $conpassword) {
                $hashedpassword = md5($password);
           
                $sql = "INSERT INTO user (ID,firstName,surname,email,mobile,password) VALUES (?,?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(1, null);
                $stmt->bindValue(2, $fname);
                $stmt->bindValue(3, $lname);
                $stmt->bindValue(4, $email);
                $stmt->bindValue(5, $mobile);
                $stmt->bindValue(6, $hashedpassword);
                if($stmt->execute()){
                    $lastID =  $con->lastInsertId();
                     echo "<div class='alert alert-success'>Account Successfully Created</div>";
                   }else{
                    echo "<div class='alert alert-danger'>Failed to Add users</div>";
        
                   }

            }else{
                echo "<div class='alert alert-danger'>Password does not match!!</div>";
            }

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
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" require>
                </div>
                <div class="col-md-5">
                    <label for="mobile">Mobile</label>
                    <input type="tel" class="form-control" name="mobile" id="mobile" require>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" require>
                </div>
                <div class="col-md-5">
                    <label for="conpassword">Confirm Password</label>
                    <input type="password" class="form-control" name="conpassword" id="conpassword" require>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                     <input type="submit" class="btn btn-warning" name="saveLearner" value="Save User"> 
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
