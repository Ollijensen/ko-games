<?php require('includes/header.php') ?>

<!-- kun adgang hvis du er i session -->
<?php
if(!isset($_SESSION['user']))
{
    
    header("Location: header.php");
    
  
    die("<h1 class='text-white text-center mt-5'>Please login</h1>");
}
?>



<div class="container mt-5">
<div class="row">
<div class="col-12">
 <h1 class="text-white text-center mb-5">Games</h1>
 
 </div>
 </div>
 <div class="row text-center">
 <div class="offset-2 col-8 col-md-4 d-none d-lg-block">
    <div class="card" style="width: 18rem;">
    <img src="images/spil.png" class="card-img-top" alt="Raket spil">
     <div class="card-body">
    <h5 class="card-title">Maze rocket game</h5>
    <p class="card-text">Try to escape the maze in outer space. Be carefull of the deadly walls and the hungry space-worm. Get to the rocket before its too late</p>
    <a href="space-man.php" class="btn btn-outline-success">Play Game</a>
  </div>
</div>
</div>
<div class="col-md-4 col-12 d-none d-lg-block">
    <div class="card" style="width: 18rem;">
    <img src="images/spacesnake.png" class="card-img-top" alt="Raket spil">
     <div class="card-body">
    <h5 class="card-title text-center">Space-snake</h5>
    <p class="card-text">Now you get to be the hungry space-worm. Eat as many space-men as you can and beat the highscore</p>
    <a href="space-snake.php" class="btn btn-outline-success">Play game</a>
  </div>
</div>
</div>
<div class="offset-2 col-md-4 col-8 d-lg-none">
    <div class="card" style="width: 18rem;">
    <img src="images/spacesnake.png" class="card-img-top" alt="Raket spil">
     <div class="card-body">
    <h5 class="card-title text-center">Space-snake for mobile</h5>
    <p class="card-text">Now you get to be the hungry space-worm. Eat as many space-men as you can and beat the highscore</p>
    <a href="mobile-space-snake.php" class="btn btn-outline-success">Play game</a>
  </div>
</div>
</div>
</div>
</div>
</div>



<?php require('includes/footer.php') ?>