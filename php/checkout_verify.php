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
    <!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
    </head>

    <?php
        include_once "../db/db_connect.php";
        $credit_card_max_numbers = 16;
        // Now get the information from card_num, name, and password:
        $card_num = mysqli_real_escape_string($connect, $_GET['card_num']);
        $card_type = mysqli_real_escape_string($connect, $_GET['card_type']);
        $card_name = mysqli_real_escape_string($connect, $_GET['card_name']);
        $month = mysqli_real_escape_string($connect, $_GET["card_month"]);
        $year = mysqli_real_escape_string($connect, $_GET["card_year"]);


        $error_list[] = array();


        // First determine i
        $is_valid = true;

        if (strlen($card_num) != $credit_card_max_numbers){
            $is_valid = false;
            $error_list[] = "You typed in a credit card number that is not 16 digits.";
        }

        if ($card_type == "Invalid Card"){
            $is_valid = false;
            $error_list[] = "Card Type is Invalid.";
        }

        if ($card_name == ""){
            $is_valid = false;
            $error_list[] = "Empty Credit Card Name.";            
        }

        // Now get the current month and year.
        $check_year = date("Y");
        $check_month = date("n");

        if ($year <= $check_year){
            // Check the months
            if (!($month <= $check_month))
                $is_valid = false;
                $error_list[] = "This card has expired sometime this year.";
        }
        else{
            $is_valid = false;
            $error_list[] = "This card has expired.";
        }


        if (!$is_valid){
            echo "<p> There were some issues while processing your credit card information:</p>";
            for ($i = 0; $i < count($error_list); $i++){
                echo "<p>Error: " . $error_list[$i] . "</p><br>";
            }
        }
        else{
            // You're good to go!
            // Unload all this shit into the database;

            $user_id = $_SESSION["id"];
            $query_info = "SELECT item_name, price, quantity, id FROM inventory WHERE owner_id = '$user_id'";
            if (!$query_info){
                echo "An error ocurred while accessing the Inventory database.";
                exit(-1);
            }
            $search = mysqli_fetch_all($connect->query($query_info), MYSQLI_ASSOC);
            $valid = 0;
            for ($i = 0; $i < count($search); $i++){
                $name = $search[$i]['item_name'];
                $price = $search[$i]['price'];
                $quantity = $search[$i]['quantity'];
                $owner_id = $_SESSION["id"];
                $owner_name = $card_name;

                $new_order = mysqli_query($connect, "INSERT INTO user_order(item_name, price, quantity, orderer_name, orderer_id) VALUES ('$name', '$price', '$quantity', '$owner_name', '$owner_id')");

                if (!$new_order){
                    echo "<p>An error ocurred while adding your item.</p>";
                    echo "<p>Error occurred at index $i</p>";
                    exit(-1);
                }
                else
                    $valid = $valid + 1;
         
            }

            if ($valid != 0){
                echo "<p>You have ordered everything in your inventory.</p>";
                $empty = mysqli_query($connect, "TRUNCATE TABLE inventory");
                // Now return back to the menu page.
                echo "<form action='./menu.php'><input type='submit' value='Return to the Menu Page.' /></form>";
            }

        }
    ?>
    
</html>




