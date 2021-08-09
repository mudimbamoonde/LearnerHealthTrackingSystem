<?php
  session_start();
  if(isset($_SESSION['id'])){
      header('Location:index.php');
  }
  ?>  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>LHTS:Login</title>
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
  <div class="container">
      
      <div class=" col-md-8 bg-light p-5 rounded">
     
        <div align="center">
        <h1 class="text-success">Learner Health Tracking System</h1>
        <h4 class="text-danger">Login</h4>
        </div>
        

        <?php 
         if(isset($_POST['Login'])){
           require_once "include/config.php";
           $email = $_POST['email'];
           $password = md5($_POST['password']);

           $sql = "SELECT*FROM user WHERE email=? AND password=?";
           $stmt = $con->prepare($sql);
           $stmt->bindValue(1,$email);
           $stmt->bindValue(2,$password);
           $stmt->execute();
            if($stmt->rowCount() > 0){
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                session_start();
                $_SESSION["id"] = $row->ID;
                $_SESSION["firstName"] = $row->firstName;
                $_SESSION["surname"] = $row->surname;
                $_SESSION["email"] = $row->email;
                $_SESSION["mobile"] = $row->mobile;
                header("Location:index.php");
            }else{
                echo "<div class='alert alert-danger'>Username/Password</div>";
            }
        
         }
        
        ?>
        <form method="post" style="margin-left:100px">
            <div class="row">
                <div class="col-md-10">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"  require>
                </div>
        
            </div>
            <div class="row">

                <div class="col-md-10">
                    <label for="password">Password </label>
                    <input type="password" class="form-control" name="password" id="password" require>
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="col-md-6">
                     <input type="submit" class="btn btn-lg btn-danger" name="Login" value="Login"> 
                </div>
               
            </div>

        </form>

          
      
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
