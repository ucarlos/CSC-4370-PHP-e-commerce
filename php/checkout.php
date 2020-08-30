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
    <title>iAgent Check out</title>
    <!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->

	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
</head>
<body>

    <img src="../images/logo.png" style="margin-left: auto; margin-right: auto;" alt="iAgent Logo"> 
    
    <?php
        $total_price = $_SESSION['total_price'];
        echo "<p>Total Cost of all items in your inventory is \$$total_price</p>";
    ?>




	<!-- Enter Username Form here: !-->
	<!-- Enter Password field Form here: !-->
	<div class="row">
	    <form class="col s6" method="get" action="./checkout_verify.php" autocomplete="on">
		<div class="row">
		    <div class="input-field col s6">
			<input placeholder="Please type your Card Number." oninput="wrapper()" name="card_num" id="card_num" type="text" class="validate">
			<label class="active" for="email">Card Number</label>
		    </div>
            <div class="input-field col s3">
                <input disabled value="Invalid Card" name="card_type" id="disabled" type="text" class="validate">
            </div>
		</div>
		<div class="row">
		    <div class="input-field col s6">
			<input placeholder="Please type your Name." name="card_name" type="text" class="validate">
			<label class="active" for="card_name">Name</label>
		    </div>
		</div>

		<div class="row">
            <div class="input-field col s1">
                <input placeholder="Month" name="card_month" type="text" class="validate">
                <label class="active" for="card_month">Month</label>
            </div>

            <div class="input-field col s1">
                <input placeholder="Year" name="card_year" type="text" class="validate">
                <label class="active" for="card_year">Year</label>
            </div>

        </div>
		
		<button class="btn waves-effect waves-light" type="submit" name="action">Submit
		    <i class="material-icons right">send</i>
		</button>
        
	    </form>
	    
	</div>


    <script src="../js/credit_card.js">
    </script>
</body>

</html>