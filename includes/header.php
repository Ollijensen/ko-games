<?php require('includes/db.php');?>
 <?php
$output = "";
/* tester knappen */
if(isset($_POST['submit'])){

    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    /* kryptering */
    $salt = "kpwdjfbgpkajhrgoåihargåouh¨028g" . $pass . "kjshdgflkjhsdæfgkjh";
    

    $hashed = hash('sha512', $salt);

    $sql = "SELECT * FROM login WHERE user = '$userName' AND pass = '$hashed'"; 
//tester selection
    $result = mysqli_query($conn, $sql) or die("Query virker ikke!: " . $sql); 
//sessions oprettet
    if(mysqli_num_rows($result) == 1){
      session_start(); 

      header("location:games.php");

      $_SESSION['user'] = $userName;
      $_SESSION['adgang'] = true;
 
   /* outputs test på login */     
/*  $output = "Du er logget ind";
    }else{
     $output = "Forkert login";  */
    }

}

?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Games</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
  </head>

<body>

<?php session_start();
if (isset($_SESSION['adgang']) == true) { // Vores navbar hvis man er logged ind og har en aktiv session
    echo " 
    
    
    <nav class='navbar navbar-expand-lg sticky-top navbar-fixed-top'>
                <a class='navbar-brand' href='index.php'><img src='images/kogames-logo-hvid.png' height='75px' width='75px' alt='kogames logo' class='d-inline-block align-top img-fluid'></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                  <span class='navbar-toggler-icon'>
                  </span>
                  <img class='img-fluid burger' width='50px' height='50px' src='images/burger-white.png' alt='månenav'>
                </button>
                <div class='collapse navbar-collapse' id='navbarNav'>

    <ul class='navbar-nav mr-auto'>
    <li class='nav-item'>
      <a class='nav-link nav-text' href='index.php'>Home</a>
    </li>
    <li class='nav-item'>
                       <a class='nav-link nav-text' href='games.php'>Games</a>
                    </li>
    <li class='nav-item'>
                    <a class='nav-link nav-text' href='profile.php'>Profile</a>
                    </li>
     </ul>  
    <a href='logout.php' class='btn'><button class='mb-2 btn btn-outline-success my-2 my-sm-0 d-flex justify-content-end' role='button' aria-pressed='true'>Logout</button></a>
  
    </div>
</nav>
    ";
} else { // Navbar hvis man ikke er logget ind
    echo "
    
    <nav class='navbar navbar-expand-lg sticky-top navbar-fixed-top'>
    <a class='navbar-brand' href='index.php'><img src='images/kogames-logo-hvid.png' height='75px' width='75px' alt='kogames logo' class='d-inline-block align-top img-fluid'></a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'>
      </span>
      <img class='img-fluid burger' width='50px' height='50px' src='images/burger-white.png' alt='månenav'>
    </button>
    <div class='collapse navbar-collapse' id='navbarNav'>

    <ul class='navbar-nav mr-auto'>
    <li class='nav-item'>
      <a class='nav-link nav-text' href='index.php'>Home</a>
    </li>
    </ul>

  

    
      <form class='form-inline' action='index.php' method='POST'>
        
          <label class='float-left' for='username'></label>
            <input placeholder='Username' type='text' class='form-control mr-sm-2' name='username' id='username' aria-label='Username'>
    
            <label class='float-left' for='password'></label>
            <input placeholder='Password' type='password' class='form-control mt-1 mt-sm-0 mr-sm-2' name='password' id='password' aria-label='Password'>
   
            <button name='submit' type='submit' id='sendlogin' class='btn btn-outline-success my-2 my-0 mr-md-3 mr-sm-4 mr-lg-2'>Login</button>
            <a href='registrer.php' class='btn btn-outline-success ml-2 my-2 my-sm-0 mr-sm-2' role='button' aria-pressed='true'>Register</a>
    
      </form>
      </div>
      </nav>


    ";
    
} ?> 

              
              