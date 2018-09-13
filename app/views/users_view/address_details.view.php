<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 12/09/2018
 * Time: 14:53
 */
?>

<div class="personal_info_div">
    <h1>Address Details</h1>
    <p>Please fill in the fields for them to be updated</p>

    <form action="update_address_info" method="post">
        <input class="user_dashboard_inputfields_street" id="address_street" name="address_street" placeholder="Street"
               required>

        <input class="user_dashboard_inputfields" id="address_city" name="address_city" placeholder="City" required>

        <input class="user_dashboard_inputfields" id="address_postcode" name="address_postcode" placeholder="Postcode"
               required>

        <input class="user_dashboard_inputfields" id="address_country" name="address_country" placeholder="Country"
               required>

        <input class="user_dashboard_inputfields" id="address_phonenumber" name="address_phonenumber"
               placeholder="Phone Number" required>

        <br>

        <button class="user_dashboard_submit_button" style="vertical-align:middle"><span>Submit</span></button>

    </form>

</div>