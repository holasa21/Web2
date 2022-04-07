<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manger Login</title>
    <link rel="stylesheet" href="css/manger_login.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/my-colors.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-lightgrey bg-lightgrey">
            <div class="container">
                <div class="col-1">
                    <a class="navbar-brand" href="#">
                        <img src="media/mini-logo.png" alt="" width="" height="75" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="col-10 align-middle">
                    <h3 class="text-darksky">EMPLOYEE MANGENET SYSTEM</h3>
                </div>
            </div>
        </nav>
    </header>
    <!--contant-->
    <div class="wrapper">
        <div class="form">
            <div class="title">
                Log In Manger
            </div>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="errors"><p>' . $_SESSION['error'] . '</p></div>';
                unset($_SESSION['error']);
            }
            ?>
            <form method="post" action="login_manger_process.php" onsubmit="validation(event);">
                <div class="input_wrap">
                    <div class="input_field">
                        Username <input type="text" placeholder="ex: user2001" class="input" id="input_text" name="username" pattern=".{1,10}" maxlength="10">
                    </div>
                </div>
                <div class="input_wrap">
                    <label for="input_password">Password</label>
                    <div class="input_field">
                        <input type="password" placeholder="letters or numbers or charecters" class="input" id="input_password" name="password">
                    </div>
                </div>
                <p><em>Note: All feilds must have (at least) 2 digits</em></p>
                <br>
                <div class="input_wrap">
                    <span class="error_msg">Invalid Inputs!. Please try again</span>
                    <button type="submit" id="login_btn" class="btn disabled" value="Login" disabled="true"> log in</button>
                </div>
            </form>
        </div>
    </div>
    <footer>

        <!--Copy Rights-->
        <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

    </footer>
    <script src="js/login_manger.js"></script>
</body>

</html>
