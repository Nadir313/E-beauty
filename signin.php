<?php include "navbar.php" ;
       include "DBCon.php" ;

    global $error ,  $errorC,  $incorrect, $incorrectError ;
    if(isset($_POST["submit"])){
       if (!empty($_POST["email"]) AND !empty($_POST["password"])) {
            $email = $_POST["email"] ;
            $password = $_POST["password"] ;
            $myQuery = "SELECT * FROM client 
                        WHERE email = '$email' " ;

            $outcome = mysqli_query($connection, $myQuery) ;
            $numRow = mysqli_num_rows($outcome) ;
            $finaldata = mysqli_fetch_assoc($outcome) ;
            echo "<pre>" ;
                var_dump($finaldata) ;
            echo "</pre>" ;
            if($finaldata["email"] === $email AND $finaldata["password"] === $password){
                echo "you're cool" ;
            }else{
                 $incorrect = "email or password are incorrect" ;
                 $incorrectError = "alert-danger" ;
            }
       }elseif(empty($_POST["email"]) AND empty($_POST["password"])) {
            $error = "please fill all the fields" ;
            $errorC = "alert-danger" ;
       }
   }
?>

<form  id="sign_form" action="<?php echo $_SERVER["PHP_SELF"] ;  ?>" method="post"> 
        <img  src="images/user.png" alt="user_picture">
        <h3>Sign up</h3>
    <?php if($error != "") {       ?>
        <div class="alert <?php echo $errorC ?>"> <?php  echo $error ?> </div>
        <?php  } elseif($incorrect !=""){    ;  ?>
        <div class="alert <?php echo $incorrectError ; ?>"> 
        <?php echo $incorrect  ?>
        </div>
    <?php }; ?>   
    <div class="container ">
        <div  class="mb-3 p-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label"><h4>Email</h4></label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name ="email">
        </div>
    </div>
    <div class="mb-3 p-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label"><h4>Password</h4> </label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
    </div>
    <div class="col-auto">
        <button id="signBtn" type="submit" name="submit" class="btn btn-primary mb-3 p-2">Confirm identity</button>
    </div>
</div>
</form>

<?php include "footer.php" ?>




