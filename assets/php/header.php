<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
            Rochester Cemetery
		</title> 
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<meta charset="utf-8" />
	</head>
    <body>
        <!-- GLOBAL NAVIGATION -->
		<header>
            <!--
            <nav>
                <ul>
                    <li <?php echo ($page == 'home') ? 'class="current"' : '';?> >
                        <div><a href="index.php">Home</a></div>
                    </li>
                    <li <?php echo ($page == 'tombstones') ? 'class="current"' : '';?> >
                        <div><a href="tombstones.php">Tombstones & Natural History</a></div>
                    </li>
					<li <?php echo ($page == 'nearbyhis') ? 'class="current"' : '';?> >
                        <div><a href="nearbyhis.php">Nearby Historical Trails</a></div>
                    </li>
					<li <?php echo ($page == 'about') ? 'class="current"' : '';?> >
                        <div><a href="about.php">About Us</a></div>
                    </li>
					<li <?php echo ($page == 'blog') ? 'class="current"' : '';?> >
                        <div><a href=" https://rapidscemeteryblog.wordpress.com/">Blog</a></div>
                    </li>
                </ul>
            </nav>
            -->
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainNavBar" aria-controls="mainNavBar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                  <a class="navbar-brand" href="index.php">Rapids Cemetery</a>

                  <div class="collapse navbar-collapse" id="mainNavBar">
                    <ul class="navbar-nav mr-auto mt-2 mt-md-0">
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'home') ? "current" : '';?>" href="index.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'tombstones') ? "current" : '';?>" href="tombstones.php">Tombstones &amp; Natural History</a>
                      </li>
                         <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'nearbyhis') ? "current" : '';?>" href="nearbyhis.php">Nearby Historical Trails</a>
                      </li>
                         <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'about') ? "current" : '';?>" href="about.php">About Us</a>
                      </li>
                         <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'blog') ? "current" : '';?>" href="https://rapidscemeteryblog.wordpress.com/">Blog</a>
                      </li>
                    </ul>
                  </div>
                </nav>
		</header>
		<div id="<?php echo $page?>">
        <div class='banner'>
			<?php
				require_once("dbAPI.php");
				$result = getPageTitle($name);
				$data = $result->fetch_assoc();
				$title = $data['text'];
		
				echo "<h1>".$title."</h1>";
			?>
		</div>
		
        
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
            