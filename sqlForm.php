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
         echo "<hr>" ;
        //  $myQuery = "SELECT * FROM test" ;
        //  $outcome = mysqli_query($connection, $myQuery) ;
        //  $numRow = mysqli_num_rows($outcome) ;
        //  echo $numRow ;
        //  echo "<hr>" ;
        //  echo "<pre>" ;
        //     var_dump($outcome) ;
        //  echo "</pre>" ;
        //  echo "<hr>" ;
        //  if($numRow >0){
        //      while($data = mysqli_fetch_assoc($outcome)){
        //          echo "<pre>" ;
        //             var_dump($data) ;
        //         echo "</pre>" ;
        //      } 
        //  }


        /// this abmomne /

        // $myquery = "SELECT * FROM Product "  ;
        // $res = mysqli_query($connection , $myquery) ;
        // $numberofrows = mysqli_num_rows($res) ;
        // echo $numberofrows ;
        // echo "<hr>" ;
        // if($numberofrows >0){
        //     while($outcome = mysqli_fetch_assoc($res)){
        //         echo "<pre>" ;
        //             var_dump($outcome) ;
        //         echo "</pre>" ;
        //         $image = $outcome["img"] ;
        //         echo $outcome["label"] ;
        //         echo "<hr>" ;
        //         echo $image ;
        //         echo "<hr>" ;
        //         echo "<img id='imgdata' src=images/$image.> " ;
        
        //     }
        // }


        

            // if(isset($_POST["submit"])){
            //     $myquery = "SELECT * FROM Product "  ;
            //     $res = mysqli_connect($connection , $myquery) ;
            //     $numberofrows = mysqli_num_rows($res) ;
            //     echo $numberofrows ;
            // }
        // die() ;

         if(isset($_POST["submit"])){
             $id = $_POST["id"] ;
            $name = $_POST["name"] ;
            $price = $_POST["Price"] ;
            $description = $_POST["Description"] ;
            $quantity = $_POST["Quantity"] ;
            $image = $_FILES["img"]["name"] ;
            $imagesFile = "images/".$image ;
            $picName = $_FILES["img"]["tmp_name"] ;
            echo "<hr>" ;
                echo $name ;
            echo "<hr>" ;
                echo $price ;
            echo "<hr>" ;
                echo $description ;
            echo "<hr>" ;
                echo $quantity ;
            echo "<hr>" ;
                echo $id ;
            echo "<hr>" ;

            $insertQuery = "INSERT INTO Product
                            VALUES('$id', '$name' , '$price', '$description', '$quantity', '$image' )" ;                
            move_uploaded_file($picName, $imagesFile) ;
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
    <form id="sqlForm" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST" enctype="multipart/form-data" >
        <div>
            <label for="name">id</label>
            <input type="number" name="id">
        </div>
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
            <label for="name">Quantity</label>
            <input type="number" name="Quantity">
        </div>    
        <div>
            <label for="name">imgtest</label>
            <input id="here" type="file" accept="image/png, image/jpg" name="img">
            <!-- <div id="testingimg">
            </div>  -->
            <div>
            </div>
        </div>    
        <!-- <div>
            <label for="name">img</label>
            <input id="img" type="file" name="img" accept="image/png, image/jpeg" >
        </div>     -->
        <!-- <button type="button" class="btn btn-primary p-1 m-3" name="submit" id="">submit</button> -->
        <button name="submit"> submit</button>
    </form>
    <script src="main.js"></script>
</body>
</html>