<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign In</title>
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
                    <li><a href="signPage.php">SIGN IN/UP</a></li>
                    <li id="clock-text"></li>
                    </ul>
                </nav>
            </section>
        </header>
        <main>
            <section id="signMessage">
                <h1>SIGN IN NOW!</h1>
            </section>
            <form action="signInPOST.php" method="POST">
            <fieldset id="signInFieldset">
                <legend>Login Information :</legend><br>

                <label for="username">Username : </label>
                <input type="text" id="username" name="username"><br><br>

                <label for="password">Password : </label>
                <input type="password" id="password" name="password"><br><br>

                <input class="signInButton" type="submit" name="submit" value="SIGN IN!">
            </fieldset>
            </form>
            <footer>
                <p>© Ahmad Mughrabi | 2020</p>
            </footer>
        </main>
    </body>
</html>