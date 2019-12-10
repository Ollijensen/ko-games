<?php require('includes/header.php') ?> 
<?php
if(!isset($_SESSION['user']))
{
    
    header("Location: header.php");
    
  
    die("<h1 class='text-white text-center mt-5'>Please login</h1>");
}
?>

<div class="container">
  <div id="gameCanvas" class="text-center">
    <div class="row">
      <div class="col-12">
        <h2 class="text-white">You've got <span id="score"> 0</span> / 9 coins</h2>
        <canvas id="canvas" width="800" height="500"></canvas>
      </div>
    </div>
  </div>

  <div id="endGame">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="justify-content-center d-flex">
          <h2 class="text-white text-center">Congratoulations you've finished the game!</h2>
        </div>
      </div>
      <div class="col-12 mt-1">
        <div class="justify-content-center d-flex">
          <a class="justify- content-center d-flex href="space-man.php" role="button" aria-pressed="true"><button class="btn btn-outline-success">Play again</button></a>
        </div>
      </div>
      <div class="col-12 mt-4">
        <div class="justify-content-center d-flex">
          <img src="images/rocket.gif" alt="raket">
        </div>
      </div>
    </div>
  </div>
</div>




<script src="space-man/maze2.js"></script>
<script src="space-man/functions.js"></script>




<?php require('includes/footer.php') ?> 
