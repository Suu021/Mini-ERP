<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-ERP Sign up</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Mini ERP</h1>
    </header>
    <main>
    <section>
            <?php
            if(isset($_SESSION['signup_status'])):
            ?>
                <div class="notification is-success">
                    <p>Success sign up! Now you can sign in.</p>
                </div>
            <?php
            endif;
            unset($_SESSION['signup_status']);
            if(isset($_SESSION['user_exists'])):
            ?>
                <div class="notification is-info">
                    <p>This username already exists. Please, try another.</p>
                </div>
            <?php
            endif;
            unset($_SESSION['user_exists']);
            if (isset($_SESSION['different_password'])):?>
            ?>
                <div class="notification is-info">
                    <p>Password not match. Please, try again.</p>
                </div>
            <?php
            endif;
            unset($_SESSION['different_password']);
            ?>
        </section>
        <section>
            <form method="post" action="signUp.php">
                <label for="Bname">Business name: </label><input type="text" required name="Bnametxt" id="Bname">
                <br><label for="username">Username: </label><input type="text" required name="usernametxt" id="username">
                <br><label for="password">Password: </label><input type="password" required name="passwtxt" id="password">
                <br><label for="password2">Repeat the password: </label><input type="password" required name="passw2txt" id="password2" onchange="check()">
                <span id='message'></span>
                <br><button type="submit" id="submit">Sign up</button>
            </form>
            <br>
            <button onclick="window.location.href='mainPage.html'">Back</button>
        </section>
    </main>
    <footer>
        <p>Developed by Suu Kirinus Nogueira</p>
    </footer>
    <script src="verify.js"></script>
</body>

</html>