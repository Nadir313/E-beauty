<?php include "navbar.php" ;
    //  echo "<hr>" ;
    //  if(isset($_POST["submit"])){
    //     if($_POST["password"] != $_POST["password2"] ){
    //         echo "recheck password" ;
    //     }else{
    //         echo "passwords are matching " ;
    //     }
    //  }
    //  echo "<hr>" ;
    //  OR filter_has_var(INPUT_POST, "first_name" ) OR filter_has_var(INPUT_POST , "last_name") OR filter_has_var(INPUT_POST , "adresse") ;
    //  echo "hi" ;

    if(isset($_POST["submit"])  OR !empty($_POST["email"]) OR !empty($_POST["password2"])){
        $first_name = $_POST["first_name"] ;
         $first_name = filter_var($first_name ,FILTER_SANITIZE_STRING) ;
        $last_name = $_POST["last_name"] ;
            $lastname = filter_var($last_name , FILTER_SANITIZE_STRING) ;
        $email = $_POST["email"] ;
            $email = filter_var($email , FILTER_SANITIZE_EMAIL) ;
        $phone = $_POST["phone"] ;
            $phone = filter_var($phone , FILTER_SANITIZE_NUMBER_INT) ;
          
        echo "<hr>" ;
            echo "email ".$email ;
        echo "<hr>" ;
            echo "lastname ".$last_name ;
        echo "<hr>" ;
            echo "firstname ".$first_name ;
        echo "<hr>" ;
        
        
        // $last_name = filter_var($last_name ,FILTER_SANITIZE_STRING) ;
        // $adresse = $_POST["adresse"] ;
        // $phone = $_POST["phone"] ;
        // // $phone = fliter_var($phone ,FILTER_VALIDATE_INT) ;
        // $email = $_POST["email"] ;
        // $email = filter_var($email, FILTER_SANITIZE_EMAIL) ;
        // $password = $_POST["password2"] ;
        echo "<hr>" ;
        // echo "$last_name.'<hr>'. $first_name.'<hr>'. $adresse.'<hr>' . $phone. '<hr> '  . $email. '<hr>' .  $password" ;
        echo "<hr>" ;
    } 
?>


<div id="form1" class="container  p-3 m-6">
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