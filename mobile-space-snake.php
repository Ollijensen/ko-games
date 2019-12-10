<?php require('includes/header.php') ?> 

<div class="container">
  <div class="row">
    <div class="col-12">
      <canvas id="snake" width="304" height="304">

</canvas>
    <div class="row justify-content-center mt-2">
      <button onclick="moveup()">UP</button>
</div>
      <div class="row justify-content-center mt-2 mb-2">
  <button class="mr-1" onclick="moveleft()">LEFT</button>
  <button class="ml-1" onclick="moveright()">RIGHT</button>
</div>
  <div class="row justify-content-center">
  <button onclick="movedown()">DOWN</button>
    </div>
</div>
</div>
  </div>
</div>




<script src="mobile-space-snake/mobile-snake.js"></script>

<?php require('includes/footer.php') ?>
