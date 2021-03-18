<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tesla News | Tesla</title>
    <link rel="icon" type="image/png" href="https://cdn.iconscout.com/icon/free/png-512/tesla-11-569489.png">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/model_s.css">
    <link rel="stylesheet" href="../style/design_tesla.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/success.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src='../javascript/php.js'></script>
</head>

<body>
    <!-- NAV -->
    <div class="nav-model-s">
        <a href='./index.html'>
            <img class="nav-logo" src='../assets/tesla_logo_title.png' />
        </a>

        <div class='nav-group'>
            <a href='./model_s.xml' class='nav-button'>Model S</a>
            <a href='' class='nav-button'>Model 3</a>
            <a href='./model_x.html' class='nav-button'>Model X</a>
            <a href='' class='nav-button'>Model Y</a>
            <a href='' class='nav-button'>Solar Roof</a>
            <a href='' class='nav-button'>Solar Panels</a>
        </div>

        <div class='nav-group'>
            <a href='' class='nav-button'>Shop</a>
            <a href='./login.php' class='nav-button'>Tesla Account</a>
            <img src="https://img.icons8.com/material-two-tone/24/000000/menu--v3.png" class='menu-icon' />
        </div>
    </div>

    <!-- PAGE CONTAINER -->
    <div class="login-main-container">

        <!-- SIGN IN FORM -->
        <div class="form-container">
            <div id="login-form" class="form-container">
                <p class="slide-title">Sign In</p>

                <form method="post">
                    <p class='p-legend'>Email Address</p>
                    <input id="email-login" class="form-input" type="email" name="email" placeholder="Email">

                    <p class='p-legend'>Password</p>
                    <input id="password-login" class="form-input" type="password" name="password" placeholder="Password">

                    <button class="button btn-active form-btn" onclick="loginClick()" type="button">Sign in</button>

                    <div class="separator">OR</div>
                </form>
                <button class="switch-btn form-btn" onclick="switchToCreate()">Create account</button>
            </div>

            <!-- SUCCESS -->
            <div id="successful-form-login">
                <div class="check_mark">
                    <div class="sa-icon sa-success animate">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>
                </div>
                <p class="success-text">Login was successful. You may now create and add content to Tesla News.</p>
                <p id="user-details"></p>
            </div>

            <!-- SUCCESS ACTIVATION -->
            <div id="successful-form-activation">
                <div class="check_mark">
                    <div class="sa-icon sa-success animate">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>
                </div>
                <p class="success-text">Account activation was successful. You may now create and add content to Tesla News.</p>
                <p id="user-details-activation"></p>
            </div>

            <!-- FAILURE -->
            <div id="fail-form-login">
                <p class="failure-text">Email/Password is incorrect.</p>
                <p id="user-details"></p>
            </div>
        </div>

        <!-- SIGN UP FORM -->
        <div class="form-container">
            <div id="register-form" class="form-container">
                <p class="slide-title">Create Account</p>

                <form method="post">
                    <p class='p-legend'>First Name</p>
                    <input id="first-name-signup" class="form-input" type="text" name="first_name" placeholder="First name">

                    <p class='p-legend'>Last Name</p>
                    <input id="last-name-signup" class="form-input" type="text" name="last_name" placeholder="Last name">

                    <p class='p-legend'>Email Address</p>
                    <input id="email-signup" class="form-input" type="email" name="email" placeholder="Email">

                    <p class='p-legend'>Password</p>
                    <input id="password-signup" class="form-input" type="password" name="password" placeholder="Password">

                    <button class="button btn-active form-btn" onclick="signUpClick()" type="button">Create account</button>

                    <div class="separator">OR</div>
                </form>
                <button class="switch-btn form-btn" onclick="switchToLogin()">Sign in</button>
            </div>

            <!-- SUCCESS -->
            <div id="successful-form-signup">
                <div class="check_mark">
                    <div class="sa-icon sa-success animate">
                        <span class="sa-line sa-tip animateSuccessTip"></span>
                        <span class="sa-line sa-long animateSuccessLong"></span>
                        <div class="sa-placeholder"></div>
                        <div class="sa-fix"></div>
                    </div>
                </div>
                <p class="success-text">Sign up was successful. Please check your email to activate account.</p>
            </div>

            <!-- FAILURE -->
            <div id="fail-form-signup">
                <p id="failure-text" class="failure-text"></p>
            </div>
        </div>
    </div>

    <!-- NEWS FEED -->
    <div class="news-feed-container">

    </div>

    <!-- VALIDATING EMAIL ADDRESS -->
    <?php
    // if someone tries to validate their account
    if (isset($_GET['code'])) {
        // connection
        $link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

        // build query
        $query = "UPDATE `users` set active = true where email = '" . mysqli_real_escape_string($link, $_GET['code']) . "'";

        // run query
        $result = mysqli_query($link, $query);

        echo "<script>accountActivated('" . mysqli_real_escape_string($link, $_GET['code']) . "');</script>";
    }
    ?>

</body>

</html>