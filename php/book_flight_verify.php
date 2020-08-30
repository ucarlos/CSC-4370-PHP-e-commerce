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
    <title></title>
    </head>
    <?php
        include "../db/db_connect.php";
        $airplane_id = $_GET["flight-option"];
        $result =  mysqli_query($connect, "SELECT * FROM flight WHERE id = '$airplane_id'");
        if ($result){
            // Store the money there i guess
            
            $row = mysqli_fetch_row($result);
            $item_name= "Plane Ticket (" . $row[1] . ")"; 
            $price = $row[4] * (1 + .01 * date('H'));
            $quantity = 1;
            $owner_id = $_SESSION["id"];
            // First, make sure that that you're not adding a duplicate.
            $search_duplicates = mysqli_query($connect, "SELECT DISTINCT * FROM flight WHERE item_name = '$item_name' AND price = '$price' AND
            owner_id = '$owner_id'"); 
            if (!$search_duplicates){


                // Now create an entry in inventory table;
                $new_item = mysqli_query($connect, "INSERT INTO inventory(item_name, price, quantity, owner_id) VALUES 
                ('$item_name', '$price', '$quantity', $owner_id)");
            
                if ($new_item){
                    // UPDATE my_table SET my_field = my_field - 1 WHERE `other` = '123'
                    $adjust_flight = mysqli_query($connect, "UPDATE flight SET capacity = capacity - 1 WHERE id = '$airplane_id' ");

                    echo "<p>Added $item_name  to the cart.</p>";
                    // Now return back to the menu page.
                    echo "<form action='./menu.php'><input type='submit' value='Return to the Menu Page.' /></form>";
                }
                else 
                    echo "<p>Could not add $item_name to the cart. There may be an issue with your database.</p>";

                //echo "You selected $airplane_id !";
                // Now if you found the flight that you slected, you should add it to your 
                // Cart, and then what?
                // create an entry in your cart/inventory, alongside the price of the informaton (how to do)?
            
             // Now create a
            } else
                echo "<p> $item_name is already in your inventory.</p>";


        }
        else
            echo "<p>Error: Could not find plane_id</p>";
        // Now search the database for the 


    ?>
</html>




