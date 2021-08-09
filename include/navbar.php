  <!-- <div class="container"> -->
  <?php
  session_start();
  if(!isset($_SESSION['id'])){
      header('Location:logout.php');
  }
  ?>  
  <nav class="navbar navbar-expand-lg navbar-dark bg-success" aria-label="Tenth navbar example">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Learner Health Tracking </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Manage Learner</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown08">
                <li><a class="dropdown-item" href="addLearner.php">Add Learner</a></li>
                <li><a class="dropdown-item" href="addGuardian.php">Add Guardian</a></li>
                <li><a class="dropdown-item" href="manage_learner.php">View Learner</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Screening</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown08">
                <li><a class="dropdown-item" href="start_screening.php">Start Screening</a></li>
                <!-- <li><a class="dropdown-item" href="#">View Learner Statistics</a></li> -->
                <li><a class="dropdown-item" href="manage_screenedlearners.php">Manage Screening</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Lesson Plan</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown08">
                <li><a class="dropdown-item" href="addLesson.php">Add Lesson</a></li>
                <li><a class="dropdown-item" href="manage_lessons.php">Manage Lessons</a></li>
                </ul>
            </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Users</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown08">
                <li><a class="dropdown-item" href="addUser.php">Add User</a></li>
                <li><a class="dropdown-item" href="manage_users.php">Manage Users</a></li>

                </ul>
            </li>
            </ul>
         
        </div>
        <a href="logout.php" class="text-white pull-right"><?php echo $_SESSION["firstName"] ?> ( Logout )</a>
        </div>
    </nav>
  <!-- </div> -->

  