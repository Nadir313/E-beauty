<?php include "navbar.php" ;
      include "DBCon.php" ;  

      if($connection){
          echo "connection is done successfully " ;

      }else{
          echo "connection is failed".mysqli_connect_error() ;
      }
      echo "<hr>" ;
      $query = "SELECT first_name , count(first_name) 
                FROM client 
                GROUP BY first_name
                HAVING count(first_name) > 3
                 " ;
      $outcome = mysqli_query($connection, $query) ;
    //   $finalResult = mysqli_fetch_assoc($outcome) ;
      $numRows = mysqli_num_rows($outcome) ;
      echo "<hr>" ;
        echo $numRows ;
      if($numRows > 0){
            while($finalResult = mysqli_fetch_assoc($outcome)){
                echo "<pre>" ;
                    var_dump($finalResult) ;
                echo "</pre>" ;
            }
      }


























    //   $myquery = "SELECT first_name, count(first_name)
    //             FROM client 
    //             WHERE phone = 0  
    //             GROUP BY first_name ;" ;
        
    //     $outcome = mysqli_query($connection, $myquery) ;
    //     $finalData = mysqli_fetch_assoc($outcome) ;
    //     $numRows = mysqli_num_rows($outcome) ;

    //     var_dump ($finalData) ;
        // while( $finalData = mysqli_fetch_assoc($outcome)){
        //     echo "<pre>" ;
        //     // var_dump($finalData)  ;
        //     echo "</pre>" ;
        //     echo "<hr>" ;
        //     // echo $finalData["first_name"] ;
        //     echo "<hr>" ;
        // }





    //   if(isset($_POST["submit"])){
    //     $query = "DELETE FROM client WHERE id = $id ;" ;

    //   }
?>
<form action="<?php echo $_SERVER["PHP_SELF"] ; ?>" method="POST">
      <button type="submit" name="submit">Click here</button>
</form>
