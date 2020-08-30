<?php
    session_start();
?>
<!doctype html>
<html>
<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
</head>

<body>

<?php
    function compare_user_password($password, $db_password){
        return (($password == $db_password)) ? true : false;
    }


    include "../db/db_connect.php";
    $email = mysqli_real_escape_string($connect, $_GET["email"]);
    $password_info = mysqli_real_escape_string($connect, $_GET["password_field"]);
    
    $is_valid = true;
    if ($email == ""){
        $is_valid = false;
        echo "Error: Email Field is empty.";
    }

    if ($password_info == ""){
        $is_valid = false;
        echo "Error: Password Field is empty.";
    }
    
    if (!$is_valid){
        echo "<p>Please check your login information and try again.</p>";
        echo "<input type='button' class='btn waves-effect waves-light' value='Return to Login Page' onClick='history.back()'><br>";
        echo "</p><br>";
    }
    else{
        $md5_password = md5($password_info);

    
        // Now search the database user for the user, if it exists, move to your profile
        // SELECT * FROM `users` WHERE email = "$email" AND password = $md5_password
        $result =  mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($result) == 1){ // Should only return one value
            $row = mysqli_fetch_row($result);
            //echo "Returned Rows: " . mysqli_num_rows($result);

            // Now compare passwords:
            $db_password = $row[5];
            if (!compare_user_password($md5_password, $db_password)){
                echo "<p>Invalid Password. Please try again.</p>";
                echo "<input type='button' class='btn waves-effect waves-light' value='Return to Login Page' onClick='history.back()'><br>";
                echo "</p><br>";
                exit(-1);
            }


            // Now create a session with all info:
            $_SESSION["user_name"] = $row[1];
            $_SESSION["first_name"] = $row[2];
            $_SESSION["last_name"] = $row[3];
            $_SESSION["email"] = $row[4];
            $_SESSION["id"] = $row[0];

            echo "Login Sucessful!";     
            header("Location: ./menu.php");

        }
        else{ 
            echo "<p>User with email $email could not be found. ";
            echo "<a href='./register.php'>Click here to register.</a></p>";
        }
    }

    $connect -> close();


?>

</body>
</html>