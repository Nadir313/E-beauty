    <?php
         include "navbar.php" ;
         include "DBCon.php" ;

         if(!$connection){
             echo "connection is failed".mysqli_connect_error() ;
         }else{
             echo "connection is done successfully" ;
         }
         echo "<hr>" ;
         echo $_SERVER["PHP_SELF"] ;

         echo "<hr>" ;
        //  if(isset($_POST["submit"])){
        //      echo "submit was clicked" ;
        //  }
         echo "<hr>" ;
         $myQuery = "SELECT * FROM test" ;
         $outcome = mysqli_query($connection, $myQuery) ;

         $numRow = mysqli_num_rows($outcome) ;
         echo $numRow ;
         echo "<hr>" ;
         echo "<pre>" ;
            var_dump($outcome) ;
         echo "</pre>" ;
         echo "<hr>" ;
         if($numRow >0){
             while($data = mysqli_fetch_assoc($outcome)){
                 echo "<pre>" ;
                    var_dump($data) ;
                echo "</pre>" ;
             } 
         }

         if(isset($_POST["submit"])){
            $name = $_POST["name"] ;
            $price = $_POST["Price"] ;
            $description = $_POST["Description"] ;
            echo "<hr>" ;
                echo $name ;
            echo "<hr>" ;
                echo $price ;
            echo "<hr>" ;
                echo $description ;
            echo "<hr>" ;

            $insertQuery = "INSERT INTO test 
                            VALUES('$name' ,' $price', '$description') " ;

            if(mysqli_query($connection,$insertQuery)){
                echo "data has been added successfully" ;
            }else{
                echo $insertQuery."sending data has failed".mysqli_error() ;
            }
            mysqli_close($connection) ;
         }


         // testing for posted data 

        // if(isset($_POST["submit"])){
        //     $name = $_POST["name"] ;
        //     echo "<hr>" ;
        //        echo $name ;
        //     echo "<hr>" ;
        //     $price = $_POST["Price"] ;
        //     echo "<hr>" ;
        //        echo $price ;
        //     echo "<hr>" ;
        //     $description = $_POST["Description"] ;
        //     echo "<hr>" ;
        //        echo $description ;
        //     echo "<hr>" ;
        // }

    ?>
    <form id="sqlForm" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST" >
        <div>
            <label for="name">name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="name">Price</label>
            <input type="text" name="Price">
        </div>
        <div>
            <label for="name">description</label>
            <input type="text" name="Description">
        </div>    
        <div>
            <label for="name">img</label>
            <input id="img" type="file" name="img" accept="image/png, image/jpeg" >
        </div>    
        <!-- <button type="button" class="btn btn-primary p-1 m-3" name="submit" id="">submit</button> -->
        <button name="submit"> submit</button>
    </form>
</body>
</html>