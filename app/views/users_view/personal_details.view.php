<?php require('app/views/partials/header.view.php'); ?>
<link rel="stylesheet" href="app/public/css/user_styles/user_dashboard_style.css">
<link rel="stylesheet" href="app/public/css/user_styles/user_forms_style.css">

<section>
    <?php require('app/views/partials/dashboard_sidenav.view.php'); ?>

    <article class="personal_info_div">
        <h1>Personal Info</h1>
        <p>Please fill in the fields for them to be updated</p>
        <form action="update_personal_info" method="post">
            <input class="user_dashboard_inputfields" id="update_fname" name="update_fname"
                   value="<?= $_SESSION['first_name'] ?>" required>

            <input class="user_dashboard_inputfields" id="update_lname" name="update_lname"
                   value="<?= $_SESSION['last_name'] ?>" required>

            <input class="user_dashboard_inputfields_email" type="email" id="update_email" name="update_email"
                   value="<?= $_SESSION['user_email'] ?>" required>

            <br>

            <button class="user_dashboard_submit_button" style="vertical-align:middle"><span>Submit</span></button>

        </form>
    </article>

</section>

<?php require('app/views/partials/footer.view.php');