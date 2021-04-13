<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- <meta http-equiv="refresh" content="1"> -->
        <meta charset="utf-8">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <script src="http://cdn.date-fns.org/v2.0.0-alpha0/date_fns.min.js"></script>
        <script src="js/mainScript.js" async defer></script>
    </head>
    <body>
        <header>
            <section class="container">
            <h1 class="logo">PANTRY BUDDY</h1>
                <nav>
                    <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="php/myPantry.php">MY PANTRY</a></li>
					<li><a href="php/aboutUs.php">ABOUT US</a></li>
					<?php
					if(isset($_SESSION['submit'])){
					?>
					<li><a href="php/signOut.php">SIGN OUT</a></li>
					<?php
					}
					else{
					?>
					<li><a href="php/signPage.php">SIGN IN/UP</a></li>
					<?php
					}
                    ?>
                    <li id="clock-text"></li>
                    </ul>
                </nav>
            </section>
        </header>
        <main>
            <section class="homeImage">
                <img src="images/home2.jpg" alt="Image of a pantry with a lot of ingrediants and cooking supplies">
            </section>
            <section id="homeGrid">
                <article class="welcome">
                    <h1>Welcome to Pantry Buddy!</h1>
                </article>
                <article>
                    <img src="images/grocery.png" alt="Image of a grocery bag">
                    <p>Keep track of groceries and expiration dates with a friendly UI!</p>
                </article>
                <article>
                    <img src="images/ducklogo.png" alt="Image of a duck">
                    <p>So easy to navigate and use the website even a duck can do it!</p>
                </article>
                <article>
                    <img src="images/smartphone.png" alt="Image of a hand holding a smartphone">
                    <p>Take us on the go with our mobile app, never deal with expired groceries again!</p>
                </article>
                <article class="whatsNew">
                    <h1>What's New</h1>
                    <p>This website is new! I'm slowly bringing content and design to this project to make it flourish and prosper!</p>
                </article>
            </section>
            <footer>
                <p>© Ahmad Mughrabi | 2020</p>
            </footer>
        </main>
    </body>
</html>
