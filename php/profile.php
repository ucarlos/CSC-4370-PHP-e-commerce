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
        <title>iAgent Profile Page</title>
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
            $user_info = mysqli_query($connect, "SELECT user_name, first_name, last_name, email FROM users WHERE id = '$user_id'");
            if (!$user_info){
                echo "<p>ERROR: User not found. This may be a Database related issue (or did you messed with the query?) </p>";
                exit(-1);
            }
            else{
                // Now display the information neatly:
                $row = mysqli_fetch_row($user_info);
                echo "<p>Username  : $row[0]</p>";
                echo "<p>First Name: $row[1]</p>";
                echo "<p>Last Name : $row[2]</p>";
                echo "<p>Email     : $row[3]</p>";

                echo "<form action='./menu.php'><input type='submit' value='Return to the Menu Page.' /></form>";

            }
            
            
            
        ?>
    </body>

</html>
