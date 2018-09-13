<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 12/09/2018
 * Time: 14:52
 */
?>

<div class="personal_info_div">
    <h1>Personal Info</h1>
    <p>Please fill in the fields for them to be updated</p>
    <form action="update_personal_info" method="post">
        <input class="user_dashboard_inputfields" id="update_fname" name="update_fname" value="<?= $_SESSION['first_name'] ?>" required>

        <input class="user_dashboard_inputfields" id="update_lname" name="update_lname" value="<?= $_SESSION['last_name'] ?>" required>

        <input class="user_dashboard_inputfields_email" type="email" id="update_email" name="update_email" value="<?= $_SESSION['user_email'] ?>" required>

        <br>

        <button class="user_dashboard_submit_button" style="vertical-align:middle"><span>Submit</span></button>

    </form>
</div>