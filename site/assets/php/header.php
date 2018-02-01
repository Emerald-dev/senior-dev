<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>
            Rochester Cemetery
		</title> 
        <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">
	</head>
    <body>
        <!-- GLOBAL NAVIGATION -->
		<header>
            <nav>
                <ul>
                    <li <?php echo ($page == 'home') ? 'class="current"' : '';?> >
                        <div><a href="home.php">Home</a></div>
                    </li>
                    <li <?php echo ($page == 'tombstones') ? 'class="current"' : '';?> >
                        <div><a href="tombstones.php">Tombstones</a></div>
                    </li>
                    <li <?php echo ($page == 'flora') ? 'class="current"' : '';?> >
                        <div><a href="flora.php">Flora</a></div>
                    </li>
					<li <?php echo ($page == 'history') ? 'class="current"' : '';?> >
                        <div><a href="history.php">History</a></div>
                    </li>
					<li <?php echo ($page == 'destinations') ? 'class="current"' : '';?> >
                        <div><a href="destinations.php">Destinations</a></div>
                    </li>
					<li <?php echo ($page == 'about') ? 'class="current"' : '';?> >
                        <div><a href="about.php">About</a></div>
                    </li>
					<li <?php echo ($page == 'blog') ? 'class="current"' : '';?> >
                        <div><a href="blog.php">Blog</a></div>
                    </li>
                </ul>
            </nav>
		</header>
            