<?php include "navbar.php" ;

//    if(isset($_POST["submit"]) AND !empty($_POST["email"]) AND !empty($_POST["password"] )){
//         $email = $_POST["email"] ;
//         $password2 = $_POST["password"] ;
//         echo "$email and $password2" ;
//    }
   if(isset($_POST["submit"])){

        $email = $_POST["email"] ;
        $password2 = $_POST["password"] ;





        // Error OR success Message :
        // if( empty($_POST["email"] AND empty($_POST["password"]))){
        //     $error = "please fill all the fields" ;
        //     $errorC = "alert-danger" ;
        //     echo "<hr>" ;
        //         // echo $password2 ;
        //     echo "<hr>" ;
        //     echo $error ;
        //     echo "<hr>" ;
        //     echo $errorC ;
        //     echo "<hr>" ;
        // }
        // elseif(!empty($_POST["email"]) && !empty($_POST["password"]) ){
        //     echo $_POST["email"] ;
        //     echo "<hr>" ;
        //     echo $_POST["password"] ;
        //     $newClient = "Your account has been successfully created " ;
        //     $created = "alert-success" ;
        // }

   }

?>

<form action="<?php echo $_SERVER["PHP_SELF"] ;  ?>" method="post">

    <?php if($error != "") {       ?>
        <div class="alert <?php echo $errorC ?>"> <?php  echo $error ?> </div>
        <?php  } elseif($newClient !=""){    ;  ?>
        <div class="alert <?php echo $created ; ?>"> 
        <?php echo $newClient  ?>
        </div>
    <?php }; ?>    

<div id="sign_form" class="container border border-primary ">
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
    <button type="submit" name="submit" class="btn btn-primary mb-3 p-2">Confirm identity</button>
  </div>

</div>

</form>

<?php include "footer.php" ?>




