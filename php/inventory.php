<?php
    session_start();
    if (!isset($_SESSION["user_name"])){
        // Abort the loading of the screen
        echo "<p>You haven't signed in.</p>";
        echo "<p>Please <a href='./login.php'>login here</a> before continuing.</p>";
        exit(-1);
    }
?>

