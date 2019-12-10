<?php require('includes/header.php') ?>
<?php require('includes/db.php') ?>

<?php
$flag = false; 

if(isset($_POST['register'])){

// Mysqli_real_escape_string... renser for karakterer som kan bruges til SQL angreb. 
$userName = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass1 = mysqli_real_escape_string($conn, $_POST['password']);
$pass2 = mysqli_real_escape_string($conn, $_POST['password2']);
$error = 0;

// Stemmer de to passwords overens med hinanden
if($pass1 == $pass2){
   $flag = true;   
}

if($flag == true){
    
    $salt = "kpwdjfbgpkajhrgoåihargåouh¨028g" . $pass1 . "kjshdgflkjhsdæfgkjh";

    $hashed = hash('sha512', $salt);
    
    $sql ="INSERT INTO login(user, email, pass) values('$userName', '$email', '$hashed')";

    $result = mysqli_query($conn, $sql) or die ("Query virker overhovedet ikke!");

}
}
?>
<center>

<div class="container">
        <div class="row justify-content-center align-items-center" style="margin-top: 0; margin-bottom: 10rem;">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <h1 class="text-white mb-5 mt-5">Registrer</h1>
                    <form name="myForm" action="registrer.php" method="POST" onSubmit="return checkform()" id="checkform">
                            <div class="form-group">
                            <label class="float-left" for="username"></label>
                                <input placeholder="Brugernavn" type="text" class="form-control" name="username" id="username">
                                <span id="alertUser" class="text-danger font-weight-normal"></span>
                            </div>
                            <div class="form-group">
                            <label class="float-left" for="email"></label>
                                <input placeholder="Email" type="text" class="form-control" name="email" id="email" value="">
                                <span id="alertEmail" class="text-danger font-weight-normal"></span>
                            </div>
                            <div class="form-group">
                            <label class="float-left" for="password"></label>
                                <input placeholder="Password" type="password" class="form-control" name="password" id="pass1">
                            </div>
                            <div class="form-group">
                            <label class="float-left" for="password2"></label>
                                <input placeholder="Gentag Password" type="password" class="form-control" name="password2" id="pass2">
                                <span id="alertPass" class="text-danger font-weight-normal"></span>
                            </div>
                           <button name="register" id="sendlogin" class="btn btn-outline-success">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>


<?php require('includes/footer.php') ?>