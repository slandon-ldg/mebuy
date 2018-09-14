<!--/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 22/08/2018
 * Time: 16:32
 */-->

<?php require('app/views/partials/header.view.php'); ?>
<link rel="stylesheet" href="app/public/css/user_styles/user_registration_form.css">

<h1>Create an Account</h1>

<div class="registration_form">

    <form class="user_reg_form" action="register" method="post">
        <input class="reg_form_textfield" id="fname" name="fname" placeholder="First Name" required>
        <input class="reg_form_textfield" id="lname" name="lname" placeholder="Last Name" required>

        <br>

        <input type="email" class="reg_form_textfield" id="email" name="email" placeholder="Email Address" required>

        <br>

        <input type="password" class="reg_form_textfield" id="pword" name="pword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

        <br>

        <button class="reg_form_submit_button" style="vertical-align:middle"><span>Submit</span></button>

        <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
    </form>

</div><!-- end of container div -->

<?php require('app/views/partials/footer.view.php'); ?>

