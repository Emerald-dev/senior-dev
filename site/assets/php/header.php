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
                        <div><a href="tombstones.php">Tombstones & Natural History</a></div>
                    </li>
					<li <?php echo ($page == 'nearbyhis') ? 'class="current"' : '';?> >
                        <div><a href="nearbyhis.php">Nearby Historical Trails</a></div>
                    </li>
					<li <?php echo ($page == 'contact') ? 'class="current"' : '';?> >
                        <div><a href="contact.php">Contact Us</a></div>
                    </li>
					<li <?php echo ($page == 'blog') ? 'class="current"' : '';?> >
                        <div><a href=" https://rapidscemeteryblog.wordpress.com/">Blog</a></div>
                    </li>
                </ul>
            </nav>
		</header>
            