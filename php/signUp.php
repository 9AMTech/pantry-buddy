<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
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
            <h1>SIGN UP NOW!</h1>
            </section>
            <form id="form" action="signUpPOST.php" method="POST">
            <fieldset id="signUpFieldset">
                <legend>Login Information :</legend><br>
                <section id="signUpGrid">
                <section class="signUp1">
                    <label for="firstname">First Name</label><br/>
                    <input type="text" id="firstname"" name="firstname" placeholder="John" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp2">
                    <label for="lastname">Last Name</label><br/>
                    <input type="text" id="lastname" name="lastname" placeholder="Doe" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp3">
                    <label for="gender">Gender</label><br/>
                    <label for="male">Male (He/Him)<input type="radio" id="male" name="gender" value="male" required></label><br>
                    <label for="female">Female (She/Her)<input type="radio" id="female" name="gender" value="female"></label><br>
                    <label for="other">Neutral (They/Them)<input type="radio" id="other" name="gender" value="neutral"></label><br><br>
                </section>
                <section class="signUp4">
                    <label for="email">E-Mail</label><br/>
                    <input type="email" id="email" name="email" placeholder="huehuehue@gmail.com" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp5">
                    <label for="username">Username</label><br/>
                    <input type="text" id="username" name="username" placeholder="chickenDinner123" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp6">
                    <label for="password">Password</label><br/>
                    <input type="password" id="password" name="password" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp7">
                    <label for="confirmPassword">Confirm Password</label><br/>
                    <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp8">
                    <label for="address">Address</label><br/>
                    <input type="text" id="address" name="address" placeholder="321 Bendover Blvd" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp9">
                    <label for="state">State</label><br/>
                    <input type="text" id="state" name="state" placeholder="NJ" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp10">
                    <label for="country">Country</label><br/>
                    <input type="text" id="country" name="country" placeholder="United States" required><br><br>
                    <p class="error"></p>
                </section>
                <section class="signUp11">
                    <input class="signUpButton" type="submit" value="Sign Up!">
                </section>
                </section>
            </fieldset>
            </form>
            <footer>
                <p>© Ahmad Mughrabi | 2020</p>
            </footer>
        </main>
    </body>
</html>