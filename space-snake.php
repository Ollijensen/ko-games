 <?php require('includes/header.php') ?> 
 <?php require('includes/db.php') ?>

 <?php

if(isset($_POST['send'])){
/*   echo "ost";
var_dump($_POST); */
$yourScore = $_POST['yourscore'];
/* echo $yourScore; */
$sql ="INSERT INTO leaderboard(user, score, date) VALUES ('{$_SESSION['user']}', $yourScore, CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);
}

?> 

<?php
if(!isset($_SESSION['user']))
{
    
    header("Location: header.php");
    
  
    die("<h1 class='text-white text-center mt-5'>Please login</h1>");
}
?>

<div class='container'>
  <div class='row'>
    <div class='col-12 position-relative'>
      <canvas id="snake" width="608" height="608"></canvas>
      <div class="position-relative" id="playagain">
            <form action="space-snake.php" method="POST">
              <label for="yourscore"></label>
              <input type="hidden" value="" id="yourscore" name="yourscore">
              <div class="d-flex justify-content-center">
                <button type="submit" name="send" class="btn btn-outline-success">Play again</button>
              </div>
            </form>
        </div>
    </div>
    <!-- <div class="col-12">
        <div class="position-absolut" id="playagain">
            <form action="space-snake.php" method="POST">
              <label for="yourscore"></label>
              <input type="hidden" value="" id="yourscore" name="yourscore">
              <div class="d-flex justify-content-center">
                <button type="submit" name="send" class="btn btn-outline-success">Play again</button>
              </div>
            </form>
        </div>
      </div> -->
    </div>
 



<?php

$sql = "SELECT * FROM leaderboard ORDER by `score` DESC LIMIT 10";
if($result = mysqli_query($conn, $sql)){
  if(mysqli_num_rows($result) > 0){
  
  echo "<table class='text-white table table-dark table-striped mt-5'>";
      echo "<tr>";
          echo "<th>User Name</th>";
          echo "<th>Score</th>";
          echo "<th>Date</th>";
      echo "</tr>";
  while($row = mysqli_fetch_array($result)){
      echo "<tr >";
          echo "<td>" . $row['user'] . "</td>";
          echo "<td>" . $row['score'] . "</td>";
          echo "<td>" . $row['date'] . "</td>";
      echo "</tr>";
  }
  echo "</table>";
  // Free result set
  mysqli_free_result($result);
} else{
  echo "No records matching your query were found.";  
}
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>


</div>


    
    
   
<script src="space-snake/snake.js"></script>
    
    <?php require('includes/footer.php') ?> 
    