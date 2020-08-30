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
        <title>iAgent View Cart</title>
        <!-- Display User information here: !-->
        <!--Import Google Icon Font-->
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    </head>

    <body>
        <img src="../images/logo.png" style="margin-left: auto; margin-right: auto;" alt="iAgent Logo">
        <?php
            // First, connect to the database:
            include_once "../db/db_connect.php";
            $user_id = $_SESSION['id'];
            // Next, dump user info (except for password and the like) in information
            $query_info = "SELECT item_name, price, quantity, id FROM inventory WHERE owner_id = '$user_id'";
            $search = mysqli_fetch_all($connect->query($query_info), MYSQLI_ASSOC);

            if (!$search){
                echo "<p>ERROR: User not found. This may be a Database related issue (or perhaps your cart is empty.) </p>";
                echo "<form action='./menu.php'><input type='submit' value='Return to the Menu Page.' /></form>";
                exit(-1);
            }
            else if (count($search) == 0){
                echo "<p> Your cart is empty.</p>";
            }
            else{
                // Now display the information neatly:
                $total_price = 0;
                for ($i = 0; $i < count($search); $i++){
                    $name = $search[$i]['item_name'];
                    $price = $search[$i]['price'];
                    $quantity = $search[$i]['quantity'];
                    $total_price = $total_price + $price;
                    $print = "Item " . $search[$i]["id"] . " ";
                    $print = $print  . "Name: " . $name . " ";
                    $print = $print  . " Price (\$$price) " . " ";
                    $print = $print  . " Quantity ($quantity)" . " ";

                    echo "<p>$print</p>";
                }    
                $_SESSION['total_price'] = $total_price;
                echo "<p> The total price for all items is \$$total_price.</p>";
                echo "<form action='./checkout.php'><input type='submit' value='Checkout All Items.' /></form>";
                echo "<br><br>";
                echo "<form action='./menu.php'><input type='submit' value='Return to the Menu Page.' /></form>";
                
                
                

            }
            
            
            
        ?>
    </body>

</html>
