<!doctype html>
<html>
    <head>
        <title>iAgent Login</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->

	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    </head>
    <body>

	<img src="../images/logo.png" style="margin-left: auto; margin-right: auto;" alt="iAgent Logo">
	<!-- Enter Username Form here: !-->
	<!-- Enter Password field Form here: !-->
	<div class="row">
	    <form class="col s6" method="get" action="./login_verify.php" autocomplete="on">
		<div class="row">
		    <div class="input-field col s6">
			<input placeholder="Please type your email" name="email" type="text" class="validate">
			<label class="active" for="email">Email Address</label>
		    </div>
		</div>
		<div class="row">
		    <div class="input-field col s6">
			<input placeholder="Please type your password." name="password_field" type="text" class="validate">
			<label class="active" for="password_field">Password</label>
		    </div>
		</div>
		
		
		<button class="btn waves-effect waves-light" type="submit" name="action">Login
		    <i class="material-icons right">send</i>
		</button>
        
	    </form>
	    
	</div>
	<p>Don't have an account? <a href="./register.php">Click Here to Register.</a></p>
	
	<script type="text/javascript" src="js/materialize.min.js"></script>
	
    </body>
    
</html>
