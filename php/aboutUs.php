<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>About Us</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <script src="http://cdn.date-fns.org/v2.0.0-alpha0/date_fns.min.js"></script>
        <script src="../js/mainScript.js" async defer></script>
    </head>
    <body>
        <header>
            <section class="container">
            <h1 class="logo">PANTRY BUDDY</h1>
                <nav>
                    <ul>
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="myPantry.php">MY PANTRY</a></li>
					<li><a href="aboutUs.php">ABOUT US</a></li>
					<?php
					if(isset($_SESSION['submit'])){
					?>
					<li><a href="signOut.php">SIGN OUT</a></li>
					<?php
					}
					else{
					?>
					<li><a href="signPage.php">SIGN IN/UP</a></li>
					<?php
					}
                    ?>
                    <li id="clock-text"></li>
                    </ul>
                </nav>
            </section>
        </header>
        <main>
            <section id="aboutUsGrid">
                <article class="aboutUsInfo">
                    <p>Pantry Buddy is a Capstone project created by Ahmad Mughrabi.</p>
                </article>
                <aside>
                    <img src="../images/email.jpg" alt="A picture of an email system">
                </aside>
                <article class="contactMe">
                    <h2>Want to get in touch?</h2>
                    <p>Got feedback? A suggestion? A business offer? Use this email to get in touch!</p>
                    <a href="mailto:9AMTechnology@gmail.com">9AMTechnology@gmail.com</p></a>
                </article>
                <aside>
                    <img src="../images/donate.jpg" alt="A hand placing coins into a jar that has a donate label">
                </aside>
                <article class="helpMe">
                    <h2>Want to help out?</h2>
                    <p>Doing a project like this takes time and loads of effort! For the most part I want to keep this app as free as possible, I'd appreciate any and all donations!</p>
                </article>
            </section>  
            <footer>
                <p>© Ahmad Mughrabi | 2020</p>
            </footer>
        </main>
    </body>
</html>