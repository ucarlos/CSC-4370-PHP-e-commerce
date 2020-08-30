<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "Project";
    $EXIT_FAILURE = 1;

    $connect = new mysqli($host, $user, $pass);

    if (!$connect){
        echo "Could not login as $user.\n";
        exit($EXIT_FAILURE);
    }

    $connect = mysqli_connect($host, $user, $pass, $database); 

    if (!$connect){
        echo "Could not connect to the database $database " . " using user ". "$user" . "@ $host\n";
        exit($EXIT_FAILURE);
    }

?>