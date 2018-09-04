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
                        <a id="login_btn"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                    </div>
                </li>
                <li>
                    <div class="li_content">
                        <a href="register"><i class="far fa-user"></i> Sign Up</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
<?php } else { ?>
    <div class="nav_bar_container">
        <div class="hamburger_container" onclick="hamburgerToggle(this); myFunction()">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <nav>
            <ul class="nav" id="nav">
                <!-- This is the hamburger li content. Only show these elements when the screen size is small -->
                <div class="hamburger_content">
                    <div class="li_content">
                        <li>
                            <a href="user_account"><i class="fas fa-user-circle"></i> Your Account</a>
                        </li>
                    </div>
                    <div class="li_content">
                        <li>
                            <a href="logout"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                        </li>
                    </div>
                </div>
                <!-- End of hamburger li content -->
                <!-- Dropdown li content once a user has signed in -->
                <li>
                    <div class="li_content">
                        <button class="dropbtn" onclick="nav_dropdownFunction()"><?php echo $_SESSION['user_email'] ?>
                            <i class="fa fa-caret-down"></i>
                        </button>
                    </div>
                    <div class="dropdown_content" id="myDropdown">
                        <div class="li_content">
                            <a href="user_account"><i class="fas fa-user-circle"></i> Your Account</a></div>
                        <div class="li_content">
                            <a href="logout"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                        </div>
                    </div>
                </li>
                <!-- End of Dropdown li content -->
            </ul>
        </nav>
    </div>
<?php } ?>

<?php include('app/views/users_view/login.view.php'); ?>