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
        <title>iAgent Book Flight</title>
    	<!--Import Google Icon Font-->
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    	<!--Import materialize.css-->
        <!--
	    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        !-->
    </head>
    <body>
        <img src="../images/logo.png" style="margin-left: auto; margin-right: auto;" alt="iAgent Logo">
        <p> To book a flight, please choose from the dropdown menu.</p>
    
        <form method="get" action="./book_flight_verify.php" autocomplete="on">
        <select name="flight-option">
        <?php
            include_once "../db/db_connect.php";

            // First, make the connection to the database and grab all flights
            // Then for each row, you make sure that all info is then stored in a document.

            
            $search = mysqli_fetch_all($connect->query("SELECT * FROM flight"), MYSQLI_ASSOC);
            if ($search){
                for ($i = 0; $i < count($search); $i++){
                    $print_tag = "<option value='" . $search[$i]['id'] . "'>";
                    //print_r($search[$i]);
                    $price = $search[$i]['price'] * (1 + .02 * date("H")); // Price changes depending on time
                    $print_tag = $print_tag . $search[$i]['plane_type'] . " (" . $search[$i]['class_name'] . ") -- " . "\$$price (". $search[$i]['capacity'] 
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



    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
  });

    </script>
    </body>

</html>