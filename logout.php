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
      
<!-- PHP Session slut, logud, videresend efter 5 sek -->
<?php
session_start();
session_destroy();
header( "refresh:6;url=index.php" );
?>

<!-- HTML -->
<div class="container">
    <div class="row mt-5 d-flex justify-content-center">
        <div class="col-8 col-lg-6 mt-5">

<h2 class="text-white text-center"> You have been logged out</h2>
<div class="d-flex justify-content-center"> <button class='btn btn-outline-success'><a class="text-white text-center nav-item d-flex" href="index.php">Go back</a></button> </div>
<div class="text-white text-center mt-3" id="countdown"></div>
        </div>
    </div>
</div>
<!-- TIMER -->
<script>
var tid = 5;
var downloadTimer = setInterval(function(){
  document.getElementById("countdown").innerHTML = "Redirecting in " + tid ;
  tid -= 1;
  
}, 1000); //1 sekund setinterval
</script>

<!-- FOOTER -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <!-- Own JavaScript -->
    <script src="main.js"></script>
</body>
</html>