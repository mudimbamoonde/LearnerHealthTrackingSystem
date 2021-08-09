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
  <div class="container">
      <div class="bg-light p-5 rounded">
        <div class="col-lg-12 mx-auto">
        <h1 class="card-heading">Manage Users</h1>
      
    <hr>
          <table class="table">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Surname</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              <?php 
                    require_once "include/config.php";
            
                        $search = $con->prepare("SELECT*FROM user");
                        $search->execute();
                        if ($search->rowCount() > 0) {
                            while ($row = $search->fetch(PDO::FETCH_OBJ)) {
                                echo '<tr><td>'.$row->ID.'</td>
                                <td>'.$row->firstName.'</td>
                                <td>'.$row->surname.'</td>
                                <td>'.$row->email.'</td>
                                <td>'.$row->mobile.'</td>
        
                                <td><a href="" class="btn btn-sm btn-danger">Delete</a> | <a href="" class="btn btn-sm btn-success">Edit</a> </td></tr>';
                            }
                        }else{
                            echo '<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>No Data</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>';
                        }
                     
                    ?>
                  
              </tbody>
          </table>
        </div>
      </div>
  </div>
</main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
