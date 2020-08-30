<!doctype html>
<html>
    <head>
        <title>iAgent Registration</title>
        	<!--Import Google Icon Font-->
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>`
    </head>
    
    <body>
    <img src="../images/logo.png" style="margin-left: auto; margin-right: auto;" alt="iAgent Logo">
	<h6>Please enter the following information:</h6>
    <div class="row">
	    <form class="col s6" method="get" action="./register_verify.php" autocomplete="on">
		<div class="row">
		    <div class="input-field col s6">
			<input placeholder="null@null.com" name="email" type="email" class="validate">
			<label class="active" for="email">Email Address</label>
		    </div>
		</div>
		<div class="row">
		    <div class="input-field col s6">
			<input placeholder="Please type your username." name = "user_name"  type="text" class="validate">
			<label class="active" for="user_name">Username</label>
		    </div>
		</div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Please type your first name." name="first_name"  type="text" class="validate">
            <label class="active" for="first_name">First Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Please type your last name." name="last_name"  type="text" class="validate">
            <label class="active" for="last_name">Last Name</label>
            </div>
        </div>
		<div class="row">
		    <div class="input-field col s6">
			<input placeholder="Please type your password." name="password" type="password" class="validate">
			<label class="active" for="password">Password</label>
		    </div>
		</div>
	
        <div class="row">
		    <div class="input-field col s6">
			<input id="confirm_password" name="confirm_password" type="password" class="validate">
			<label class="active" for="confirm_password">Confirm Password</label>
		    </div>
		</div>
		
		
		<button class="btn waves-effect waves-light" type="submit" name="action">Login
		    <i class="material-icons right">send</i>
		</button>
        
	    </form>
	    
	</div>
		<script type="text/javascript" src="js/materialize.min.js"></script>
    </body>

</html>
