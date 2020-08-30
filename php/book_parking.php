<?php
    session_start();
    if (!isset($_SESSION["user_name"])){
        // Abort the loading of the screen
        echo "<p>You haven't signed in.</p>";
        echo "<p>Please <a href='./login.php'>login here</a> before continuing.</p>";
        exit(-1);
    }
?>
<!doctype html>
<html>
    <head>
    <title>iAgent Book Parking </title>
    </head>
    <body>
        <img src="../images/logo.png" style="margin-left: auto; margin-right: auto;" alt="iAgent Logo">
        <p> To buy prepaid parking, please choose a parking lot from the dropdown menu.</p>
    
        <form method="get" action="./book_parking_verify.php" autocomplete="on">
        <select name="parking-option">
        <?php
            include_once "../db/db_connect.php";

            // First, make the connection to the database and grab all flights
            // Then for each row, you make sure that all info is then stored in a document.

            
            $search = mysqli_fetch_all($connect->query("SELECT * FROM parking_lots"), MYSQLI_ASSOC);
            if ($search){
                for ($i = 0; $i < count($search); $i++){
                    $print_tag = "<option value='" . $search[$i]['id'] . "'>";
                    //print_r($search[$i]);
                    $price = $search[$i]['price'] * (1 + .02 * date("H")); // Price changes depending on time
                    $name = $search[$i]['name'];
                    $print_tag = $print_tag . $name . " -- \$$price (". $search[$i]['capacity'] 
                    . " remaining)<br>";
                    $print_tag = $print_tag . "</option>";
                    echo "$print_tag"; 

                  
                }
                echo "</select>";
         
            }
            else 
                echo "Nothing found!";

        ?>
      

        <br><br>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
		</button>
        </form>

    </body>
</html>
