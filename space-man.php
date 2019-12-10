
      <?php require('includes/header.php') ?> 
      <?php
if(!isset($_SESSION['user']))
{
    
    header("Location: header.php");
    
  
    die("<h1 class='text-white text-center mt-5'>Please login</h1>");
}
?>

<div class="container">
  <div class="row">
    <div class="col-12">
  
    <div class="text-center">
    <h2 class="text-white">You've got <span id="score"> 0</span> / 3 coins</h2>
  
    </div>
<canvas id="canvas" width=" 500" height="500"></canvas>




    </div>
  </div>
</div>


<script src="space-man/maze1.js"></script>
<script src="space-man/functions.js"></script>




<?php require('includes/footer.php') ?> 
