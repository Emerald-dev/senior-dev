<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
            Rochester Cemetery Admin Site
		</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<meta charset="utf-8" />
	</head>
    <body>
        <!-- GLOBAL NAVIGATION -->
		<header>
            <br /><br /><h2>Rapids Cemetery Admin Site</h2>
		</header>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
		<div class="loginBox">
		<form action='../assets/php/auth_login.php' method='post'>
			Username <br />
			<input type='text' name='user' value='' required> <br /><br />
			Password <br />
			<input type='password' name='pass' value='' required>  <br /><br />
			<input type='submit' value='submit'>
		</form>
		

		<?php
		if(isset($_GET['success'])){
			$loginFailed = $_GET['success'] == 'failed';
			if($loginFailed){
				echo('<div class="error">Your user name or password is incorrect. Please contact the site Administrator if you need to reset your password.</div>');
			}
		}
		?>
		
		</div>
		
	</body>
</html>

