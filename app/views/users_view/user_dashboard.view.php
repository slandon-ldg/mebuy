<!--/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 31/08/2018
 * Time: 14:31
 */-->

<?php require('app/views/partials/header.view.php'); ?>
<link rel="stylesheet" href="app/public/css/user_styles/user_dashboard_style.css">

<div class="dashboard">
    <div class="sidebar_nav">
        <ul>
            <li>
                <div class="nav_hover">
                    <a class="icon" href="user_personal_details"><i class="fas fa-home"></i></a>
                    <a class="text" href="user_personal_details">Address</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="form_content">
        <?php
        echo "<h1>Welcome " . $_SESSION['user_email'] . "</h1>";
        echo "<h2>This is your Dashboard</h2>"
        ?>
    </div>
</div>

<!--<div class="sidebar_nav">-->
<!--    <nav>-->
<!--        <a href="#">Details</a>-->
<!--    </nav>-->
<!--</div>-->
<!--<div>-->
<!--    --><?php
//    echo "<h1>Welcome " . $_SESSION['user_email'] . "</h1>";
//    echo "<h2>This is your Dashboard</h2>"
//    ?>
<!--</div>-->


<?php require('app/views/partials/footer.view.php');
