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
    <script type="text/javascript" src='../javascript/ajax.js'></script>
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

    <!-- FORMS CONTAINERS -->
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

    <!-- NEWS TITLE -->
    <div class="second-slide-news slide">
        <div class="slide-elements-center">
            <h1 class="slide-title-model-s" style="padding-top: 1.6vh;">Tesla News</h2>
        </div>
    </div>

    <!-- NEWS CREATOR -->
    <div id="news-creator" class="news-feed-container">
        <p class="slide-title">Create new article</p>
        <input id="news-producer" type="hidden" value="" />

        <p class='p-legend'>Article title</p>
        <input id="news-title" class="article-input" type="text" value="" placeholder="Title.." />

        <p class='p-legend'>Article category</p>
        <select name="category" id="news-category">
            <option value="" disabled selected hidden>Choose category</option>
            <option value="Cars">Cars</option>
            <option value="Stock">Stock</option>
            <option value="Solar energy">Solar energy</option>
        </select>

        <p class='p-legend'>Article text</p>
        <textarea id="news-text" placeholder="Write your text here.."></textarea>

        <button class="switch-btn form-btn" onclick="postNews()">Post article</button>
    </div>

    <!-- FILTERS -->
    <div class="news-scroll-feed-container">
        <p class="slide-title">Filters</p>

        <!-- CATEGORY FILTERS -->
        <div class='round-rectangle'>
            <button id="category-all" class="button-small button-shadow" onclick="chooseCategory('all')">All</button>
            <button id="category-cars" class="button-small button-disabled" onclick="chooseCategory('cars')">Cars</button>
            <button id="category-stock"class="button-small button-disabled" onclick="chooseCategory('stock')">Stocks</button>
            <button id="category-solar-energy"class="button-small button-disabled" onclick="chooseCategory('solar-energy')">Solar energy</button>
        </div>

        <!-- DATE FILTERS -->
        <div class='round-rectangle'>
            <span class="date-legend">From:</span>
            <input id="from-date" type="date" class="date-input"/>
            <span class="date-legend">To:</span>
            <input id="to-date"type="date" class="date-input"/>
        </div>
    </div>

    <!-- NEWS SCROLLFEED -->
    <div id="news-scrollfeed" class="news-scroll-feed-container">
        <!-- APPENDING NEWS -->
        <?php
        $link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

        // build query
        $query = "SELECT * FROM `News`";

        // run query
        // run query
        $result = mysqli_query($link, $query);

        $id = 1;

        // fetch results from query
        while ($row = mysqli_fetch_array($result)) {
            printf('
            <div id="%d" class="news-item">
                <span class="non-edit-buttons">
                    <p class="news-item-title">%s</p>
                    <p class="news-item-category">Category: %s</p>
                    <p class="news-item-author">Posted by: <i>%s</i></p>
                    <p class="news-item-date">Date: %s</p>
                    <p class="news-item-text">%s</p>
                    <button class="switch-btn form-btn edit-btn" onclick="editPost(%d)">Edit</button>
                </span>

                <div class="post-edit-buttons">
                    <p class="slide-title">Edit mode</p>
                    <p class="news-item-title" style="margin-bottom:2vh">%s</p>
                    <input id="%d-news-title" class="article-input" type="hidden" value="%s" />
                    <!-- <select name="category" id="%d-news-category">
                        <option value="" disabled selected hidden>%s</option>
                        <option value="Cars">Cars</option>
                        <option value="Stock">Stock</option>
                        <option value="Solar energy">Solar energy</option>
                    </select> -->
                    <textarea id="%d-news-text" placeholder="Write your text here..">%s</textarea>
                    <button class="switch-btn form-btn edit-btn" onclick="saveEdit(%d)">Save</button>
                </div>
            </div>',
                // id
                $id,
                // non edit buttons
                $row[1],
                $row[4],
                $row[0],
                $row[3],
                $row[2],
                $id,
                // edit stuff
                $row[1],
                $id,
                $row[1],
                $id,
                $row[4],
                $id,
                $row[2],
                // edit title
                $id,
            );

            $id += 1;
        }
        ?>
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