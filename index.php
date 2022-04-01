<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANGENET</title>
    <!-----------------------------Styles---------------------------------->
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/my-colors.css">
    <!--rest of styles(Halas's)-->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <video autoplay muted loop id="myVideo">
        <source src="media/video.MP4" type="video/mp4">
    </video>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <a href="./"><img src="media/logo.png" alt="Logo" class="logo"></a>
        </div>
    </header>


    <!-- Content -->
    <div class="index-page">
        <div class="container">

            <div class="index-page__wrapper">
                <div class="index-page__btns-group">
                    <div>
                        <a href="login.php" class="btn btn--v1">Employee Log-in</a>
                    </div>
                    <div>
                        <a href="login_manger.php" class="btn btn--v2">Manager Log-in</a>
                    </div>
                </div>
                <div class="index-page__para">
                    New Employee? <a href="signUp.php">Sign-up</a>
                </div>
            </div>

        </div>
    </div>


    <footer>

        <!--Copy Rights-->
        <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

    </footer>
</body>

</html>