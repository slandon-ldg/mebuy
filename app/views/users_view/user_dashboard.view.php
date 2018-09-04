<!--/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 31/08/2018
 * Time: 14:31
 */-->

<?php require('app/views/partials/header.view.php'); ?>
<link rel="stylesheet" href="app/public/css/user_styles/user_dashboard_style.css">

<?php
echo "<h1>Welcome " . $_SESSION['user_email'] . "</h1>";
echo "<h2>This is your Dashboard</h2>"
?>


<?php require('app/views/partials/footer.view.php');
