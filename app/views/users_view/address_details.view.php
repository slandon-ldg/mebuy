<?php require('app/views/partials/header.view.php'); ?>
    <link rel="stylesheet" href="app/public/css/user_styles/user_dashboard_style.css">
    <link rel="stylesheet" href="app/public/css/user_styles/user_forms_style.css">

    <section>
        <?php require('app/views/partials/dashboard_sidenav.view.php'); ?>

        <article class="personal_info_div">
            <h1>Address Details</h1>
            <p>This is where your items will be delivered to</p>
            <p>Please fill in the fields for them to be updated</p>
            <p>This will be your active Shipping Address</p>

            <form action="update_address_info" method="post">
                <input class="user_dashboard_inputfields_street" id="address_street" name="address_street"
                       placeholder="Street"
                       required>

                <input class="user_dashboard_inputfields" id="address_city" name="address_city" placeholder="City"
                       required>

                <input class="user_dashboard_inputfields" id="address_postcode" name="address_postcode"
                       placeholder="Postcode"
                       pattern="^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$"
                       required
                       oninvalid="this.setCustomValidity('Please enter a correct UK Postcode & Uppercase')"
                       onchange="this.setCustomValidity('')">

                <input class="user_dashboard_inputfields" id="address_country" name="address_country"
                       placeholder="Country"
                       required>

                <input class="user_dashboard_inputfields" id="address_phonenumber" name="address_phonenumber"
                       placeholder="Phone Number" pattern="^(?:0|\+?44)(?:\d\s?){9,10}$" required>

                <br>

                <input type="checkbox" id="active_shipping_address" name="active_shipping_address"> Set as Default
                Shipping
                Address<br>
                <input type="checkbox" id="active_billing_address" name="active_billing_address"> Set as Default Billing
                Address<br>

                <button class="user_dashboard_submit_button" style="vertical-align:middle"><span>Submit</span></button>

            </form>
        </article>

    </section>

<?php require('app/views/partials/footer.view.php');