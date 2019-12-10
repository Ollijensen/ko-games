<?php require('includes/header.php') ?>
<?php require('includes/db.php') ?>
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
            <h1 class="text-white text-center">Profile Page</h1>
        </div>
        <div class="col-12 text-center">
            <p class="text-white profiletext"> Hello <?php echo  $_SESSION['user']; ?>, welcome to your profile.</p>
        </div>
        <div class="col-12 text-center">
        <p class="text-white profiletext"> There is not much to see yet, but here is some lorem ipsum</p>
        </div>
        <div class="col-6 offset-3 text-center">
        <p class="text-white profiletext"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, laboriosam! Nisi, at odit perferendis ullam eos laborum molestiae facilis accusantium non praesentium modi eius sunt ut aperiam necessitatibus! Consectetur debitis quia omnis iusto nulla esse voluptates tempore porro ipsa ab atque ipsum et accusamus minus veritatis aliquid, similique a adipisci.</p>
        </div>
    
        
    </div>  
</div>







<?php require('includes/footer.php') ?>