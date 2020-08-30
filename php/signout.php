<?php
session_start();

if(isset($_SESSION['user_name'])) {
    session_destroy();
    
	unset($_SESSION['user_name']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['email']);   

	header("Location: ./login.php");
} else {
	header("Location: ./login.php");
}
?>