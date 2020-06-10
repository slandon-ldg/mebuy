<?php require('app/views/partials/header.view.php'); ?>
    <link rel="stylesheet" href="app/public/css/user_styles/user_dashboard_style.css">

    <section>
        <?php require('app/views/partials/dashboard_sidenav.view.php'); ?>

        <article class="personal_info_div">
            <?php
            echo "<h1>Welcome " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "</h1>";
            ?>
            <p>Please use the links on the side to navigate to your account details. </p>
            <br>
            <h1>Account Information</h1>

            <div class="address_container">
                <h3 class="address_card_header">Shipping Address</h3>
                <div class="address_card_content">
                    <?php
                    if (isset($street_address)
                        && isset($city)
                        && isset($postcode)
                        && isset($country)
                        && isset($phone_number)
                    ) {
                        echo "<p>" . $street_address . "</p>";
                        echo "<p>" . $city . "</p>";
                        echo "<p>" . $postcode . "</p>";
                        echo "<p>" . $country . "</p>";
                        echo "<p>" . $phone_number . "</p>";
                    } else {
                        echo "<div class='li_content'>";
                        echo "<li>";
                        echo "<i class='small_nav fas fa-user-circle'></i>";
                        echo "Please fill out the <a href='user_account?nav=address_details'><i class='fas fa-home'></i> Address Info</a> Section";
                        echo "</li>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="address_container">
                <h3 class="address_card_header">Billing Address</h3>
                <div class="address_card_content">
                    <?php
                    if (isset($bill_street)
                        && isset($bill_city)
                        && isset($bill_postcode)
                        && isset($bill_country)
                        && isset($bill_phone_number)
                    ) {
                        echo "<p>" . $bill_street . "</p>";
                        echo "<p>" . $bill_city . "</p>";
                        echo "<p>" . $bill_postcode . "</p>";
                        echo "<p>" . $bill_country . "</p>";
                        echo "<p>" . $bill_phone_number . "</p>";
                    } else {
                        echo "<div class='li_content'>";
                        echo "<li>";
                        echo "<i class='small_nav fas fa-user-circle'></i>";
                        echo "Please fill out the <a href='user_account?nav=billing_details'><i class='far fa-credit-card'></i> Address Info</a> Section";
                        echo "</li>";
                        echo "</div>";
                    }
                    ?>
                </div>
        </article>

    </section>

<?php require('app/views/partials/footer.view.php');