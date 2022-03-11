<?php include "navbar.php" ;
    include "DBCon.php" ;

    global $error ,  $errorC,  $newClient,  $created ;
    // if($connection){
    //     echo "connecton is cool ";
    // }else{
    //     echo "connection isn't cool ".mysqli_connect_error() ;
    // }
    // $pa = $_POST["password"] ;
    // $paz = $_POST["password2"] ;
    // echo "<hr>" ;
    //     echo "$pa and $paz" ;
    // echo "<hr>" ;
    // die ;
    // !empty($_POST["password"])  
    //   if(isset($_POST["submit"])){
    //     if(($_POST["password"] === $_POST["password2"])== true){
    //         echo "Peace" ;
    //     }
    //   }
    if(isset($_POST["submit"]) AND !empty($_POST["email"]) AND ($_POST["password"] === $_POST["password2"])== true) {
        $first_name = $_POST["first_name"] ;
        $last_name = $_POST["last_name"] ;
        $adresse = $_POST["adresse"] ;
        $email = $_POST["email"] ;
        $password = md5($_POST["password2"]) ;
        $phone = $_POST["phone"] ;
        // success msg
        $newClient = "Your account has been successfully created " ;
        $created = "alert-success" ;

        echo "<hr>" ;

        $myQuery = "INSERT INTO client(first_name, last_name, adresse, phone, email, password)
                    VALUES('$first_name' , '$last_name', '$adresse', '$phone','$email', '$password') " ;

        if(mysqli_query($connection, $myQuery)){
            // echo "data has benn added successfully" ; HERE I need to get rid of it
        }else{
            echo $myQuery."data sent is not cool at all".mysqli_error() ;
        }
    }elseif(empty($_POST["email"]) AND empty($_POST["password"])) {
        $error = "please fill all the fields" ;
        $errorC = "alert-danger" ;
   }
?>
<div id="form1" class="container  p-3 m-6">
    <?php if($error != "") {       ?>
        <div class="alert <?php echo $errorC ?>"> <?php  echo $error ?> </div>
        <?php  } elseif($newClient !=""){    ;  ?>
        <div class="alert <?php echo $created ; ?>"> 
        <?php echo $newClient  ?>
        </div>
    <?php }; ?> 
  <form class="row g-3 needs-validation" novalidate method="POST" action="<?php echo $_SERVER["PHP_SELF"] ; ?>">    
    <div class="col-lg-6 position-relative">
        <label for="validationTooltip01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationTooltip01" value=""  name="first_name" >
    </div>
    <div class="col-lg-6 position-relative">
        <label for="validationTooltip01" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationTooltip01" value="" name="last_name" >
    </div>
    <div class="col-lg-6 position-relative">
        <label for="validationTooltip01" class="form-label">Adresse</label>
        <input type="text" class="form-control" id="validationTooltip01" value="" name="adresse">
    </div>
    <div class="col-lg-6 position-relative">
        <label for="validationTooltip01" class="form-label">Phone</label>
        <input type="text" class="form-control" id="validationTooltip01" value="" name="phone">
    </div>
    <div class="col-lg-6 position-relative">
        <label for="validationTooltip01" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="validationTooltip01" value="" name="email" >
    </div>
    <div class="col-lg-6 position-relative">
        <label for="validationTooltip01" class="form-label">Password</label>
        <input type="password" class="form-control" id="validationTooltip01" value=""  name="password">

        <label for="validationTooltip01" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="validationTooltip01" value="" name="password2">
    </div>
    <div>
    <button id="btn" type="submit" name="submit">sign up</button>
    </div>
</form>

<?php include "footer.php" ?>