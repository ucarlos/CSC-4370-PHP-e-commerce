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
		<style>
			*{
				font-align: center;
			}
		</style>

		<title>iAgent Home Page </title>
		<!--
		<link href="../css/main.css" rel="stylesheet">
		!-->
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    </head>
    
    <body>

	<img src="../images/logo.png" style="margin-left: auto; margin-right: auto;" alt="iAgent Logo">
	<h4>Welcome to iAgent!</h4>
	<a href="./book_flight.php">Click here to book a flight.</a><br>
	<a href="./book_parking.php">Click here to reserve a parking space.</a><br>
	<a href="./profile.php">Click here to view Profile.</a><br>
	<a href="./view_cart.php">Click here to view cart.</a><br>	
	<a href="./signout.php"> Click here to sign out.</a></br>
	
	<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
    
</html>
