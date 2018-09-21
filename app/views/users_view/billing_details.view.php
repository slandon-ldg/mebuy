<?php
/**
 * Created by PhpStorm.
 * User: slandon
 * Date: 12/09/2018
 * Time: 14:53
 */
?>

<div class="personal_info_div">
    <h1>Billing Address Details</h1>
    <p>This is where your items will be Billed to</p>
    <p>Please fill in the fields for them to be updated</p>
    <p>This will be your active Billing Address</p>

    <form action="update_bill_address_info" method="post">
        <input class="user_dashboard_inputfields_street" id="bill_address_street" name="bill_address_street" placeholder="Street"
               required>

        <input class="user_dashboard_inputfields" id="bill_address_city" name="bill_address_city" placeholder="City" required>

        <input class="user_dashboard_inputfields" id="bill_address_postcode" name="bill_address_postcode" placeholder="Postcode"
               pattern="^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$"
               required
               oninvalid="this.setCustomValidity('Please enter a correct UK Postcode & Uppercase')"
               onchange="this.setCustomValidity('')">

        <input class="user_dashboard_inputfields" id="bill_address_country" name="bill_address_country" placeholder="Country"
               required>

        <input class="user_dashboard_inputfields" id="bill_address_phonenumber" name="bill_address_phonenumber"
               placeholder="Phone Number" pattern="^(?:0|\+?44)(?:\d\s?){9,10}$" required>

        <br>

        <button class="user_dashboard_submit_button" style="vertical-align:middle"><span>Submit</span></button>

    </form>

</div>