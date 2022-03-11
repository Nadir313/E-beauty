<?php include "navbar.php"  ;
      include "DBCon.php"  ;
    // echo $_SERVER["PHP_SELF"] ;
    global $error ,  $errorC,  $newClient,  $created , $passworderror, $passwordmsg ;
    if(isset($_POST["submit"])  AND !empty($_POST["email"]) AND ($_POST["password"] === $_POST["password2"]) == true) {
        $first_name = $_POST["first_name"] ;
        $last_name = $_POST["last_name"] ;
        $adress = $_POST["adress"] ;
        $email = $_POST["email"] ;
        $realpass = $_POST["password"] ;
        //  ( strlen($realpass)> 1) ? "hi" :"peace" ;
        $password = md5($realpass) ;
        $phone = $_POST["phone"] ;
        // success msg
        $newClient = "Your account has been successfully created " ;
        $created = "alert-success" ;
        echo "<hr>" ;
        // echo "$first_name and  $last_name and $adress" ;
        // die ;

        $myQuery = "INSERT INTO client(first_name, last_name, adresse, phone, email, password)
                    VALUES('$first_name' , '$last_name', '$adress', '$phone','$email', '$password') " ;

        if(mysqli_query($connection, $myQuery)){
            // echo "data has benn added successfully" ; HERE I need to get rid of it
        }else{
            echo $myQuery."data sending failed it's not cool at all".mysqli_error() ;
        }
    }
    elseif(!($_POST["password"] === $_POST["password2"])){
        $passworderror = "The passwords aren't matching " ;
        $passwordmsg = "alert-warning" ;
    }
    elseif(empty($_POST["email"]) AND empty($_POST["password"])) {
        // die ;
        $error = "please fill all the fields" ;
        $creationError = "alert-danger" ;
   }
?>
     <form id="form2" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <div id="regForm" >
        <img id="img" src="images/user.png" alt="user_picture">
        <h3>Sign up</h3>
        <div id="msg">
            <?php if($error != "") {       ?>
            <div class="alert <?php echo $creationError ?> text-danger"> <?php  echo $error ?> </div>
            <?php  } elseif($newClient !=""){    ;  ?>
            <div class="alert <?php echo $created ; ?>"> 
            <?php echo "Mr/Ms $first_name $newClient "  ?>
            </div>
            <?php }elseif($passworderror != ""){  ?> 
                <div class="alert <?php echo $passwordmsg?>"> <?php echo $passworderror  ?>   </div>
                <?php  } ; ?>
        </div>
        <div>
            <label for=""><i class="fa-solid fa-user"></i></label>
            <input placeholder="First Name" name="first_name" class="inputs" type="text">
        </div>
        <div>
            <label for=""><i class="fa-solid fa-user"></i></label>
            <input placeholder="Last Name" name="last_name" class="inputs" type="text">
        </div>
        <div>
            <label for=""><i class="fas fa-location"></i></label>
            <input placeholder="Adresse" name="adress" class="inputs" type="text">
        </div>
        <div>
            <label for=""><i class="fa-solid fa-cake-candles"></i></label>
            <input placeholder="Phone" name="phone" class="inputs" type="number">
        </div>
        <div>
            <label for=""><i class="fa-solid fa-envelope"></i></label>
            <input placeholder="E-mail" name="email" class="inputs" type="email">
        </div>
        <div>
            <label for=""><i class="fa-solid fa-key"></i></label>
            <input placeholder="password" name="password" class="inputs" type="password">
        </div>
        <div>
            <label for=""><i class="fa-solid fa-key"></i></label>
            <input placeholder="Confirmed Password" name="password2" class="inputs" type="password">
        </div>
        <button id="submit-btn" name="submit" >Sign Up</button>
        </div>
  </form>
<?php include "footer.php" ?>


