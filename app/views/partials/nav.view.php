<link rel="stylesheet" href="app/public/css/nav_style.css">
<?php
if (!isset($_SESSION['user_email'])) { ?>
    <div class="nav_bar_container">
        <div class="hamburger_container" onclick="hamburgerToggle(this); myFunction()">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav>
            <ul class="nav" id="nav">
                <li>
                    <div class="li_content">
                        <a><i class="fas fa-sign-in-alt"></i></a>
                        <a id="login_btn">Sign In</a>
                    </div>
                </li>
                <li>
                    <div class="li_content">
                        <a href="register"><i class="far fa-user"></i></a>
                        <a href="register">Sign Up</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
<?php } ?>


<!--//if (isset($_SESSION['user_email'])) { ?>-->
<!--    <div id="wrapper">-->
<!--        <div class="container" onclick="hamburgerToggle(this); myFunction()">-->
<!--            <div class="bar1"></div>-->
<!--            <div class="bar2"></div>-->
<!--            <div class="bar3"></div>-->
<!--        </div>-->
<!--        <ul class="nav" id="nav">-->
<!--            <li class="right">-->
<!--                <button class="dropbtn" onclick="nav_dropdownFunction()">-->
<!--                    <i class="fas fa-user-circle"></i>-->
<!--                    --><?php //echo $_SESSION['user_email']; ?>
<!--                    <i class="fa fa-caret-down"></i>-->
<!--                </button>-->
<!--                <div class="dropdown-content" id="myDropdown">-->
<!--                    <div class="myHover">-->
<!--                        <a href="user_account"><i class="fas fa-user-circle"></i></a>-->
<!--                        <a href="user_account">Your Account</a>-->
<!--                    </div>-->
<!--                    <div class="myHover">-->
<!--                        <a href="logout"><i class="fas fa-sign-out-alt"></i></a>-->
<!--                        <a href="logout">Sign Out</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->

<?php include('app/views/users_view/login.view.php'); ?>