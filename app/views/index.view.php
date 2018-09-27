<?php include('partials/header.view.php'); ?>

<div class="page_content">
    <?php
    if (isset($_SESSION['user_email'])) {
        echo "<h1>Login Successfull</h1>";
        echo "<h1>Welcome " . $_SESSION['user_email'] . "</h1>";
    } else {
        echo "<h1>Welcome</h1>";
    }
    ?>
</div>

<?php include('partials/footer.view.php'); ?>
