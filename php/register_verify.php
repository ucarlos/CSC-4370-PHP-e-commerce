<?php
    session_start();
?>

<!doctype html>
<html>
    <head><title>iAgent Registration Results</title>
        <!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    </head>
<?php

    include_once "../db/db_connect.php";

    // Place functions here:

    function verify_password($password1, $password2){
        $temp1 = strtolower($password1);
        $temp2 = strtolower($password2);
        return (strcmp($temp1, $temp2) == 0) ? true : false;

    }

    // First get the values for user_name, password, and confirm_password:
    $email = mysqli_real_escape_string($connect, $_GET['email']);        
    $user_name = mysqli_real_escape_string($connect, $_GET["user_name"]);
    $password = mysqli_real_escape_string($connect, $_GET["password"]);
    $confirm_password = mysqli_real_escape_string($connect, $_GET["confirm_password"]);

    $first_name = mysqli_real_escape_string($connect, $_GET["first_name"]);
    $last_name = mysqli_real_escape_string($connect, $_GET["last_name"]);
    $error_messages = array();
    // Only confirm the password and the last password:

    $is_valid = true;

    if ($email == ""){
        $is_valid = false;
        $error_messages[] = "Email" ." field is empty.";
    }

    if ($user_name == ""){
        $is_valid = false;
        $error_messages[] = "Username" ." field is empty.";
    }

    if ($first_name == ""){
        $is_valid = false;
        $error_messages[] = "First Name" ." field is empty.";
    }

    if ($last_name == ""){
        $is_valid = false;
        $error_messages[] = "Last Name" ." field is empty.";
    }

    if ($password == ""){
        $is_valid = false;
        $error_messages[] = "Password" ." field is empty.";
    }

    if ($confirm_password == ""){
        $is_valid = false;
        $error_messages[] = "Confirm Password" ." field is empty.";
    }


    if (!verify_password($password, $confirm_password)){
        $is_valid = false;
        $error_messages[] = "Passwords do not match.";
    }    


    if (!$is_valid){
        echo "<p>Some issues came up while you were trying to sign up. These include:<br>";
            for ($i = 0; $i < count($error_messages); $i++){
                echo "Error: $error_messages[$i]<br>";
            }
            echo "<input type='button' class='btn waves-effect waves-light' value='Return to Registration Page' onClick='history.back()'><br>";
            echo "</p><br>";
    }
    else{
        if (mysqli_query($connect, "INSERT INTO users(user_name, first_name, last_name, email, password) VALUES ('" . $user_name . "','" . $first_name . "', '" . $last_name . "',  '" . $email . "', '" . md5($password) . "')" )){

            echo "<p> It seems like you're good to go " . $first_name . " " . $last_name . "!";
            echo "<p> <a href='./login.php'>Click here to return to the login page!</a></p>";
        }
        else
            echo "We were unable to add you to the database. Please try again.\n";
    }
    $connect -> close();

?>

</html>